<?php
	session_start();

	include("../config/database.php");

	function token($length){
		$chars="azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
		return substr(str_shuffle(str_repeat($chars, $length)), 0,$length);
		
	}

	extract($_POST);

	$req=$db->prepare("
		SELECT membre_id, membre_pseudo, membre_email, membre_localisation, membre_avatar
		FROM forum_membres
		WHERE membre_pseudo LIKE :query
		OR membre_firstname LIKE :query 
		OR membre_lastname LIKE :query  
		OR membre_email LIKE :query
		OR membre_phone LIKE :query
		OR membre_localisation LIKE :query 
		LIMIT 0,5
	");

	$req->execute(array(
		'query'=>'%'.$query.'%'
	));

	$users=$req->fetchAll(PDO::FETCH_OBJ);

	if (count($users)>0) {
		foreach ($users as $user) {
	            $explodeLocate=[];
	            $explodeLocate=explode('#', $user->membre_localisation);

			?>
				<div class="display-box-user">
					<a href="amis.php?action=add&amp;user=<?=?>">						
						<h6 id="userName">
							<img src="img/avatars/<?=$user->membre_avatar?>" class="img-circle" width="40" style="width: 40px; height: 40px; border-radius: 50%;">&nbsp; <?=mb_strlen($user->membre_pseudo)>15?substr($user->membre_pseudo, 0,15).'...':$user->membre_pseudo?>
						</h6>
					 	<h6 style="margin: -25px 0 0 50px;" id="userDetails">
					 		<i class="fa fa-envelope"></i> <?=mb_strlen($user->membre_email)>15?substr($user->membre_email, 0,15).'...':$user->membre_email?>
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