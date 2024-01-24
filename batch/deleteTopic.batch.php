<?php
	session_start();

	include("../config/database.php");
	include ("../inc/functions.php");

	$id=$_SESSION['id'];

	extract($_POST);
	$topic = isset($topic_delete)?$topic_delete:NULL;

	$query=$db->prepare('
		SELECT  forum_topic.forum_id, auth_modo
		FROM forum_topic
		LEFT JOIN forum_forum ON forum_topic.forum_id = forum_forum.forum_id
		WHERE topic_id=:topic'
	);
	$query->bindValue(':topic',$topic,PDO::PARAM_INT);
	$query->execute();
	$data=$query->fetch();
	$forum=$data['forum_id'];
	
	if (!verif_auth($data['auth_modo'])){
		$_SESSION['unknownError']="Vous n'êtes pas autoriser à suprimer ce message !";
       	header('Location: ../forum.php');
	}

	else{
		$_SESSION['topicDeleted']="Le topic a été bel et bien supprimé !";
		
		$query->CloseCursor();
		//On compte le nombre de post du topic
		$query=$db->prepare('
			SELECT topic_post 
			FROM forum_topic
			WHERE topic_id = :topic'
		);
		$query->bindValue(':topic',$topic,PDO::PARAM_INT);
		$query->execute();
		$data = $query->fetch();
		$nombrepost = $data['topic_post'] + 1;
		$query->CloseCursor();

		//On supprime le topic
		$query=$db->prepare('DELETE FROM forum_topic WHERE topic_id = :topic');
		$query->bindValue(':topic',$topic,PDO::PARAM_INT);
		$query->execute();
		$query->CloseCursor();

		//On enlève le nombre de post posté par chaque membre dans le topic
		$query=$db->prepare('
			SELECT  post_createur, 
					COUNT(*) AS nombre_mess
			FROM forum_post
			WHERE topic_id = :topic 
			GROUP BY post_createur'
		);
		$query->bindValue(':topic',$topic,PDO::PARAM_INT);
		$query->execute();
		while($data = $query->fetch()){
			$query=$db->prepare('
				UPDATE forum_membres
				SET membre_post=membre_post - :mess
				WHERE membre_id=:id'
			);
			
			$query->bindValue(':mess',$data['nombre_mess'],PDO::PARAM_INT);
			$query->bindValue(':id',$data['post_createur'],PDO::PARAM_INT);
			$query->execute();
		} 

		$query->CloseCursor();

		//Et on supprime les posts !
		$query=$db->prepare('DELETE FROM forum_post WHERE topic_id=:topic');
		$query->bindValue(':topic',$topic,PDO::PARAM_INT);
		$query->execute();
		$query->CloseCursor();

		//Dernière chose, on récupère le dernier post du forum
		$query=$db->prepare('
			SELECT post_id 
			FROM forum_post
			WHERE post_forum_id=:forum 
			ORDER BY post_id DESC 
			LIMIT 0,1'
		);
		$query->bindValue(':forum',$forum,PDO::PARAM_INT);
		$query->execute();
		$data = $query->fetch();

		//Ensuite on modifie certaines valeurs :
		$query=$db->prepare('
			UPDATE forum_forum
			SET forum_topic = forum_topic - 1, 
				forum_post = forum_post - :nbr,
				forum_last_post_id = :id
			WHERE forum_id = :forum'
		);

		$query->bindValue(':nbr',$nombrepost,PDO::PARAM_INT);
		$query->bindValue(':id',$data['post_id'],PDO::PARAM_INT);
		$query->bindValue(':forum',$forum,PDO::PARAM_INT);
		$query->execute();
		$query->CloseCursor();
	}