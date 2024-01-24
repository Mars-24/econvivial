<?php
	session_start();

	include("../config/database.php");
	include ("../inc/functions.php");

	$id=$_SESSION['id'];

	extract($_POST);

	$post_edit=!empty($post_edit)?(int)$post_edit:NULL;
	$message_edit=!empty($message_edit)?htmlspecialchars($message_edit):NULL;

	if (!empty($message_edit)) {
	
		$query=$db->prepare('
			SELECT  post_createur, 
					post_texte,
					post_time, 
					topic_id, 
					auth_modo
			FROM forum_post
			LEFT JOIN forum_forum ON forum_post.post_forum_id =forum_forum.forum_id
			WHERE post_id=:post'
		);
		$query->bindValue(':post',$post_edit,PDO::PARAM_INT);
		$query->execute();
		$data1 = $query->fetch();
		$topic = $data1['topic_id'];

		//On récupère la place du message dans le topic (pour le lien)
		$query = $db->prepare('
			SELECT COUNT(*) AS nbr 
			FROM forum_post
			WHERE topic_id=:topic AND post_time < '.$data1['post_time']
		);
		$query->bindValue(':topic',$topic,PDO::PARAM_INT);
		$query->execute();
		$data2=$query->fetch();

		if (!verif_auth($data1['auth_modo']) && $data1['post_createur']!=$id){
			erreur(ERR_AUTH_EDIT);
		}

		else{
			$query=$db->prepare('UPDATE forum_post SET post_texte=:message WHERE post_id=:post');
			$query->bindValue(':message',$message_edit,PDO::PARAM_STR);
			$query->bindValue(':post',$post_edit,PDO::PARAM_INT);
			$query->execute();

			$nombreDeMessagesParPage = 50;
			$nbr_post = $data2['nbr']+1;
			$page = ceil($nbr_post / $nombreDeMessagesParPage);
			
			$query->CloseCursor();
		}
	}