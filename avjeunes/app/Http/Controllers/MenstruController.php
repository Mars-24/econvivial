<?php

namespace App\Http\Controllers;

use App\User;
use App\TypeUser;
use Carbon\Carbon;
use App\Annulation;
use App\NotifToken;
use App\Menstruation;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Events\NotificationEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\RepliedToThread;
use Illuminate\Support\Facades\Session;

class MenstruController extends Controller
{
    public function indexVitrine()
    {
        return view('CycleMenstruel.index');
    }
    
    public function index()
    {
        $menstru = Menstruation::where("user_id", Auth::user()->id)->where("type", "regle")->first();
        
        $suiviRegle = false;

        if ($menstru != null) {
            $suiviRegle = true;
            $dateProch = new Carbon($menstru->dateProchainRegle);
            $date = new \DateTime();
            $dateCourant = new Carbon($date->format("Y-M-d"));

            while ($dateProch < $dateCourant) {
                $menstru->dateRegle = $menstru->dateProchainRegle;
                $menstru->dateProchainRegle = $dateProch->addDay($menstru->dureeCycle);
                $menstru->save();
                $dateProch = new Carbon($menstru->dateProchainRegle);
            }
        } else {
            $suiviRegle = false;
        }
        $menstruations = Menstruation::where("user_id", Auth::user()->id)->where("type", "regle")->get();

        return view("CycleMenstruel.suiviRegle")
            ->with(["menstruations" => $menstruations])
            ->with(["suivi" => $suiviRegle])
            ->with(["page" => "suivi-regle"]);
    }

    public function saveSuiviRegle(Request $request)
    {
        $dateLastRegle  = $request["dateRegle"];
        $dureeCycle = $request["dureeCycle"];

        //Calcul pour déterminer la date de la prochaine règle
        $carbon = new Carbon($dateLastRegle);
        $dateProchaineRegle  = $carbon->addDay($dureeCycle);

        $menstru = new Menstruation();
        $menstru->dateRegle = $dateLastRegle;
        $menstru->dureeCycle = $dureeCycle;
        $menstru->type = "regle";
        $menstru->dateProchainRegle = $dateProchaineRegle;
        $menstru->user_id = Auth::user()->id;
        $menstru->save();

        /**
         * Notifier tous les administrateurs de ma demande de suivi
         */

        $typeUser = TypeUser::where("libelle", "admin")->first();
        if ($typeUser != null) {
            $users = User::where("type_user_id", $typeUser->id)->get();
            foreach ($users as $user) {
                $user->notify(new RepliedToThread("Demande de suivi de règle", Auth::user()));
            }
        }

        /**
         * Pusher notification
         */

        // event(new NotificationEvent("Kodjovi"));

        Session::put("suivi-regle", true);
        
        Session::put("regle-message", "Demande de suivi de règle prise en compte. \n Chère ".Auth::user()->username." merci pour votre souscription au suivi de règle. Vous serez chaque fois notifier quelques jours avant la date de votre règle");

        return redirect()->back()->with(["message" => "Demande de suivi de règle prise en compte. \n Chère ".Auth::user()->username." merci pour votre souscription au suivi de règle. Vous serez chaque fois notifier quelques jours avant la date de votre règle"]);
        
        // Session::put("regle-message", "Chère ".Auth::user()->username." Il est fort probable que vous ayez votre prochaine menstruation dans la semaine du  ".$dateProchaineRegle->format("d M Y").".  Merci de prendre les dispositions nécessaires pour une bonne hygiène menstruelle.");
       // return redirect()->back()->with(["message" => "Demande de suivi de règle prise en compte \n. Il est fort probable que vous ayez votre prochaine menstruation dans la semaine du  ".$dateProchaineRegle->format("d M Y").". Merci de prendre les dispositions nécessaires pour une bonne hygiène menstruelle."]);
    }

