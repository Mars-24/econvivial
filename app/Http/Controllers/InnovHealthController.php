<?php

namespace App\Http\Controllers;

use App\Beneficiaire;
use App\Conjoint;
use App\CPN_Suivi;
use App\DateProbableConsultation;
use App\DateProbableVaccination;
use App\FormationSanitaire;
use App\Langue;
use App\LanguePreference;
use App\MessageGrossesse;
use App\MessageGrossesseUser;
use App\NotificationMessage;
use App\NotifToken;
use App\Planning;
use App\Q;
use App\Quartier;
use App\RapportAlerteSms;
use App\TypeUser;
use App\User;
use App\Vacci_Nature;
use App\Vacci_Type;
use App\Ville;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Schema;
use App\Charts\FluxGrossesseDiagramme;


class InnovHealthController extends Controller
{

    public function verifyBeneficiareNumber(Request $request)
    {
        info('verifyBeneficiareNumber', ['request' => $request->all()]);

        //dd(Beneficiaire::);

        $result['message'] = [];
        $result['error'] = false;

        $numero = "%" . $request->numero;

        $beneficiare = DB::select('select * from beneficiaires where telephone like :phone', ['phone' => $numero]);
        if ($beneficiare != null) {
            $result['message'] = "Vous êtes enregistrée, veuillez continuer";
            $result['error'] = false;
        } else {
            $result['message'] = "Vous n'avez pas vos informations dans la base";
            $result['error'] = true;
        }

        return response()->json($result);
    }

