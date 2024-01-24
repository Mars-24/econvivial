<?php
	$message = $_SESSION['tmp_msg'] =!empty($message)?htmlspecialchars($message):NULL;
	$mess = (isset($mess) AND !empty($mess))?htmlspecialchars($mess):"Message";
	$titre = $_SESSION['tmp_title'] =!empty($titre)?htmlspecialchars($titre):NULL;
	
	// AUTH_ANNONCE VERIF REDIRECT
	if (!verif_auth($data['auth_annonce']) && isset($mess)){
		$_SESSION['errorTopicCreation']="Vous n'avez pas l'autorisation de poster une annonce";
		redirect('voitforum.php?f='.$forum);
	}

	$temps = time();
	$i=0;

	if (!empty($titre)){
		if (empty($message)) {
			$_SESSION['errorTopicCreation']="Quel message contient votre topic ?";
			$i++;
		}
	}
	else{
		$_SESSION['errorTopicCreation']="Vous avez oublié de renseigner le titre";
		$i++;
	}

	if (isset($i) AND $i==0) {

		unset($_SESSION['tmp_title']);
		unset($_SESSION['tmp_msg']);
	 	
	 	// TOPIC INSERTION
		$query=$db->prepare('
			INSERT INTO forum_topic(forum_id, topic_titre, topic_createur, topic_vu, topic_time, topic_genre) VALUES(:forum, :titre, :id, 1, :temps, :mess)'
		);
		
		$query->bindValue(':forum', $forum, PDO::PARAM_INT);
		$query->bindValue(':titre', $titre, PDO::PARAM_STR);
		$query->bindValue(':id', $id, PDO::PARAM_INT);
		$query->bindValue(':temps', $temps, PDO::PARAM_INT);
		$query->bindValue(':mess', $mess, PDO::PARAM_STR);
		$query->execute();
		$nouveautopic = $db->lastInsertId();
		$query->CloseCursor();

		// MESSAGE INERTION
		$query=$db->prepare('
			INSERT INTO forum_post(post_createur, post_texte, post_time, topic_id, post_forum_id) 
			VALUES (:id, :mess, :temps, :nouveautopic, :forum)'
		);
		
		$query->bindValue(':id', $id, PDO::PARAM_INT);
		$query->bindValue(':mess', $message, PDO::PARAM_STR);
		$query->bindValue(':temps', $temps,PDO::PARAM_INT);
		$query->bindValue(':nouveautopic', (int) $nouveautopic,PDO::PARAM_INT);
		$query->bindValue(':forum', $forum, PDO::PARAM_INT);
		$query->execute();
		$nouveaupost = $db->lastInsertId(); 
		$query->CloseCursor();

		// TOPIC UPDATE
		$query=$db->prepare('
			UPDATE forum_topic 
			SET topic_last_post = :nouveaupost, topic_first_post = :nouveaupost
			WHERE topic_id = :nouveautopic'
		);
		$query->bindValue(':nouveaupost', (int) $nouveaupost, PDO::PARAM_INT);
		$query->bindValue(':nouveautopic', (int) $nouveautopic, PDO::PARAM_INT);
		$query->execute();
		$query->CloseCursor();

		// FORUM UPDATE
		$query=$db->prepare('
			UPDATE forum_forum 
			SET forum_post =forum_post + 1 ,forum_topic = forum_topic + 1,
				forum_last_post_id = :nouveaupost
			WHERE forum_id = :forum'
		);
		$query->bindValue(':nouveaupost', (int) $nouveaupost, PDO::PARAM_INT);
		$query->bindValue(':forum', (int) $forum, PDO::PARAM_INT);
		$query->execute();
		$query->CloseCursor();

		// MEMBER UPDATE
		$query=$db->prepare('
			UPDATE forum_membres 
			SET membre_post = membre_post + 1 
			WHERE membre_id = :id'
		);
		$query->bindValue(':id', $id, PDO::PARAM_INT);
		$query->execute();
		$query->CloseCursor();

		// Systeme lu/non-lu
		//On ajoute une ligne dans la table forum_topic_view 
		//pour dire que le membre a poster un topic, donc automatiquement un message lu
		$query=$db->prepare('
			INSERT INTO forum_topic_view (tv_id, tv_topic_id, tv_forum_id, tv_post_id, tv_poste)
			VALUES(:id, :topic, :forum, :post, :poste)'
		);
		$query->bindValue(':id',$id,PDO::PARAM_INT);
		$query->bindValue(':topic',$nouveautopic,PDO::PARAM_INT);
		$query->bindValue(':forum',$forum ,PDO::PARAM_INT);
		$query->bindValue(':post',$nouveaupost,PDO::PARAM_INT);
		$query->bindValue(':poste','1',PDO::PARAM_STR);
		$query->execute();
		$query->CloseCursor();
		
		$_SESSION['successTopicCreation']="Le nouveau topic a été bien ajouté !";
		redirect('voirtopic.php?t='.$nouveautopic);
	}