    public function editSuiviRegle(Request $request)
    {
        $menstru = Menstruation::where("id", $request["id"])->first();
        if ($menstru == null) {
            return redirect()->back()->with(["erreur" => "Impossible de supprimer, une erreur s'est produite"]);
        }

        $dateLastRegle  = $request["dateRegle"];
        $dureeCycle = $request["dureeCycle"];

        //Calcul pour déterminer la date de la prochaine règle
        $carbon = new Carbon($dateLastRegle);
        $dateProchaineRegle  = $carbon->addDay($dureeCycle);

        $menstru->dateRegle = $dateLastRegle;
        $menstru->dureeCycle = $dureeCycle;
        $menstru->dateProchainRegle = $dateProchaineRegle;

        $menstru->save();
        Session::put("suivi-regle", true);
        
        Session::put("regle-message", "Demande de suivi de règle prise en compte. \n Chère ".Auth::user()->username." merci pour votre souscription au suivi de règle. Vous serez chaque fois notifier quelques jours avant la date de votre règle");

        return redirect()->back()->with(["message" => "Demande de suivi de règle prise en compte. \n Chère ".Auth::user()->username." merci pour votre souscription au suivi de règle. Vous serez chaque fois notifier quelques jours avant la date de votre règle"]);
        
        // Session::put("regle-message", "Chère ".Auth::user()->username." Il est fort probable que 2 jours avant ou 2 jours après  le ".$dateProchaineRegle->format("d M Y").". Merci de prendre les dispositions nécessaires pour une bonne hygiène menstruelle.");
      //  return redirect()->back()->with(["message" => "Demande de suivi de règle prise en compte \n. Il est fort probable que vous ayez votre prochaine menstruation 2 jours avant ou 2 jours après le ".$dateProchaineRegle->format("d M Y").". Merci de prendre les dispositions nécessaires pour une bonne hygiène menstruelle."]);
    }

    public function deleteSuiviRegle(Request $request)
    {
        $menstru = Menstruation::where("id", $request["id"])->first();
        if ($menstru == null) {
            return redirect()->back()->with(["erreur" => "Impossible de supprimer, une erreur s'est produite"]);
        }
        $annulation = new Annulation();
        $annulation->motif = $request["description"];
        $annulation->user_id = Auth::user()->id;
        $annulation->suivi = "regle";
        $annulation->save();
        Session::put("suivi-regle-annuler", true);
        $menstru->delete();
        return redirect()->back()->with(["message" => "Suivi de règle annulé. Vous ne recevrez pas de notifications d'alerte pour le suivi."]);
    }


    // Ovulation

    public function indexOvulation()
    {
        $menstru = Menstruation::where("user_id", Auth::user()->id)->where("type", "ovulation")->first();
        $suiviRegle = false;

        if ($menstru != null) {
            $suiviRegle = true;
            $dateProch = new Carbon($menstru->dateProchainOvulation);
            $date = new \DateTime();
            //return json_encode($dateProch);
            $dateCourant = new Carbon($date->format("Y-M-d"));

            while ($dateProch < $dateCourant) {
                $dateProbProchaineRegle = $dateProch->addDay(14);
                $dateRegle = new Carbon($dateProbProchaineRegle);
                $menstru->dateRegle = $dateProbProchaineRegle;
                $menstru->dateProchainOvulation = $dateRegle->addDay($menstru->dureeCycle - 15) ;
                $menstru->save();
                $dateProch = new Carbon($menstru->dateProchainOvulation);
            }
        } else {
            $suiviRegle = false;
        }
        $menstruations = Menstruation::where("user_id", Auth::user()->id)->where("type", "ovulation")->get();

        return view("CycleMenstruel.suiviOvulation")
                ->with(["menstruations" => $menstruations])
                ->with(["suivi" => $suiviRegle])
                ->with(["page" => "suivi-ovulation"]);
    }