    public function getBeneficiaireCPNPage()
    {
        $quartiers = Quartier::orderBy("libelle", "asc")->get();

        $langues = Langue::orderBy("libelle_langue", "asc")->get();

        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $typeCpn = $user->typeCpn;
        $lastBenef = Beneficiaire::orderBy("id", "desc")->get()[0]->id;

        return view("InnovHealth.Grossesse.index")
            ->with(["page" => "dashboard"])
            ->with(["typeCpn" => $typeCpn])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["quartiers" => $quartiers])
            ->with(["lastBenef" => $lastBenef + 1])
            ->with(["langues" => $langues]);
    }

    public function getBeneficiairePFPage()
    {

        $quartiers = Quartier::orderBy("libelle", "asc")->get();

        $langues = Langue::orderBy("libelle_langue", "asc")->get();

        $plannings = Planning::orderBy("titre", "asc")->get();
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();

        $nbMigration = $this->getNombreMigrationPF();

        return view("InnovHealth.PlanningFA.index")
            ->with(["page" => "dashboard"])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["quartiers" => $quartiers])
            ->with(["langues" => $langues])
            ->with(["nbMigration" => $nbMigration])
            ->with(["plannings" => $plannings]);
    }

    public function getBeneficiaireVaccinPage()
    {
        $quartiers = Quartier::orderBy("libelle", "asc")->get();
        $langues = Langue::orderBy("libelle_langue", "asc")->get();
        $type_vaccin = Vacci_Type::orderBy("lib_vacci_typ", "asc")->get();
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $typeCpn = $user->typeCpn;
        $nbMigration = $this->getNombreMigrationVaccin();
        //dd($type_vaccin);
        return view("InnovHealth.Vaccin.index")
            ->with(["page" => "dashboard"])
            ->with(["nbMigration" => $nbMigration])
            ->with(["typeCpn" => $typeCpn])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["quartiers" => $quartiers])
            ->with(["langues" => $langues])
            ->with(["VaccinNats" => $type_vaccin]);

    }

    public function getlisteLangue()
    {
        $langues = Langue::orderBy("libelle_langue", "asc")->get();
        return view("InnovHealth.index")->with(["langues" => $langues]);
    }

    public function upDateRecuCPN(Request $request)
    {
        if (isset($request['dernier'])) {
            $beneficiaire = DB::table('beneficiaires')
                ->where('id', $request['id'])
                ->update(['nb_echo' => $request['nb_echo']]);

            $values = array(
                'dateProchaineCPN' => $request['dateNextCPN1'],
                'nb_cpn' => $request['nb_cpn'] + 1,
                'dateFinCPN' => $request['dateNextCPN1'],
                'poids' => $request['poids'],
                'ta' => $request['ta'],
                'alb' => $request['alb'],
                'bdcf' => $request['bdcf'],
                'tv' => $request['tv'],
                'hu' => $request['hu'],
                'facteur' => $request['facteur'],
                'examen' => $request['examen'],
                'decision' => $request['decision'],
            );
            $cpn_suivi = DB::table('cpn_suivis')
                ->where('beneficiaire_id', $request['id'])
                ->update($values);
            return redirect()->route("liste-demande-suivi-grossesse")->with(["message" => "CPN conclut"]);
        }

        $values = array(
            'dateProchaineCPN' => $request['dateNextCPN1'],
            'nb_cpn' => $request['nb_cpn'] + 1,
            'poids' => $request['poids'],
            'ta' => $request['ta'],
            'alb' => $request['alb'],
            'bdcf' => $request['bdcf'],
            'tv' => $request['tv'],
            'hu' => $request['hu'],
            'facteur' => $request['facteur'],
            'examen' => $request['examen'],
            'decision' => $request['decision'],
        );
        $cpn_suivi = DB::table('cpn_suivis')
            ->where('beneficiaire_id', $request['id'])
            ->update($values);
        return redirect()->route("liste-demande-suivi-grossesse")->with(["message" => "Prochain CPN programmé avec succès"]);
    }

    public function terminerCPN(Request $request)
    {
        $cpn_suivi = DB::table('cpn_suivis')
            ->where('beneficiaire_id', $request['id'])
            ->update(['estFinis' => true]);
        return redirect()->route("liste-demande-suivi-grossesse")->with(["message" => "CPN terminée"]);
    }

    public function verifierMigration($benf_id, $affected_to_id)
    {
        $occurence = DB::table('migrations_beneficiaires')
            ->where('beneficiaire_id', $benf_id)
            ->where('user_id', $affected_to_id)->first();
        if ($occurence != null)
            return true;
        return false;
    }

    public function migrerVersVaccination($user_formation_sanitaire_id, $benef_id)
    {
        $affected_user = DB::table('users')
            ->where('formation_sanitaire_id', $user_formation_sanitaire_id)
            ->where('type_user_id', 18)->first();

        if ($affected_user == null)
            return redirect()->route("liste-demande-suivi-grossesse")->with(["error" => "Ce service n'existe pas dans votre Centre Sanitaire"]);

        if ($this->verifierMigration($benef_id, $affected_user->id))
            return redirect()->route("liste-demande-suivi-grossesse")->with(["error" => "Ce bénéficiaire a été déjà migrer vers le service vaccination"]);

        DB::insert('insert into migrations_beneficiaires (beneficiaire_id, user_id) values (?, ?)', [$benef_id, $affected_user->id]);
    }

    public function migrerVersPlanningFamilial($user_formation_sanitaire_id, $benef_id)
    {
        $affected_user = DB::table('users')
            ->where('formation_sanitaire_id', $user_formation_sanitaire_id)
            ->where('type_user_id', 19)->first();

        if ($affected_user == null)
            return redirect()->route("liste-demande-suivi-grossesse")->with(["error" => "Ce service n'existe pas dans votre Centre Sanitaire"]);

        if ($this->verifierMigration($benef_id, $affected_user->id))
            return redirect()->route("liste-demande-suivi-grossesse")->with(["error" => "Ce bénéficiaire a été déjà migrer vers le service planning familial"]);

        DB::insert('insert into migrations_beneficiaires (beneficiaire_id, user_id) values (?, ?)', [$benef_id, $affected_user->id]);
    }

    public function migrerBeneficiaire(Request $request)
    {
        $user = auth()->user();
        if ($request['typeMigration'] == "VC") {

            $this->migrerVersVaccination($user->formation_sanitaire_id, $request['id']);
            return redirect()->route("liste-demande-suivi-grossesse")->with(["message" => "Le bénéficiare a été migré vers le service Vaccination"]);

        } elseif ($request['typeMigration'] == "PF") {

            $this->migrerVersPlanningFamilial($user->formation_sanitaire_id, $request['id']);
            return redirect()->route("liste-demande-suivi-grossesse")->with(["message" => "Le bénéficiare a été migré vers le service Planing Familial"]);

        } else {

            $this->migrerVersVaccination($user->formation_sanitaire_id, $request['id']);
            $this->migrerVersPlanningFamilial($user->formation_sanitaire_id, $request['id']);
            return redirect()->route("liste-demande-suivi-grossesse")->with(["message" => "Le bénéficiare a été migré vers le service Vaccination et Planning Familial"]);

        }
    }

    public function transfererBeneficiaire(Request $request)
    {
        $benef = DB::table('beneficiaires')
            ->where('id', $request['id'])
            ->update(['ajouterPar' => $request['formationSanitaire']]);

        if (Schema::hasTable('historique_transferts')) {

            $values = array('beneficiaire_id' => $request["id"], 'transfert_de' => auth()->user()->id, 'transfert_vers' => $request['formationSanitaire'], 'created_at' => date("Y-m-d H:i:s"));
            DB::table('historique_transferts')->insert($values);
        } else {
            Schema::create('historique_transferts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('beneficiaire_id');
                $table->integer('transfert_de');
                $table->integer('transfert_vers');
                $table->timestamps();
                $table->foreign('beneficiaire_id')->references('id')->on('beneficiaires')->onDelete('cascade');
                $table->foreign('transfert_de')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('transfert_vers')->references('id')->on('users')->onDelete('cascade');
                /*
                $table->foreign('beneficiaire_id')->references('id')->on('beneficiaires');*/
            });
            $values = array('beneficiaire_id' => $request["id"], 'transfert_de' => auth()->user()->id, 'transfert_vers' => $request['formationSanitaire'], 'created_at' => date("Y-m-d H:i:s"));
            DB::table('historique_transferts')->insert($values);
        }

        $user = DB::table("users")->where("id", '=', $request['formationSanitaire'])->first();
        $userNumber = preg_replace('/\s+/', '', $user->numero);


        $sendSMS = new NotifToken();

        $message = "Chère prestataire \n Il vous est affecté un nouveau bénéficiare.";

        $output = $sendSMS->sendProviderSMS($userNumber, $message);
        return redirect()->route("liste-demande-suivi-grossesse")->with(["message" => "Bénéficiaire transfert avec succès"]);
    }

    public function upDateRecuVaccin(Request $request)
    {
        if (isset($request['dernier'])) {
            $cpn_suivi = DB::table('vaccin_suivis')
                ->where('beneficiaire_id', $request['id'])
                ->update(['dateprochain_vaccin' => $request['dateNextVac'], 'datefin_vaccin' => $request['dateNextVac'], 'code_vacci_typ' => $request['typeVaccin']]);
            return redirect()->route("suivi-vaccination-en-cours")->with(["message" => "Toutes les vaccins ont été faite"]);
        }
        $cpn_suivi = DB::table('vaccin_suivis')
            ->where('beneficiaire_id', $request['id'])
            ->update(['dateprochain_vaccin' => $request['dateNextVac'], 'code_vacci_typ' => $request['typeVaccin']]);
        return redirect()->route("suivi-vaccination-en-cours")->with(["message" => "Prochain vaccination programmé avec succès"]);
    }

    public function saveSuiviBeneficiaire(Request $request)
    {
        /**
         * Enrégistrement des infos du bénéficiaire
         */
        $numero = "%228" . $request['telephone'];
        $existedBeneficiare = DB::select('select * from beneficiaires where telephone like :phone', ['phone' => $numero]);

        if ($existedBeneficiare != null) {

            return redirect()->route("nouveau-beneficiaire-suivi")->with(["error" => "Ce bénéficiaire existe déjà"]);

        } else {
            $user = auth()->user();

            $dateJour = new DateTime();
            $beneficiaire = new Beneficiaire();
            $beneficiaire->nom = $request["name"];
            $beneficiaire->prenom = $request["prenom"];
            $beneficiaire->telephone = "228" . $request["telephone"];
            $beneficiaire->dateNaissance = $request["dateNaissance"];
            $beneficiaire->quartier_id = $request["quartier"];
            $beneficiaire->optionSuivi = $request["optionSuivi"];
            $beneficiaire->reshus = $request["reshus"];
            $beneficiaire->langue = $request["langue"];
            $beneficiaire->taille = $request["taille"];
            $beneficiaire->ajouterPar = $user->id;
            $beneficiaire->haveConjoint = true;

            if ($request["optionSuivi"] != "Suivi PFA") {
                $beneficiaire->ptme = $request["typePatient"];
            } else {
                $beneficiaire->ptme = 0;
            }

            if ($request["optionSuivi"] == "Suivi de la grossesse") {
                $beneficiaire->num_carnet = $request["numCarnet"];
                $beneficiaire->dateRegle = $request["dateRegle"];
                $beneficiaire->nbEcho = $request["nbEcho"];
                $beneficiaire->dureeGrossese = $request["dureeGrossesse"];
            }

            if ($request["optionSuivi"] == "Suivi vaccinal") {
                $beneficiaire->num_carnet = $request["numCarnet"];
                $beneficiaire->dateAccouchement = $request["dateAccouchement"];
                $beneficiaire->ageBebe = $request["ageBebe"];
                $beneficiaire->nomBebe = $request["nomBebe"];
            }

            $beneficiaire->save();

            $identifiant = $beneficiaire->id;
            $initName = strtoupper(substr($request["name"], 0, 3));
            $initPrenom = strtoupper(substr($request["prenom"], 0, 3));
            $initMois = strtoupper($dateJour->format("M"));
            $year = $dateJour->format("y");
            if ($request["optionSuivi"] != "Suivi PFA") {
                $isPMTE = $beneficiaire->ptme ? "O" : "N";
            } else {
                $isPMTE = "N";
            }

            $beneficiaire->code = $identifiant . $initName . "-" . $initPrenom . "-" . $initMois . $year . "-" . $isPMTE;

            $beneficiaire->save();
            /**
             * Enrégistrement des infos sur la langue
             */

            $langue = new LanguePreference();
            $langue->libelle = $request["langue"];
            $langue->beneficiaire_id = $beneficiaire->id;
            $langue->save();

            /**
             * Enrégistrement des infos sur le conjoint
             */
            $conjoint = new Conjoint();
            $conjoint->nom = $request["nomConjoint"];
            $conjoint->prenom = $request["prenomConjoint"];
            $conjoint->telephone = "228" . $request["telephoneConjoint"];
            $beneficiaire->conjoint_reshus = $request["conjointReshus"];
            $conjoint->beneficiaire_id = $beneficiaire->id;

            $beneficiaire->telephoneConjoint = "228" . $request["telephoneConjoint"];
            $beneficiaire->save();
            $conjoint->save();

            if ($request["optionSuivi"] == "Suivi de la grossesse") {
                $suivi_cpn = new CPN_Suivi();
                $suivi_cpn->dateProchaineCPN = $request["dateNextCPN1"];
                $suivi_cpn->nb_cpn = $request["cpn"];
                $suivi_cpn->typ_cpn = $user->typeCpn;
                $suivi_cpn->beneficiaire_id = $beneficiaire->id;
                $suivi_cpn->save();
            }

            if ($request["optionSuivi"] == "Suivi de la grossesse") {
                $this->saveAntecedent($beneficiaire->id, $request);
                $this->saveCommentaireAnalyses($beneficiaire->id, $request);
            }

            if ($request["optionSuivi"] == "Suivi vaccinal") {
                $values = array('code_vacci_typ' => $request["typeVaccin"], 'dateprochain_vaccin' => $request['dateVaccin'], 'beneficiaire_id' => $beneficiaire->id);
                DB::table('vaccin_suivis')->insert($values);
                //$this->saveSuiviVaccination($beneficiaire->dateAccouchement, $beneficiaire);
            }

            if ($request["optionSuivi"] == "Suivi PFA") {
                if (Schema::hasTable('suivi_planningFA')) {

                    $values = array('dateContraception' => $request["datePF"], 'dureeContraception' => $request['dureePF'], 'planning_id' => $request['methode'], 'beneficiaire_id' => $beneficiaire->id);
                    DB::table('suivi_planningFA')->insert($values);
                } else {
                    Schema::create('suivi_planningFA', function (Blueprint $table) {
                        $table->bigIncrements('id');
                        $table->string('dateContraception');
                        $table->string('dureeContraception');
                        $table->integer('planning_id');
                        $table->timestamps();
                        $table->integer('beneficiaire_id');
                        $table->foreign('beneficiaire_id')->references('id')->on('beneficiaires')->onDelete('cascade');
                        /*
                        $table->foreign('beneficiaire_id')->references('id')->on('beneficiaires');*/
                    });
                    $values = array('dateContraception' => $request["datePF"], 'dureeContraception' => $request['dureePF'], 'planning_id' => $request['methode'], 'beneficiaire_id' => $beneficiaire->id);
                    DB::table('suivi_planningFA')->insert($values);
                }
            }

            $userNumber = preg_replace('/\s+/', '', $beneficiaire->telephone);

            $message = "";
            $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
            $ville = Ville::where("id", $formationSanitaire->ville_id)->first();
            $langue = $request["langue"];
            switch ($langue) {
                case "Ewé":
                    $message = "Madame, vous avez été enregistrée avec succès pour le Suivi prénatal au CMS " . $ville->libelle . "\n\nVotre santé, notre souci.";
                    break;
                case "Français":
                    $message = "Aƒenɔ, wo ŋlɔ mia ƒe ŋkɔ kple dzi dzedze gã le " . $ville->libelle . " CMS dɔyɔƒea,  hena ameŋu nɔnɔ le fufɔfɔ ɣiyiɣiwo me do ŋgɔ na vidzidzi. \n\nMiaƒe lamesẽ  xaxa";
                    break;
                case "Kabye":
                    $message = "Ɖoɖoo, pamá ña-hɩɖɛ. Ŋpɩzɩɣ ŋwoki " . $ville->libelle . " Ɖɔkɔtɔ tɛ nɛ pamaɣzɩɣ ñɔ-hɔɔ. Ña-alaafɩya tɔm kɛna-ɖʋ' maɣzɩm";
                    break;
            }

            $sendSMS = new NotifToken();

            $output = $sendSMS->sendProviderSMS($userNumber, $message);

            // envoie de notification Internet
            /*$tokens = NotifToken::where('user_id', $menstruation->user->id)->pluck('token');

            (new NotifToken())->sendNotificationToUser($tokens, 'Alerte suivi de règle', $message);*/


            if (strpos($output, '1701') !== false) {
                if ($request["optionSuivi"] == "Suivi de la grossesse") {
                    return redirect()->route("liste-demande-suivi-grossesse")->with(["message" => "Bénéficiaire enregistré avec succès et message envoyé"]);
                } else if ($request["optionSuivi"] == "Suivi vaccinal") {
                    return redirect()->route("suivi-vaccination-en-cours")->with(["message" => "Bénéficiaire enregistré avec succès et message envoyé"]);
                } else {
                    return redirect()->route("suivi-planning-familial")->with(["message" => "Bénéficiaire enregistré avec succès et message envoyé"]);
                }
            } else {
                if ($request["optionSuivi"] == "Suivi de la grossesse") {
                    return redirect()->route("liste-demande-suivi-grossesse")->with(["message" => "Bénéficiaire enregistré avec succès message non envoyé"]);
                } else {
                    return redirect()->route("suivi-vaccination-en-cours")->with(["message" => "Bénéficiaire enregistré avec succès message non envoyé"]);
                }
            }
        }
    }

    public function saveAntecedent($id_benef, Request $request)
    {
        if (Schema::hasTable('antecedants')) {
            $values = array(
                'maladieGrave' => array_key_exists("maladieGrave", $request),
                'maladieInfo' => $request['maladieInfo'],
                'operation' => array_key_exists("operation", $request),
                'operationInfo' => $request['operationInfo'],
                'obstetrical' => $request['obstetrical'],
                'cesarienne' => array_key_exists("cesarienne", $request),
                'cesarienneInfo' => $request['cesarienneInfo'],
                'dateOperation' => $request['dateOperation'],
                'traitementStr' => array_key_exists("traitementStr", $request),
                'operationUterus' => array_key_exists("operationUterus", $request),
                'operationUterusInfo' => $request['operationUterusInfo'],
                'vat' => $request['vat'],
                'selleKOP' => $request['selleKOP'],
                'commentaire' => $request['commentaire'],
                'beneficiaire_id' => $id_benef
            );
            DB::table('antecedants')->insert($values);
        } else {
            Schema::create('antecedants', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->boolean('maladieGrave');
                $table->string('maladieInfo')->nullable(true);
                $table->boolean('operation');
                $table->string('operationInfo')->nullable(true);
                $table->string('obstetrical')->nullable(true);
                $table->boolean('cesarienne');
                $table->string('cesarienneInfo')->nullable(true);
                $table->date('dateOperation')->nullable(true);
                $table->boolean('traitementStr');
                $table->boolean('operationUterus');
                $table->string('operationUterusInfo')->nullable(true);
                $table->tinyInteger('vat');
                $table->string('selleKOP')->nullable(true);
                $table->string('commentaire')->nullable(true);
                $table->timestamps();
                $table->integer('beneficiaire_id');
                $table->foreign('beneficiaire_id')->references('id')->on('beneficiaires')->onDelete('cascade');
                /*
                $table->foreign('beneficiaire_id')->references('id')->on('beneficiaires');*/
            });
            $values = array(
                'maladieGrave' => array_key_exists("maladieGrave", $request),
                'maladieInfo' => $request['maladieInfo'],
                'operation' => array_key_exists("operation", $request),
                'operationInfo' => $request['operationInfo'],
                'obstetrical' => $request['obstetrical'],
                'cesarienne' => array_key_exists("cesarienne", $request),
                'cesarienneInfo' => $request['cesarienneInfo'],
                'dateOperation' => $request['dateOperation'],
                'traitementStr' => array_key_exists("traitementStr", $request),
                'operationUterus' => array_key_exists("operationUterus", $request),
                'operationUterusInfo' => $request['operationUterusInfo'],
                'vat' => $request['vat'],
                'selleKOP' => $request['selleKOP'],
                'commentaire' => $request['commentaire'],
                'beneficiaire_id' => $id_benef
            );
            DB::table('antecedants')->insert($values);
        }
    }

    public function saveCommentaireAnalyses($id_benef, Request $request)
    {
        if (Schema::hasTable('commentaire_analyses')) {

            $values = array(
                'score' => $request["score"],
                'facteurRisque' => $request['facteurRisque'],
                'referenceLieu' => $request['referenceLieu'],
                'decision' => $request['decision'],
                'beneficiaire_id' => $id_benef
            );
            DB::table('commentaire_analyses')->insert($values);
        } else {
            Schema::create('commentaire_analyses', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->tinyInteger('score');
                $table->string('facteurRisque');
                $table->string('referenceLieu');
                $table->string('decision');
                $table->timestamps();
                $table->integer('beneficiaire_id');
                $table->foreign('beneficiaire_id')->references('id')->on('beneficiaires')->onDelete('cascade');
            });

            $values = array(
                'score' => $request["score"],
                'facteurRisque' => $request['facteurRisque'],
                'referenceLieu' => $request['referenceLieu'],
                'decision' => $request['decision'],
                'beneficiaire_id' => $id_benef
            );
            DB::table('commentaire_analyses')->insert($values);
        }
    }

    public function getBeneficiaireDetails()
    {
        if (isset($_GET)) {
            $ref = $_GET["ref"];
            $menu = $_GET["menu"];
            $page = $_GET["page"];
            $beneficiaire = Beneficiaire::where("id", $ref)->first();
            if ($beneficiaire != null) {
                $quartiers = Quartier::orderBy("libelle", "asc")->get();
                $langues = Langue::orderBy("libelle_langue", "asc")->get();
                $typeCpn = auth()->user()->typeCpn;
                $users = DB::table("users")->where("type_user_id", '=', 12)->where("id", '<>', auth()->user()->id)->get();
                $antecedant = DB::table("antecedants")->where("beneficiaire_id", '=', $ref)->first();
                $commentaire_analyses = DB::table("commentaire_analyses")->where("beneficiaire_id", '=', $ref)->first();
                //dd($commentaire_analyses);
                return view("InnovHealth.Grossesse.detailsBeneficiaire")
                    ->with(["beneficiaire" => $beneficiaire])
                    ->with(["users" => $users])
                    ->with(["menu" => $menu])
                    ->with(["quartiers" => $quartiers])
                    ->with(["langues" => $langues])
                    ->with(["typeCpn" => $typeCpn])
                    ->with(["antecedant" => $antecedant])
                    ->with(["commentaire_analyses" => $commentaire_analyses])
                    ->with(["page" => $page]);
            }
        }
        return redirect()->back()->with(["error" => "Impossible de consulter la page"]);
    }

    public function generateBeneficiairePDF()
    {
        if (isset($_GET)) {
            $ref = $_GET["ref"];
            $beneficiaire = Beneficiaire::where("id", $ref)->first();
            $antecedant = DB::table("antecedants")->where("beneficiaire_id", '=', $ref)->first();
            $commentaire_analyses = DB::table("commentaire_analyses")->where("beneficiaire_id", '=', $ref)->first();
            $formation = DB::table("formation_sanitaires")->where("id", '=', auth()->user()->formation_sanitaire_id)->value("libelle");
            $data = [
                'beneficiaire' => $beneficiaire,
                'formation' => $formation,
                'antecedant' => $antecedant,
                'commentaire_analyses' => $commentaire_analyses
            ];
            $pdf = PDF::loadView('InnovHealth.Grossesse.pdf', $data);

            return $pdf->download('informationDuBeneficiaire' . $beneficiaire->num_carnet . '.pdf');
        }
    }

    public function updateSuiviGrossesseBeneficiaire(Request $request)
    {
        /**
         * Update des infos de suivi de grossesse d'un bénéficiaire
         */
        $numero = "%228" . $request['telephone'];
        $user = auth()->user();

        $beneficiaire = Beneficiaire::where("id", $request['id'])->first();
        $beneficiaire->num_carnet = $request['numCarnet'];
        $beneficiaire->nom = $request['name'];
        $beneficiaire->prenom = $request['prenom'];
        $beneficiaire->dateNaissance = $request['dateNaissance'];
        $beneficiaire->telephone = $request['telephone'];
        $beneficiaire->reshus = $request['reshus'];
        $beneficiaire->quartier_id = $request['quartier'];
        $beneficiaire->langue = $request['langue'];
        $beneficiaire->haveConjoint = $request['haveconjoint'];
        if ($request['haveconjoint'] == 1) {
            $conjoint = Conjoint::where("beneficiaire_id", $request['id'])->first();
            $conjoint->nom = $request["nomConjoint"];
            $conjoint->prenom = $request["prenomConjoint"];
            $conjoint->telephone = "228" . $request["telephoneConjoint"];
            $beneficiaire->conjoint_reshus = $request["conjointReshus"];
            $conjoint->beneficiaire_id = $beneficiaire->id;

            $beneficiaire->telephoneConjoint = "228" . $request["telephoneConjoint"];
            $conjoint->save();
        }
        $beneficiaire->ptme = $request['typePatient'];
        if ($request["optionSuivi"] == "Suivi de la grossesse") {
            $suivi_cpn = CPN_Suivi::where("beneficiaire_id", $request['id'])->first();
            $suivi_cpn = DB::table('cpn_suivis')
                ->where('id_cpn', $suivi_cpn->id_cpn)
                ->update(['dateProchaineCPN' => $request["dateNextCPN1"], 'nb_cpn' => $request["cpn"]]);
        }
        $beneficiaire->dateRegle = $request['dateRegle'];
        $beneficiaire->dureeGrossese = $request['dureeGrossesse'];
        $beneficiaire->nbEcho = $request["nbEcho"];
        $values = array(
            'maladieGrave' => array_key_exists("maladieGrave", $request),
            'maladieInfo' => $request['maladieInfo'],
            'operation' => array_key_exists("operation", $request),
            'operationInfo' => $request['operationInfo'],
            'obstetrical' => $request['obstetrical'],
            'cesarienne' => array_key_exists("cesarienne", $request),
            'cesarienneInfo' => $request['cesarienneInfo'],
            'dateOperation' => $request['dateOperation'],
            'traitementStr' => array_key_exists("traitementStr", $request),
            'operationUterus' => array_key_exists("operationUterus", $request),
            'operationUterusInfo' => $request['operationUterusInfo'],
            'vat' => $request['vat'],
            'selleKOP' => $request['selleKOP'],
            'commentaire' => $request['commentaire'],
        );
        DB::table('antecedants')
            ->where('beneficiaire_id', $beneficiaire->id)
            ->update($values);
        $values = array(
            'score' => $request["score"],
            'facteurRisque' => $request['facteurRisque'],
            'referenceLieu' => $request['referenceLieu'],
            'decision' => $request['decision'],
        );
        DB::table('commentaire_analyses')
            ->where('beneficiaire_id', $beneficiaire->id)
            ->update($values);

        $beneficiaire->save();
        return redirect()->route("liste-demande-suivi-grossesse")->with(["message" => "Informations du bénéficiaire mise à jour"]);
    }

    public function saveCPN($dateRegle, $beneficiaire)
    {

        $dayCurrent = new DateTime();
        $dateJour = new Carbon($dayCurrent->format("Y-M-d"));

        $dateLastRegle = new Carbon($dateRegle);

        //  $dateRegleOrigin = new Carbon($dateRegle);

        $nbreSemaine = $dateJour->diffInWeeks($dateLastRegle);

        if ($nbreSemaine <= 12) {
            $this->storeSuiviGrossesse("CPN 1", $dateLastRegle->addDay(7 * 12), $beneficiaire->id);
            $dateLastRegle->addDay(-7 * 12);
        }

        if ($nbreSemaine <= 20) {
            $this->storeSuiviGrossesse("CPN 2", $dateLastRegle->addDay(7 * 20), $beneficiaire->id);
            $dateLastRegle->addDay(-7 * 20);
        }

        if ($nbreSemaine <= 26) {
            $this->storeSuiviGrossesse("CPN 3", $dateLastRegle->addDay(7 * 26), $beneficiaire->id);
            $dateLastRegle->addDay(-7 * 26);
        }

        if ($nbreSemaine <= 30) {
            $this->storeSuiviGrossesse("CPN 4", $dateLastRegle->addDay(7 * 30), $beneficiaire->id);
            $dateLastRegle->addDay(-7 * 30);
        }

        if ($nbreSemaine <= 34) {
            $this->storeSuiviGrossesse("CPN 5", $dateLastRegle->addDay(7 * 34), $beneficiaire->id);
            $dateLastRegle->addDay(-7 * 34);
        }

        if ($nbreSemaine <= 36) {
            $this->storeSuiviGrossesse("CPN 6", $dateLastRegle->addDay(7 * 36), $beneficiaire->id);
            $dateLastRegle->addDay(-7 * 36);
        }

        if ($nbreSemaine <= 38) {
            $this->storeSuiviGrossesse("CPN 7", $dateLastRegle->addDay(7 * 38), $beneficiaire->id);
            $dateLastRegle->addDay(-7 * 38);
        }

        if ($nbreSemaine <= 40) {
            $this->storeSuiviGrossesse("CPN 8", $dateLastRegle->addDay(7 * 40), $beneficiaire->id);
            $dateLastRegle->addDay(-7 * 40);
        }

        $beneficiaire->dateFinSuivi = $dateLastRegle->addDay(7 * 41);
        $beneficiaire->save();

        $dateLastRegle->addDay(-7 * 41);

    }

    public function storeSuiviGrossesse($cpn, $dateProbable, $beneficiaireID)
    {
        $consultation = new DateProbableConsultation();
        $consultation->cpn = $cpn;
        $consultation->dateProbable = $dateProbable;
        $consultation->beneficiaire_id = $beneficiaireID;
        $consultation->save();
    }

    public function fluxGrossesse()
    {
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        //->where('beneficiaires.ajouterPar', '=', $user->id)
        $benefTotalCpn1 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 1)
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefTotalCpn2 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 2)
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefTotalCpn3 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 3)
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefTotalCpn4 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 4)
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefTotalCpn5 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 5)
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefTotalCpn6 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 6)
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefTotalCpn7 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 7)
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefTotalCpn8 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 8)
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefAJourCpn1 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 1)
                    ->where('cpn_suivis.dateProchaineCPN', '>', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefAJourCpn2 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 2)
                    ->where('cpn_suivis.dateProchaineCPN', '>', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefAJourCpn3 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 3)
                    ->where('cpn_suivis.dateProchaineCPN', '>', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefAJourCpn4 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 4)
                    ->where('cpn_suivis.dateProchaineCPN', '>', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefAJourCpn5 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 5)
                    ->where('cpn_suivis.dateProchaineCPN', '>', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefAJourCpn6 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 6)
                    ->where('cpn_suivis.dateProchaineCPN', '>', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefAJourCpn7 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 7)
                    ->where('cpn_suivis.dateProchaineCPN', '>', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefAJourCpn8 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 8)
                    ->where('cpn_suivis.dateProchaineCPN', '>', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefNonJourCpn1 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 1)
                    ->where('cpn_suivis.dateProchaineCPN', '<=', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefNonJourCpn2 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 2)
                    ->where('cpn_suivis.dateProchaineCPN', '<=', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefNonJourCpn3 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 3)
                    ->where('cpn_suivis.dateProchaineCPN', '<=', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefNonJourCpn4 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 4)
                    ->where('cpn_suivis.dateProchaineCPN', '<=', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefNonJourCpn5 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 5)
                    ->where('cpn_suivis.dateProchaineCPN', '<=', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefNonJourCpn6 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 6)
                    ->where('cpn_suivis.dateProchaineCPN', '<=', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefNonJourCpn7 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 7)
                    ->where('cpn_suivis.dateProchaineCPN', '<=', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $benefNonJourCpn8 = DB::table('beneficiaires')
            ->join('cpn_suivis', function ($join) {
                $user = auth()->user();
                $join->on('beneficiaires.id', '=', 'cpn_suivis.beneficiaire_id')
                    ->where('cpn_suivis.nb_cpn', '=', 8)
                    ->where('cpn_suivis.dateProchaineCPN', '<=', date("Y-m-d"))
                    ->where('beneficiaires.ajouterPar', '=', $user->id);
            })->count();
        $chartTotal = new FluxGrossesseDiagramme();
        $chartAjour = new FluxGrossesseDiagramme();
        $chartNonAjour = new FluxGrossesseDiagramme();

        $chartTotal->labels(['CPN1', 'CPN2', 'CPN3', 'CPN4', 'CPN5', 'CPN6', 'CPN7', 'CPN8']);
        $chartTotal->dataset('Nombre de bénéficiaire total par CPN', 'bar', [$benefTotalCpn1, $benefTotalCpn2, $benefTotalCpn3, $benefTotalCpn4, $benefTotalCpn5, $benefTotalCpn6, $benefTotalCpn7, $benefTotalCpn8])->options(['color' => '#B71C1C']);
        $chartAjour->labels(['CPN1', 'CPN2', 'CPN3', 'CPN4', 'CPN5', 'CPN6', 'CPN7', 'CPN8']);
        $chartAjourDataSet = $chartAjour->dataset('Nombre de bénéficiaire à jour par CPN', 'bar', [$benefAJourCpn1, $benefAJourCpn2, $benefAJourCpn3, $benefAJourCpn4, $benefAJourCpn5, $benefAJourCpn6, $benefAJourCpn7, $benefAJourCpn8]);
        $chartAjourDataSet->backgroundColor(collect(['#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628']));
        $chartAjourDataSet->color(collect(['#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628']));
        $chartNonAjour->labels(['CPN1', 'CPN2', 'CPN3', 'CPN4', 'CPN5', 'CPN6', 'CPN7', 'CPN8']);
        $chartNonAjourDataSet = $chartNonAjour->dataset('Nombre de bénéficiaire non à jour par CPN', 'bar', [$benefNonJourCpn1, $benefNonJourCpn2, $benefNonJourCpn3, $benefNonJourCpn4, $benefNonJourCpn5, $benefNonJourCpn6, $benefNonJourCpn7, $benefNonJourCpn8]);
        $chartNonAjourDataSet->backgroundColor(collect(['#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c']));
        $chartNonAjourDataSet->color(collect(['#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c']));
        return view("InnovHealth.Grossesse.flux", compact('chartTotal', 'chartAjour', 'chartNonAjour'))->with(["page" => "flux"])->with(["formationSanitaire" => $formationSanitaire]);
    }

    /**
     * @param $semaine
     * @param $dateProbable
     * @param $vaccin
     *
     * @param $beneficiaireIDEnrégistrer les suivi de vaccination
     */

    public function saveSuiviVaccination($dateAccoucher, $beneficiaire)
    {

        $dateAccouchement = new Carbon($dateAccoucher);

        $this->storeVaccination("Date accouchement", $dateAccouchement, "Polio + BCG", $beneficiaire->id);

        $this->storeVaccination("6ème semaine", $dateAccouchement->addDay(7 * 6), "Penta 1 + Pneumo 1 + Rota 1 + Polio 1", $beneficiaire->id);

        $dateAccouchement->addDay(-7 * 6);

        $this->storeVaccination("10ème semaine", $dateAccouchement->addDay(7 * 10), "Penta 2 + Pneumo 2 + Rota 2 + Polio 2", $beneficiaire->id);

        $dateAccouchement->addDay(-7 * 10);

        $this->storeVaccination("14ème semaine", $dateAccouchement->addDay(7 * 14), "Penta 3 + Pneumo 3 + Rota 3  + Polio 3", $beneficiaire->id);

        $dateAccouchement->addDay(-7 * 14);

        $this->storeVaccination("9ème mois", $dateAccouchement->addDay(7 * 41), "RR & VAA", $beneficiaire->id);

        $dateAccouchement->addDay(-7 * 41);

        $beneficiaire->dateFinSuivi = $dateAccouchement->addDay(7 * 41);
        $beneficiaire->save();
        $dateAccouchement->addDay(-7 * 41);
    }

    public function storeVaccination($semaine, $dateProbable, $vaccin, $beneficiaireID)
    {
        $vaccination = new DateProbableVaccination();
        $vaccination->semaine = $semaine;
        $vaccination->dateProbable = $dateProbable;
        $vaccination->libelleVaccin = $vaccin;
        $vaccination->beneficiaire_id = $beneficiaireID;
        $vaccination->save();
    }

    /**
     * migration function
     */

    public function estUneMigration($id_benef)
    {
        $benef = DB::select("select * from migrations_beneficiaires m where m.beneficiaire_id = " . $id_benef);
        if ($benef == null)
            return false;
        return true;
    }

    public function getNombreMigrationVaccin()
    {
        $grosseses = DB::select("select * from beneficiaires b left join migrations_beneficiaires m on b.id = m.beneficiaire_id where b.ajouterPar = " . auth()->user()->id . " or m.user_id =" . auth()->user()->id);

        $i = 0;
        $j = 0;
        foreach ($grosseses as $grossese) {
            $vacci = DB::select("select * from vaccin_suivis where beneficiaire_id = " . $grossese->id);
            if ($vacci == null) {
                $j++;
            }
            $i++;
        }
        return $j;
    }

    public function getNombreMigrationPF()
    {
        $grosseses = DB::select("select * from beneficiaires b left join migrations_beneficiaires m on b.id = m.beneficiaire_id where b.ajouterPar = " . auth()->user()->id . " or m.user_id =" . auth()->user()->id);

        $i = 0;
        $j = 0;
        foreach ($grosseses as $grossese) {
            $occurence = DB::select("select * from suivi_planningFA where beneficiaire_id = " . $grossese->id);
            if ($occurence == null) {
                $j++;
            }
            $i++;
        }
        return $j;
    }

    /**
     * Liste de suivi des grosesses en cours
     */

    public function diff_in_week($dateRegle)
    {
        $dateRegleObject = new DateTime($dateRegle);
        $dateDuJour = new DateTime();
        $diff = ($dateDuJour->getTimestamp() - $dateRegleObject->getTimestamp());
        $diff /= (60 * 60 * 24 * 7);
        $nbreSemaine = abs(round($diff));
        return $nbreSemaine;
    }

    public function getListeSuiviGrossesse()
    {

        $quartiers = Quartier::orderBy("libelle", "asc")->get();
        $langues = Langue::orderBy("libelle_langue", "asc")->get();
        $user = auth()->user();
        $typeCpn = $user->typeCpn;
        $users = DB::table("users")->where("type_user_id", '=', 12)->where("id", '<>', $user->id)->get();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $grosseses = [];
        $i = 0;
        $benefs = DB::select("select * from beneficiaires b left join migrations_beneficiaires m on b.id = m.beneficiaire_id inner join cpn_suivis c on c.beneficiaire_id = b.id where c.estFinis = 0 and b.ajouterPar = " . auth()->user()->id . " or m.user_id =" . auth()->user()->id);
        foreach ($benefs as $benef) {
            $diff = $this->diff_in_week($benef->dateRegle);
            if ($diff < 36) {
                $benef->dureeGrossese = $diff;
                $grosseses[$i] = $benef;
            }
            $i++;
        }
        return view("InnovHealth.Grossesse.liste")
            ->with(["grossesses" => $grosseses])
            ->with(["users" => $users])
            ->with(["quartiers" => $quartiers])
            ->with(["langues" => $langues])
            ->with(["typeCpn" => $typeCpn])
            ->with(["menu" => $user->type_user_id])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "grossesse-en-cours"]);
    }

    public function getListeSuiviTerme()
    {
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $grosseses = [];
        $benefs = Beneficiaire::where("optionSuivi", "Suivi de la grossesse")
            ->where("ajouterPar", $user->id)
            ->get();
        foreach ($benefs as $benef) {
            $diff = $this->diff_in_week($benef->dateRegle);
            if ($diff >= 36) {
                $cnp_suivi = \DB::table('cpn_suivis')->where('beneficiaire_id', $benef->id)->update(['estFinis' => 1]);
            }
        }
        $grosseses = DB::select("select * from beneficiaires b left join migrations_beneficiaires m on b.id = m.beneficiaire_id inner join cpn_suivis c on b.id = c.beneficiaire_id where m.user_id = " . auth()->user()->id . " or b.ajouterPar = " . auth()->user()->id . " and c.estFinis = 1");
        $i = 0;
        foreach ($grosseses as $grossese) {
            $grossesesToSend[$i]["isMigration"] = $this->estUneMigration($grossese->id);
            $grossesesToSend[$i]["id"] = $grossese->id;
            $grossesesToSend[$i]["code"] = $grossese->code;
            $grossesesToSend[$i]["quartier_id"] = $grossese->quartier_id;
            $grossesesToSend[$i]["ptme"] = $grossese->ptme;
            $grossesesToSend[$i]["dureeGrossese"] = $grossese->dureeGrossese;
            $grossesesToSend[$i]["dateFinSuivi"] = $grossese->dateFinSuivi;
            $grossesesToSend[$i]["num_carnet"] = $grossese->num_carnet;
            $grossesesToSend[$i]["reshus"] = $grossese->reshus;
            $grossesesToSend[$i]["conjoint_reshus"] = $grossese->conjoint_reshus;
            $i++;
        }
        return view("InnovHealth.Grossesse.terme")
            ->with(["grossesses" => $grossesesToSend])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "grossesse-terme"]);

    }

    public function getDetailSuiviGrossesse()
    {
        $page = "";
        if (isset($_GET)) {
            $ref = $_GET["ref"];
            $beneficiaire = Beneficiaire::where("id", $ref)->first();
            if ($beneficiaire != null) {
                $dateCPNS = DateProbableConsultation::where("beneficiaire_id", $beneficiaire->id)->get();

                if ($_GET["page"] == "liste") {
                    $page = "grossesse-en-cours";
                } else {
                    $page = "grossesse-terme";
                }
                return view("InnovHealth.Grossesse.detailCPN")
                    ->with(["dateCPNS" => $dateCPNS])
                    ->with(["beneficiaire" => $beneficiaire])
                    ->with(["page" => $page]);
            }
        }
        return redirect()->back()->with(["error" => "Impossible de consulter la page"]);
    }

    /**
     * Liste des suivi de vaccination
     */

    public function getBeneficiaireVaccin()
    {
        $quartiers = Quartier::orderBy("libelle", "asc")->get();

        $langues = Langue::orderBy("libelle_langue", "asc")->get();

        // $VaccinNats = vacci_nature::orderBy("id_vacci_nat", "asc")->get();
        $VaccinNats = vacci_nature::all();
        return view("InnovHealth.Vaccin.index")->with(["page" => "dashboard"])->with(["quartiers" => $quartiers])->with(["langues" => $langues])->with(["VaccinNats" => $VaccinNats]);
    }

    public function listVaccinPTME($vaccinId)
    {
        // Retour des vaccin pour PTME sélectionné
        return vacci_type::where("id_vacci_nat", $vaccinId)->get(['code_vacci_typ', 'lib_vacci_typ', 'id_vacci_nat']);
    }

    public function getListeSuiviVaccination()
    {
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $grosseses = DB::select("select * from beneficiaires b left join migrations_beneficiaires m on b.id = m.beneficiaire_id where b.ajouterPar = " . auth()->user()->id . " or m.user_id =" . auth()->user()->id);
        $grossesesToSend = [];
        $i = 0;
        $nbMigration = 0;
        foreach ($grosseses as $grossese) {
            $vacci_type = DB::select("select * from vaccin_suivis where beneficiaire_id = " . $grossese->id);
            if ($vacci_type != null) {
                $grossesesToSend[$i]["id"] = $grossese->id;
                $grossesesToSend[$i]["code"] = $grossese->code;
                $grossesesToSend[$i]["num_carnet"] = $grossese->num_carnet;
                $grossesesToSend[$i]["telephone"] = $grossese->telephone;
                $grossesesToSend[$i]["dateAccouchement"] = date_format(date_create($grossese->dateAccouchement), "d M Y");
                $grossesesToSend[$i]["ageBebe"] = $grossese->ageBebe;
                $grossesesToSend[$i]["nomBebe"] = $grossese->nomBebe;
                $vaccinInfo = vacci_type::where("code_vacci_typ", $vacci_type[0]->code_vacci_typ)->get()[0]->lib_vacci_typ;
                if ($vaccinInfo != null)
                    $grossesesToSend[$i]["vaccin"] = $vaccinInfo;
                $grossesesToSend[$i]["dateprochain_vaccin"] = date_format(date_create($vacci_type[0]->dateprochain_vaccin), "d M Y");
                $i++;
            } else {
                $nbMigration++;
            }
        }
        $type_vaccin = Vacci_Type::orderBy("lib_vacci_typ", "asc")->get();
        return view("InnovHealth.Vaccin.liste")
            ->with(["grossesses" => $grossesesToSend])
            ->with(["VaccinNats" => $type_vaccin])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["nbMigration" => $nbMigration])
            ->with(["page" => "vaccin-en-cours"]);
    }

    public function getBeneficiaireMigrerPourVaccin()
    {
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $grosseses = DB::select("select * from beneficiaires b left join migrations_beneficiaires m on b.id = m.beneficiaire_id where b.ajouterPar = " . auth()->user()->id . " or m.user_id =" . auth()->user()->id);

        $grossesesToSend = [];
        $i = 0;
        $nbMigration = 0;
        foreach ($grosseses as $grossese) {
            $vacci_type = DB::select("select * from vaccin_suivis where beneficiaire_id = " . $grossese->id);
            if ($vacci_type == null) {
                $nbMigration++;
                $grossesesToSend[$i]["id"] = $grossese->id;
                $grossesesToSend[$i]["nom"] = $grossese->nom;
                $grossesesToSend[$i]["prenom"] = $grossese->prenom;
                $grossesesToSend[$i]["code"] = $grossese->code;
                $grossesesToSend[$i]["num_carnet"] = $grossese->num_carnet;
                $grossesesToSend[$i]["telephone"] = $grossese->telephone;
                $grossesesToSend[$i]["reshus"] = $grossese->reshus;
                $grossesesToSend[$i]["reshusConjoint"] = $grossese->conjoint_reshus;

            }
            $i++;
        }
        $type_vaccin = Vacci_Type::orderBy("lib_vacci_typ", "asc")->get();
        return view("InnovHealth.Vaccin.liste_benef_migrer")
            ->with(["grossesses" => $grossesesToSend])
            ->with(["VaccinNats" => $type_vaccin])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["nbMigration" => $nbMigration])
            ->with(["page" => "liste-benf-migres"]);
    }

    public function saveBeneficiaireMigrerPourVaccin(Request $request)
    {
        $benef = DB::table('beneficiaires')
            ->where('id', $request['id'])
            ->update(['dateAccouchement' => $request['dateAccouchement'], 'ageBebe' => $request['ageBebe'], 'nomBebe' => $request['nomBebe']]);
        $values = array('code_vacci_typ' => $request["typeVaccin"], 'dateprochain_vaccin' => $request['dateVaccin'], 'beneficiaire_id' => $request['id']);
        DB::table('vaccin_suivis')->insert($values);
        return redirect()->route("suivi-vaccination-en-cours")->with(["message" => "Un nouveau bénéficiaire attribué au service vaccination"]);
    }

    public function getListeSuiviVaccinationTerme()
    {
        $dateJour = new DateTime();
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $nbMigration = $this->getNombreMigrationVaccin();
        $grosseses = DB::select("select * from beneficiaires b left join migrations_beneficiaires m on b.id = m.beneficiaire_id left join vaccin_suivis v on b.id = v.beneficiaire_id where b.optionSuivi = 'Suivi vaccinal' and b.ajouterPar = " . auth()->user()->id . " or m.user_id =" . auth()->user()->id . " and v.datefin_vaccin is not null ");
        $grossesesToSend = [];
        $i = 0;
        foreach ($grosseses as $grossese) {
            if ($grossese->datefin_vaccin != null) {
                $grossesesToSend[$i] = $grossese;
            }
            $i++;
        }
        return view("InnovHealth.Vaccin.terme")
            ->with(["grossesses" => $grossesesToSend])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["nbMigration" => $nbMigration])
            ->with(["page" => "vaccin-a-terme"]);
    }

    public function fluxVaccination()
    {
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $benefs = DB::select("select * from beneficiaires b left join migrations_beneficiaires m on b.id = m.beneficiaire_id left join vaccin_suivis v on v.beneficiaire_id = b.id where b.ajouterPar = " . auth()->user()->id . " or m.user_id =" . auth()->user()->id);
        $nbPtmeN1 = 0;
        $nbPtmeN2 = 0;
        $nbPtmeN3 = 0;
        $nbPtmeN4 = 0;
        $nbPtmeN5 = 0;
        $nbPtmeN6 = 0;
        $nbPtmeO1 = 0;
        $nbPtmeO2 = 0;
        $nbPtmeO3 = 0;
        $nbPtmeO4 = 0;
        $nbPtmeO5 = 0;
        $nbPtmeO6 = 0;
        $nbPtmeO7 = 0;
        foreach ($benefs as $benef) {
            if ($benef->code_vacci_typ != null) {
                switch ($benef->code_vacci_typ) {
                    case 'PTME-N1':
                        $nbPtmeN1++;
                        break;
                    case 'PTME-N2':
                        $nbPtmeN2++;
                        break;
                    case 'PTME-N3':
                        $nbPtmeN3++;
                        break;
                    case 'PTME-N4':
                        $nbPtmeN4++;
                        break;
                    case 'PTME-N5':
                        $nbPtmeN5++;
                        break;
                    case 'PTME-N6':
                        $nbPtmeN6++;
                        break;
                    case 'PTME-O1':
                        $nbPtmeO1++;
                        break;
                    case 'PTME-O2':
                        $nbPtmeO2++;
                        break;
                    case 'PTME-O3':
                        $nbPtmeO3++;
                        break;
                    case 'PTME-O4':
                        $nbPtmeO4++;
                        break;
                    case 'PTME-O5':
                        $nbPtmeO5++;
                        break;
                    case 'PTME-O6':
                        $nbPtmeO6++;
                        break;
                    case 'PTME-O7':
                        $nbPtmeO7++;
                        break;
                }
            }
        }

        $chart = new FluxGrossesseDiagramme();

        $chart->labels(['PTME-N1', 'PTME-N2', 'PTME-N3', 'PTME-N4', 'PTME-N5', 'PTME-N6', 'PTME-O1', 'PTME-O2', 'PTME-O3', 'PTME-O4', 'PTME-O5', 'PTME-O6', 'PTME-O7']);
        $chart->dataset('Nombre de bénéficiaire total par CPN', 'bar', [$nbPtmeN1, $nbPtmeN2, $nbPtmeN3, $nbPtmeN4, $nbPtmeN5, $nbPtmeN6, $nbPtmeO1, $nbPtmeO2, $nbPtmeO3, $nbPtmeO4, $nbPtmeO5, $nbPtmeO6, $nbPtmeO7])->options(['color' => '#B71C1C']);

        /*$chartAjour->labels(['CPN1', 'CPN2', 'CPN3', 'CPN4', 'CPN5', 'CPN6', 'CPN7', 'CPN8']);
        $chartAjourDataSet = $chartAjour->dataset('Nombre de bénéficiaire à jour par CPN', 'bar', [$benefAJourCpn1, $benefAJourCpn2, $benefAJourCpn3, $benefAJourCpn4, $benefAJourCpn5, $benefAJourCpn6, $benefAJourCpn7, $benefAJourCpn8]);
        $chartAjourDataSet->backgroundColor(collect(['#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628']));
        $chartAjourDataSet->color(collect(['#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628']));*/

        $nbMigration = $this->getNombreMigrationVaccin();

        return view("InnovHealth.Vaccin.flux", compact('chart'))->with(["page" => "flux-vaccin"])->with(["formationSanitaire" => $formationSanitaire])->with(["nbMigration" => $nbMigration]);
    }

    public
    function getDetailSuiviVacination()
    {

        $page = "";
        if (isset($_GET)) {
            $ref = $_GET["ref"];
            $beneficiaire = Beneficiaire::where("id", $ref)->first();
            if ($beneficiaire != null) {
                $dateVaccinations = DateProbableVaccination::where("beneficiaire_id", $beneficiaire->id)->get();

                if ($_GET["page"] == "liste") {
                    $page = "vaccin-en-cours";
                } else {
                    $page = "vaccin-a-terme";
                }
                $nbMigration = $this->getNombreMigrationVaccin();
                return view("InnovHealth.Vaccin.detailVaccination")
                    ->with(["dateVaccinations" => $dateVaccinations])
                    ->with(["beneficiaire" => $beneficiaire])
                    ->with(["nbMigration" => $nbMigration])
                    ->with(["page" => $page]);
            }
        }
        return redirect()->back()->with(["error" => "Impossible de consulter la page"]);
    }

    /**
     * Function planning familial
     */
    public
    function getListeSuiviPlanningFAEnCour()
    {
        $dateJour = new DateTime();

        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $benefs = DB::select("select * from beneficiaires b left join migrations_beneficiaires m on b.id = m.beneficiaire_id left join suivi_planningFA s on b.id = s.beneficiaire_id where b.ajouterPar = " . auth()->user()->id . " or m.user_id = " . auth()->user()->id . " order by s.dateContraception desc");

        /*$benefs = DB::table('beneficiaires')
            ->where("optionSuivi", "Suivi PFA")
            ->where("ajouterPar", $user->id)
            ->join('suivi_planningFA', function ($join) {
                $join->on('beneficiaires.id', '=', 'suivi_planningFA.beneficiaire_id');
                //->where('vaccin_suivis.datefin_vaccin', '=', null);
            })->orderBy("suivi_planningFA.dateContraception", "desc")->get();*/

        $benefsToSend = [];
        $i = 0;
        foreach ($benefs as $benef) {
            if ($benef->dureeContraception == "3 mois") {
                $date = Carbon::parse($benef->dateContraception)->addMonths(3);
                if ($date > Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "6 mois") {
                $date = Carbon::parse($benef->dateContraception)->addMonths(6);
                if ($date > Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
            }
            if ($benef->dureeContraception == "2 ans") {
                $date = Carbon::parse($benef->dateContraception)->addYear(2);
                if ($date > Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "5 ans") {
                $date = Carbon::parse($benef->dateContraception)->addYear(5);
                if ($date > Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
        }
        $nbMigration = $this->getNombreMigrationPF();
        return view("InnovHealth.PlanningFA.liste")
            ->with(["benefs" => $benefsToSend])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["nbMigration" => $nbMigration])
            ->with(["page" => "planning-en-cours"]);
    }

    public
    function getListeSuiviPlanningFAATerme()
    {
        $dateJour = new DateTime();
        $benefs = DB::select("select * from beneficiaires b left join migrations_beneficiaires m on b.id = m.beneficiaire_id left join suivi_planningFA s on b.id = s.beneficiaire_id where b.optionSuivi = 'Suivi PFA' and b.ajouterPar = " . auth()->user()->id . " or m.user_id = " . auth()->user()->id . " order by s.dateContraception desc");

        /*$benefs = DB::table('beneficiaires')->where("optionSuivi", "Suivi PFA")->join('suivi_planningFA', function ($join) {
            $join->on('beneficiaires.id', '=', 'suivi_planningFA.beneficiaire_id');
            //->where('vaccin_suivis.datefin_vaccin', '=', null);
        })->orderBy("suivi_planningFA.dateContraception", "desc")->get();*/
        $benefsToSend = [];
        $i = 0;
        foreach ($benefs as $benef) {
            if ($benef->dureeContraception == "3 mois") {
                $date = Carbon::parse($benef->dateContraception)->addMonths(3);
                if ($date < Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "6 mois") {
                $date = Carbon::parse($benef->dateContraception)->addMonths(6);
                if ($date < Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "2 ans") {
                $date = Carbon::parse($benef->dateContraception)->addYear(2);
                if ($date < Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "5 ans") {
                $date = Carbon::parse($benef->dateContraception)->addYear(5);
                if ($date < Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
        }
        $nbMigration = $this->getNombreMigrationPF();
        return view("InnovHealth.PlanningFA.liste_A_terme")
            ->with(["benefs" => $benefsToSend])
            ->with(["nbMigration" => $nbMigration])
            ->with(["page" => "pf-a-terme"]);
    }

    public function getBeneficiaireMigrerPourPF()
    {
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $grosseses = DB::select("select * from beneficiaires b left join migrations_beneficiaires m on b.id = m.beneficiaire_id where b.ajouterPar = " . auth()->user()->id . " or m.user_id =" . auth()->user()->id);

        $grossesesToSend = [];
        $i = 0;
        $nbMigration = 0;
        foreach ($grosseses as $grossese) {
            $occurence = DB::select("select * from suivi_planningFA where beneficiaire_id = " . $grossese->id);
            if ($occurence == null) {
                $nbMigration++;
                $grossesesToSend[$i]["id"] = $grossese->id;
                $grossesesToSend[$i]["nom"] = $grossese->nom;
                $grossesesToSend[$i]["prenom"] = $grossese->prenom;
                $grossesesToSend[$i]["code"] = $grossese->code;
                $grossesesToSend[$i]["num_carnet"] = $grossese->num_carnet;
                $grossesesToSend[$i]["telephone"] = $grossese->telephone;
                $grossesesToSend[$i]["reshus"] = $grossese->reshus;
                $grossesesToSend[$i]["reshusConjoint"] = $grossese->conjoint_reshus;
            }
            $i++;
        }
        $plannings = Planning::orderBy("titre", "asc")->get();
        return view("InnovHealth.PlanningFA.liste_benef_migrer")
            ->with(["grossesses" => $grossesesToSend])
            ->with(["plannings" => $plannings])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["nbMigration" => $nbMigration])
            ->with(["page" => "liste-benf-migres-pf"]);
    }

    public function saveBeneficiaireMigrerPourPF(Request $request)
    {
        $values = array('dateContraception' => $request["datePF"], 'dureeContraception' => $request['dureePF'], 'planning_id' => $request['methode'], 'beneficiaire_id' => $request['id']);
        DB::table('suivi_planningFA')->insert($values);

        return redirect()->route("suivi-planning-familial")->with(["message" => "Un nouveau bénéficiaire attribué au service planing familial"]);

    }

    public function fluxPF()
    {
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $benefs = DB::select("select * from beneficiaires b left join migrations_beneficiaires m on b.id = m.beneficiaire_id left join suivi_planningFA s on s.beneficiaire_id = b.id where b.ajouterPar = " . auth()->user()->id . " or m.user_id =" . auth()->user()->id);
        $pf1 = 0;
        $pf2 = 0;
        $pf3 = 0;
        $pf4 = 0;
        $pf5 = 0;
        $pf6 = 0;
        $pf7 = 0;
        $pf8 = 0;
        $pf9 = 0;
        foreach ($benefs as $benef) {
            if ($benef->planning_id != null) {
                switch ($benef->planning_id) {
                    case 4:
                        $pf1++;
                        break;
                    case 8:
                        $pf2++;
                        break;
                    case 11:
                        $pf3++;
                        break;
                    case 15:
                        $pf4++;
                        break;
                    case 16:
                        $pf5++;
                        break;
                    case 17:
                        $pf6++;
                        break;
                    case 18:
                        $pf7++;
                        break;
                    case 19:
                        $pf8++;
                        break;
                    case 20:
                        $pf9++;
                        break;
                }
            }
        }

        $chart = new FluxGrossesseDiagramme();

        $chart->labels(['SP', 'P', 'DIU', 'CU', 'AS', 'MT', 'MGC', 'MJF', 'MAMA']);
        $chart->dataset('Nombre de bénéficiaire total par PF', 'bar', [$pf1, $pf2, $pf3, $pf4, $pf5, $pf6, $pf7, $pf8, $pf9])->options(['color' => '#B71C1C']);

        /*$chartAjour->labels(['CPN1', 'CPN2', 'CPN3', 'CPN4', 'CPN5', 'CPN6', 'CPN7', 'CPN8']);
        $chartAjourDataSet = $chartAjour->dataset('Nombre de bénéficiaire à jour par CPN', 'bar', [$benefAJourCpn1, $benefAJourCpn2, $benefAJourCpn3, $benefAJourCpn4, $benefAJourCpn5, $benefAJourCpn6, $benefAJourCpn7, $benefAJourCpn8]);
        $chartAjourDataSet->backgroundColor(collect(['#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628']));
        $chartAjourDataSet->color(collect(['#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628']));*/

        $nbMigration = $this->getNombreMigrationPF();

        return view("InnovHealth.PlanningFA.flux", compact('chart'))->with(["page" => "flux-pf"])->with(["formationSanitaire" => $formationSanitaire])->with(["nbMigration" => $nbMigration]);
    }

    /**
     * Rapport journalier d'envoie de SMS suivi grossesse
     */

    public
    function getRapportJournalierSuiviGrossesse()
    {

        $dateJour = new DateTime();
        $dateDebut = $dateJour->format("y-m-d") . " 00:00:00";
        $dateFin = $dateJour->format("y-m-d") . " 23:59:59";

        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();

        $rapports = RapportAlerteSms::where("type", "Suivi de grossesse")->where("created_at", ">=", $dateDebut)
            ->where("created_at", "<=", $dateFin)
            ->orderBy("id", "desc")->get();
        return view("InnovHealth.Grossesse.smsJournalier")
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "grossessese-journalier", "rapports" => $rapports]);
    }

    public
    function getRapportPeriodiqueSuiviGrossesse()
    {
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $rapports = RapportAlerteSms::where("type", "Suivi de grossesse")->orderBy("id", "desc")->get();
        return view("InnovHealth.Grossesse.smsPeriodique")
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "grossessese-periodique", "rapports" => $rapports]);
    }

    public
    function getDetailRapportSuiviGrossesse()
    {

        $page = "";
        if (isset($_GET)) {

            $rapportID = $_GET["ref"];

            $rapport = RapportAlerteSms::where("id", $rapportID)->first();

            if ($page == "journalier") {
                $page = "grossessese-journalier";
            } else {
                $page = "grossessese-periodique";
            }

            if ($rapport != null) {

                $details = RapportAlerteUser::where("rapport_alerte_sms_id", $rapport->id)->get();

                return view("InnovHealth.Grossesse.detailRapport")
                    ->with(["page" => $page, "details" => $details, "rapport" => $rapport]);
            }
            return redirect()->back()->with(["error" => "Impossible d'afficher le détail du rapport, référence corrumpue"]);
        }

        return redirect()->back()->with(["error" => "Impossible d'afficher le détail du rapport, référence corrumpue"]);
    }

    /**
     * Rapport journalier d'envoie de SMS suivi vaccination
     */

    public
    function getRapportJournalierSuiviVaccination()
    {

        $dateJour = new DateTime();
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $dateDebut = $dateJour->format("y-m-d") . " 00:00:00";
        $dateFin = $dateJour->format("y-m-d") . " 23:59:59";

        $rapports = RapportAlerteSms::where("type", "Suivi vaccination")->where("created_at", ">=", $dateDebut)
            ->where("created_at", "<=", $dateFin)
            ->orderBy("id", "desc")->get();
        return view("InnovHealth.Vaccin.smsJournalier")
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "vaccination-journalier", "rapports" => $rapports]);
    }

    public
    function getRapportPeriodiqueSuiviVaccination()
    {

        $rapports = RapportAlerteSms::where("type", "Suivi vaccination")->orderBy("id", "desc")->get();
        return view("InnovHealth.Vaccin.smsPeriodique")
            ->with(["page" => "vaccination-periodique", "rapports" => $rapports]);
    }

    public
    function getDetailRapportSuiviVaccination()
    {

        $page = "";
        if (isset($_GET)) {

            $rapportID = $_GET["ref"];

            $rapport = RapportAlerteSms::where("id", $rapportID)->first();

            if ($page == "journalier") {
                $page = "vaccination-journalier";
            } else {
                $page = "vaccination-periodique";
            }

            if ($rapport != null) {

                $details = RapportAlerteUser::where("rapport_alerte_sms_id", $rapport->id)->get();


                return view("InnovHealth.Vaccin.detailRapport")
                    ->with(["page" => $page, "details" => $details, "rapport" => $rapport]);
            }
            return redirect()->back()->with(["error" => "Impossible d'afficher le détail du rapport, référence corrumpue"]);
        }

        return redirect()->back()->with(["error" => "Impossible d'afficher le détail du rapport, référence corrumpue"]);
    }

    /**
     * Page d'envoie de sms femmes enceintes
     */

    public
    function getPageEnvoieSms()
    {
        $dateJour = new DateTime();
        $grosseses = Beneficiaire::where("optionSuivi", "Suivi de la grossesse")->where("dateFinSuivi", ">", $dateJour->format("Y-m-d"))->get();
        return view("InnovHealth.Grossesse.message")
            ->with(["grossesses" => $grosseses])
            ->with(["page" => "message-grossesse"]);
    }

    public
    function postMessageFemmeEnceinte(Request $request)
    {

        if (count($request["choix"]) == 0) {
            return redirect()->back()
                ->with(["error" => "Impossible de diffuser le message. Veuillez sélectionner les destinataires"])
                ->withInput();
        }

        $ids = $request["choix"];

        //Enrégistrement du message

        $message = new MessageGrossesse();
        $message->message = $request["message"];
        $message->user_id = Auth::user()->id;
        $message->save();

        $count = 0;
        $tokens = array();

        foreach ($ids as $id) {

            $beneficiaire = Beneficiaire::where("id", $id)->first();
            if ($beneficiaire != null) {

                //Récupérer l'le token de l'utilisateur s'il en a

                if ($beneficiaire->user_id != null) {
                    $tokens[] = NotifToken::where("user_id", $beneficiaire->user_id)->first()->token;
                }

                //   return "Impossible de message";
                $userNumber = preg_replace('/\s+/', '', substr($beneficiaire->telephone, 1));

                $client = new Client();
                //$res = $client->request('GET', "http://sms.supersmsgb.com:8080/sendsms?username=slu-majecticp&password=majestic&type=0&dlr=1&destination=".$userNumber."&source=eConvivial&message=".$request["message"]);

                //if($res->getStatusCode() == 200){
                //Enrégistrer la ligne ds MessageGrossesseUser
                $msgUser = new MessageGrossesseUser();
                $msgUser->recu = true;
                $msgUser->message_grossesse_id = $message->id;
                $msgUser->beneficiaire_id = $beneficiaire->id;
                $msgUser->save();
                $count++;
                /*}else{
                    return "Impossible d'envoyer";
                } */

                /**
                 * Enregistrement des notifications
                 */

                $notifMessage = new NotificationMessage();
                $notifMessage->message = $request["message"];
                $notifMessage->type = "Grossesse";
                $notifMessage->user_id = $beneficiaire->user_id;
                $notifMessage->save();
            }
        }

        // return json_encode($tokens);

        $message->delivrer = true;
        $message->nbreRecu = $count;
        $message->save();

        $notifToken = new NotifToken();

        $notifToken->sendNotificationToUser($tokens, "Alerte femmes enceintes", $request["message"]);

        return redirect()->route("liste-message-grossesse-diffuser")->with(["message" => "Message diffusé avec succès"]);
    }

    public
    function getListeMessageGrossesse()
    {
        $messages = MessageGrossesse::orderBy("id", "desc")->get();
        return view("InnovHealth.Grossesse.listeMessage")
            ->with(["messages" => $messages])
            ->with(["page" => "liste-message-grossesse"]);
    }

    public
    function detailMessageGrossesse()
    {
        if (isset($_GET)) {
            $ref = $_GET["ref"];
            $message = MessageGrossesse::where("id", $ref)->first();
            $beneficiaire = Beneficiaire::where("id", $message->beneficiaire_id)->first();
            // return json_encode($beneficiaire);
            if ($message != null) {
                $detailMessages = MessageGrossesseUser::where("message_grossesse_id", $message->id)->get();
                return view("InnovHealth.Grossesse.detailListeMessage")
                    ->with(["detailMessages" => $detailMessages])
                    ->with(["message" => $message])
                    ->with(["beneficiaire" => $beneficiaire])
                    ->with(["page" => "liste-message-grossesse"]);
            }
        }
        return redirect()->back()->with(["error" => "Impossible de consulter la liste des destinataires"]);
    }

    /**
     * Administrateur Formation Sanitaire
     */

    public
    function getAdminFSGrossesseEnCours()
    {
        $quartiers = Quartier::orderBy("libelle", "asc")->get();
        $langues = Langue::orderBy("libelle_langue", "asc")->get();
        $user = auth()->user();
        $typeCpn = $user->typeCpn;
        $users = DB::table("users")->where("type_user_id", '=', 12)->where("id", '<>', $user->id)->get();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $grosseses = [];
        $i = 0;
        $benefs = DB::select("select * from beneficiaires b inner join cpn_suivis c on b.id = c.beneficiaire_id where c.estFinis = 0");

        foreach ($benefs as $benef) {
            if ($benef->ajouterPar != 0) {
                $addedBy = User::where("id", $benef->ajouterPar)->first();
                if ($user->formation_sanitaire_id == $addedBy->formation_sanitaire_id && $benef->optionSuivi == "Suivi de la grossesse") {
                    $diff = $this->diff_in_week($benef->dateRegle);
                    if ($diff < 36) {
                        $benef->dureeGrossese = $diff;
                        $grosseses[$i] = $benef;
                        $i++;
                    }
                }
            }
        }
        return view("InnovHealth.Admin.Grossesse.en_cour")
            ->with(["grossesses" => $grosseses])
            ->with(["users" => $users])
            ->with(["quartiers" => $quartiers])
            ->with(["langues" => $langues])
            ->with(["typeCpn" => $typeCpn])
            ->with(["menu" => $user->type_user_id])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "admin-fs-grossesse-en-cours"]);
    }

    public
    function getAdminFSGrossesseATerme()
    {
        $quartiers = Quartier::orderBy("libelle", "asc")->get();
        $langues = Langue::orderBy("libelle_langue", "asc")->get();
        $user = auth()->user();
        $typeCpn = $user->typeCpn;
        $users = DB::table("users")->where("type_user_id", '=', 12)->where("id", '<>', $user->id)->get();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $grosseses = [];
        $i = 0;
        $benefs = DB::select("select * from beneficiaires ");

        foreach ($benefs as $benef) {
            if ($benef->ajouterPar != 0) {
                $addedBy = User::where("id", $benef->ajouterPar)->first();
                if ($user->formation_sanitaire_id == $addedBy->formation_sanitaire_id && $benef->optionSuivi == "Suivi de la grossesse") {
                    $diff = $this->diff_in_week($benef->dateRegle);
                    $cpn_suivis = cpn_suivi::where('beneficiaire_id', $benef->id)->first();
                    if ($cpn_suivis != null) {
                        if ($diff >= 36 || $cpn_suivis->estFinis) {
                            $benef->dureeGrossese = $diff;
                            $grosseses[$i] = $benef;
                            $i++;
                        }
                    }
                }
            }
        }
        return view("InnovHealth.Admin.Grossesse.en_terme")
            ->with(["grossesses" => $grosseses])
            ->with(["users" => $users])
            ->with(["quartiers" => $quartiers])
            ->with(["langues" => $langues])
            ->with(["typeCpn" => $typeCpn])
            ->with(["menu" => $user->type_user_id])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "admin-fs-grossesse-a-terme"]);
    }

    public
    function getAdminFSGrossesseFlux()
    {
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $benefTotalCpn1 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 1 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id);
        $benefTotalCpn2 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 2 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id);
        $benefTotalCpn3 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 3 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id);
        $benefTotalCpn4 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 4 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id);
        $benefTotalCpn5 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 5 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id);
        $benefTotalCpn6 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 6 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id);
        $benefTotalCpn7 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 7 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id);
        $benefTotalCpn8 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 8 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id);

        $benefAJourCpn1 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 1 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN > " . date("Y-m-d"));
        $benefAJourCpn2 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 2 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN > " . date("Y-m-d"));
        $benefAJourCpn3 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 3 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN > " . date("Y-m-d"));
        $benefAJourCpn4 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 4 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN > " . date("Y-m-d"));
        $benefAJourCpn5 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 5 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN > " . date("Y-m-d"));
        $benefAJourCpn6 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 6 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN > " . date("Y-m-d"));
        $benefAJourCpn7 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 7 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN > " . date("Y-m-d"));
        $benefAJourCpn8 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 8 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN > " . date("Y-m-d"));


        $benefNonJourCpn1 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 1 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN <= " . date("Y-m-d"));
        $benefNonJourCpn2 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 2 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN <= " . date("Y-m-d"));
        $benefNonJourCpn3 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 3 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN <= " . date("Y-m-d"));
        $benefNonJourCpn4 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 4 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN <= " . date("Y-m-d"));
        $benefNonJourCpn5 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 5 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN <= " . date("Y-m-d"));
        $benefNonJourCpn6 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 6 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN <= " . date("Y-m-d"));
        $benefNonJourCpn7 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 7 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN <= " . date("Y-m-d"));
        $benefNonJourCpn8 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id LEFT join users u on b.ajouterPar = u.id where c.nb_cpn = 8 and u.formation_sanitaire_id = " . $user->formation_sanitaire_id . " and c.dateProchaineCPN <= " . date("Y-m-d"));


        $chartTotal = new FluxGrossesseDiagramme();
        $chartAjour = new FluxGrossesseDiagramme();
        $chartNonAjour = new FluxGrossesseDiagramme();

        $chartTotal->labels(['CPN1', 'CPN2', 'CPN3', 'CPN4', 'CPN5', 'CPN6', 'CPN7', 'CPN8']);
        $chartTotal->dataset('Nombre de bénéficiaire total par CPN', 'bar', [$benefTotalCpn1[0]->nb, $benefTotalCpn2[0]->nb, $benefTotalCpn3[0]->nb, $benefTotalCpn4[0]->nb, $benefTotalCpn5[0]->nb, $benefTotalCpn6[0]->nb, $benefTotalCpn7[0]->nb, $benefTotalCpn8[0]->nb])->options(['color' => '#B71C1C']);
        $chartAjour->labels(['CPN1', 'CPN2', 'CPN3', 'CPN4', 'CPN5', 'CPN6', 'CPN7', 'CPN8']);
        $chartAjourDataSet = $chartAjour->dataset('Nombre de bénéficiaire à jour par CPN', 'bar', [$benefAJourCpn1[0]->nb, $benefAJourCpn2[0]->nb, $benefAJourCpn3[0]->nb, $benefAJourCpn4[0]->nb, $benefAJourCpn5[0]->nb, $benefAJourCpn6[0]->nb, $benefAJourCpn7[0]->nb, $benefAJourCpn8[0]->nb]);
        $chartAjourDataSet->backgroundColor(collect(['#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628']));
        $chartAjourDataSet->color(collect(['#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628']));
        $chartNonAjour->labels(['CPN1', 'CPN2', 'CPN3', 'CPN4', 'CPN5', 'CPN6', 'CPN7', 'CPN8']);
        $chartNonAjourDataSet = $chartNonAjour->dataset('Nombre de bénéficiaire non à jour par CPN', 'bar', [$benefNonJourCpn1[0]->nb, $benefNonJourCpn2[0]->nb, $benefNonJourCpn3[0]->nb, $benefNonJourCpn4[0]->nb, $benefNonJourCpn5[0]->nb, $benefNonJourCpn6[0]->nb, $benefNonJourCpn7[0]->nb, $benefNonJourCpn8[0]->nb]);
        $chartNonAjourDataSet->backgroundColor(collect(['#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c']));
        $chartNonAjourDataSet->color(collect(['#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c']));
        return view("InnovHealth.Admin.Grossesse.flux-grossesse", compact('chartTotal', 'chartAjour', 'chartNonAjour'))->with(["page" => "flux"])->with(["formationSanitaire" => $formationSanitaire]);
    }

    public
    function getAdminFSVaccinEnCours()
    {
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $grosseses = [];

        $benefs = DB::select("select b.id, b.code, b.num_carnet, b.telephone, b.dateAccouchement, b.ageBebe, b.nomBebe, v.code_vacci_typ, v.dateprochain_vaccin from beneficiaires b inner join vaccin_suivis v on b.id = v.beneficiaire_id left join users u on u.id = b.ajouterPar where v.datefin_vaccin is null and u.formation_sanitaire_id = " . $user->formation_sanitaire_id);

        $type_vaccin = Vacci_Type::orderBy("lib_vacci_typ", "asc")->get();

        return view("InnovHealth.Admin.Vaccin.en_cour")
            ->with(["grossesses" => $benefs])
            ->with(["VaccinNats" => $type_vaccin])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "admin-fs-vaccination-en-cours"]);
    }

    public
    function getAdminFSVaccinATerme()
    {
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $grosseses = [];

        $benefs = DB::select("select b.id, b.code, b.num_carnet, b.telephone, b.dateAccouchement, b.ageBebe, b.nomBebe, v.code_vacci_typ, v.dateprochain_vaccin from beneficiaires b inner join vaccin_suivis v on b.id = v.beneficiaire_id left join users u on u.id = b.ajouterPar where  v.datefin_vaccin is not null  and u.formation_sanitaire_id = " . $user->formation_sanitaire_id);

        $type_vaccin = Vacci_Type::orderBy("lib_vacci_typ", "asc")->get();

        return view("InnovHealth.Admin.Vaccin.en_terme")
            ->with(["grossesses" => $benefs])
            ->with(["VaccinNats" => $type_vaccin])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "admin-fs-vaccin-a-terme"]);
    }

    public function getAdminFSVaccinationFlux()
    {
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $benefs = DB::select("select v.code_vacci_typ from beneficiaires b inner join vaccin_suivis v on b.id = v.beneficiaire_id left join users u on u.id = b.ajouterPar where v.code_vacci_typ is not null and u.formation_sanitaire_id =" . $user->formation_sanitaire_id);
        $nbPtmeN1 = 0;
        $nbPtmeN2 = 0;
        $nbPtmeN3 = 0;
        $nbPtmeN4 = 0;
        $nbPtmeN5 = 0;
        $nbPtmeN6 = 0;
        $nbPtmeO1 = 0;
        $nbPtmeO2 = 0;
        $nbPtmeO3 = 0;
        $nbPtmeO4 = 0;
        $nbPtmeO5 = 0;
        $nbPtmeO6 = 0;
        $nbPtmeO7 = 0;
        foreach ($benefs as $benef) {
            if ($benef->code_vacci_typ != null) {
                switch ($benef->code_vacci_typ) {
                    case 'PTME-N1':
                        $nbPtmeN1++;
                        break;
                    case 'PTME-N2':
                        $nbPtmeN2++;
                        break;
                    case 'PTME-N3':
                        $nbPtmeN3++;
                        break;
                    case 'PTME-N4':
                        $nbPtmeN4++;
                        break;
                    case 'PTME-N5':
                        $nbPtmeN5++;
                        break;
                    case 'PTME-N6':
                        $nbPtmeN6++;
                        break;
                    case 'PTME-O1':
                        $nbPtmeO1++;
                        break;
                    case 'PTME-O2':
                        $nbPtmeO2++;
                        break;
                    case 'PTME-O3':
                        $nbPtmeO3++;
                        break;
                    case 'PTME-O4':
                        $nbPtmeO4++;
                        break;
                    case 'PTME-O5':
                        $nbPtmeO5++;
                        break;
                    case 'PTME-O6':
                        $nbPtmeO6++;
                        break;
                    case 'PTME-O7':
                        $nbPtmeO7++;
                        break;
                }
            }
        }

        $chart = new FluxGrossesseDiagramme();

        $chart->labels(['PTME-N1', 'PTME-N2', 'PTME-N3', 'PTME-N4', 'PTME-N5', 'PTME-N6', 'PTME-O1', 'PTME-O2', 'PTME-O3', 'PTME-O4', 'PTME-O5', 'PTME-O6', 'PTME-O7']);
        $chart->dataset('Nombre de bénéficiaire total par type de vaccin', 'bar', [$nbPtmeN1, $nbPtmeN2, $nbPtmeN3, $nbPtmeN4, $nbPtmeN5, $nbPtmeN6, $nbPtmeO1, $nbPtmeO2, $nbPtmeO3, $nbPtmeO4, $nbPtmeO5, $nbPtmeO6, $nbPtmeO7])->options(['color' => '#B71C1C']);

        return view("InnovHealth.Admin.Vaccin.flux", compact('chart'))->with(["page" => "admin-flux-vaccin"])->with(["formationSanitaire" => $formationSanitaire]);
    }

    public
    function getAdminFSPFEnCours()
    {
        $dateJour = new DateTime();

        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $benefs = DB::select("select * from beneficiaires b left join users u on u.id = b.ajouterPar left join suivi_planningFA s on b.id = s.beneficiaire_id where u.formation_sanitaire_id =" . $user->formation_sanitaire_id);

        $benefsToSend = [];
        $i = 0;
        foreach ($benefs as $benef) {
            if ($benef->dureeContraception == "3 mois") {
                $date = Carbon::parse($benef->dateContraception)->addMonths(3);
                if ($date > Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "6 mois") {
                $date = Carbon::parse($benef->dateContraception)->addMonths(6);
                if ($date > Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "2 ans") {
                $date = Carbon::parse($benef->dateContraception)->addYear(2);
                if ($date > Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "5 ans") {
                $date = Carbon::parse($benef->dateContraception)->addYear(5);
                if ($date > Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
        }
        return view("InnovHealth.Admin.PlanningFA.liste")
            ->with(["benefs" => $benefsToSend])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "admin-fs-pf-en-cours"]);
    }

    public
    function getAdminFSPFATerme()
    {
        $formationSanitaire = FormationSanitaire::where("id", auth()->user()->formation_sanitaire_id)->first();
        $benefs = DB::select("select * from beneficiaires b left join users u on u.id = b.ajouterPar left join suivi_planningFA s on b.id = s.beneficiaire_id where u.formation_sanitaire_id = " . auth()->user()->formation_sanitaire_id);

        $benefsToSend = [];
        $i = 0;

        foreach ($benefs as $benef) {
            if ($benef->dureeContraception == "3 mois") {
                $date = Carbon::parse($benef->dateContraception)->addMonths(3);
                if ($date < Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "6 mois") {
                $date = Carbon::parse($benef->dateContraception)->addMonths(6);
                if ($date < Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "2 ans") {
                $date = Carbon::parse($benef->dateContraception)->addYear(2);
                if ($date < Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "5 ans") {
                $date = Carbon::parse($benef->dateContraception)->addYear(5);
                if ($date < Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
        }

        return view("InnovHealth.Admin.PlanningFA.liste")
            ->with(["benefs" => $benefsToSend])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "admin-fs-pf-a-terme"]);
    }

    public function getAdminFSfluxPF()
    {
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $benefs = DB::select("select * from beneficiaires b left join migrations_beneficiaires m on b.id = m.beneficiaire_id left join suivi_planningFA s on s.beneficiaire_id = b.id left join users u on u.id = b.ajouterPar where u.formation_sanitaire_id =" . $user->formation_sanitaire_id);
        $pf1 = 0;
        $pf2 = 0;
        $pf3 = 0;
        $pf4 = 0;
        $pf5 = 0;
        $pf6 = 0;
        $pf7 = 0;
        $pf8 = 0;
        $pf9 = 0;
        foreach ($benefs as $benef) {
            if ($benef->planning_id != null) {
                switch ($benef->planning_id) {
                    case 4:
                        $pf1++;
                        break;
                    case 8:
                        $pf2++;
                        break;
                    case 11:
                        $pf3++;
                        break;
                    case 15:
                        $pf4++;
                        break;
                    case 16:
                        $pf5++;
                        break;
                    case 17:
                        $pf6++;
                        break;
                    case 18:
                        $pf7++;
                        break;
                    case 19:
                        $pf8++;
                        break;
                    case 20:
                        $pf9++;
                        break;
                }
            }
        }

        $chart = new FluxGrossesseDiagramme();

        $chart->labels(['SP', 'P', 'DIU', 'CU', 'AS', 'MT', 'MGC', 'MJF', 'MAMA']);
        $chart->dataset('Nombre de bénéficiaire total par PF', 'bar', [$pf1, $pf2, $pf3, $pf4, $pf5, $pf6, $pf7, $pf8, $pf9])->options(['color' => '#B71C1C']);

        /*$chartAjour->labels(['CPN1', 'CPN2', 'CPN3', 'CPN4', 'CPN5', 'CPN6', 'CPN7', 'CPN8']);
        $chartAjourDataSet = $chartAjour->dataset('Nombre de bénéficiaire à jour par CPN', 'bar', [$benefAJourCpn1, $benefAJourCpn2, $benefAJourCpn3, $benefAJourCpn4, $benefAJourCpn5, $benefAJourCpn6, $benefAJourCpn7, $benefAJourCpn8]);
        $chartAjourDataSet->backgroundColor(collect(['#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628']));
        $chartAjourDataSet->color(collect(['#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628']));*/

        $nbMigration = $this->getNombreMigrationPF();

        return view("InnovHealth.Admin.PlanningFA.flux", compact('chart'))->with(["page" => "admin-flux-pf"])->with(["formationSanitaire" => $formationSanitaire])->with(["nbMigration" => $nbMigration]);
    }

    /**
     * Administrateur Principal Formation Sanitaire
     */

    public function getFormulaireCreationFS()
    {
        $villes = Ville::orderBy("libelle", "asc")->get();
        $formations = FormationSanitaire::orderBy("libelle", "asc")->get();

        return view("InnovHealth.SuperAdmin.creer_formation_sanitaire")
            ->with(["villes" => $villes])
            ->with(["formations" => $formations])
            ->with(["page" => "super-admin-creer-formation-sanitaire"]);
    }

    public function creerFormationSanitaire(Request $request)
    {
        $ville = Ville::where("libelle", $request["ville"])->first();
        if ($ville == null) {
            return redirect()->back()->with(["error" => "Ville inexistante. Veuillez réessayer"]);
        }
        $formation = new FormationSanitaire();
        $formation->libelle = $request["formation"];
        $formation->lienLocalisation = $request["lienLocalisation"];
        $formation->service = $request["service"];
        $formation->contact = $request["contact"];
        $formation->pointFocal = $request["pointFocal"];
        $formation->frais = null;
        $formation->telephone = $request["telephone"];
        $formation->situationGeo = $request["situationGeo"];
        $formation->ville_id = $ville->id;
        $formation->save();
        return redirect()->back()->with(["message" => "Formation sanitaire enrégistrée  avec succès"]);
    }

    public function updateFormationSanitaire(Request $request)
    {

        $formation = FormationSanitaire::where("id", $request['id'])->first();
        if ($formation == null) {
            return redirect()->back()->with(["erreur" => "Une erreur s'est produite, impossible de modifier"]);
        }
        $ville = Ville::where("libelle", $request["ville"])->first();
        if ($ville == null) {
            return redirect()->back()->with(["erreur" => "Une erreur s'est produite, impossible de modifier"]);
        }

        $formation->libelle = $request["libelle"];
        $formation->ville_id = $ville->id;
        $formation->lienLocalisation = $request["lienLocalisation"];
        $formation->service = $request["service"];
        $formation->contact = $request["contact"];
        $formation->pointFocal = $request["pointFocal"];
        $formation->telephone = $request["telephone"];
        $formation->situationGeo = $request["situationGeo"];
        $formation->save();
        return redirect()->back()->with(["message" => "Modification apportées avec succès"]);
    }

    public function getFormulaireCreationResponsableSanitaire()
    {
        $users = DB::select("select * from users where type_user_id = 20 order by id desc");
        $formations = FormationSanitaire::get();
        return view("InnovHealth.SuperAdmin.creer_responsable_fs")
            ->with(["users" => $users])
            ->with(["formations" => $formations])
            ->with(["page" => "responsable-fs"]);
    }

    public function creerResponsableFS(Request $request)
    {
        if ($request["password"] != $request['confirmation']) {
            return redirect()->back()->with(["erreur" => "Veuillez confirmer le mot de passe"]);
        }

        $formation = FormationSanitaire::where("libelle", $request["formation"])->first();
        if ($formation == null) {
            return redirect()->back()->with(["error" => "Formation sanitaire inexistante"]);
        }

        $user = new User();
        $user->username = $request["username"];
        $user->email = $request["email"];
        $user->datenaissance = null;
        $user->sexe = null;
        $user->nationalite = null;
        $user->numero = $request["telephone"];
        $user->password = $request["password"];
        $user->type_user_id = 20;
        $user->formation_sanitaire_id = $formation->id;
        $user->activation = true;
        $user->typeCpn = null;

        $user->save();
        return redirect()->back()->with(["message" => "Responsable créé avec succès"]);
    }

    public function updateResponsableFS(Request $request)
    {
        $user = User::where("id", $request['id'])->first();
        $formation = FormationSanitaire::where("libelle", $request["formation"])->first();
        if ($formation == null) {
            return redirect()->back()->with(["error" => "Formation sanitaire inexistante"]);
        }

        if ($request['confirmation'] != null || $request['password'] != null) {

            if ($request["password"] != $request['confirmation']) {
                return redirect()->route("super-admin-formation-sanitaire-get-responsable-fs")->with(["error" => "Les mots de passe à modifier ne sont pas les même"]);
            }

            $user->password = $request["password"];
        }

        $user->username = $request["username"];
        $user->email = $request["email"];
        $user->numero = $request["telephone"];
        $user->formation_sanitaire_id = $formation->id;
        $user->save();

        return redirect()->route("super-admin-formation-sanitaire-get-responsable-fs")->with(["message" => "Responsable mise à jour avec succès"]);
    }

    public function getFormulaireCreationPrestataire()
    {
        $users = DB::select("select * from users where type_user_id in (12,18,19) order by id desc");
        $formations = FormationSanitaire::get();
        return view("InnovHealth.SuperAdmin.creer_prestataire")
            ->with(["users" => $users])
            ->with(["formations" => $formations])
            ->with(["page" => "prestataire-fs"]);
    }

    public function creerPrestataire(Request $request)
    {
        $typeUser = TypeUser::where("libelle", "=", $request["typeAdmin"])->first();
        if ($request["password"] != $request['confirmation']) {
            return redirect()->back()->with(["erreur" => "Veuillez confirmer votre mot de passe"]);
        }

        $formation = FormationSanitaire::where("libelle", $request["formation"])->first();
        if ($formation == null) {
            return redirect()->back()->with(["error" => "Formation sanitaire inexistante"]);
        }

        $user = new User();
        $user->username = $request["username"];
        $user->email = $request["email"];
        $user->datenaissance = null;
        $user->sexe = null;
        $user->nationalite = null;
        $user->numero = $request["telephone"];
        $user->password = $request["password"];
        $user->type_user_id = $typeUser->id;
        $user->formation_sanitaire_id = $formation->id;
        $user->activation = true;
        if ($request["typeAdmin"] == "Femmes Enceintes") {
            //$user->typeCpn = $request["typeCPN"];
            $user->typeCpn = 8;
        }

        $user->save();
        return redirect()->back()->with(["message" => "Administrateur  créer avec succès"]);
    }

    public function updatePrestataireFS(Request $request)
    {
        $user = User::where("id", $request['id'])->first();
        $formation = FormationSanitaire::where("libelle", $request["formation"])->first();
        $typeUser = TypeUser::where("libelle", "=", $request["typeAdmin"])->first();
        if ($formation == null) {
            return redirect()->back()->with(["error" => "Formation sanitaire inexistante"]);
        }

        if ($request['confirmation'] != null || $request['password'] != null) {

            if ($request["password"] != $request['confirmation']) {
                return redirect()->route("super-admin-formation-sanitaire-get-prestataire-fs")->with(["error" => "Les mots de passe à modifier ne sont pas les même"]);
            }
            $user->password = $request["password"];
        }

        $user->username = $request["username"];
        $user->email = $request["email"];
        $user->numero = $request["telephone"];
        $user->type_user_id = $typeUser->id;
        $user->formation_sanitaire_id = $formation->id;
        $user->save();

        return redirect()->route("super-admin-formation-sanitaire-get-prestataire-fs")->with(["message" => "Responsable mise à jour avec succès"]);
    }

    public function getListeGrossessesEncours()
    {
        $quartiers = Quartier::orderBy("libelle", "asc")->get();
        $langues = Langue::orderBy("libelle_langue", "asc")->get();
        $user = auth()->user();
        $typeCpn = $user->typeCpn;
        $users = DB::table("users")->where("type_user_id", '=', 12)->where("id", '<>', $user->id)->get();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $grosseses = [];
        $i = 0;
        $benefs = DB::select("select * from beneficiaires b inner join cpn_suivis c on b.id = c.beneficiaire_id where optionSuivi = 'Suivi de la grossesse' and c.estFinis = 0");

        foreach ($benefs as $benef) {
            $diff = $this->diff_in_week($benef->dateRegle);
            if ($diff < 36) {
                $benef->dureeGrossese = $diff;
                $grosseses[$i] = $benef;
                $i++;
            }
        }
        return view("InnovHealth.SuperAdmin.liste_grossesses_en_cours")
            ->with(["grossesses" => $grosseses])
            ->with(["users" => $users])
            ->with(["quartiers" => $quartiers])
            ->with(["langues" => $langues])
            ->with(["menu" => $user->type_user_id])
            ->with(["typeCpn" => $typeCpn])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "admin-principal-fs-grossesse-en-cours"]);
    }

    public function getListeGrossessesATerme()
    {
        $quartiers = Quartier::orderBy("libelle", "asc")->get();
        $langues = Langue::orderBy("libelle_langue", "asc")->get();
        $user = auth()->user();
        $typeCpn = $user->typeCpn;
        $users = DB::table("users")->where("type_user_id", '=', 12)->where("id", '<>', $user->id)->get();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $grosseses = [];
        $i = 0;
        $benefs = DB::select("select * from beneficiaires b inner join cpn_suivis c on b.id = c.beneficiaire_id where optionSuivi = 'Suivi de la grossesse' and c.estFinis = 1");

        return view("InnovHealth.SuperAdmin.liste_grossesses_en_cours")
            ->with(["grossesses" => $benefs])
            ->with(["users" => $users])
            ->with(["quartiers" => $quartiers])
            ->with(["langues" => $langues])
            ->with(["typeCpn" => $typeCpn])
            ->with(["menu" => $user->type_user_id])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "admin-principal-fs-grossesse-a-terme"]);
    }

    public function getListeGrossessesTransfert()
    {
        $quartiers = Quartier::orderBy("libelle", "asc")->get();
        $langues = Langue::orderBy("libelle_langue", "asc")->get();
        $user = auth()->user();
        $typeCpn = $user->typeCpn;
        $users = DB::table("users")->where("type_user_id", '=', 12)->where("id", '<>', $user->id)->get();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $grosseses = [];
        $i = 0;
        $benefs = DB::select("select * from beneficiaires b inner join historique_transferts h on b.id = h.beneficiaire_id");

        foreach ($benefs as $benef) {
            $tranfert_de = DB::select("SELECT f.libelle from users u inner join formation_sanitaires f on u.formation_sanitaire_id=f.id where u.id = " . $benef->transfert_de)[0];
            $tranfert_vers = DB::select("SELECT f.libelle from users u inner join formation_sanitaires f on u.formation_sanitaire_id=f.id where u.id = " . $benef->transfert_vers)[0];
            $grosseses[$i]['id'] = $benef->id;
            $grosseses[$i]['code'] = $benef->code;
            $grosseses[$i]['num_carnet'] = $benef->num_carnet;
            $grosseses[$i]['tranfert_de'] = $tranfert_de->libelle;
            $grosseses[$i]['tranfert_vers'] = $tranfert_vers->libelle;
            $i++;
        }
        return view("InnovHealth.SuperAdmin.historique_transfert_pour_grossesses")
            ->with(["grossesses" => $grosseses])
            ->with(["users" => $users])
            ->with(["quartiers" => $quartiers])
            ->with(["langues" => $langues])
            ->with(["typeCpn" => $typeCpn])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "admin-principal-fs-grossesse-ht"]);
    }

    public function getListeVaccinationEncours()
    {
        $quartiers = Quartier::orderBy("libelle", "asc")->get();
        $langues = Langue::orderBy("libelle_langue", "asc")->get();
        $user = auth()->user();
        $typeCpn = $user->typeCpn;
        $users = DB::table("users")->where("type_user_id", '=', 12)->where("id", '<>', $user->id)->get();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $grossesesToSend = [];
        $i = 0;
        $benefs = DB::select("select * from beneficiaires b inner join vaccin_suivis v on b.id = v.beneficiaire_id where v.datefin_vaccin is null");

        foreach ($benefs as $benef) {
            $vacci_type = DB::select("select * from vaccin_suivis where beneficiaire_id = " . $benef->id);
            if ($vacci_type != null) {
                $grossesesToSend[$i]["id"] = $benef->id;
                $grossesesToSend[$i]["code"] = $benef->code;
                $grossesesToSend[$i]["num_carnet"] = $benef->num_carnet;
                $grossesesToSend[$i]["telephone"] = $benef->telephone;
                $grossesesToSend[$i]["dateAccouchement"] = date_format(date_create($benef->dateAccouchement), "d M Y");
                $grossesesToSend[$i]["ageBebe"] = $benef->ageBebe;
                $grossesesToSend[$i]["nomBebe"] = $benef->nomBebe;
                $vaccinInfo = vacci_type::where("code_vacci_typ", $vacci_type[0]->code_vacci_typ)->get()[0]->lib_vacci_typ;
                if ($vaccinInfo != null)
                    $grossesesToSend[$i]["vaccin"] = $vaccinInfo;
                $grossesesToSend[$i]["dateprochain_vaccin"] = date_format(date_create($vacci_type[0]->dateprochain_vaccin), "d M Y");
                $i++;
            } else {
                $nbMigration++;
            }
        }

        return view("InnovHealth.SuperAdmin.liste_vaccination")
            ->with(["grossesses" => $grossesesToSend])
            ->with(["users" => $users])
            ->with(["quartiers" => $quartiers])
            ->with(["langues" => $langues])
            ->with(["typeCpn" => $typeCpn])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "admin-principal-fs-vaccination-en-cours"]);
    }

    public function getListeVaccinationATerme()
    {
        $quartiers = Quartier::orderBy("libelle", "asc")->get();
        $langues = Langue::orderBy("libelle_langue", "asc")->get();
        $user = auth()->user();
        $typeCpn = $user->typeCpn;
        $users = DB::table("users")->where("type_user_id", '=', 12)->where("id", '<>', $user->id)->get();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $grosseses = [];
        $i = 0;
        $benefs = DB::select("select * from beneficiaires b inner join vaccin_suivis v on b.id = v.beneficiaire_id where v.datefin_vaccin is not null");

        return view("InnovHealth.SuperAdmin.liste_vaccination")
            ->with(["grossesses" => $benefs])
            ->with(["users" => $users])
            ->with(["quartiers" => $quartiers])
            ->with(["langues" => $langues])
            ->with(["typeCpn" => $typeCpn])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "admin-principal-fs-vaccination-a-terme"]);
    }

    public function getListeVaccinationTransfert()
    {
        $quartiers = Quartier::orderBy("libelle", "asc")->get();
        $langues = Langue::orderBy("libelle_langue", "asc")->get();
        $user = auth()->user();
        $typeCpn = $user->typeCpn;
        $users = DB::table("users")->where("type_user_id", '=', 12)->where("id", '<>', $user->id)->get();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $grosseses = [];
        $i = 0;
        $benefs = DB::select("select * from beneficiaires b inner join historique_transferts h on b.id = h.beneficiaire_id");

        foreach ($benefs as $benef) {
            $tranfert_de = DB::select("SELECT f.libelle from users u inner join formation_sanitaires f on u.formation_sanitaire_id=f.id where u.id = " . $benef->transfert_de)[0];
            $tranfert_vers = DB::select("SELECT f.libelle from users u inner join formation_sanitaires f on u.formation_sanitaire_id=f.id where u.id = " . $benef->transfert_vers)[0];
            $grosseses[$i]['id'] = $benef->id;
            $grosseses[$i]['code'] = $benef->code;
            $grosseses[$i]['num_carnet'] = $benef->num_carnet;
            $grosseses[$i]['tranfert_de'] = $tranfert_de->libelle;
            $grosseses[$i]['tranfert_vers'] = $tranfert_vers->libelle;
            $i++;
        }
        return view("InnovHealth.SuperAdmin.historique_transfert_pour_grossesses")
            ->with(["grossesses" => $grosseses])
            ->with(["users" => $users])
            ->with(["quartiers" => $quartiers])
            ->with(["langues" => $langues])
            ->with(["typeCpn" => $typeCpn])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["page" => "admin-principal-fs-grossesse-ht"]);
    }

    public
    function getListePlanningFAEnCour()
    {
        $dateJour = new DateTime();

        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $benefs = DB::select("select * from beneficiaires b inner join suivi_planningFA s on b.id = s.beneficiaire_id ");

        $benefsToSend = [];
        $i = 0;
        foreach ($benefs as $benef) {
            if ($benef->dureeContraception == "3 mois") {
                $date = Carbon::parse($benef->dateContraception)->addMonths(3);
                if ($date > Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "6 mois") {
                $date = Carbon::parse($benef->dateContraception)->addMonths(6);
                if ($date > Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
            }
            if ($benef->dureeContraception == "2 ans") {
                $date = Carbon::parse($benef->dateContraception)->addYear(2);
                if ($date > Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "5 ans") {
                $date = Carbon::parse($benef->dateContraception)->addYear(5);
                if ($date > Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
        }
        $nbMigration = $this->getNombreMigrationPF();
        return view("InnovHealth.SuperAdmin.liste_pf")
            ->with(["benefs" => $benefsToSend])
            ->with(["formationSanitaire" => $formationSanitaire])
            ->with(["nbMigration" => $nbMigration])
            ->with(["page" => "admin-principal-fs-pf-ec"]);
    }

    public
    function getListePlanningFAATerme()
    {
        $benefs = DB::select("select * from beneficiaires b inner join suivi_planningFA s on b.id = s.beneficiaire_id ");
        $benefs = DB::select("select * from beneficiaires b left join migrations_beneficiaires m on b.id = m.beneficiaire_id left join suivi_planningFA s on b.id = s.beneficiaire_id where b.optionSuivi = 'Suivi PFA' and b.ajouterPar = " . auth()->user()->id . " or m.user_id = " . auth()->user()->id . " order by s.dateContraception desc");

        $benefsToSend = [];
        $i = 0;
        foreach ($benefs as $benef) {
            if ($benef->dureeContraception == "3 mois") {
                $date = Carbon::parse($benef->dateContraception)->addMonths(3);
                if ($date < Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "6 mois") {
                $date = Carbon::parse($benef->dateContraception)->addMonths(6);
                if ($date < Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "2 ans") {
                $date = Carbon::parse($benef->dateContraception)->addYear(2);
                if ($date < Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
            if ($benef->dureeContraception == "5 ans") {
                $date = Carbon::parse($benef->dateContraception)->addYear(5);
                if ($date < Carbon::now()) {
                    $benefsToSend[$i] = $benef;
                }
                $i++;
            }
        }
        $nbMigration = $this->getNombreMigrationPF();
        return view("InnovHealth.SuperAdmin.liste_pf")
            ->with(["benefs" => $benefsToSend])
            ->with(["nbMigration" => $nbMigration])
            ->with(["page" => "admin-principal-fs-pf-at"]);
    }

    public
    function getSuperAdminFSGrossesseFlux()
    {
        $user = auth()->user();
        $benefTotalCpn1 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 1");
        $benefTotalCpn2 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 2 ");
        $benefTotalCpn3 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 3");
        $benefTotalCpn4 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 4");
        $benefTotalCpn5 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 5");
        $benefTotalCpn6 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 6");
        $benefTotalCpn7 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 7");
        $benefTotalCpn8 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 8");

        $benefAJourCpn1 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 1 and c.dateProchaineCPN > " . date("Y-m-d"));
        $benefAJourCpn2 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 2 and c.dateProchaineCPN > " . date("Y-m-d"));
        $benefAJourCpn3 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 3 and c.dateProchaineCPN > " . date("Y-m-d"));
        $benefAJourCpn4 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 4 and c.dateProchaineCPN > " . date("Y-m-d"));
        $benefAJourCpn5 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 5 and c.dateProchaineCPN > " . date("Y-m-d"));
        $benefAJourCpn6 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 6 and c.dateProchaineCPN > " . date("Y-m-d"));
        $benefAJourCpn7 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 7 and c.dateProchaineCPN > " . date("Y-m-d"));
        $benefAJourCpn8 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 8 and c.dateProchaineCPN > " . date("Y-m-d"));


        $benefNonJourCpn1 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 1 and c.dateProchaineCPN <= " . date("Y-m-d"));
        $benefNonJourCpn2 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 2 and c.dateProchaineCPN <= " . date("Y-m-d"));
        $benefNonJourCpn3 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 3 and c.dateProchaineCPN <= " . date("Y-m-d"));
        $benefNonJourCpn4 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 4 and c.dateProchaineCPN <= " . date("Y-m-d"));
        $benefNonJourCpn5 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 5 and c.dateProchaineCPN <= " . date("Y-m-d"));
        $benefNonJourCpn6 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 6 and c.dateProchaineCPN <= " . date("Y-m-d"));
        $benefNonJourCpn7 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 7 and c.dateProchaineCPN <= " . date("Y-m-d"));
        $benefNonJourCpn8 = DB::select("select count(*) as nb from beneficiaires b left join cpn_suivis c on b.id = c.beneficiaire_id where c.nb_cpn = 8 and c.dateProchaineCPN <= " . date("Y-m-d"));


        $chartTotal = new FluxGrossesseDiagramme();
        $chartAjour = new FluxGrossesseDiagramme();
        $chartNonAjour = new FluxGrossesseDiagramme();

        $chartTotal->labels(['CPN1', 'CPN2', 'CPN3', 'CPN4', 'CPN5', 'CPN6', 'CPN7', 'CPN8']);
        $chartTotal->dataset('Nombre de bénéficiaire total par CPN', 'bar', [$benefTotalCpn1[0]->nb, $benefTotalCpn2[0]->nb, $benefTotalCpn3[0]->nb, $benefTotalCpn4[0]->nb, $benefTotalCpn5[0]->nb, $benefTotalCpn6[0]->nb, $benefTotalCpn7[0]->nb, $benefTotalCpn8[0]->nb])->options(['color' => '#B71C1C']);
        $chartAjour->labels(['CPN1', 'CPN2', 'CPN3', 'CPN4', 'CPN5', 'CPN6', 'CPN7', 'CPN8']);
        $chartAjourDataSet = $chartAjour->dataset('Nombre de bénéficiaire à jour par CPN', 'bar', [$benefAJourCpn1[0]->nb, $benefAJourCpn2[0]->nb, $benefAJourCpn3[0]->nb, $benefAJourCpn4[0]->nb, $benefAJourCpn5[0]->nb, $benefAJourCpn6[0]->nb, $benefAJourCpn7[0]->nb, $benefAJourCpn8[0]->nb]);
        $chartAjourDataSet->backgroundColor(collect(['#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628']));
        $chartAjourDataSet->color(collect(['#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628']));
        $chartNonAjour->labels(['CPN1', 'CPN2', 'CPN3', 'CPN4', 'CPN5', 'CPN6', 'CPN7', 'CPN8']);
        $chartNonAjourDataSet = $chartNonAjour->dataset('Nombre de bénéficiaire non à jour par CPN', 'bar', [$benefNonJourCpn1[0]->nb, $benefNonJourCpn2[0]->nb, $benefNonJourCpn3[0]->nb, $benefNonJourCpn4[0]->nb, $benefNonJourCpn5[0]->nb, $benefNonJourCpn6[0]->nb, $benefNonJourCpn7[0]->nb, $benefNonJourCpn8[0]->nb]);
        $chartNonAjourDataSet->backgroundColor(collect(['#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c']));
        $chartNonAjourDataSet->color(collect(['#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c', '#ff4c4c']));
        return view("InnovHealth.SuperAdmin.super_admin_flux_grossesse", compact('chartTotal', 'chartAjour', 'chartNonAjour'))->with(["page" => "flux-grossesse"]);
    }

    public function getSuperAdminFSVaccinationFlux()
    {
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $benefs = DB::select("select v.code_vacci_typ from beneficiaires b inner join vaccin_suivis v on b.id = v.beneficiaire_id where v.code_vacci_typ is not null");
        $nbPtmeN1 = 0;
        $nbPtmeN2 = 0;
        $nbPtmeN3 = 0;
        $nbPtmeN4 = 0;
        $nbPtmeN5 = 0;
        $nbPtmeN6 = 0;
        $nbPtmeO1 = 0;
        $nbPtmeO2 = 0;
        $nbPtmeO3 = 0;
        $nbPtmeO4 = 0;
        $nbPtmeO5 = 0;
        $nbPtmeO6 = 0;
        $nbPtmeO7 = 0;
        foreach ($benefs as $benef) {
            if ($benef->code_vacci_typ != null) {
                switch ($benef->code_vacci_typ) {
                    case 'PTME-N1':
                        $nbPtmeN1++;
                        break;
                    case 'PTME-N2':
                        $nbPtmeN2++;
                        break;
                    case 'PTME-N3':
                        $nbPtmeN3++;
                        break;
                    case 'PTME-N4':
                        $nbPtmeN4++;
                        break;
                    case 'PTME-N5':
                        $nbPtmeN5++;
                        break;
                    case 'PTME-N6':
                        $nbPtmeN6++;
                        break;
                    case 'PTME-O1':
                        $nbPtmeO1++;
                        break;
                    case 'PTME-O2':
                        $nbPtmeO2++;
                        break;
                    case 'PTME-O3':
                        $nbPtmeO3++;
                        break;
                    case 'PTME-O4':
                        $nbPtmeO4++;
                        break;
                    case 'PTME-O5':
                        $nbPtmeO5++;
                        break;
                    case 'PTME-O6':
                        $nbPtmeO6++;
                        break;
                    case 'PTME-O7':
                        $nbPtmeO7++;
                        break;
                }
            }
        }

        $chart = new FluxGrossesseDiagramme();

        $chart->labels(['PTME-N1', 'PTME-N2', 'PTME-N3', 'PTME-N4', 'PTME-N5', 'PTME-N6', 'PTME-O1', 'PTME-O2', 'PTME-O3', 'PTME-O4', 'PTME-O5', 'PTME-O6', 'PTME-O7']);
        $chart->dataset('Nombre de bénéficiaire total par type de vaccin', 'bar', [$nbPtmeN1, $nbPtmeN2, $nbPtmeN3, $nbPtmeN4, $nbPtmeN5, $nbPtmeN6, $nbPtmeO1, $nbPtmeO2, $nbPtmeO3, $nbPtmeO4, $nbPtmeO5, $nbPtmeO6, $nbPtmeO7])->options(['color' => '#B71C1C']);

        return view("InnovHealth.SuperAdmin.super_admin_flux_vaccination", compact('chart'))->with(["page" => "admin-flux-vaccin"])->with(["formationSanitaire" => $formationSanitaire]);
    }


    public function getSuperAdminFSfluxPF()
    {
        $user = auth()->user();
        $formationSanitaire = FormationSanitaire::where("id", $user->formation_sanitaire_id)->first();
        $benefs = DB::select("select * from beneficiaires b left join migrations_beneficiaires m on b.id = m.beneficiaire_id left join suivi_planningFA s on s.beneficiaire_id = b.id ");
        $pf1 = 0;
        $pf2 = 0;
        $pf3 = 0;
        $pf4 = 0;
        $pf5 = 0;
        $pf6 = 0;
        $pf7 = 0;
        $pf8 = 0;
        $pf9 = 0;
        foreach ($benefs as $benef) {
            if ($benef->planning_id != null) {
                switch ($benef->planning_id) {
                    case 4:
                        $pf1++;
                        break;
                    case 8:
                        $pf2++;
                        break;
                    case 11:
                        $pf3++;
                        break;
                    case 15:
                        $pf4++;
                        break;
                    case 16:
                        $pf5++;
                        break;
                    case 17:
                        $pf6++;
                        break;
                    case 18:
                        $pf7++;
                        break;
                    case 19:
                        $pf8++;
                        break;
                    case 20:
                        $pf9++;
                        break;
                }
            }
        }

        $chart = new FluxGrossesseDiagramme();

        $chart->labels(['SP', 'P', 'DIU', 'CU', 'AS', 'MT', 'MGC', 'MJF', 'MAMA']);
        $chart->dataset('Nombre de bénéficiaire total par PF', 'bar', [$pf1, $pf2, $pf3, $pf4, $pf5, $pf6, $pf7, $pf8, $pf9])->options(['color' => '#B71C1C']);

        /*$chartAjour->labels(['CPN1', 'CPN2', 'CPN3', 'CPN4', 'CPN5', 'CPN6', 'CPN7', 'CPN8']);
        $chartAjourDataSet = $chartAjour->dataset('Nombre de bénéficiaire à jour par CPN', 'bar', [$benefAJourCpn1, $benefAJourCpn2, $benefAJourCpn3, $benefAJourCpn4, $benefAJourCpn5, $benefAJourCpn6, $benefAJourCpn7, $benefAJourCpn8]);
        $chartAjourDataSet->backgroundColor(collect(['#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628']));
        $chartAjourDataSet->color(collect(['#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628', '#78a628']));*/

        $nbMigration = $this->getNombreMigrationPF();

        return view("InnovHealth.SuperAdmin.super_admin_flux_pf", compact('chart'))->with(["page" => "flux-pf"])->with(["formationSanitaire" => $formationSanitaire])->with(["nbMigration" => $nbMigration]);
    }

}
