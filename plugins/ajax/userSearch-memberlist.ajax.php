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
					<a href="voirprofil.php?m=<?=$user->membre_id?>&amp;action=consulter&amp;t=<?=token(50)?>">						
						<img src="img/avatars/<?=$user->membre_avatar?>" class="img-circle" width="60" style="width: 60px; height: 60px; border-radius: 50%;">&nbsp;
						<span class="username"><?=$user->membre_pseudo?></span> | 
						<span class="usermail"><i class="fa fa-envelope"></i> <?=$user->membre_email?></span> |
						<span class="userlocalisation"><i class="fa fa-map-marker"></i> <?=$explodeLocate[0]?></span>
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