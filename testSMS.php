<?php
/**
 * Created by PhpStorm.
 * User: Tic Builder
 * Date: 12/02/2019
 * Time: 16:35
 */
try {
    $serverUrl = "http://aspsmsapi.com/http/sendsms.aspx?"; // URL de base
    $dest = "22892104584"; // Numéro du destinataire au foramt international
    $username = "22892391171"; // Votre nom d'utilisateur
    $apikey = "URTX55MUJW"; // Votre clé API
    $msg = "Le test de l'API sur le serveur"; // Contenu du message
    $senderid = "ASPSMS"; // Identifiant d'envoi
    $authmode = "http"; // Obligatoire. Ne pas modifier
// CURL_INIT
    $ch = curl_init($serverUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,"dest=$dest&username=$username&apikey=$apikey&senderid=$senderid&msg=$msg&authmode=$authmode");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    echo $output = curl_exec($ch); // Afficher le résultat du serveur
    curl_close($ch);

}catch(Exception $ex) {
    echo $ex;
}

