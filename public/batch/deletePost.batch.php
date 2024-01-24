<?php
	session_start();

	include("../config/database.php");
	include ("../inc/functions.php");

	$id=$_SESSION['id'];

	extract($_POST);

	$post=!empty($post_delete)?(int)$post_delete:NULL;

	$query=$db->prepare('
		SELECT  post_createur, 
				post_texte, 
				forum_id,
				topic_id, 
				auth_modo
		FROM forum_post
		LEFT JOIN forum_forum ON forum_post.post_forum_id = forum_forum.forum_id
		WHERE post_id=:post'
	);

	$query->bindValue(':post',$post,PDO::PARAM_INT);
	$query->execute();
	$data = $query->fetch();
	$topic = $data['topic_id'];
	$forum = $data['forum_id'];
	$poster = $data['post_createur'];

	if (!verif_auth($data['auth_modo']) && $poster != $id){
		$_SESSION['unknownError']="Vous n'êtes pas autoriser à suprimer ce message !";
        header('Location: ../forum.php');
	}

	else{
		//est-ce un premier post ? Dernier post ou post classique ?
		$query = $db->prepare('
			SELECT  topic_first_post,
					topic_last_post 
			FROM forum_topic
			WHERE topic_id = :topic'
		);
		$query->bindValue(':topic',$topic,PDO::PARAM_INT);
		$query->execute();
		$data_post=$query->fetch();

		//On distingue maintenant les cas

		if ($data_post['topic_first_post']==$post){ 
			//Si le message est le premier
			//Les autorisations ont changé !
			//Normal, seul un modo peut décider de supprimer tout un topic
		
			if (!verif_auth($data['auth_modo'])){
				$_SESSION['unknownError']="Vous n'êtes pas autoriser à suprimer ce message !";
        		header('Location: ../forum.php');
			}

			echo "firstPost";

			$query->CloseCursor();
		}

		elseif ($data_post['topic_last_post']==$post) {
			//Si le message est le dernier
			//On supprime le post
			$query=$db->prepare('DELETE FROM forum_post WHERE post_id=:post');
			$query->bindValue(':post',$post,PDO::PARAM_INT);
			$query->execute();
			$query->CloseCursor();

			//On modifie la valeur de topic_last_post pour cela on
			//récupère l'id du plus récent message de ce topic
			$query=$db->prepare('
				SELECT post_id 
				FROM forum_post
				WHERE topic_id=:topic
				ORDER BY post_id DESC
				LIMIT 0,1'
			);

			$query->bindValue(':topic',$topic,PDO::PARAM_INT);
			$query->execute();
			$data=$query->fetch();
			$last_post_topic=$data['post_id'];
			$query->CloseCursor();

			//On fait de même pour forum_last_post_id
			$query=$db->prepare('
				SELECT post_id 
				FROM forum_post
				WHERE post_forum_id=:forum
				ORDER BY post_id 
				DESC LIMIT 0,1'
			);

			$query->bindValue(':forum',$forum,PDO::PARAM_INT);
			$query->execute();
			$data=$query->fetch();
			$last_post_forum=$data['post_id'];
			$query->CloseCursor();

			//On met à jour la valeur de topic_last_post
			$query=$db->prepare('
				UPDATE forum_topic 
				SET topic_last_post=:last
				WHERE topic_last_post=:post'
			);

			$query->bindValue(':last',$last_post_topic,PDO::PARAM_INT);
			$query->bindValue(':post',$post,PDO::PARAM_INT);
			$query->execute();
			$query->CloseCursor();

			//On enlève 1 au nombre de messages du forum et on met à jour forum_last_post
			$query=$db->prepare('
				UPDATE forum_forum
				SET forum_post=forum_post - 1, forum_last_post_id=:last
				WHERE forum_id=:forum'
			);
			
			$query->bindValue(':last',$last_post_forum,PDO::PARAM_INT);
			$query->bindValue(':forum',$forum,PDO::PARAM_INT);
			$query->execute();
			$query->CloseCursor();

			//On enlève 1 au nombre de messages du topic
			$query=$db->prepare('
				UPDATE forum_topic 
				SET topic_post=topic_post - 1
				WHERE topic_id=:topic'
			);

			$query->bindValue(':topic',$topic,PDO::PARAM_INT);
			$query->execute();
			$query->CloseCursor();

			//On enlève 1 au nombre de messages du membre
			$query=$db->prepare('
				UPDATE forum_membres 
				SET membre_post = membre_post - 1
				WHERE membre_id = :id'
			);

			$query->bindValue(':id',$poster,PDO::PARAM_INT);
			$query->execute();
			$query->CloseCursor();
		}

		else {
			// Si c'est un post classique on supprime le post
			
			$query=$db->prepare('DELETE FROM forum_post WHERE post_id = :post');
			$query->bindValue(':post',$post,PDO::PARAM_INT);
			$query->execute();
			$query->CloseCursor();

			//On enlève 1 au nombre de messages du forum
			$query=$db->prepare('
				UPDATE forum_forum 
				SET forum_post =forum_post - 1
			 	WHERE forum_id = :forum'
			 );

			$query->bindValue(':forum',$forum,PDO::PARAM_INT);
			$query->execute();
			$query->CloseCursor();

			//On enlève 1 au nombre de messages du topic
			$query=$db->prepare('
				UPDATE forum_topic 
				SET topic_post=topic_post - 1
				WHERE topic_id=:topic'
			);

			$query->bindValue(':topic',$topic,PDO::PARAM_INT);
			$query->execute();
			$query->CloseCursor();

			//On enlève 1 au nombre de messages du membre
			$query=$db->prepare('
				UPDATE forum_membres 
				SET membre_post=membre_post - 1
				WHERE membre_id=:id'
			);
			
			$query->bindValue(':id',$data['post_createur'],PDO::PARAM_INT);
			$query->execute();
			$query->CloseCursor();
		}
	}