    public function saveSuiviOvulation(Request $request)
    {
        $dateLastRegle  = $request["dateRegle"];
        $dureeCycle = $request["dureeCycle"];

        //Calcul pour déterminer la date de la prochaine ovulation
        $carbon = new Carbon($dateLastRegle);

        $dateProchaineOvulation  = $carbon->addDay($dureeCycle - 15);

        $menstru = new Menstruation();
        $menstru->dateRegle = $dateLastRegle;
        $menstru->dureeCycle = $dureeCycle;
        $menstru->type = "ovulation";
        $menstru->dateProchainOvulation = $dateProchaineOvulation;
        $menstru->user_id = Auth::user()->id;
        $menstru->save();

        /**
         * Notifier tous les administrateurs de ma demande de suivi
         */

        $typeUser = TypeUser::where("libelle", "admin")->first();
        if ($typeUser != null) {
            $users = User::where("type_user_id", $typeUser->id)->get();
            foreach ($users as $user) {
                $user->notify(new RepliedToThread("Demande de suivi d'ovulation", Auth::user()));
            }
        }

        Session::put("suivi-ovulation", true);
        
        Session::put("ovulation-message", "Demande de suivi d'ovulation prise en compte. \n Chère ".Auth::user()->username." merci pour votre souscription au suivi d'ovulation. Vous serez chaque fois notifier quelques jours avant la date de votre ovulation");
        return redirect()->back()->with(["message" => "Demande de suivi d'ovulation prise en compte. \n Chère ".Auth::user()->username." merci pour votre souscription au suivi d'ovulation. Vous serez chaque fois notifier quelques jours avant la date de votre ovulation"]);


        // Session::put("ovulation-message", "Chère ".Auth::user()->username."  il est fort probable que dans la semaine du ".$dateProchaineOvulation->format("d M Y")."  vous soyez dans votre ovulation. Moment favorable alors pour tomber enceinte au cas où vous le désirez. Au cas contraire, merci de prendre les dispositions nécessaires pour éviter tout acte sexuel pouvant occasionner une grossesse précoce ou non désirée. Donc abstinence sexuelle, méthode contraceptive ou port de préservatif.");
       // return redirect()->back()->with(["message" => "Demande de suivi d'ovulation prise en compte \n. Il est fort probable que dans la semaine du ".$dateProchaineOvulation->format("d M Y")."  vous soyez dans votre ovulation. Moment favorable alors pour tomber enceinte au cas où vous le désirez. Au cas contraire, merci d’éviter tout acte  pouvant occasionner une grossesse précoce ou non désirée et donc l’abstinence, une méthode contraceptive ou le port de préservatif."]);
    }

    public function deleteSuiviOvulation(Request $request)
    {
        $menstru = Menstruation::where("id", $request["id"])->first();
        if ($menstru == null) {
            return redirect()->back()->with(["erreur" => "Impossible de supprimer, une erreur s'est produite"]);
        }
        $annulation = new Annulation();
        $annulation->motif = $request["description"];
        $annulation->user_id = Auth::user()->id;
        $annulation->suivi = "ovulation";
        $annulation->save();
        Session::put("suivi-ovulation-annuler", true);

        $menstru->delete();
        return redirect()->back()->with(["message" => "Suivi d'ovulation annulé. Vous ne recevrez pas de notifications d'alerte pour le suivi."]);
    }

    // suivi regle
    public function getAdminSuiviRegle()
    {
        $page = 'suivi-regle';
        
        return view('Admin.CycleMenstruel.suiviRegle', compact('page'));
    }


    //Export de suivi de règle

    public function exportSuiviRegle()
    {
        if (isset($_GET["debut"]) && isset($_GET["fin"])) {
            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            if ($debut != null && $fin != null) {
                $menstruations = DB::select("select * from menstruations where type = 'regle' and created_at between  '".$debut." 00:00:00' and '".$fin." 23:59:59' order by id desc");
            } else {
                $menstruations = Menstruation::where("type", "regle")->orderBy("id", "desc")->orderBy("id", "desc")->get();
            }
        } else {
            {
                $menstruations = Menstruation::where("type", "regle")->orderBy("id", "desc")->orderBy("id", "desc")->get();           }
        }

        $data[]= [];
        foreach ($menstruations as $menstruation) {
            $data[] = array(
                \App\User::where("id", $menstruation->user_id)->first()->codeUser,
               \App\User::where("id", $menstruation->user_id)->first()->username,
               \App\User::where("id", $menstruation->user_id)->first()->numero,
               date_format(date_create($menstruation->dateRegle), "d/m/Y"),
               $menstruation->dureeCycle,
               date_format(date_create($menstruation->dateProchainRegle), "d/m/Y"),
               "Suivi",
               date_format(date_create($menstruation->created_at), "d/m/Y"),
            );
        }
        $headings = array("Code","Nom utilisateur", "Numero", 'Date dernière règle', 'Durée du cycle','Date probable prochaine règle','Status','Souscris le');

        $notifToken = new NotifToken();
        $notifToken->exportToExcel("Suivi de règle", $data, $headings);

        return redirect()->with(["message" => "Fichier exporté"]);
    }
    
    
    public function getAdminSuiviOvulation()
    {
        $page = 'suivi-ovulation';
        
        return view('Admin.CycleMenstruel.suiviOvulation', compact('page'));
    }


