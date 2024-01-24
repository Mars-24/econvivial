<?php
	session_start();

	include("../config/database.php");

	function token($length){
		$chars="azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
		return substr(str_shuffle(str_repeat($chars, $length)), 0,$length);
		
	}

	extract($_POST);

	$req=$db->prepare("
		SELECT  membre_id, 
				membre_pseudo, 
				membre_email,
				membre_phone, 
				membre_avatar,
				membre_derniere_visite,
				online_id
		FROM forum_membres
		LEFT JOIN forum_whosonline ON forum_whosonline.online_id=forum_membres.membre_id
		WHERE membre_pseudo LIKE :query
		OR membre_firstname LIKE :query 
		OR membre_lastname LIKE :query  
		OR membre_email LIKE :query
		OR membre_phone LIKE :query
		OR membre_localisation LIKE :query 
		LIMIT 0,3
	");

	$req->execute(array(
		'query'=>'%'.$query.'%'
	));

	$friends=$req->fetchAll(PDO::FETCH_OBJ);

	if (count($friends)>0) {
		foreach ($friends as $friend) {
			?>
				<div class="display-box-user">
					<a href="amis.php?action=add&amp;user=<?=$friend->membre_pseudo?>&amp;t=<?=token(50)?>" title="<?=$friend->membre_pseudo?>">						
						<h6 id="userName">
							<img src="img/avatars/<?=$friend->membre_avatar?>" class="img-circle" width="40" style="width: 40px; height: 40px; border-radius: 50%;">&nbsp; <?=mb_strlen($friend->membre_pseudo)>6?substr($friend->membre_pseudo, 0,6).'...':$friend->membre_pseudo?>
							<span style="font-size: 0.6em; float: right; margin: 7px 0 0 0;">
								- <i class="fa fa-clock-o"></i> <?=date('h:i', $friend->membre_derniere_visite)?>
								<i class="fa fa-circle <?=!empty($friend->online_id)?'green-text animated heartBeat infinite slow':'red-text'?>"></i>
							</span>
						</h6>
					 	<h6 style="z-index: 99999999;position: absolute; margin: -25px 0 0 50px;" id="userDetails">
					 		<?=!is_null($friend->membre_phone)?'<i class="fa fa-phone"></i> '.$friend->membre_phone:'<i class="fa fa-envelope"></i> '.substr($friend->membre_email, 0,10).'..'?>
						</h6>
					</a>
				</div>
			<?php
		}
	}
	else{
		?>
			<div class="display-box-user" style="height: 30px; text-align: center;">
				<i class="fa fa-meh-o"></i> Désolé aucun utilisateur correspondant ...
			</div>
		<?php
	}