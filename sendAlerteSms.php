<?php
/**
 * Created by PhpStorm.
 * User: Tic Builder
 * Date: 03/11/2018
 * Time: 10:32
 */


try {
    $db= new PDO('mysql:host=91.234.195.210;dbname=c2rodirgue','c2avjeunes','A4DbHdc@5a');
    $db -> setAttribute(PDO::ATTR_CASE, PDO:: CASE_LOWER);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

    /**
     * Selection des demandes de suivi de règles
     */

    $query = $db->prepare("SELECT * FROM `menstruations` WHERE DATEDIFF(dateProchainOvulation, CURDATE()) >= 0 and DATEDIFF(dateProchainOvulation, CURDATE()) <= 2 ");
    // $query = $db->prepare("SELECT * FROM menstruations where id = 54");

    $query->execute();

    //$dataMenstruation[] = array();

    $data = $query->fetchAll(\PDO::FETCH_ASSOC);

    if(count($data) > 0){

        printf(json_encode($data));

        //Insertion du rapport dans la table rapport
        $sqlRapport= $db->prepare("insert into rapport_alerte_sms(description,typeAlerte) values(:description,:typeAlerte)");
        $sqlRapport->execute(array(":description" => "Rapport d'alerte de suivi d'ovulation",":typeAlerte" => "Ovulation"));

        if($sqlRapport){
            echo "***Résultat execute ====> ". json_encode($sqlRapport);
        }

        //Récupération de l'objet insérer
        $retriveRapport = $db->prepare("select * from rapport_alerte_sms order by id desc limit 1");
        $retriveRapport->execute();
        $rapport = $retriveRapport->fetch(PDO::FETCH_OBJ);

        if($rapport != null){
            echo "***Rapport ID ====> ".$rapport->id;
        }

    }

    $nbre = 0;
    foreach ($data  as $menstruation ) {

        echo "*****Menstruation ====> ".json_encode($menstruation);
        $queryUser = $db->prepare("select * from users where id =:user_id");
        $queryUser->execute(array(":user_id" => $menstruation["user_id"]));
        echo "*****userID ===> ".  $menstruation["user_id"];
        $user = $queryUser->fetch(PDO::FETCH_OBJ);


        if($user != null){
        echo "****  user ====>  ".json_encode($user);

            //Insertion du rapport dans la table rapportUser
            $sqlRapportUser= $db->prepare("insert into rapport_alerte_users(rapport_alerte_sms_id,user_id,menstru_id) 
                                                values(:rapport,:user,:menstru)");
            $sqlRapportUser->execute(array(":rapport" => $rapport->id,":user" => $user->id, ":menstru" => $menstruation["id"]));

            if($sqlRapportUser){
                echo "\n***Résultat execute rapport user ====> ". json_encode($sqlRapportUser);
            }

            //Récupération du dernier rapportUser insérer
            $retriveRapportUser = $db->prepare("select * from rapport_alerte_users order by id desc limit 1");
            $retriveRapportUser->execute();
            $rapportUser = $retriveRapportUser->fetch(PDO::FETCH_OBJ);

            if($rapportUser != null){
                echo "***Rapport user ID ====> ".$rapportUser->id;
            }

            $userNumber = preg_replace('/\s+/', '', substr($user->numero,1));

            $message = "Chère ".$user->username." Il est fort probable que vous ayez votre prochaine menstruation dans la semaine du  ".date_format(date_create($menstruation["dateprochainregle"]),"d M Y").". Merci de prendre les dispositions nécessaires pour une bonne hygiène menstruelle.";

            $url = "http://sms.supersmsgb.com:8080/sendsms?username=slu-majecticp&password=majestic&type=0&dlr=1&destination=".$userNumber."&source=eConvivial&message=".urlencode($message) ;

            $response = file_get_contents($url);
            
            echo "\n********************Response =====================> ".$response;
            //$response = false;
            if($response){
                $sqlRapportUserUpdate= $db->prepare("update rapport_alerte_users set recu = true where id = :rapportID ");
                $sqlRapportUserUpdate->execute(array(":rapportID" => $rapportUser->id));

                if($sqlRapportUserUpdate){
                    echo "\n ***Rapport user update ====> ". json_encode($sqlRapportUserUpdate);
                }
            }else{
                $sqlRapportUserUpdate= $db->prepare("update rapport_alerte_users set recu = false where id = :rapportID ");
                $sqlRapportUserUpdate->execute(array(":rapportID" => $rapportUser->id));

                if($sqlRapportUserUpdate){
                    echo "\n ***Rapport user update ====> ". json_encode($sqlRapportUserUpdate);
                }
            }
        }
         $nbre = $nbre + 1;
         echo "\n ****Nbre ===> ".$nbre;
    }

    if(count($data) > 0){
        //Mise à jour de la table rapport SMS
        $sqlRapportUpdate= "update rapport_alerte_sms set nombreuser = ".$nbre." , terminer  = true where id = ".$rapport->id;
        echo "\n ***Rapport ID ====> ". $rapport->id;

        if($db->query($sqlRapportUpdate)){
            echo "\n ***Rapport update ====> ". json_encode($sqlRapportUpdate);
        }
    }


    /**
     * Envoyer des messages à tous ceux qui auront leur règle
     */
    $query = $db->prepare("SELECT * FROM `menstruations` WHERE DATEDIFF(dateProchainRegle, CURDATE()) >= 0 and DATEDIFF(dateProchainRegle, CURDATE()) <= 2 ");
    //$query = $db->prepare("SELECT * FROM menstruations where id = 55");

    $query->execute();

    //$dataMenstruation[] = array();

    $data = $query->fetchAll(\PDO::FETCH_ASSOC);

    if(count($data) > 0){

        printf(json_encode($data));

        //Insertion du rapport dans la table rapport
        $sqlRapport= $db->prepare("insert into rapport_alerte_sms(description,typeAlerte) values(:description,:typeAlerte)");
        $sqlRapport->execute(array(":description" => "Rapport d'alerte de suivi de règle",":typeAlerte" => "Regle"));

        if($sqlRapport){
            echo "***Résultat execute ====> ". json_encode($sqlRapport);
        }

        //Récupération de l'objet insérer
        $retriveRapport = $db->prepare("select * from rapport_alerte_sms order by id desc limit 1");
        $retriveRapport->execute();
        $rapport = $retriveRapport->fetch(PDO::FETCH_OBJ);

        if($rapport != null){
            echo "***Rapport ID ====> ".$rapport->id;
        }

    }

    $nbre = 0;
    foreach ($data  as $menstruation ) {

        echo "*****Menstruation ====> ".json_encode($menstruation);
        $queryUser = $db->prepare("select * from users where id =:user_id");
        $queryUser->execute(array(":user_id" => $menstruation["user_id"]));
        echo "*****userID ===> ".  $menstruation["user_id"];
        $user = $queryUser->fetch(PDO::FETCH_OBJ);


        if($user != null){
            echo "****  user ====>  ".json_encode($user);

            //Insertion du rapport dans la table rapportUser
            $sqlRapportUser= $db->prepare("insert into rapport_alerte_users(rapport_alerte_sms_id,user_id,menstru_id) 
                                                values(:rapport,:user,:menstru)");
            $sqlRapportUser->execute(array(":rapport" => $rapport->id,":user" => $user->id, ":menstru" => $menstruation["id"]));

            if($sqlRapportUser){
                echo "\n***Résultat execute rapport user ====> ". json_encode($sqlRapportUser);
            }

            //Récupération du dernier rapportUser insérer
            $retriveRapportUser = $db->prepare("select * from rapport_alerte_users order by id desc limit 1");
            $retriveRapportUser->execute();
            $rapportUser = $retriveRapportUser->fetch(PDO::FETCH_OBJ);

            if($rapportUser != null){
                echo "***Rapport user ID ====> ".$rapportUser->id;
            }

            $userNumber = preg_replace('/\s+/', '', substr($user->numero,1));

            $message = "Chère ".$user->username." Il est fort probable que vous ayez votre prochaine menstruation dans la semaine du  ".date_format(date_create($menstruation["dateprochainregle"]),"d M Y").". Merci de prendre les dispositions nécessaires pour une bonne hygiène menstruelle.";

            $url = "http://sms.supersmsgb.com:8080/sendsms?username=slu-majecticp&password=majestic&type=0&dlr=1&destination=".$userNumber."&source=eConvivial&message=".urlencode($message) ;

            $response = file_get_contents($url);
            //$response = false;
            if($response){
                $sqlRapportUserUpdate= $db->prepare("update rapport_alerte_users set recu = true where id = :rapportID ");
                $sqlRapportUserUpdate->execute(array(":rapportID" => $rapportUser->id));

                if($sqlRapportUserUpdate){
                    echo "\n ***Rapport user update ====> ". json_encode($sqlRapportUserUpdate);
                }
            }else{
                $sqlRapportUserUpdate= $db->prepare("update rapport_alerte_users set recu = false where id = :rapportID ");
                $sqlRapportUserUpdate->execute(array(":rapportID" => $rapportUser->id));

                if($sqlRapportUserUpdate){
                    echo "\n ***Rapport user update ====> ". json_encode($sqlRapportUserUpdate);
                }
            }
        }
        $nbre = $nbre + 1;
        echo "\n ****Nbre ===> ".$nbre;
    }

    if(count($data) > 0){
        //Mise à jour de la table rapport SMS
        $sqlRapportUpdate= "update rapport_alerte_sms set nombreuser = ".$nbre." , terminer  = true where id = ".$rapport->id;
        echo "\n ***Rapport ID ====> ". $rapport->id;

        if($db->query($sqlRapportUpdate)){
            echo "\n ***Rapport update ====> ". json_encode($sqlRapportUpdate);
        }
    }

} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}