    public function exportSuiviOvulation()
    {
        if (isset($_GET["debut"]) && isset($_GET["fin"])) {
            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            if ($debut != null && $fin != null) {
                $menstruations = DB::select("select * from menstruations where type = 'ovulation' and created_at between  '".$debut."' and '".$fin."' order by id desc");
            } else {
                $menstruations = Menstruation::where("type", "ovulation")->orderBy("id", "desc")->get();
            }
        } else {
            $menstruations = Menstruation::where("type", "ovulation")->orderBy("id", "desc")->get();
        }

        $data[]= [];
        foreach ($menstruations as $menstruation) {
            $data[] = array(
                 \App\User::where("id", $menstruation->user_id)->first()->codeUser,
                \App\User::where("id", $menstruation->user_id)->first()->username,
                \App\User::where("id", $menstruation->user_id)->first()->numero,
                date_format(date_create($menstruation->dateRegle), "d/m/Y"),
                $menstruation->dureeCycle,
                date_format(date_create($menstruation->dateProchainOvulation), "d/m/Y"),
                "Suivi",
                date_format(date_create($menstruation->created_at), "d/m/Y"),
            );
        }
        $headings = array("Code User","Nom utilisateur", "Numero", 'Date dernière règle', 'Durée du cycle','Date probable prochaine ovulation','Status','Souscris le');

        $notifToken = new NotifToken();
        $notifToken->exportToExcel("Suivi d'ovulation", $data, $headings);

        return redirect()->with(["message" => "Fichier exporté"]);
    }


    public function getAnnulationSuivi()
    {
        $annulations = DB::select("select * from annulations where suivi = 'regle' or suivi = 'ovulation'");
        return view("Admin.CycleMenstruel.annulation")
            ->with(["annulations" => $annulations])
            ->with(["page" => "annuler-grossesse"]);
    }
    
    
    // sms de suivi
    public function postAlertSuiviRegle(Request $request)
    {
        $userIDs = $request->userID;
        
        if (count($userIDs) === 0) {
            return redirect()->back()->with(['error'  => 'Veuillez sélectionner un ou plusieurs destinataires']);
        }
        
        foreach ($userIDs as $id) {
            try {
                $menstruation = Menstruation::with('user')->find($id);

                if ($menstruation !== null && $menstruation->user !== null) {
                    $userNumber = preg_replace('/\s+/', '', substr($menstruation->user->numero, 1));
                    
                    $message = "Chère " . $menstruation->user->username." Il est fort probable que vous ayez votre prochaine menstruation dans la semaine du  ".date_format(date_create($menstruation->dateProchainRegle), "d M Y").". Merci de prendre les dispositions nécessaires pour une bonne hygiène menstruelle.";

                    $date1 = date_create($menstruation->dateprochainregle);
                    
                    $date2 = date_create(date("Y-m-d"));
                    
                    $diff = date_diff($date2, $date1);
                    
                    $difference = $diff->format("%d");

                    if ($difference == 2) {
                        $message = $menstruation->user->username.", bientôt vos prochaines règles. Lavez-vous au moins 2 fois par jour avec du savon et séchez bien les parties entre les jambes.";
                    } elseif ($difference == 1) {
                        $message = "Pendant vos règles, changez vos sous-vêtements au moins 2 fois par jour, si possible les laver avec l’eau de javel ou les bouillir, et les sécher au soleil.";
                    } else {
                        $message = "En cas de douleur de bas ventre, pendant vos règles, prenez un antalgique (paracétamol) et rendez-vous dans un centre de santé le plus proche.";
                    }

                    $output = (new NotifToken())->sendProviderSMS($userNumber, $message);
                    
                    info('send sms output', ['output' => $output]);

                    // envoie de notification Internet
                    $tokens = NotifToken::where('user_id', $menstruation->user->id)->pluck('token');
                    
                    (new NotifToken())->sendNotificationToUser($tokens, 'Alerte suivi de règle', $message);
                }
            } catch (\Exception $e) {
                return redirect()->back()->with(["error"  => "Une erreur s'est produite lors de la diffusion du message :".$e->getMessage()]);
            }
        }
        return redirect()->back()->with(["message"  => "SMS de suivi de règle diffusé avec succès"]);
    }
    
