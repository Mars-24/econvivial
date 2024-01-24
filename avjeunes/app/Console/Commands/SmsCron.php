<?php

namespace App\Console\Commands;

use App\Menstruation;
use App\NotifToken;
use App\RapportAlerteSms;
use App\RapportAlerteUser;
use App\SuiviGrosesse;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;


class SmsCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:sms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Alerte de SMS';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        //Envoie de SMS aux numéro des utilisateurs
        $user = User::where("numero", "+228 90306374")->first();
        
        // $user = User::where("numero", "+228 92104584")->first();

        if ($user != null) {
            $message = "Alerte de notification journalière";
            
            $userNumber = preg_replace('/\s+/', '', substr($user->numero, 1));

            (new NotifToken())->sendProviderSMS($userNumber, $message);

            //Envoie de notification Internet sur leur Smartphone
            $tokens = [];
            
            if ($user->id != null) {
                $notifKey = NotifToken::where("user_id", $user->id)->first();
                
                if ($notifKey != null) {
                    $tokens[] =  $notifKey->token;
                }
            }
            
            (new NotifToken())->sendNotificationToUser($tokens, "Alerte grossesse", $message);
        }

         //Envoie de SMS alerte suivi de règle
         //Mise à jour quotidienne des données de règle
        $menstruations = Menstruation::where("type", "regle")->get();
        
        foreach ($menstruations as $menstruation) {
            $dateProch = new Carbon($menstruation->dateProchainRegle);
            
            $date = new \DateTime();
            
            $dateCourant = new Carbon($date->format("Y-M-d"));
            
            if ($menstruation->dateProchainRegle < $dateCourant) {
                while($dateProch < $dateCourant) {
                    $menstruation->dateRegle = $menstruation->dateProchainRegle;
                    $menstruation->dateProchainRegle = $dateProch->addDay($menstruation->dureeCycle);
                    $menstruation->save();
                    $dateProch = new Carbon($menstruation->dateProchainRegle);
                }
            }
        }

        $regles = DB::select("SELECT * FROM menstruations WHERE type = 'regle' and DATEDIFF(dateProchainRegle, CURDATE()) >= 0 and DATEDIFF(dateProchainRegle, CURDATE()) <= 1 order by id desc ");

        if (count($regles) > 0) {
            $rapportSMS = new RapportAlerteSms();
            
            $rapportSMS->description = "Rapport d'alerte de suivi de règle";
            $rapportSMS->typeAlerte = "Regle";
            $rapportSMS->save();

            // Parcours des règles

            $nbre = 0;
            
            foreach ($regles  as $regle) {
                // Récupérer l'utilisateur courant
                $currentUser = User::where("id", $regle->user_id)->first();
                $rapportUserSms = new RapportAlerteUser();
                $rapportUserSms->rapport_alerte_sms_id =  $rapportSMS->id;
                $rapportUserSms->menstru_id =  $regle->id;
                
                if ($currentUser != null) {
                    $rapportUserSms->user_id =  $currentUser->id;
                }
            
                $rapportUserSms->save();

                $userNumber = preg_replace('/\s+/', '', substr($currentUser->numero, 1));

                 // Message par défaut règle
                 // $message = "Chère ".$currentUser->username." Il est fort probable que vous ayez votre prochaine menstruation dans la semaine du  ".date_format(date_create($regle->dateprochainregle),"d M Y").". Merci de prendre les dispositions nécessaires pour une bonne hygiène menstruelle.";

                $date1 = date_create($regle->dateProchainRegle);
                $date2 = date_create(date("Y-m-d"));
                $diff = date_diff($date2 , $date1);
                $difference = $diff->format("%d");

                if ($difference == 2) {
                    $message = $currentUser->username.", bientot vos prochaines regles. Lavez vous au moins 2 fois par jour avec du savon et séchez bien les parties entre les jambes.";
                } else if($difference == 1) {
                    $message = $currentUser->username." bientot vos prochaines regles. Lavez vous au moins 2 fois par jour avec du savon et nettoyer avec une serviette propre et seche les parties entre jambe.";
                } else {
                    $message = $currentUser->username." pendant vos regles, changez vos sous vetements au moins 2 fois par jour, si possible les laver avec l eau de javel ou les bouillir, et les secher au soleil.";
                }

                // Envoie de SMS aux numéro des utilisateurs
               
                 try {
                    $sendSMS = new NotifToken();
                    $output = $sendSMS->sendProviderSMS($userNumber,$message);

                    $rapportUserSms->recu = strpos($output, '1701') !== false;
                    
                    $rapportUserSms->save();
                } catch (\Exception $e){
                    echo $e->getMessage();
                }

                // Envoie de notification Internet sur leur Smartphone
                $tokens = [];
                
                if ($currentUser->id != null) {
                    $notifKey = NotifToken::where("user_id", $currentUser->id)->first();
                    
                    if ($notifKey != null) {
                        $tokens[] =  $notifKey->token;
                    }
                }
                
                (new NotifToken())->sendNotificationToUser($tokens, "Alerte Ovulation", $message);

                //Incrémentation de la boucle
                $nbre = $nbre + 1;
            }

            $rapportSMS->nombreuser = $nbre;
            $rapportSMS->terminer = true;
            $rapportSMS->save();
            
            echo "Alerte de suivi de règle envoyé avec succès";
        }


        // Mise à jour quotidienne des date d'ovulation
        // $menstruations = Menstruation::where("type", "ovulation")->get();
        $menstruations = Menstruation::where("type", "ovulation")->get();

        foreach ($menstruations as $menstruation) {
            $dateProch = new Carbon($menstruation->dateProchainOvulation);
            
            $date = new \DateTime();
            
            $dateCourant = new Carbon($date->format("Y-M-d"));

            if ($menstruation->dateProchainOvulation < $dateCourant) {
                while ($dateProch < $dateCourant) {
                    $dateProbProchaineRegle = $dateProch->addDay(15);
                    $dateRegle = new Carbon($dateProbProchaineRegle);
                    $menstruation->dateRegle = $dateProbProchaineRegle;
                    $menstruation->dateProchainOvulation = $dateRegle->addDay($menstruation->dureeCycle - 15);
                    $menstruation->save();
                    $dateProch = new Carbon($menstruation->dateProchainOvulation);
                }
            }
        }

        //Alerte pour les ovulations
        $ovulations = DB::select("SELECT * FROM menstruations WHERE  type = 'ovulation' and DATEDIFF(dateProchainOvulation, CURDATE()) >= 0 and DATEDIFF(dateProchainOvulation, CURDATE()) <= 1 order by id desc");

        if (count($ovulations) > 0) {
            $rapportSMS = new RapportAlerteSms();
            $rapportSMS->description = "Rapport d'alerte de suivi d'ovulation";
            $rapportSMS->typeAlerte = "Ovulation";
            $rapportSMS->save();

            // Parcours des ovulations

            $nbre = 0;
            
            foreach ($ovulations  as $ovulation ) {
                // Récupérer l'utilisateur courant
                $currentUser = User::where("id",$ovulation->user_id)->first();
                
                $rapportUserSms = new RapportAlerteUser();
                $rapportUserSms->rapport_alerte_sms_id =  $rapportSMS->id;
                $rapportUserSms->menstru_id =  $ovulation->id;
                
                if ($currentUser != null) {
                    $rapportUserSms->user_id =  $currentUser->id;
                }
                  
                $rapportUserSms->save();

                 //Envoie de SMS
                $userNumber = preg_replace('/\s+/', '', substr($currentUser->numero, 1));

                // Message par défaut
                // $message = "Chère ".$currentUser->username." Il est fort probable que vous ayez votre prochaine menstruation dans la semaine du  ".date_format(date_create($ovulation->dateProchainOvulation),"d M Y").". Merci de prendre les dispositions nécessaires pour une bonne hygiène menstruelle.";

                $date1 = date_create($ovulation->dateProchainOvulation);
                $date2 = date_create(date("Y-m-d"));
                $diff = date_diff($date2 , $date1);
                $difference = $diff->format("%d");

                if ($difference == 2) {
                    $message = "Alerte, bientôt votre prochaine ovulation : moment favorable pour tomber enceinte, car le spermatozoïde de l homme peut vivre pendant 72h en attendant votre ovule.";
                } else if ($difference == 1) {
                    $message = $currentUser->username." bientot votre periode d ovulation : moment favorable pour tomber enceinte. Pour eviter une grossesse, abstinence sexuelle ou port correct de preservatif.";
                } else {
                    $message = $currentUser->username." meme apres votre periode d ovulation, continuer par vous proteger contre les IST et le VIH par l abstinence sexuelle ou le port correct du preservatif.";
                }

                // Envoie de SMS aux numéro des utilisateurs
                
                
                try{
                    $output = (new NotifToken())->sendProviderSMS($userNumber, $message);

                    $rapportUserSms->recu = strpos($output, '1701') !== false;
                    $rapportUserSms->save();
                } catch (\Exception $e){
                    echo $e->getMessage();
                }

                // Envoie de notification Internet sur leur Smartphone
                if ($currentUser->id != null) {
                    $notifKey = NotifToken::where("user_id", $currentUser->id)->first();
                    
                    if ($notifKey != null) {
                        (new NotifToken())->sendNotificationToUser([$notifKey->token], "Alerte Ovulation", $message);
                    }
                }

                // Incrémentation de la boucle
                $nbre = $nbre + 1;
            }

            $rapportSMS->nombreuser = $nbre;
            $rapportSMS->terminer = true;
            $rapportSMS->save();
            
            echo "Alerte de suivi d'ovulation envoyé avec succès";
        }

        // Suivi de Grossesse
        $grossesses = DB::select("SELECT * FROM date_probable_consultations WHERE DATEDIFF(dateProbable, CURDATE()) >= 0 and DATEDIFF(dateProbable, CURDATE()) <= 2 ");

        if (count($grossesses)  > 0) {
            $rapportSMS = new RapportAlerteSms();
            $rapportSMS->description = "Rapport d'alerte de suivi de grossesse";
            $rapportSMS->typeAlerte = "Grossesse";
            $rapportSMS->save();

            // Parcours des ovulations

            $nbre = 0;
            
            foreach ($grossesses  as $grossesse ) {
                $suiviGrossesse = SuiviGrosesse::where("id", $grossesse->suivi_grossesse_id)->first();

                // Récupérer l'utilisateur courant
                if ($suiviGrossesse != null) 
                   $grosseUser = User::where("id",$suiviGrossesse->user_id)->first();
                    
                    
                $rapportUserSms = new RapportAlerteUser();
                $rapportUserSms->rapport_alerte_sms_id =  $rapportSMS->id;
                $rapportUserSms->suivi_grossesse_id =  $suiviGrossesse->id;
                
                if ($grosseUser != null) {
                    $rapportUserSms->user_id =  $grosseUser->id;
                }
                
                $rapportUserSms->save();


                $userNumber = preg_replace('/\s+/', '', substr($grosseUser->numero,1));

                // Message par défaut règle

                $date1 = date_create($regle->dateProbable);
                $date2 = date_create(date("Y-m-d"));
                $diff = date_diff($date2 , $date1);
                $difference = $diff->format("%d");

                if ($difference == 2) {
                    $message = "Chère ".$currentUser->username.", bientôt votre prochain rendez-vous au centre de santé pour une consultation prénatale.";
                } else if($difference == 1) {
                    $message = "Chère ".$currentUser->username.", demain  vous avez un rendez-vous au centre de santé pour une consultation prénatale.";
                } else {
                    $message = "Chère ".$currentUser->username.", aujourdh'ui  vous avez un rendez-vous au centre de santé pour une consultation prénatale.";
                }

                // Envoie de SMS aux numéro des utilisateurs
                try {
                    $output = (new NotifToken())->sendProviderSMS($userNumber, $message);
    
                    $rapportUserSms->recu = strpos($output, '1701') !== false;
                    $rapportUserSms->save();
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }

                // Envoie de notification Internet sur leur Smartphone
                if ($currentUser->id != null) {
                    $notifKey = NotifToken::where("user_id", $currentUser->id)->first();
                    
                    if ($notifKey !=null) {
                        (new NotifToken())->sendNotificationToUser([$notifKey->token], "Alerte grossesse", $message);
                    }
                }

                $nbre = $nbre +1;
            }

            $rapportSMS->nombreuser = $nbre;
            $rapportSMS->terminer = true;
            $rapportSMS->save();
            
            echo "Alerte de suivi de grossesse envoyé avec succès";
        }
    }
}
