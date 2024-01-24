<?php
	session_start();

	include("../config/database.php");
	include ("../inc/functions.php");

	$data='';
			
	if (is_array($_FILES)) {
		
		foreach ($_FILES['videofiles']['name'] as $name => $value) {
			
			$extensions_valides = array('mp4', 'webm', 'ogg', 'avi');
			$extension_upload = strtolower(substr(strrchr($_FILES['videofiles']['name'][$name], '.') ,1));
			$newName=md5(rand()).'.'.$extension_upload;
	
	
			if (($_FILES['videofiles']['size'][$name][$value])<='20000000'){
				if (!in_array($extension_upload,$extensions_valides)){
					$data="Une (des) video(s) semble invalide !";
				}else{
					move_uploaded_file($_FILES['videofiles']['tmp_name'][$name], '../uploads/vids/VID-'.$newName);

					$message = '%%$vid$%%-VID-'.$newName;

					$topic = isset($_SESSION['topic_id'])?$_SESSION['topic_id']:NULL;
					$temps = time();
					$id=$_SESSION['id'];

					$query=$db->prepare('SELECT topic_locked FROM forum_topic WHERE topic_id=:topic');
					$query->bindValue(':topic',$topic,PDO::PARAM_INT);
					$query->execute();
					$datazz=$query->fetch();

					if ($datazz['topic_locked']!=0){
						erreur(ERR_TOPIC_VERR);
					}
					$query->CloseCursor();

					
					//On récupère l'id du forum
					$query=$db->prepare('SELECT forum_id, topic_post FROM forum_topic WHERE topic_id = :topic');
					$query->bindValue(':topic', $topic, PDO::PARAM_INT);
					$query->execute();
					$datazz=$query->fetch();
					$forum = $datazz['forum_id'];

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
					$nbr_post = $datazz['topic_post']+1;
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
				
			}
			else{
				$data="Une (des) video(s) semble trop volumineuse | 20 MB";
			}
		}
		echo $data;
	}
	else{
		$data="Une erreur inatendue est survenue lors du transfert !";
		echo $data;
	}