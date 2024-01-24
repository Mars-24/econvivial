<?php
	session_start();

	include("../config/database.php");

	extract($_POST);

	$req=$db->prepare("
		SELECT topic_id, topic_titre, topic_post, forum_name
		FROM forum_topic
		LEFT JOIN forum_forum ON forum_forum.forum_id=forum_topic.forum_id
		WHERE topic_titre LIKE :query
		OR forum_name LIKE :query
		LIMIT 0,5
	");

	$req->execute(array(
		'query'=>'%'.$query.'%'
	));

	$sameTopics=$req->fetchAll(PDO::FETCH_OBJ);

	if (count($sameTopics)>0) {
		foreach ($sameTopics as $findTopic) {
			?>
				<div class="display-box-topic">
					<a href="voirtopic.php?t=<?=$findTopic->topic_id?>">						
						<h6 id="titreTopic">
							<i class="fa fa-comment"></i> <?=mb_strlen($findTopic->topic_titre)>15?substr($findTopic->topic_titre, 0,15).'...':$findTopic->topic_titre?>
						</h6>
					 	<h6 style="margin: -10px 0 0 30px;" id="details">
					 		Forum | <?=mb_strlen($findTopic->forum_name)>8?substr($findTopic->forum_name, 0,8).'...':$findTopic->forum_name?> (<?=$findTopic->topic_post?> <i class="fa fa-envelope"></i>)
					 		
						</h6>
					</a>
				</div>
			<?php
		}
	}
	else{
		?>
			<div class="display-box-topic" style="height: 30px; text-align: center;">
				<i class="fa fa-meh-o"></i> Désolé aucun topic correspondant ...
			</div>
		<?php
	}