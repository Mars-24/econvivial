<?php
	session_start();

	include("../config/database.php");
	include ("../inc/functions.php");

	extract($_POST);

	$message = !empty($message)?htmlspecialchars($message):NULL;
	$topic =  !empty($topic)?(int) $topic:NULL;
	$temps = time();
	$id=$_SESSION['id'];

	$query=$db->prepare('SELECT topic_locked FROM forum_topic WHERE topic_id=:topic');
	$query->bindValue(':topic',$topic,PDO::PARAM_INT);
	$query->execute();
	$data=$query->fetch();

	if ($data['topic_locked']!=0){
		erreur(ERR_TOPIC_VERR);
	}
	$query->CloseCursor();

	
	// IF THE MESSAGE NOT EMPTY WE ENTER
	if(!empty($message)){ 
	
		//On récupère l'id du forum
		$query=$db->prepare('SELECT forum_id, topic_post FROM forum_topic WHERE topic_id = :topic');
		$query->bindValue(':topic', $topic, PDO::PARAM_INT);
		$query->execute();
		$data=$query->fetch();
		$forum = $data['forum_id'];

		//Puis on entre le message
		$query=$db->prepare('INSERT INTO forum_post(post_createur, post_texte, post_time, topic_id, post_forum_id) VALUES(:id,:mess,:temps,:topic,:forum)');
		$query->bindValue(':id', $id, PDO::PARAM_INT);
		$query->bindValue(':mess', $message, PDO::PARAM_STR);
		$query->bindValue(':temps', $temps, PDO::PARAM_INT);
		$query->bindValue(':topic', $topic, PDO::PARAM_INT);
		$query->bindValue(':forum', $forum, PDO::PARAM_INT);
		$query->execute();

		$nouveaupost = $db->lastInsertId();
		$query->CloseCursor();

		//Update des topic
		$query=$db->prepare('
			UPDATE forum_topic 
			SET topic_post =topic_post + 1, topic_last_post = :nouveaupost WHERE topic_id =:topic'
		);
		$query->bindValue(':nouveaupost', (int) $nouveaupost, PDO::PARAM_INT);
		$query->bindValue(':topic', (int) $topic, PDO::PARAM_INT);
		$query->execute();
		$query->CloseCursor();

		//Update des forums
		$query=$db->prepare('
			UPDATE forum_forum 
			SET forum_post =forum_post + 1 , forum_last_post_id = :nouveaupost 
			WHERE forum_id =:forum'
		);
		$query->bindValue(':nouveaupost', (int) $nouveaupost, PDO::PARAM_INT);
		$query->bindValue(':forum', (int) $forum, PDO::PARAM_INT);
		$query->execute();
		$query->CloseCursor();

		// Update des membres
		$query=$db->prepare('
			UPDATE forum_membres 
			SET membre_post =membre_post + 1 
			WHERE membre_id = :id'
		);
		$query->bindValue(':id', $id, PDO::PARAM_INT);
		$query->execute();
		$query->CloseCursor();

		$nombreDeMessagesParPage = 15;
		$nbr_post = $data['topic_post']+1;
		$page = ceil($nbr_post / $nombreDeMessagesParPage);
		
		// Systeme lu/non lu
		//On update la table forum_topic_view pour 
		//dire que le mbre a repondu a ce topic
		$query=$db->prepare('
			UPDATE forum_topic_view
			SET tv_post_id=:post, tv_poste=:poste
			WHERE tv_id=:id AND tv_topic_id=:topic'
		);
		$query->bindValue(':post',$nouveaupost,PDO::PARAM_INT);
		$query->bindValue(':poste','1',PDO::PARAM_STR);
		$query->bindValue(':id',$id,PDO::PARAM_INT);
		$query->bindValue(':topic',$topic,PDO::PARAM_INT);
		$query->execute();
		$query->CloseCursor();
	}