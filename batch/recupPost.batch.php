<?php
    session_start();

    include("../config/database.php");
    include ("../inc/functions.php");
    include ("../inc/bbcode.php");

    $lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
    $id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
    $pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

    extract($_POST);

    $topic = isset($_SESSION['topic_id'])?$_SESSION['topic_id']:NULL;
    $nombreDeMessagesParPage = isset($_SESSION['nbreDePage'])?$_SESSION['nbreDePage']:NULL;
    $premierMessageAafficher = isset($_SESSION['fisrtMessageToDisplay'])?$_SESSION['fisrtMessageToDisplay']:NULL;
    $auth_modo=isset($_SESSION['auth_modo'])?$_SESSION['auth_modo']:NULL;
    $inputBorderColor=isset($_SESSION['inputBorderColor'])?$_SESSION['inputBorderColor']:NULL;
    $getColor=isset($_SESSION['getColor'])?$_SESSION['getColor']:NULL;
    
    $query=$db->prepare('
        SELECT  post_id, 
                post_createur, 
                post_texte,
                post_time,
                membre_id,
                membre_pseudo, 
                membre_avatar,
                membre_localisation, 
                membre_post, 
                membre_signature
        FROM forum_post
        LEFT JOIN forum_membres ON forum_membres.membre_id=forum_post.post_createur
        WHERE topic_id =:topic
        ORDER BY post_id
        LIMIT :premier, :nombre'
    );

    $query->bindValue(':topic',$topic,PDO::PARAM_INT);
    $query->bindValue(':premier',(int) $premierMessageAafficher,PDO::PARAM_INT);
    $query->bindValue(':nombre',(int) $nombreDeMessagesParPage,PDO::PARAM_INT);
    $query->execute();

    // IF THE HAVE NO POST
    if ($query->rowCount()<1){
        ?>
            <div class="input-area" style="box-shadow:0 -5px 2px 0 rgba(0,0,0,.14),0 -7px 2px -5px rgba(0,0,0,.46)">
                <input style="font-size: 100%;" type="text" class="input-area" placeholder="Aucun message dans ce topic" style="border-top: 2px solid <?=$inputBorderColor?>;" disabled>
                
            </div>
        <?php
    }
    // IF THE HAVE POST
    else{ 
        ?>
            <script type="text/javascript">
                var success_alert_audio= new Audio('audio/sweet_alert-success.mp3');
                var error_alert_audio= new Audio('audio/sweet_alert-error.mp3');

                function recupMessages (){
                    $.post('batch/recupPost.batch.php',function(data){
                        $("#displayReplyPost").html(data);
                    });
                }
            </script>
            <ol class="chat" style="z-index: 99; position: relative;">
        <?php
        $currentTime=NULL;
        $allMessages=array();
        while ($data = $query->fetchObject()){
            $allMessages[]=$data;
        }

        foreach ($allMessages as $allMessage) {
            
            if($currentTime!=date('d/m/Y', $allMessage->post_time)){
                ?>
                    <center class="white-text" style="margin: 10px 0 0 0 ;">
                        <h6 class="n">
                            <strong>
                                <i class="fa fa-clock-o"></i> 
                                <?=(date('d/m/Y', $allMessage->post_time)==date('d/m/Y', time()))?
                                'Messages d\'aujourd\'hui':'Messages du '.date('d/m/Y', $allMessage->post_time)?>
                            </strong>
                        </h6>
                        
                    </center>
                <?php
            }
                
            $currentTime=date('d/m/Y', $allMessage->post_time);
          
            if ($allMessage->membre_id==$id) {
                ?>
                    <li class="self">
                        <div class="tmb-avatar">
                            <a href="#" data-toggle="modal" data-target="#m<?=$allMessage->post_id?>">
                                <img src="img/avatars/<?=$allMessage->membre_avatar?>" class="img-raised img-fluid rounded-circle membre_avatar">
                            </a>
                        </div>
                        <div class="msg" id="p_<?=$allMessage->post_id?>">
                            <h6 style="margin: -5px 0 0 0; /*color: <?=getRandomColor()?>*/;">
                               <i class="fa fa-comment-o"></i> <?=$allMessage->membre_pseudo?>
                            </h6> 
                            <p><?=messageType(emoji(nl2br(stripslashes(htmlspecialchars($allMessage->post_texte)))), $getColor)?></p>
                            <time>
                                <?=date('H:i',$allMessage->post_time)?>
                                <i class="fa fa-check grey-text" style="font-size: 0.6em;"></i>
                            </time>

                            <?php
                                if ($id==$allMessage->post_createur || verif_auth($auth_modo)){
                                    ?>
                                        <a href="#" id="delete_<?=$allMessage->post_id?>">
                                            <i class="material-icons red-text">delete</i>
                                        </a>
                                        <?php
                                            if ($allMessage->post_texte==messageType($allMessage->post_texte)) {
                                               ?>
                                                    <a href="#" id="edit_<?=$allMessage->post_id?>">
                                                        <i class="material-icons green-text">gesture</i>
                                                    </a>
                                               <?php
                                            }
                                        ?>
                                    <?php
                                }
                            ?>
                        </div>
                    </li>
                <?php
            }
            else{
                ?>
                    <li class="other">
                        <div class="tmb-avatar">
                            <a href="#" data-toggle="modal" data-target="#m<?=$allMessage->post_id?>">
                                <img src="img/avatars/<?=$allMessage->membre_avatar?>" class="img-raised img-fluid rounded-circle membre_avatar" draggable="false">
                            </a>
                        </div>
                        <div class="msg" id="p_<?=$allMessage->post_id?>">
                            <h6 style="margin: -5px 0 0px 0; /*color: <?=getRandomColor()?>*/;">
                               <i class="fa fa-comment-o"></i> <?=$allMessage->membre_pseudo?>
                            </h6>
                            <p><?=messageType(emoji(nl2br(stripslashes(htmlspecialchars($allMessage->post_texte)))), $getColor)?></p>
                            <time>
                                <?=date('H:i',$allMessage->post_time)?>
                                <i class="fa fa-check grey-text" style="font-size: 0.6em;"></i>
                            </time>
                            <?php
                                if ($id==$allMessage->post_createur || verif_auth($auth_modo)){
                                    ?>
                                        <a href="#" id="delete_<?=$allMessage->post_id?>">
                                            <i class="material-icons red-text">delete</i>
                                        </a>

                                        <?php
                                            if ($allMessage->post_texte==messageType($allMessage->post_texte)) {
                                               ?>
                                                    <a href="#" id="edit_<?=$allMessage->post_id?>">
                                                        <i class="material-icons green-text">gesture</i>
                                                    </a>
                                               <?php
                                            }
                                        ?>
                                    <?php        
                                }
                            ?>
                        </div>
                    </li>
                <?php
            }

                $editQuery=$db->prepare('
                    SELECT post_createur, post_texte, auth_modo
                    FROM forum_post
                    LEFT JOIN forum_forum ON forum_post.post_forum_id =forum_forum.forum_id
                    WHERE post_id=:post'
                );
                $editQuery->bindValue(':post',$allMessage->post_id,PDO::PARAM_INT);
                $editQuery->execute();
                $data=$editQuery->fetch();
                $text_edit = $data['post_texte']; 
            ?>
                
                <script type="text/javascript">
               
                    jQuery(function($){
                        $('a.zoombox').zoombox({
                            theme : 'zoombox', //available themes : zoombox,lightbox, prettyphoto, darkprettyphoto, simple
                            opacity : 0.8, // Black overlay opacity
                            duration : 100, // Animation duration
                            animation : true, // Do we have to animate the box ?
                            width : 640, // Default width
                            height : 360, // Default height
                            gallery : true, // Allow gallery thumb view
                            autoplay : false // Autoplay for video
                        });
                    });

                

     
                    $('#edit_<?=$allMessage->post_id?>').on('click', function(){
                        swal({
                            title: "<?=$allMessage->membre_pseudo==$pseudo?'Modification de votre post':'Modification du post de '.$allMessage->membre_pseudo?>",
                            content:{
                                element: "input",
                                attributes: {
                                    value: "<?=$text_edit?>",
                                    type: "text"
                                },
                            },
                            buttons: ["Annuler", "Modifier"],
                        }).then((value) =>{
                            if (value) {
                                success_alert_audio.play();
                                swal(
                                    "Modifié",
                                    "<?=$allMessage->membre_pseudo==$pseudo?'Votre message':'Le message de '.$allMessage->membre_pseudo?> a été modifié avec succès !",
                                    "success"
                                );

                                var message_edit=value;
                                var post_edit=<?=$allMessage->post_id?>;

                                $.post('batch/editPost.batch.php',{post_edit:post_edit, message_edit:message_edit}, function(data){
                                    recupMessages ();
                                });
                            }
                            else{
                                error_alert_audio.play();
                                swal("Oops !", "Vous n'avez rien modifié a l'orginal !", "info");
                            }
                        });
                        
                    });


                    $('#delete_<?=$allMessage->post_id?>').on('click', function(){
                        error_alert_audio.play();
                        swal({
                          title: 'Etes vous sûr ?',
                          text: 'Ce message sera définitivement supprimé !',
                          icon: 'warning',
                          buttons: ["Annuler", "Supprimer"],
                          dangerMode: true,
                        }).then((willDelete) => {
                          if (willDelete) {
                            var post_delete=<?=$allMessage->post_id?>;

                            $.post('batch/deletePost.batch.php',{post_delete:post_delete}, function(data){
                                if (data=='firstPost') {
                                    error_alert_audio.play();
                                    swal({
                                      title: 'Premier post du topic',
                                      text: 'Supprimer ce post supprimera également le topic !',
                                      icon: 'warning',
                                      buttons: ["Annuler", "Supprimer"],
                                      dangerMode: true,
                                    }).then((willDelete) => {
                                        if (willDelete) {
                                            success_alert_audio.play();
                                            var topic_delete=<?=$topic?>;
                                            $.post('batch/deleteTopic.batch.php',{topic_delete:topic_delete}, function(data){
                                                window.location.replace('forum.php');
                                            });
                                        }
                                        else{
                                            error_alert_audio.play();
                                            swal('Intact',"<?=$allMessage->membre_pseudo==$pseudo?'Votre message':'Le message de '.$allMessage->membre_pseudo?> est resté intact !", "success");
                                        }
                                    });
                                }

                                else{
                                    success_alert_audio.play();
                                    swal(
                                      "Supprimé !",
                                      "<?=$allMessage->membre_pseudo==$pseudo?'Votre message':'Le message de '.$allMessage->membre_pseudo?> a été supprimé avec succès !",
                                      "success"
                                    )
                                }
                                recupMessages ();
                            });
                        } else {
                            success_alert_audio.play();
                            swal('Intact',"<?=$allMessage->membre_pseudo==$pseudo?'Votre message':'Le message de '.$allMessage->membre_pseudo?> est resté intact !", 'success');
                          }
                        });
                    });
                </script>
            <?php
        }

        ?>
            </ol>
        <?php
    }
    $query->CloseCursor();
?>