    // sms suivi ovulation
    public function postAlertSuiviOvulation(Request $request)
    {
        $userIDs = $request->userID;

        foreach ($userIDs as $id) {
            try {
                $menstruation = Menstruation::with('user')->find($id);

                if ($menstruation !== null && $menstruation->user !== null) {
                    $userNumber = preg_replace('/\s+/', '', substr($menstruation->user->numero, 5));

                    //            $message = "Chère ".$menstruation->user->username." il est fort probable que dans la semaine du ".date_format(date_create($menstruation->dateProchainOvulation),"d M Y")."  vous soyez dans votre ovulation. Moment favorable alors pour tomber enceinte au cas où vous le désirez. Au cas contraire, merci de prendre les dispositions nécessaires pour éviter tout acte sexuel pouvant occasionner une grossesse précoce ou non désirée. Donc abstinence sexuelle, méthode contraceptive ou port de préservatif.";
        
                    $message = "Chère ".$menstruation->user->username." il est fort probable que dans la semaine du ".date_format(date_create($menstruation->dateProchainOvulation), "d M Y")."  vous soyez dans votre ovulation. Moment favorable alors pour tomber enceinte au cas où vous le désirez. Au cas contraire, merci de prendre les dispositions nécessaires pour éviter tout acte sexuel pouvant occasionner une grossesse précoce ou non désirée. Donc abstinence sexuelle, méthode contraceptive ou port de préservatif.";
//                        $client = new Client();
//                        $res = $client->request('GET', "http://sms.supersmsgb.com:8080/sendsms?username=slu-majecticp&password=majestic&type=0&dlr=1&destination=".$userNumber."&source=eConvivial&message=".$message);
//
//                        if($res->getStatusCode() == 200){
//
//                        }else{
//
//                        }
                    $date1 = date_create($menstruation->dateprochainovulation);
                    $date2 = date_create(date("Y-m-d"));
                    $diff = date_diff($date2, $date1);
                    $difference = $diff->format("%d");

                    if ($difference == 2) {
                        $message = "Alerte, bientôt votre prochaine ovulation : moment favorable pour tomber enceinte, car le spermatozoïde de l’homme peut vivre pendant 72h en attendant votre ovule.";
                    } elseif ($difference == 1) {
                        $message = "Alerte, bientôt votre prochaine ovulation, merci de prendre les dispositions nécessaires en cas de contacts sexuels non protégés au moins pendant les 7 jours à venir.";
                    } else {
                        $message = "Alerte, pour éviter une grossesse en ce moment d’ovulation, abstinence sexuelle, méthode contraceptive notamment le port correct du préservatif en cas de rapport sexuel. ";
                    }

                    $output = (new NotifToken())->sendProviderSMS($userNumber, $message);
                    
                    info('send sms output', ['output' => $output]);

                    // envoie de notification Internet
                    $tokens = NotifToken::where('user_id', $menstruation->user->id)->pluck('token');
                    
                    (new NotifToken())->sendNotificationToUser($tokens, 'Alerte suivi ovulation', $message);
                    
                }
            } catch (\Exception $e) {
                return redirect()->back()->with(["error"  => "Une erreur s'est produite lors de la diffusion du message"]);
            }
        }
        return redirect()->back()->with(["message"  => "SMS de suivi d'ovulation diffusé avec succès"]);
    }
    
    
    /**
     * Assistance en ligne suivi menstru
     */

    public function getTeleConseillerSuiviRegle()
    {
        $menstruations = Menstruation::where("type", "regle")->get();

        foreach ($menstruations as $menstruation) {
            $suiviRegle = true;
            $dateProch = new Carbon($menstruation->dateProchainRegle);
            $date = new \DateTime();
            $dateCourant = new Carbon($date->format("Y-M-d"));

            while ($dateProch < $dateCourant) {
                $menstruation->dateRegle = $menstruation->dateProchainRegle;
                $menstruation->dateProchainRegle = $dateProch->addDay($menstruation->dureeCycle);
                $menstruation->save();
                $dateProch = new Carbon($menstruation->dateProchainRegle);
            }
        }

        return view("AssistanceLigne.suiviRegle")
            ->with(["menstruations" => $menstruations])
            ->with(["page" => "suivi-regle"]);
    }

    public function getTeleConseillerSuiviOvulation()
    {
        $menstruations = Menstruation::where("type", "ovulation")->get();

        foreach ($menstruations as $menstruation) {
            $suiviRegle = true;
            $dateProch = new Carbon($menstruation->dateProchainOvulation);
            $date = new \DateTime();
            $dateCourant = new Carbon($date->format("Y-M-d"));

            while ($dateProch < $dateCourant) {
                $menstruation->dateRegle = $menstruation->dateProchainOvulation;
                $menstruation->dateProchainOvulation = $dateProch->addDay($menstruation->dureeCycle - 13);
                $menstruation->save();
                $dateProch = new Carbon($menstruation->dateProchainOvulation);
            }
        }

        return view("AssistanceLigne.suiviOvulation")
            ->with(["menstruations" => $menstruations])
            ->with(["page" => "suivi-ovulation"]);
    }
}
