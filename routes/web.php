<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichinsertUser
| contains the "web" middleware group. Now create something great!
|
*/
/*
*	ici la route

Route::get('/postWebRequestAssistanceEnLigne', [
	'uses' => 'WebRequestController@presenceArriver',
	'as' => 'postWebRequestAssistanceEnLigne', ]);
	*/

//liste des  utilisateurs-assistes
Route::get('/getWebRequestListeUser', [
    'uses' => 'WebRequestController@getListeUserMobile',
    'as' => 'getWebRequestListeUser',]);


Route::get('/notifTest', ['uses' => 'NotifController@index', 'as' => 'notifTest']);

Route::get('/save-notif-token', ['uses' => 'NotifController@saveTokenInDataBase', 'as' => 'save-notif-token']);

Route::post('/send-notification', ['uses' => 'NotifController@postSendNotification', 'as' => 'send-notification']);

Route::get('/soiree-rose-bleue', ['uses' => 'AgendaController@getRoseBleuePage'])->name('soiree-rose-bleue');

Route::post('/inscription-rose-bleue', ['uses' => 'AgendaController@sendInscriptionRoseBleue', 'as' => 'inscription-rose-bleue']);

Route::get('/politiques-confidentialites', ['uses' => 'MainController@politique'])->name('politiques-confidentialites');

Route::get('/', ['uses' => 'MainController@getNewVitrine'])->name('accueil');

Route::get('/page-introuvable', ['uses' => 'AccountController@introuvable', 'as' => 'page-introuvable']);

Route::get('/error', ['uses' => 'AccountController@error', 'as' => 'error']);

Route::get('/conseilspratiques', ['uses' => 'MainController@conseilPratique', 'as' => 'conseils']);

Route::get('/activite-econvivial', ['uses' => 'MainController@activiteeConvivial', 'as' => 'activites']);

Route::get('/detailActivite', ['uses' => 'MainController@detailActivite', 'as' => 'detailActivite']);

Route::get('/politiques-confidentialites', ['uses' => 'MainController@politique'])->name('politiques-confidentialites');

Route::get('/contact', ['uses' => 'MainController@getContact', 'as' => 'contact']);

Route::get('/web-tv', ['uses' => 'MainController@getWebTv', 'as' => 'web-tv']);

Route::get('/consultation', ['uses' => 'MainController@getNewConsultation', 'as' => 'consultation']);

Route::get('/suiviGrossesse', ['uses' => 'MainController@getNewSuiviGrossesse', 'as' => 'suiviGrossesse']);

Route::get('/planning-familial', ['uses' => 'MainController@getPlanningFamilial', 'as' => 'planning-familial']);

Route::get('/assistance-en-ligne', ['uses' => 'MainController@getAssistanceLigne', 'as' => 'assistance-en-ligne']);

Route::get('/agenda', ['uses' => 'MainController@agenda', 'as' => 'agenda']);

Route::get('/detailAgenda', ['uses' => 'MainController@detailAgenda', 'as' => 'detailAgenda']);

Route::get('/jeux', ['uses' => 'AssistanceLigneController@jeux', 'as' => 'jeux']);

// Route::get('/inscription', ["uses" => "AssistanceLigneController@inscription", "as" => "inscription"]);

Route::get('/suivi-cycle-menstruel', ['uses' => 'MainController@getSuiviCycle', 'as' => 'suivi-cycle-menstruel']);

Route::get('/exemple', ['uses' => 'MainController@exemple', 'as' => 'exemple']);
Route::get('/main', ['uses' => 'MainController@main', 'as' => 'main']);
Route::get('/newcontact', ['uses' => 'MainController@getNewContact', 'as' => 'newcontact']);
Route::get('/vitrine', ['uses' => 'MainController@getNewVitrine', 'as' => 'vitrine']);

Route::get('/quiz', ['uses' => 'MainController@getQuiz', 'as' => 'quiz']);

Route::get('/play-quiz', ['uses' => 'MainController@getQuizListeQuestion', 'as' => 'play-quiz']);

Route::get('/conseil-ist', ['uses' => 'MainController@getConseilConsultation', 'as' => 'conseil-ist']);

Route::get('/conseil-vih', ['uses' => 'MainController@getConseilVih', 'as' => 'conseil-vih']);

Route::get('/conseil-depistage', ['uses' => 'MainController@getConseilDepistage', 'as' => 'conseil-depistage']);


//Route::get('/rapport-pe', ['uses' => 'MainController@getInfoBipForm', 'as' => 'rapport-pe']);
Route::view('/rapport-pe', 'rapport-pe');

Route::get('/conseil-preservatif-masculin', ['uses' => 'MainController@getConseilPreservatifMasculin', 'as' => 'conseil-preservatif-masculin']);

Route::get('/conseil-preservatif-feminin', ['uses' => 'MainController@getConseilPreservatifFeminin', 'as' => 'conseil-preservatif-feminin']);

Route::get('/conseil-hymen', ['uses' => 'MainController@getConseilHymen', 'as' => 'conseil-hymen']);

Route::get('/conseil-cycle-mesntruel', ['uses' => 'MainController@getConseilCycleMesntruel', 'as' => 'conseil-cycle-mesntruel']);

Route::get('/conseil-hygiene-sexuelle', ['uses' => 'MainController@getConseilHygiene', 'as' => 'conseil-hygiene-sexuelle']);

Route::get('/conseil-grossesse-precoce', ['uses' => 'MainController@getConseilGrossesse', 'as' => 'conseil-grossesse-precoce']);

Route::get('/conseil-abstinence', ['uses' => 'MainController@getConseilAbstinence', 'as' => 'conseil-abstinence']);

Route::get('/conseil-cellule-cd4', ['uses' => 'MainController@getConseilCellule', 'as' => 'conseil-cellule-cd4']);

Route::get('/conseil-charge-virale', ['uses' => 'MainController@getConseilChargeVirale', 'as' => 'conseil-charge-virale']);

Route::get('/description-conseil-pratique', [
    'uses' => 'ConseilPratiqueController@detailConseilPratique',
    'as' => 'description-conseil-pratique',]);

Route::get('register', 'RegisterController@index')->name('register');

Route::get('/inscription-agbodjandjan', [
    'uses' => 'RegisterController@registerEleve',
    'as' => 'inscription-agbodjandjan',]);

Route::get('/connexion', [
    'uses' => 'LoginController@index',
    'as' => 'connexion',]);

Route::get('/conexion', [
    'uses' => 'LoginController@loginAgForm',
    'as' => 'conexion',]);

Route::get('/subscribe',['uses'=>'SubscribeController@index','as'=>'subscribe',]);
Route::get('/order/{id}',['uses'=>'SubscribeController@order','as'=>'order.subscribe',]);
Route::post('/checkout',[App\Http\Controllers\CheckoutController::class,'checkout'])->name('checkout');

Route::get('/google_registration',[App\Http\Controllers\SocialLoginController::class,'google_resgistration'])->name('google_register');

Route::get('/social_data',[App\Http\Controllers\SocialLoginController::class,'store'])->name('social.data');

Route::get('/google-complet-registration/{data}',[App\Http\Controllers\SocialLoginController::class,'googleComplete'])->name('google_register.complete');

Route::post('/googleStore',[App\Http\Controllers\SocialLoginController::class,'storeGoogleData'])->name('googleStore');

Route::post('/submitFeda',[App\Http\Controllers\CheckoutController::class,'fedapay'])->name('submit.feda');

Route::post('/submitPaypal',[App\Http\Controllers\CheckoutController::class,'paypal'])->name('submit.paypal');

Route::post('/submitFree',[App\Http\Controllers\CheckoutController::class,'freePass'])->name('submit.free');

Route::get('/mot-de-passe-oublier', [
    'uses' => 'LoginController@forgotPassword',
    'as' => 'mot-de-passe-oublier',]);

Route::post('/postRegister', 'RegisterController@postRegister')->name('postRegister');

Route::post('/postRegisterEleve', [
    'uses' => 'RegisterController@postRegisterEleve',
    'as' => 'postRegisterEleve',]);

Route::post('/postLogin', [
    'uses' => 'LoginController@postLogin',
    'as' => 'postLogin',]);

Route::get('/logOut', [
    'uses' => 'LoginController@logOut',
    'as' => 'logOut',]);

Route::post('/getEcoleByRegion', [
    'uses' => 'PairEducateurController@getEcoleByRegion',
    'as' => 'getEcoleByRegion',]);

Route::get('/activation-compte', 'RegisterController@getActivationForm')->name('activation-compte');

Route::post('/postActiveMyAccount', 'RegisterController@postActivationAccount')->name('postActiveMyAccount');

Route::post('/postRetrieveActiveMyAccount', 'RegisterController@resendActivationCode')->name('postRetrieveActiveMyAccount');

Route::get('/activer-mon-compte', [
    'uses' => 'RegisterController@makeActivationForm',
    'as' => 'activer-mon-compte',]);

Route::post('/postSaveActiverMonCompte', [
    'uses' => 'RegisterController@postMakeActivation',
    'as' => 'postSaveActiverMonCompte',]);

Route::post('/postRecupererPassword', [
    'uses' => 'LoginController@postRecupererPassword',
    'as' => 'postRecupererPassword',]);

Route::get('/changer-mon-mot-de-passe', [
    'uses' => 'LoginController@getChangePasswordForm',
    'as' => 'changer-mon-mot-de-passe',]);

Route::post('/postMakeChangePassword', [
    'uses' => 'LoginController@postMakeChangePassword',
    'as' => 'postMakeChangePassword',]);

/**
 * Web request routes
 */
Route::get('/postWebRequestRegister', [
    'uses' => 'WebRequestController@register',
    'as' => 'postWebRequestRegister',]);

//Register and login for CPN debut

Route::get('/postWebRequestregisterForUserCPN', [
    'uses' => 'WebRequestController@registerForUserCPN',
    'as' => 'postWebRequestregisterForUserCPN',]);

Route::get('/postWebRequestCPNAuthenticate', [
    'uses' => 'WebRequestController@loginForUserCPN',
    'as' => 'postWebRequestCPNAuthenticate',]);

//Register and login for CPN fin

Route::get('/postWebRequestVerifyBenefNumber', [
    'uses' => 'InnovHealthController@verifyBeneficiareNumber',
    'as' => 'postWebRequestVerifyBenefNumber',]);

Route::get('/postWebRequestAuthenticate', [
    'uses' => 'WebRequestController@login',
    'as' => 'postWebRequestAuthenticate',]);

Route::get('/postWebRequestActiveAccount', [
    'uses' => 'WebRequestController@postActiveAccount',
    'as' => 'postWebRequestActiveAccount',]);

Route::get('/postWebRequestCompletUserAccount', [
    'uses' => 'WebRequestController@postCompleteUserAccount',
    'as' => 'postWebRequestCompletUserAccount',]);

Route::get('/postWebRequestResendActivationCode', [
    'uses' => 'WebRequestController@resendActivationCode',
    'as' => 'postWebRequestResendActivationCode',]);

/**
 * Récupération de mot de passe
 */
Route::get('/postVerifyUserAccountNumber', [
    'uses' => 'WebRequestController@verifyUserAccountNumber',
    'as' => 'postVerifyUserAccountNumber',]);

Route::get('/postVerifyCodeRecuperation', [
    'uses' => 'WebRequestController@verifyCodeRecuperation',
    'as' => 'postVerifyCodeRecuperation',]);

Route::get('/postMakePasswordChange', [
    'uses' => 'WebRequestController@makePasswordChange',
    'as' => 'postMakePasswordChange',]);

/**
 * Make activation compte
 */
Route::get('/postVerifyUserAccountActivationNumber', [
    'uses' => 'WebRequestController@verifyUserAccountNumberForActivation',
    'as' => 'postVerifyUserAccountActivationNumber',]);

Route::get('/postVerifyCodeActivationMobile', [
    'uses' => 'WebRequestController@verifyCodeActivationAccount',
    'as' => 'postVerifyCodeActivationMobile',]);

Route::get('/get-liste-region-mobile', [
    'uses' => 'WebRequestController@getListeRegion',
    'as' => 'get-liste-region-mobile',]);

Route::get('/postSendSuiviGrossesse', [
    'uses' => 'ServiceRequestController@sendSuiviGrossesse',
    'as' => 'postSendSuiviGrossesse',]);

Route::get('/get-mobile-liste-suivi-grossesse', [
    'uses' => 'ServiceRequestController@getListeSuiviGrossesse',
    'as' => 'get-mobile-liste-suivi-grossesse',]);

Route::get('/postSendSuiviRegle', [
    'uses' => 'ServiceRequestController@sendSuiviRegle',
    'as' => 'postSendSuiviRegle',]);

Route::get('/postSendSuiviOvulation', [
    'uses' => 'ServiceRequestController@sendSuiviOvulation',
    'as' => 'postSendSuiviOvulation',]);

/**
 * User account routes
 */
Route::get('/verify-number-before-change', [
    'uses' => 'WebRequestController@verifyUserNumberBeforeChange',
    'as' => 'verify-number-before-change',]);

Route::get('/change-user-account-number', [
    'uses' => 'WebRequestController@changeUserNumberAfterVer',
    'as' => 'change-user-account-number',]);

/**
 * Request consultation
 */
Route::get('/getListeObjetConsultation', [
    'uses' => 'ConsultationRequestController@getObjetConsultation',
    'as' => 'getListeObjetConsultation',]);

Route::get('/getNearFormationSanitaire', [
    'uses' => 'ConsultationRequestController@getFormationSanitaire',
    'as' => 'getNearFormationSanitaire',]);

Route::get('/getNearFormationSanByVille', [
    'uses' => 'ConsultationRequestController@getFormationSanitaireByVille',
    'as' => 'getNearFormationSanByVille',]);

Route::get('/postWebRequestConsultation', [
    'uses' => 'ConsultationRequestController@postDemandeConsultationIst',
    'as' => 'postWebRequestConsultation',]);

Route::get('/getWebRequestListeConsultationAttente', [
    'uses' => 'ConsultationRequestController@getListeConsultationAttente',
    'as' => 'getWebRequestListeConsultationAttente',]);

Route::get('/getWebRequestListeConsultationEffectue', [
    'uses' => 'ConsultationRequestController@getListeConsultationEffectuee',
    'as' => 'getWebRequestListeConsultationAttente',]);

/**
 * Gest suivi grossesse
 */
Route::get('/getSuiviGrossesseInfo', [
    'uses' => 'ServiceRequestController@getSuiviGrossesseInfo',
    'as' => 'getSuiviGrossesseInfo',]);

Route::get('/postAnnulerSuiviGrossesse', [
    'uses' => 'ServiceRequestController@postAnnulerSuiviGrossesse',
    'as' => 'postAnnulerSuiviGrossesse',]);

/**
 * Gest suivi règle
 */
Route::get('/getSuivRegleInfo', [
    'uses' => 'ServiceRequestController@getSuiviRegle',
    'as' => 'getSuivRegleInfo',]);

Route::get('/postAnnulerSuiviRegleRequest', [
    'uses' => 'ServiceRequestController@posteAnnulerSuiviRegle',
    'as' => 'postAnnulerSuiviRegleRequest',]);

/**
 * Ges suivi ovulation
 */
Route::get('/getSuivOvulationInfo', [
    'uses' => 'ServiceRequestController@getSuiviOvulation',
    'as' => 'getSuivOvulationInfo',]);

Route::get('/postAnnulerSuiviOvulationRequest', [
    'uses' => 'ServiceRequestController@posteAnnulerSuiviOvulation',
    'as' => 'postAnnulerSuiviOvulationRequest',]);

/**
 * Lien pour les conseils pratiques du mobile
 */
Route::get('/mobile-conseil-ist', [
    'uses' => 'ConseilPratiqueController@getMobileIST',
    'as' => 'mobile-conseil-ist',]);

Route::get('/mobile-conseil-vih', [
    'uses' => 'ConseilPratiqueController@getMobileVih',
    'as' => 'mobile-conseil-vih',]);

Route::get('/mobile-conseil-depistage', [
    'uses' => 'ConseilPratiqueController@getMobileDepistage',
    'as' => 'mobile-conseil-depistage',]);

Route::get('/mobile-conseil-charge', [
    'uses' => 'ConseilPratiqueController@getMobileChargeViral',
    'as' => 'mobile-conseil-charge',]);

Route::get('/mobile-conseil-cellule', [
    'uses' => 'ConseilPratiqueController@getMobileCellule',
    'as' => 'mobile-conseil-cellule',]);

Route::get('/mobile-conseil-preservatif-masculin', [
    'uses' => 'ConseilPratiqueController@getMobilePreservatifMasculin',
    'as' => 'mobile-conseil-preservatif-masculin',]);

Route::get('/mobile-conseil-preservatif-feminin', [
    'uses' => 'ConseilPratiqueController@getMobilePreservatifFeminin',
    'as' => 'mobile-conseil-preservatif-feminin',]);

/**
 * La suite
 */
Route::get('/mobile-conseil-abstinence', [
    'uses' => 'ConseilPratiqueController@getMobileAbstinence',
    'as' => 'mobile-conseil-abstinence',]);

Route::get('/mobile-conseil-cycle-menstruel', [
    'uses' => 'ConseilPratiqueController@getMobileCycleMenstruel',
    'as' => 'mobile-conseil-cycle-menstruel',]);

Route::get('/mobile-conseil-grossesse', [
    'uses' => 'ConseilPratiqueController@getMobileGrossesse',
    'as' => 'mobile-conseil-grossesse',]);

Route::get('/mobile-conseil-hygiene', [
    'uses' => 'ConseilPratiqueController@getMobileHygiene',
    'as' => 'mobile-conseil-hygiene',]);

Route::get('/mobile-conseil-hymen', [
    'uses' => 'ConseilPratiqueController@getMobilehymen',
    'as' => 'mobile-conseil-hymen',]);

/**
 * Liste des assistants en ligne
 */
Route::get('/liste-assistant-ligne', [
    'uses' => 'TeleConseillerController@getListeAssistant',
    'as' => 'liste-assistant-ligne',]);

//liste utilisateurs
Route::get('/liste-user-ligne', [
    'uses' => 'TeleConseillerController@getListeAssistant',
    'as' => 'liste-user-ligne',]);

// mobile
Route::get('covid-19-assistant', 'TeleConseillerController@getCovid19Assistant');

/**
 * Planning familliale moderne
 * Mobile
 */
Route::get('/planning-mobile-condom-feminin', [
    'uses' => 'PlanningController@getCondomFeminin',
    'as' => 'planning-mobile-condom-feminin',]);

Route::get('/planning-mobile-condom-masculin', [
    'uses' => 'PlanningController@getCondomMasculin',
    'as' => 'planning-mobile-condom-masculin',]);

Route::get('/planning-mobile-contraception', [
    'uses' => 'PlanningController@getContraception',
    'as' => 'planning-mobile-contraception',]);

Route::get('/planning-mobile-diu', [
    'uses' => 'PlanningController@getDiu',
    'as' => 'planning-mobile-diu',]);

Route::get('/planning-mobile-injectable', [
    'uses' => 'PlanningController@getInjectable',
    'as' => 'planning-mobile-injectable',]);

Route::get('/planning-mobile-ligature', [
    'uses' => 'PlanningController@getLigature',
    'as' => 'planning-mobile-ligature',]);

Route::get('/planning-mobile-norplan', [
    'uses' => 'PlanningController@getNorplan',
    'as' => 'planning-mobile-norplan',]);

Route::get('/planning-mobile-obstruction', [
    'uses' => 'PlanningController@getObstruction',
    'as' => 'planning-mobile-obstruction',]);

Route::get('/planning-mobile-pillule', [
    'uses' => 'PlanningController@getPillule',
    'as' => 'planning-mobile-pillule',]);

Route::get('/planning-mobile-vasectomie', [
    'uses' => 'PlanningController@getVasectomie',
    'as' => 'planning-mobile-vasectomie',]);

/**
 * Planning naturel
 */
Route::get('/planning-mobile-abstinence', [
    'uses' => 'PlanningController@getAbstinence',
    'as' => 'planning-mobile-abstinence',]);

Route::get('/planning-mobile-allaitement', [
    'uses' => 'PlanningController@getAllaitement',
    'as' => 'planning-mobile-allaitement',]);

Route::get('/planning-mobile-glaire', [
    'uses' => 'PlanningController@getGlaire',
    'as' => 'planning-mobile-glaire',]);

Route::get('/planning-mobile-jourFixe', [
    'uses' => 'PlanningController@getJourFixe',
    'as' => 'planning-mobile-jourFixe',]);

Route::get('/planning-mobile-temperature', [
    'uses' => 'PlanningController@getTemperature',
    'as' => 'planning-mobile-temperature',]);

/**
 * Planning save request
 */
Route::post('/save-planning-souscription', [
    'uses' => 'PlanningController@savePlanningSouscription',
    'as' => 'save-planning-souscription',]);

Route::post('/save-mobile-planning-souscription', [
    'uses' => 'PlanningController@saveMobilePlanningSouscription',
    'as' => 'save-mobile-planning-souscription',]);
/**
 * Innov for health concours
 */
Route::get('/sendWebRequestSuiviGrossesse', [
    'uses' => 'InnovWebRequestController@saveSuiviGrossesse',
    'as' => 'sendWebRequestSuiviGrossesse',]);

Route::get('/sendWebRequestSuiviVaccination', [
    'uses' => 'InnovWebRequestController@saveSuiviInnovVaccination',
    'as' => 'sendWebRequestSuiviVaccination',]);

Route::get('/getListeSuiviInnovGrossesse', [
    'uses' => 'InnovWebRequestController@getListeSuiviGrossesse',
    'as' => 'getListeSuiviInnovGrossesse',]);

Route::get('/getListeSuiviInnovVaccination', [
    'uses' => 'InnovWebRequestController@getListeSuiviVaccination',
    'as' => 'getListeSuiviInnovVaccination',]);

/**
 * Annuler le suivi
 */
Route::get('/post-save-annuler-suivi-grossesse-innov', [
    'uses' => 'InnovWebRequestController@postAnnulerSuiviGrossesse',
    'as' => 'post-save-annuler-suivi-grossesse-innov',]);

Route::get('/post-save-annuler-suivi-vaccination-innov', [
    'uses' => 'InnovWebRequestController@postAnnulerSuiviVaccination',
    'as' => 'post-save-annuler-suivi-vaccination-innov',]);

/**
 * Save nouvelle plainte
 */
Route::get('/save-user-new-plainte', [
    'uses' => 'InnovWebRequestController@saveAbus',
    'as' => 'save-user-new-plainte',]);

Route::get('/get-liste-user-plainte', [
    'uses' => 'InnovWebRequestController@getListePlainte',
    'as' => 'get-liste-user-plainte',]);

Route::get('/get-liste-notification-user', [
    'uses' => 'InnovWebRequestController@getListeUserNotification',
    'as' => 'get-liste-notification-user',]);

/**
 * Liste des plaintes des mobinautes
 */
Route::get('/get-liste-plainte-user-mobile', [
    'uses' => 'PvvihController@getListePlainteMobile',
    'as' => 'get-liste-plainte-user-mobile',]);

Route::get('/get-assistance-en-ligne-mobile', [
    'uses' => 'PvvihController@getPageAssistanceLigne',
    'as' => 'get-assistance-en-ligne-mobile',]);

/**
 * Chat message from mobile
 */
Route::get('/send-chat-message-mobile', [
    'uses' => 'InnovWebRequestController@sendChatMessage',
    'as' => 'send-chat-message-mobile',]);

Route::get('/get-chat-from-mobile-user', [
    'uses' => 'InnovWebRequestController@getListeOfMobileChat',
    'as' => 'get-chat-from-mobile-user',]);

Route::get('/get-unread-chat-message-mobile', [
    'uses' => 'InnovWebRequestController@getMobileUnreadMessage',
    'as' => 'get-unread-chat-message-mobile',]);

Route::get('/set-mobile-message-as-read', [
    'uses' => 'InnovWebRequestController@setMobMessageAsRead',
    'as' => 'set-mobile-message-as-read',]);

Route::get('/get-liste-ville-mobile', [
    'uses' => 'InnovWebRequestController@getListeVille',
    'as' => 'get-liste-ville-mobile',]);

/**
 * Web series
 */
Route::get('/get-liste-web-serie', [
    'uses' => 'WebRequestController@getListeWebSerie',
    'as' => 'get-liste-web-serie',]);

//Route pour sauvegader les quiz

Route::get('/quiz-request', [
    'uses' => 'QuizController@saveQuizRequest',
    'as' => 'quiz-request',]);

Route::get('/export-excel-quiz', [
    'uses' => 'QuizController@exportQuizToExcel',
    'as' => 'export-excel-quiz',]);

Route::get('api/preventions', 'ApiPreventionController');

Route::get('api/auto-test-questions', 'ApiAutoTestQuestionController');

Route::get('api/covid-19-case-location', 'ApiCovid19CaseLocationController');

// Route::get('auto-test-questions', 'AutoTestQuestionController@index')->name('auto-test-questions.index');

// Route::post('auto-test-questions', 'AutoTestQuestionController@store')->name('auto-test-questions.store');

Route::group(['prefix' => 'auto-test'], function () {
    Route::get('/', 'AutoTest\VostestController@index')->name('auto-test.vostest')->middleware('authentification');

    Route::get('user/{user}', 'AutoTest\VostestController@mobile');

    Route::group(['middleware' => ['authentification']], function () {

        Route::get('/', 'AutoTest\VostestController@index')->name('auto-test.vostest');
        
        Route::get('details', 'AutoTest\DetailsController');

        Route::get('questions/{number}', 'AutoTest\QuestController')->where('number', '[0-9]{1,2}+');

        Route::get('resultat', 'AutoTest\ResultatController')->name("resultat");
    });
});

// infobip-messages
Route::any('infobip-messages', 'InfoBipMessageController');

// infobip-form
//Route::get('rapport-pe', 'InfoBipFormController');

/**
 * Planiing famillial admin
 */
Route::get('/api/planning/liste-planning/{type}', [
    'uses' => 'AdminController@getApiListePlanning',
    'as' => '/api/planning/liste-planning/{type}',]);

/**
 * QUIZ NEW API LINKS
 */
Route::get('/api/quiz/liste-module', [
    'uses' => 'QuizApiController@getQizTheme',
    'as' => '/api/quiz/liste-module',]);

Route::get('/api/quiz/listequestion/{id}', [
    'uses' => 'QuizApiController@getQuizQuestions',
    'as' => '/api/quiz/listequestion/{id}',]);

Route::get('/api/quiz/saveresponse', [
    'uses' => 'QuizApiController@saveQuizResponse',
    'as' => '/api/quiz/saveresponse',]);

/**
 * API routes
 */

//iNFOS UTILISATEURS
Route::get('/api/v1/econvivial/user-info/{numero}', [
    'uses' => 'ApiController@apiUserInfo',
    'as' => '/api/v1/econvivial/user-info/{numero}',]);

Route::get('/api/v1/econvivial/beneficiaire-info/{numero}', [
    'uses' => 'ApiController@getBeneficiaireInfo',
    'as' => '/api/v1/econvivial/beneficiaire-info/{numero}',]);

Route::get('/api/v1/econvivial/beneficiaireCPN-info/{id}', [
    'uses' => 'ApiController@getBeneficiaireInfoCPN',
    'as' => '/api/v1/econvivial/beneficiaireCPN-info/{id}',]);

Route::get('/api/v1/econvivial/beneficiaireVaccination-info/{id}', [
    'uses' => 'ApiController@getBeneficiaireInfoVaccination',
    'as' => '/api/v1/econvivial/beneficiaireVaccination-info/{id}',]);

Route::get('beneficiaireCPN-info{id}', [
    'uses' => 'ApiController@getBeneficiaireInfoPF',
    'as' => '/api/v1/econvivial/beneficiairePF-info/{id}',]);

//LISTE DES REGIONS
Route::get('/api/v1/econvivial/list-region', [
    'uses' => 'ApiController@getListeRegion',
    'as' => '/api/v1/econvivial/list-region',]);

//LISTE DES VILLES PAR REGIONS
Route::get('/api/v1/econvivial/list-ville/{nomRegion}', [
    'uses' => 'ApiController@getVille',
    'as' => '/api/v1/econvivial/list-ville/{nomRegion}',]);

//LISTE DES FORMATIONS SANITAIRES PAR VILLE
Route::get('/api/v1/econvivial/list-formation-sanitaire/{nomVille}', [
    'uses' => 'ApiController@getListeFormationSanitaire',
    'as' => '/api/v1/econvivial/list-formation-sanitaire/{nomVille}',]);

//LISTE DES OBJETS DE CONSULTATIONS
Route::get('/api/v1/econvivial/list-objet-consultation', [
    'uses' => 'ApiController@getListeObjetConsultation',
    'as' => '/api/v1/econvivial/list-objet-consultation',]);

//LISTE DES CONSEILS PRATIQUES
Route::get('/api/v1/econvivial/conseil-pratique', [
    'uses' => 'ApiController@getListeConseilPratique',
    'as' => '/api/v1/econvivial/conseil-pratique',]);

//Insertion des utilisateurs
Route::get('/api/v1/econvivial/insert-user', [
    'uses' => 'ApiController@insertUser',
    'as' => '/api/v1/econvivial/insert-user',]);

//Afficher la liste des utilisateurs
Route::get('/api/v1/econvivial/show-list-user', [
    'uses' => 'ApiController@getListeUser',
    'as' => '/api/v1/econvivial/show-list-user',]);

//Stocker suivi de menstruation
Route::get('/api/v1/econvivial/postSendSuiviOvulation', [
    'uses' => 'ApiController@sendSuiviOvulation',
    'as' => '/api/v1/econvivial/postSendSuiviOvulation',]);

//Stocker suivi de grossesse
Route::get('/api/v1/econvivial/postSendSuiviGrossesse', [
    'uses' => 'ApiController@sendSuiviGrossesse',
    'as' => '/api/v1/econvivial/postSendSuiviGrossesse',]);

Route::get('/api/v1/econvivial/get-suivi-grossesse-info', [
    'uses' => 'ApiController@getListeSuiviGrossesse',
    'as' => '/api/v1/econvivial/get-suivi-grossesse-info',]);

Route::get('/api/v1/econvivial/get-suivi-regle-info', [
    'uses' => 'ApiController@getSuiviRegle',
    'as' => '/api/v1/econvivial/get-suivi-regle-info',]);

Route::get('/api/v1/econvivial/get-suivi-ovulation-info', [
    'uses' => 'ApiController@getSuiviOvulation',
    'as' => '/api/v1/econvivial/get-suivi-ovulation-info',]);

/**
 * Change the app themesuivi-regle-admin
 */
Route::post('/saveReadConseilPratique', [
    'uses' => 'MainController@postSaveReadConseil',
    'as' => 'saveReadConseilPratique',]);

Route::get('/suivi-ovulation-teleconseiller', [
    'uses' => 'MenstruController@getTeleConseillerSuiviOvulation',
    'as' => 'suivi-ovulation-teleconseiller',]);

Route::get('/demande-suivi-regle-teleconseiller', [
    'uses' => 'MenstruController@DemandeSuiviRegleTele',
    'as' => 'demande-suivi-regle-teleconseiller',]);

Route::get('/demande-suivi-regle-admin', [
    'uses' => 'MenstruController@DemandeSuiviRegleAdmin',
    'as' => 'demande-suivi-regle-admin',]);

Route::post('/postSuiviRegleTeleconseiller', [
    'uses' => 'MenstruController@saveSuiviRegleTeleconseiller',
    'as' => 'postSuiviRegleTeleconseiller',]);

Route::group(['middleware' => ['authentification']], function () {
    /**
     * SMS diffusion suivi règle et ovulation
     */
    Route::post('/postAlertDeSuiviDeRegle', [
        'uses' => 'MenstruController@postAlertSuiviRegle',
        'as' => 'postAlertDeSuiviDeRegle',]);

    Route::post('/postAlertDeSuiviDeRegleDemain', [
        'uses' => 'MenstruController@postAlertSuiviRegleDemain',
        'as' => 'postAlertDeSuiviDeRegleDemain',]);

    Route::post('/postAlertDeSuiviDeOvulation', [
        'uses' => 'MenstruController@postAlertSuiviOvulation',
        'as' => 'postAlertDeSuiviDeOvulation',]);

    Route::post('/postAlertDeSuiviDeOvulationDemain', [
        'uses' => 'MenstruController@postAlertSuiviOvulationDemain',
        'as' => 'postAlertDeSuiviDeOvulationDemain',]);

    Route::post('/changeSideBarTheme', [
        'uses' => 'AccountController@changeSideBarTheme',
        'as' => 'changeSideBarTheme',]);

    Route::post('/changeNavBarTheme', [
        'uses' => 'AccountController@changeNavBarTheme',
        'as' => 'changeNavBarTheme',]);

    Route::get('/unAutorize', [
        'uses' => 'LoginController@unAutorize',
        'as' => 'unAutorize',]);

    Route::get('/readNotification', [
        'uses' => 'NotificationController@readNotification',
        'as' => 'readNotification',]);

    Route::post('/sendChatMessage', [
        'uses' => 'ChatController@sendChat',
        'as' => 'sendChatMessage',]);

    Route::post('/retrieveChat', [
        'uses' => 'ChatController@refreshChat',
        'as' => 'retrieveChat',]);

    Route::post('/retrieveChatForSpecificUser', [
        'uses' => 'ChatController@retrieveChatForSpecificUser',
        'as' => 'retrieveChatForSpecificUser',]);

    Route::post('/retrieveChatForSpecificUserAndConseiller', [
        'uses' => 'ChatController@retrieveChatForSpecificUserAndConseiller',
        'as' => 'retrieveChatForSpecificUserAndConseiller',]);

    /**
     * Teleconseiller second assistance
     */
    Route::post('/sendChatMessageAssistance', [
        'uses' => 'ChatController@sendChatTeleConseiller',
        'as' => 'sendChatMessageAssistance',]);

    Route::post('/retrieveChatAssistance', [
        'uses' => 'ChatController@refreshChatTeleConseiller',
        'as' => 'retrieveChatAssistance',]);

    Route::post('/retrieveChatForSpecificUserAssistance', [
        'uses' => 'ChatController@retrieveChatForSpecificUserTeleConseiller',
        'as' => 'retrieveChatForSpecificUserAssistance',]);

    /**
     * Les routes de formation sanitaire
     */
    Route::group(['middleware' => ['formation']], function () {
        /**
         * Espace membre des formations sanitaires
         */
        Route::get('/espacemembre-formation-sanitaire', [
            'uses' => 'FormationSanitaireController@dashBoard',
            'as' => 'espacemembre-formation-sanitaire',]);

        Route::post('/confirmReceptionConsultation', [
            'uses' => 'FormationSanitaireController@confirmReception',
            'as' => 'confirmReceptionConsultation',]);

        Route::get('/demande-consultation-effectuee', [
            'uses' => 'FormationSanitaireController@consultationDo',
            'as' => 'demande-consultation-effectuee',]);

        Route::post('/attach-file-result', [
            'uses' => 'FormationSanitaireController@attachFile',
            'as' => 'attach-file-result',]);

        Route::post('/send-result-to-user', [
            'uses' => 'FormationSanitaireController@sendResult',
            'as' => 'send-result-to-user',]);

        Route::get('/resultat-consultation-utilisateur', [
            'uses' => 'FormationSanitaireController@getListeResultat',
            'as' => 'resultat-consultation-utilisateur',]);

        /**
         * Profile de formation sanitaire
         */
        Route::get('/formation-sanitaire-profil', [
            'uses' => 'AccountController@userFormationProfil',
            'as' => 'formation-sanitaire-profil',]);

        Route::post('/modifierFormationSanitaireInfo', [
            'uses' => 'AccountController@updateUserFormationInfo',
            'as' => 'modifierFormationSanitaireInfo',]);

        Route::post('/modifierUserFormationSanitaireProfile', [
            'uses' => 'AccountController@updateUserFormationProfile',
            'as' => 'modifierUserFormationSanitaireProfile',]);

        Route::post('/modifierFormationSanitairePassword', [
            'uses' => 'AccountController@updateUserFormationPassword',
            'as' => 'modifierFormationSanitairePassword',]);
    });

    /**
     * Les routes de téléconseiller
     */
    Route::group(['middleware' => ['teleconseiller']], function () {
        /**
         * Profil des téléconseillers
         */
        Route::get('/teleconseiller-profil', [
            'uses' => 'AccountController@conseillerProfil',
            'as' => 'teleconseiller-profil',]);

        Route::post('/modifierUserConseillerInfo', [
            'uses' => 'AccountController@updateUserConseillerInfo',
            'as' => 'modifierUserConseillerInfo',]);

        Route::post('/modifierUserConseillerProfile', [
            'uses' => 'AccountController@updateUserConseillerProfile',
            'as' => 'modifierUserConseillerProfile',]);

        Route::post('/modifierUserConseillerPassword', [
            'uses' => 'AccountController@updateUserConseillerPassword',
            'as' => 'modifierUserConseillerPassword',]);

        /**
         * Espace membre des téléconseillers
         */
        Route::get('/espacemembre-assistance-en-ligne', [
            'uses' => 'AssistanceLigneController@dashBoard',
            'as' => 'espacemembre-assistance-en-ligne',]);

        /**
         * Récupérer la liste des utilisateurs par message
         */
        Route::post('/refresh-user-liste', [
            'uses' => 'TeleConseillerController@getListeUtilisateurWeb',
            'as' => 'refresh-user-liste',]);

        /**
         * Suivi du cycle menstruel
         */
        Route::get('/suivi-regle-teleconseiller-today', [
            'uses' => 'MenstruController@getTeleConseillerSuiviRegle',
            'as' => 'suivi-regle-teleconseiller-today',]);

        Route::get('/suivi-regle-teleconseiller-demain', [
            'uses' => 'MenstruController@getTeleConseillerSuiviRegleDemain',
            'as' => 'suivi-regle-teleconseiller-demain',]);

        Route::get('/suivi-ovulation-teleconseiller-demain', [
            'uses' => 'MenstruController@getTeleConseillerSuiviOvulationDemain',
            'as' => 'suivi-ovulation-teleconseiller-demain',]);

        Route::get('/suivi-ovulation-teleconseiller-today', [
            'uses' => 'MenstruController@getTeleConseillerSuiviOvulationToDay',
            'as' => 'suivi-ovulation-teleconseiller-today',]);

        Route::get('/suivi-regle-teleconseiller', [
            'uses' => 'MenstruController@getTeleConseillerSuiviRegle',
            'as' => 'suivi-regle-teleconseiller',]);


        Route::get('/suivi-ovulation-teleconseiller', [
            'uses' => 'MenstruController@getTeleConseillerSuiviOvulation',
            'as' => 'suivi-ovulation-teleconseiller',]);

        Route::get('/assistance-en-ligne-teleconseiller', [
            'uses' => 'AssistanceLigneController@getSecondAssistantChat',
            'as' => 'assistance-en-ligne-teleconseiller',]);

        /**
         * Suivi des Présences
         */

        Route::get('/marquer-presence-arrivee', [
            'uses' => 'AssistanceLigneController@getArriverForm',
            'as' => 'marquer-presence-arrivee',]);

        Route::post('/post-marquer-presence', [
            'uses' => 'AssistanceLigneController@postPresenceArriver',
            'as' => 'post-marquer-presence',]);

        Route::get('/marquer-presence-depart', [
            'uses' => 'AssistanceLigneController@getDepartForm',
            'as' => 'marquer-presence-depart',]);

        Route::post('/post-save-marquer-presence-depart', [
            'uses' => 'AssistanceLigneController@postDepartTeleConseiller',
            'as' => 'post-save-marquer-presence-depart',]);
    });

    /*
        * Gestion des formations sanitaires
        *
        */
    Route::get('/rapport-formation-sanitaire-consultation', [
        'uses' => 'FormationSanitaireController@generateRapportConsultation',
        'as' => 'rapport-formation-sanitaire-consultation',]);

    Route::post('/save-rapport-consultation', [
        'uses' => 'FormationSanitaireController@saveRapportConsultation',
        'as' => 'save-rapport-consultation',]);

    //Historique des rapports
    Route::get('/historique-rapport-consultation', [
        'uses' => 'FormationSanitaireController@getHistoriqueRapportConsultation',
        'as' => 'historique-rapport-consultation',]);

    //Detail des rapports de consultation
    Route::get('/detail-rapport-consultation', [
        'uses' => 'FormationSanitaireController@getDetailRapportConsultation',
        'as' => 'detail-rapport-consultation',]);

    //facturation-des-consultations
    Route::get('/facturation-des-consultation', [
        'uses' => 'FormationSanitaireController@getFacturationFormationSanitaire',
        'as' => 'facturation-des-consultation',]);

    //Detail des rapports de consultation admin
    Route::get('/detail-rapport-consultation', [
        'uses' => 'FormationSanitaireController@getDetailRapportConsultationAdmin',
        'as' => 'detail-rapport-consultation',]);

    Route::get('/liste-rapport-consultation-formation', [
        'uses' => 'FormationSanitaireController@getHistoriqueRapportConsultationAdmin',
        'as' => 'liste-rapport-consultation-formation',]);


    //
    Route::post('/save-facturation-consultation', [
        'uses' => 'FormationSanitaireController@saveRapportFacturation',
        'as' => 'save-facturation-consultation',]);

    //
    Route::post('/payerFacturationConsultation', [
        'uses' => 'FormationSanitaireController@getPayerFacture',
        'as' => 'payerFacturationConsultation',]);

    //Historique des facturation-des-consultations
    Route::get('/historique-facturation-des-consultations', [
        'uses' => 'FormationSanitaireController@getHistoriqueFacturationFormationSanitaire',
        'as' => 'historique-facturation-des-consultations',]);


    //Historique des facturation-des-consultations
    Route::get('/historique-facturation-des-consultations', [
        'uses' => 'FormationSanitaireController@getHistoriqueFacturationFormationSanitaireAdmin',
        'as' => 'historique-facturation-des-consultations',]);

    //Detail des rapports de facturation-consultation
    Route::get('/detail-rapport-facturation', [
        'uses' => 'FormationSanitaireController@getDetailRapportFacturation',
        'as' => 'detail-rapport-facturation',]);

    //Detail des rapports de facturation-consultation
    Route::get('/detail-rapport-facturations', [
        'uses' => 'FormationSanitaireController@getDetailRapportFacturationAdmin',
        'as' => 'detail-rapport-facturations',]);


    Route::get('/do-consultation-admin', [
        'uses' => 'ConsultationController@doConsultationAdmin',
        'as' => 'do-consultation-admin',]);


    Route::group(['middleware' => ['utilisateur']], function () {
        /**
         * Récupérer la liste des assistants par ordre de message
         */
        Route::post('/refresh-assistant-liste', [
            'uses' => 'TeleConseillerController@getListeAssistantWeb',
            'as' => 'refresh-assistant-liste',]);

        Route::get('/assistance-medecin', [
            'uses' => 'AssistanceLigneController@getMedecinForm',
            'as' => 'assistance-medecin',]);

        Route::get('/mon-compte', [
            'uses' => 'AccountController@index',
            'as' => 'mon-compte',]);

        Route::get('/espacemembre', [
            'uses' => 'DashboardController@index',
            'as' => 'espacemembre',]);

        Route::get('/do-consultation', [
            'uses' => 'ConsultationController@doConsultation',
            'as' => 'do-consultation',]);

        Route::post('/showVille', [
            'uses' => 'ConsultationController@getVille',
            'as' => 'showVille',]);

        Route::post('/showObjetDesc', [
            'uses' => 'ConsultationController@getObjetDetail',
            'as' => 'showObjetDesc',]);

        Route::post('/showFormationSanitaire', [
            'uses' => 'ConsultationController@getFormationSanitaire',
            'as' => 'showFormationSanitaire',]);

        Route::post('/saveConvivialConsultation', [
            'uses' => 'ConsultationController@saveConsultation',
            'as' => 'saveConvivialConsultation',]);

        Route::post('/saveConvivialConsultationAdmin', [
            'uses' => 'ConsultationController@saveConsultationAdmin',
            'as' => 'saveConvivialConsultationAdmin',]);

        Route::get('/mes-consultations-en-attentes', [
            'uses' => 'ConsultationController@getDemandesAttente',
            'as' => 'mes-consultations-en-attentes',]);

        Route::get('/mes-consultations-effectuees', [
            'uses' => 'ConsultationController@getDemandesEffectuee',
            'as' => 'mes-consultations-effectuees',]);

        Route::get('/mes-resultats-consultations', [
            'uses' => 'ConsultationController@getListeResultat',
            'as' => 'mes-resultats-consultations',]);


        //Suivi de grossesse

        Route::get('/suivi-de-grossesse', [
            'uses' => 'GrossesseController@index',
            'as' => 'suivi-de-grossesse',]);

        Route::post('/postSaveSuiviGrossesse', [
            'uses' => 'GrossesseController@postSuivi',
            'as' => 'postSaveSuiviGrossesse',]);

        Route::post('/postDeleteSuiviGrossesse', [
            'uses' => 'GrossesseController@deleteSuiviGrossesse',
            'as' => 'postDeleteSuiviGrossesse',]);

        // Suivi de regle

        Route::get('/suivi-de-regle', [
            'uses' => 'MenstruController@index',
            'as' => 'suivi-de-regle',]);

        Route::get('/suivi-de-regle-teleconseiller', [
            'uses' => 'MenstruController@index',
            'as' => 'suivi-de-regle-teleconseiller',]);

        Route::post('/postSuiviRegle', [
            'uses' => 'MenstruController@saveSuiviRegle',
            'as' => 'postSuiviRegle',]);

        Route::post('/postDeleteSuiviRegle', [
            'uses' => 'MenstruController@deleteSuiviRegle',
            'as' => 'postDeleteSuiviRegle',]);

        Route::post('/postEditSuiviRegle', [
            'uses' => 'MenstruController@editSuiviRegle',
            'as' => 'postEditSuiviRegle',]);

        // Suivi d'ovulation
        Route::get('/suivi-ovulation', [
            'uses' => 'MenstruController@indexOvulation',
            'as' => 'suivi-ovulation',]);

        Route::get('/suivi-ovulation-teleconseiller', [
            'uses' => 'MenstruController@indexOvulation',
            'as' => 'suivi-ovulation-teleconseiller',]);

        Route::get('/suivi-ovulation-demain', [
            'uses' => 'MenstruController@indexOvulationDemain',
            'as' => 'suivi-ovulation-demain',]);

        Route::post('/postSuiviOvulation', [
            'uses' => 'MenstruController@saveSuiviOvulation',
            'as' => 'postSuiviOvulation',]);

        Route::post('/postDeleteSuiviOvulation', [
            'uses' => 'MenstruController@deleteSuiviOvulation',
            'as' => 'postDeleteSuiviOvulation',]);

        /**
         * Profil utilisateurs
         */
        Route::post('/modifierUserInfo', [
            'uses' => 'AccountController@updateUserInfo',
            'as' => 'modifierUserInfo',]);

        Route::post('/modifierUserProfile', [
            'uses' => 'AccountController@updateProfile',
            'as' => 'modifierUserProfile',]);

        Route::post('/modifierUserPassword', [
            'uses' => 'AccountController@updatePassword',
            'as' => 'modifierUserPassword',]);

        // Conseils Pratique

        Route::get('/conseil-pratique', [
            'uses' => 'ConseilPratiqueController@getConseilPratique',
            'as' => 'conseil-pratique',]);

        Route::get('/methode-naturelle', [
            'uses' => 'PlanningController@getMethodeNaturelle',
            'as' => 'methode-naturelle',]);

        Route::get('/methode-moderne', [
            'uses' => 'PlanningController@getMethodeModerne',
            'as' => 'methode-moderne',]);

        Route::get('/save-web-quiz-response', [
            'uses' => 'MainController@saveQuizResponse',
            'as' => 'save-web-quiz-response',]);

        Route::get('/user-dashboard-quiz', [
            'uses' => 'QuizController@getUserQuizPage',
            'as' => 'user-dashboard-quiz',]);

        Route::get('/play-dash-quiz', [
            'uses' => 'QuizController@playDashQuiz',
            'as' => 'play-dash-quiz',]);
    });

    Route::group(['middleware' => ['admin']], function () {
        Route::group(['middleware' => ['superAdmin']], function () {
            Route::get('/afficher-liste-utilisateur', 'AdminController@getListeUser')->name('afficher-liste-utilisateur');

            Route::get('/liste-rapport-alerte-sms', [
                'uses' => 'AlerteController@getListeRapport',
                'as' => 'liste-rapport-alerte-sms',]);

            Route::get('/liste-rapport-alerte-sms-manuel', [
                'uses' => 'AlerteController@getListeRapportManuel',
                'as' => 'liste-rapport-alerte-sms-manuel',]);

            Route::get('/gestion-admin', [
                'uses' => 'AdminController@index',
                'as' => 'gestion-admin',]);

            Route::get('/gestion-formation-sanitaire', [
                'uses' => 'UserController@indexUserFormatioSanitaire',
                'as' => 'gestion-formation-sanitaire',]);

            Route::get('/gestion-tele-conseiller', [
                'uses' => 'UserController@indexUserTeleConseiller',
                'as' => 'gestion-tele-conseiller',]);

            Route::get('/gestion-innov', [
                'uses' => 'AdminController@getAdminHealthPage',
                'as' => 'gestion-innov',]);

            Route::get('/liste-admin', [
                'uses' => 'AdminController@listeAdmin',
                'as' => 'liste-admin',]);

            Route::get('/affecter-role-admin', [
                'uses' => 'AdminController@affecterRole',
                'as' => 'affecter-role-admin',]);
        });

        Route::group(['middleware' => ['webSerie']], function () {
            Route::get('/web-serie-dashboard', [
                'uses' => 'AdminController@getWebSerieUserDash',
                'as' => 'web-serie-dashboard',]);

            /**
             * Gestion des webSéries
             */
            Route::get('/web-serie', [
                'uses' => 'AdminController@getWebSeriePage',
                'as' => 'web-serie',]);

            Route::post('/post-save-web-serie', [
                'uses' => 'AdminController@postSaveWebSerie',
                'as' => 'post-save-web-serie',]);

            Route::post('/post-delete-web-serie', [
                'uses' => 'AdminController@postDeleteWebSerie',
                'as' => 'post-delete-web-serie',]);

            Route::post('/post-edit-web-serie', [
                'uses' => 'AdminController@postEditWebSerie',
                'as' => 'post-edit-web-serie',]);
        });

        Route::group(['middleware' => ['teleConseillerAdmin']], function () {
            //Suivre téléconseiller

            Route::get('/suivre-teleconseiller', [
                'uses' => 'TeleConseillerController@getAdminSuivreConseiller',
                'as' => 'suivre-teleconseiller',]);

            Route::get('/suivre-teleconseiller-chats', [
                'uses' => 'TeleConseillerController@suivreTeleconseiller',
                'as' => 'suivre-teleconseiller-chats',]);

            Route::get('suivre-user-assister', 'TeleConseillerController@getListeUserAssister')->name('suivre-user-assister');

            Route::get('/detail-suivre-user-assister', [
                'uses' => 'TeleConseillerController@detailUserAssister',
                'as' => 'detail-suivre-user-assister',]);

            Route::get('/gestion-presence-tele-conseiller', [
                'uses' => 'AdminController@getListePresenceTeleConseiller',
                'as' => 'gestion-presence-tele-conseiller',]);

            Route::get('/enregistrement-tele-conseiller', [
                'uses' => 'AdminController@getListePresenceTeleConseiller',
                'as' => 'enregistrement-tele-conseiller',]);

            /**
             * Liste des prestations d'un assistant
             */
            Route::get('/gestion-presence-individuel-tele-conseiller', [
                'uses' => 'AdminController@getListeOneTeleConseiller',
                'as' => 'gestion-presence-individuel-tele-conseiller',]);

            Route::get('/detail-presence-tele-conseiller', [
                'uses' => 'AdminController@getDetailPrestation',
                'as' => 'detail-presence-tele-conseiller',]);
        });

        Route::group(['middleware' => ['pairEducateur']], function () {
            /**
             * Gestion des compte de PE
             */
            Route::get('/gestion-compte-pe', [
                'uses' => 'PairEducateurController@getComptePE',
                'as' => 'gestion-compte-pe',]);

            Route::post('/create-pair-educateur-account', [
                'uses' => 'PairEducateurController@saveComptePE',
                'as' => 'create-pair-educateur-account',]);

            Route::post('/edit-pair-educateur-account', [
                'uses' => 'PairEducateurController@postEditPairEducateur',
                'as' => 'edit-pair-educateur-account',]);

            Route::post('/delete-pair-educateur-account', [
                'uses' => 'PairEducateurController@postDeletePairEducateur',
                'as' => 'delete-pair-educateur-account',]);

            /**
             * Gesyion des comptes de superviseurs
             */
            Route::get('/gestion-compte-superviseur', [
                'uses' => 'PairEducateurController@getCompteSuperviseur',
                'as' => 'gestion-compte-superviseur',]);

            Route::get(
                'gestion-compte-superviseur/{id}/edit',
                'PairEducateurController@editCompteSuperviseur'
            )->name('compte-superviseur.edit');

            Route::post('/create-superviseur-account', [
                'uses' => 'PairEducateurController@saveCompteSuperviseur',
                'as' => 'create-superviseur-account',]);

            Route::post('/edit-superviseur-account', [
                'uses' => 'PairEducateurController@postEditSuperviseur',
                'as' => 'edit-superviseur-account',]);

            Route::post('/delete-superviseur-account', [
                'uses' => 'PairEducateurController@postDeleteSuperviseur',
                'as' => 'delete-superviseur-account',]);

            /**
             * Encadreur ONG
             */
            Route::get('/gestion-encadreur-association', [
                'uses' => 'PairEducateurController@getCompteEncadreurOng',
                'as' => 'gestion-encadreur-association',]);

            Route::post('/getAssociationByRegion', [
                'uses' => 'PairEducateurController@getAssociationByRegion',
                'as' => 'getAssociationByRegion',]);

            Route::post('/create-encadreur-association-account', [
                'uses' => 'PairEducateurController@saveCompteEncadreurOng',
                'as' => 'create-encadreur-association-account',]);

            Route::post('/edit-encadreur-association-account', [
                'uses' => 'PairEducateurController@postEditEncadreurOng',
                'as' => 'edit-encadreur-association-account',]);

            Route::post('/delete-encadreur-association-account', [
                'uses' => 'PairEducateurController@postDeleteEncadreurOng',
                'as' => 'delete-encadreur-association-account',]);

            Route::post('/getRegionauxByRegion', [
                'uses' => 'PairEducateurController@getRegionauxByRegion',
                'as' => 'getRegionauxByRegion',]);

            /**
             * Encadreur régionaux
             */
            Route::get('/gestion-encadreur-regionaux', [
                'uses' => 'PairEducateurController@getCompteEncadreurRegionaux',
                'as' => 'gestion-encadreur-regionaux',]);

            Route::post('/create-encadreur-regionaux-account', [
                'uses' => 'PairEducateurController@saveCompteEncadreurRegionaux',
                'as' => 'create-encadreur-regionaux-account',]);

            Route::post('/edit-encadreur-regionaux-account', [
                'uses' => 'PairEducateurController@postEditEncadreurRegionaux',
                'as' => 'edit-encadreur-regionaux-account',]);

            Route::post('/delete-encadreur-regionaux-account', [
                'uses' => 'PairEducateurController@postDeleteEncadreurRegionaux',
                'as' => 'delete-encadreur-regionaux-account',]);

            /**
             * Superviseur d'université
             */
            Route::post('/export-liste-user-pe', [
                'uses' => 'PairEducateurController@exportPEUserToExcel',
                'as' => 'export-liste-user-pe',]);

            Route::get('/superviseur-universite', [
                'uses' => 'PairEducateurController@getSupUniversitaire',
                'as' => 'superviseur-universite',]);

            Route::post('/encadreur-ong', [
                'uses' => 'PairEducateurController@getEncadreurRegional',
                'as' => 'encadreur-ong',]);

            Route::post('/post-save-superviseur-univ', [
                'uses' => 'PairEducateurController@postSaveSuperviseurUniv',
                'as' => 'post-save-superviseur-univ',]);

            /**
             * PE universitaire
             */
            Route::get('/pe-universite-page', [
                'uses' => 'PairEducateurController@getPEUniversitaire',
                'as' => 'pe-universite-page',]);

            Route::post('/superviseur-univ-liste', [
                'uses' => 'PairEducateurController@getSupUniv',
                'as' => 'superviseur-univ-liste',]);

            Route::post('/post-save-pe-univ', [
                'uses' => 'PairEducateurController@postSavePEUniv',
                'as' => 'post-save-pe-univ',]);

            /**
             * PE scolaire
             */
            Route::post('/superviseur-ecole-liste', [
                'uses' => 'PairEducateurController@getSupEcole',
                'as' => 'superviseur-ecole-liste',]);

            /**
             * Suivi des pair educateur
             */
            Route::get('/suivi-pair-educateur', [
                'uses' => 'PairEducateurController@getListeSuiviPE',
                'as' => 'suivi-pair-educateur',]);

            Route::get('/detail-suivi-pair-educateur', [
                'uses' => 'PairEducateurController@getDetailPrestationPe',
                'as' => 'detail-suivi-pair-educateur',]);

            Route::get('/suivi-pair-superviseur', [
                'uses' => 'PairEducateurController@getListeSuiviSuperviseur',
                'as' => 'suivi-pair-superviseur',]);

            Route::get('/detail-suivi-pair-superviseur', [
                'uses' => 'PairEducateurController@getDetailPrestationSuperviseur',
                'as' => 'detail-suivi-pair-superviseur',]);

            Route::get('/suivi-admin-ong', [
                'uses' => 'PairEducateurController@getListeSuiviAdminOng',
                'as' => 'suivi-admin-ong',]);

            Route::get('/suivi-admin-regionaux', [
                'uses' => 'PairEducateurController@getListeSuiviAdminRegionaux',
                'as' => 'suivi-admin-regionaux',]);
        });

        Route::group(['middleware' => ['planning']], function () {
            Route::get('/add-planning-famillial-moderne', [
                'uses' => 'AdminController@getPlanningPage',
            ])->name('add-planning-famillial-moderne');

            Route::get('/add-planning-famillial-naturelle', [
                'uses' => 'AdminController@getPlanningPageNaturelle',
            ])->name('add-planning-famillial-naturelle');

            Route::post('/save-planning-famillial', [
                'uses' => 'AdminController@savePlanning',
                'as' => 'save-planning-famillial',]);

            Route::post('/edit-planning-famillial', [
                'uses' => 'AdminController@editPlanning',
                'as' => 'edit-planning-famillial',]);

            Route::post('/delete-planning-famillial', [
                'uses' => 'AdminController@deletePlanning',
                'as' => 'delete-planning-famillial',]);

            Route::get('/souscription-planning', [
                'uses' => 'AdminController@getListeSouscriptionPlanning',
            ])->name('souscription-planning');

            Route::post('/delete-souscription-planning', [
                'uses' => 'AdminController@deleteSouscription',
            ])->name('delete-souscription-planning');
        });

        Route::group(['middleware' => ['conseil']], function () {
            Route::group(['prefix' => 'admin'], function () {
                // Route:resources('conseils-pratiques', 'ConseilPratiqueController');
                // TODO: review this
                Route::get('conseils-pratiques', 'ConseilPratiqueController@index')->name('conseils-pratiques.index');

                Route::get('conseils-pratiques/create', 'ConseilPratiqueController@create')->name('conseils-pratiques.create');

                Route::post('conseils-pratiques', 'ConseilPratiqueController@store')->name('conseils-pratiques.store');

                Route::get('conseils-pratiques/{conseil_pratique}', 'ConseilPratiqueController@edit')->name('conseils-pratiques.show');

                Route::put('conseils-pratiques/{conseil_pratique}', 'ConseilPratiqueController@update')->name('conseils-pratiques.update');

                Route::delete('conseils-pratiques/{conseil_pratique}', 'ConseilPratiqueController@destroy')->name('conseils-pratiques.destroy');

                Route::group(['prefix' => 'mesure-preventives'], function () {
                    Route::get('/', 'ConseilPratiqueCovid19Controller@index')->name('conseils-pratiques-covid-19.index');

                    Route::post('/', 'ConseilPratiqueCovid19Controller@store')->name('conseils-pratiques-covid-19.store');

                    Route::put('{conseil_pratique_covid_19}', 'ConseilPratiqueCovid19Controller@update')->name('conseils-pratiques-covid-19.update');

                    Route::delete('{conseil_pratique_covid_19}', 'ConseilPratiqueCovid19Controller@destroy')->name('conseils-pratiques-covid-19.destroy');
                });
            });

            // auto test
            Route::get('admin/auto-test-result', 'AutoTestResultController')->name('auto-test-result');

            // Route::post('admin/auto-test', 'AutoTestController@store')->name('auto-test.store');

            Route::get('covid-19-case-location', 'Covid19CauseLocationController@index')->name('covid-19-case-location.index');

            Route::post('covid-19-case-location', 'Covid19CauseLocationController@store')->name('covid-19-case-location.store');

            //activités econvivial
            Route::get('/admin-activite-econvivial', [
                'uses' => 'ActiviteeConvivialController@index',
                'as' => 'admin-activite-econvivial',]);

            Route::post('/postActiviteeConvivial', [
                'uses' => 'ActiviteeConvivialController@saveActiviteeConvivial',
                'as' => 'postActiviteeConvivial',]);

            Route::post('/postEditActiviteeConvivial', [
                'uses' => 'ActiviteeConvivialController@deleteActiviteeConvivial',
                'as' => 'postEditActiviteeConvivial',]);


            // Conseils pratiques
            Route::get('/admin-conseil-pratique', [
                'uses' => 'ConseilPratiqueController@index',
                'as' => 'admin-conseil-pratique',]);

            Route::post('/postConseilPratique', [
                'uses' => 'ConseilPratiqueController@saveConseilPratique',
                'as' => 'postConseilPratique',]);

            Route::post('/postEditConseilPratique', [
                'uses' => 'ConseilPratiqueController@deleteConseilPratique',
                'as' => 'postEditConseilPratique',]);

            //Suivi des like de conseil pratique
            Route::get('/suivi-like-conseil-pratique', [
                'uses' => 'ConseilPratiqueController@getListeConseilLike',
                'as' => 'suivi-like-conseil-pratique',]);

            Route::get('/export-like-conseil-pratique', [
                'uses' => 'ConseilPratiqueController@exportListeConseilLiker',
                'as' => 'export-like-conseil-pratique',]);

            /**
             * Agenda route admin back office
             */
            Route::get('/admin-save-agenda', [
                'uses' => 'AgendaController@getAgendaForm',
                'as' => 'admin-save-agenda',]);

            Route::post('/saveamdinagenda', [
                'uses' => 'AgendaController@postSaveAgenda',
                'as' => 'saveamdinagenda',]);

            Route::post('/post-save-edit-admin-agenda', [
                'uses' => 'AgendaController@postEditSaveAgenda',
                'as' => 'post-save-edit-admin-agenda',]);

            Route::post('/post-delete-agenda', [
                'uses' => 'AgendaController@deleteAgenda',
                'as' => 'post-delete-agenda',]);

            /**
             * Agenda bannière
             */
            Route::get('/admin-save-agenda-banniere', [
                'uses' => 'AgendaController@getAgendaBanniereForm',
                'as' => 'admin-save-agenda-banniere',]);

            Route::post('/post-save-admin-agenda-banniere', [
                'uses' => 'AgendaController@postSaveAgendaBanniere',
                'as' => 'post-save-admin-agenda-banniere',]);

            Route::post('/post-save-edit-admin-agenda-banniere', [
                'uses' => 'AgendaController@postEditSaveAgendaBanniere',
                'as' => 'post-save-edit-admin-agenda-banniere',]);

            Route::post('/post-delete-agenda-banniere', [
                'uses' => 'AgendaController@deleteAgendaBanniere',
                'as' => 'post-delete-agenda-banniere',]);
        });

        Route::group(['middleware' => ['menstruation']], function () {
            /**
             * Suivi de grossesse coté admin
             */
            Route::get('/suivre-grossesse-admin', [
                'uses' => 'GrossesseController@getAdminSuiviGrossesse',
                'as' => 'suivre-grossesse-admin',]);

            Route::get('/export-suivi-grossesse', [
                'uses' => 'GrossesseController@exportSuiviGrossesse',
                'as' => 'export-suivi-grossesse',]);

            Route::get('/annulation-suivi-grossesse', [
                'uses' => 'GrossesseController@getSuiviGrossesseAnnuler',
                'as' => 'annulation-suivi-grossesse',]);

            /**
             * Suivi de règle et ovulation coté admin
             */
            Route::get('/suivi-regle-admin', [
                'uses' => 'MenstruController@getAdminSuiviRegle',
                'as' => 'suivi-regle-admin',]);

            Route::get('/export-suivi-regle-admin', [
                'uses' => 'MenstruController@exportSuiviRegle',
                'as' => 'export-suivi-regle-admin',]);

            Route::get('/suivi-ovulation-admin', [
                'uses' => 'MenstruController@getAdminSuiviOvulation',
                'as' => 'suivi-ovulation-admin',]);

            Route::get('/export-ovulation-admin', [
                'uses' => 'MenstruController@exportSuiviOvulation',
                'as' => 'export-ovulation-admin',]);

            Route::get('/annulation-suivi-menstruation', [
                'uses' => 'MenstruController@getAnnulationSuivi',
                'as' => 'annulation-suivi-menstruation',]);
        });

        Route::group(['middleware' => ['formationSanitaire']], function () {
            Route::get('/liste-demande-consultation-formation', [
                'uses' => 'FormationSanitaireController@getListeDemandeConsultation',
                'as' => 'liste-demande-consultation-formation',]);

            Route::get('/export-demande-consultation', [
                'uses' => 'FormationSanitaireController@exportDemandeConsultation',
                'as' => 'export-demande-consultation',]);

            Route::get('/liste-consultation-effectuee-formation', [
                'uses' => 'FormationSanitaireController@getListeConsultationEffectuee',
                'as' => 'liste-consultation-effectuee-formation',]);

            Route::get('/export-consultation-effectue', [
                'uses' => 'FormationSanitaireController@exportConsultationEffectue',
                'as' => 'export-consultation-effectue',]);

            Route::get('/liste-resultat-consultation-formation', [
                'uses' => 'FormationSanitaireController@getListeResultatConsultation',
                'as' => 'liste-resultat-consultation-formation',]);

            /**
             * Formation sanitaire coté admin
             */
            Route::get('/formation-sanitaire', [
                'uses' => 'FormationSanitaireController@index',
                'as' => 'formation-sanitaire',]);

            Route::post('/postFormationSanitaire', [
                'uses' => 'FormationSanitaireController@saveFormation',
                'as' => 'postFormationSanitaire',]);

            Route::post('/postEditFormationSanitaire', [
                'uses' => 'FormationSanitaireController@postEditFormationSanitaire',
                'as' => 'postEditFormationSanitaire',]);

            Route::post('/postDeleteFormationSanitaire', [
                'uses' => 'FormationSanitaireController@postDeleteFormationSanitaire',
                'as' => 'postDeleteFormationSanitaire',]);

            //Objet consultation

            Route::get('/objet-consultation', [
                'uses' => 'AdminController@getObjetConsultation',
                'as' => 'objet-consultation',]);

            Route::post('/postObjetConsultation', [
                'uses' => 'AdminController@saveObjetConsultation',
                'as' => 'postObjetConsultation',]);

            Route::post('/postEditObjetConsultation', [
                'uses' => 'AdminController@editObjetConsultation',
                'as' => 'postEditObjetConsultation',]);

            Route::post('/deleteObjetConsultation', [
                'uses' => 'AdminController@deleteObjetConsultation',
                'as' => 'deleteObjetConsultation',]);

            // Getion des régions

            Route::get('/liste-region', [
                'uses' => 'RegionController@index',
                'as' => 'liste-region',]);

            Route::post('/postSaveRegion', [
                'uses' => 'RegionController@saveRegion',
                'as' => 'postSaveRegion',]);

            Route::post('/postEditRegion', [
                'uses' => 'RegionController@postEditRegion',
                'as' => 'postEditRegion',]);

            Route::post('/postDeleteRegion', [
                'uses' => 'RegionController@postDeleteRegion',
                'as' => 'postDeleteRegion',]);


            //gestion de l'enrégistrement des téléconseillers
            Route::get('/liste-teleconseiller', [
                'uses' => 'TeleConseillerController@indexT',
                'as' => 'liste-teleconseiller',]);

            Route::post('/postSaveTeleConseiller', [
                'uses' => 'TeleConseillerController@saveTeleConseiller',
                'as' => 'postSaveTeleConseiller',]);


            Route::post('/postEditTeleConseiller', [
                'uses' => 'TeleConseillerController@postEditTeleConseiller',
                'as' => 'postEditTeleConseiller',]);

            Route::post('/postDeleteTeleConseiller', [
                'uses' => 'TeleConseillerController@postDeleteTeleConseiller',
                'as' => 'postDeleteTeleConseiller',]);

            //gestion des produits ist
            Route::get('/liste-medicament', [
                'uses' => 'ProduitIstController@index',
                'as' => 'liste-medicament',]);

            Route::post('/postSaveProduitIST', [
                'uses' => 'ProduitIstController@saveProduitIST',
                'as' => 'postSaveProduitIST',]);

            Route::post('/postEditProduitIST', [
                'uses' => 'ProduitIstController@postEditProduitIST',
                'as' => 'postEditProduitIST',]);

            Route::post('/postDeleteProduitIST', [
                'uses' => 'ProduitIstController@postDeleteProduitIST',
                'as' => 'postDeleteProduitIST',]);


            // Getion des villes
            Route::get('/liste-ville', [
                'uses' => 'VilleController@index',
                'as' => 'liste-ville',]);

            Route::post('/postSaveVille', [
                'uses' => 'VilleController@saveVille',
                'as' => 'postSaveVille',]);

            Route::post('/postEditVille', [
                'uses' => 'VilleController@postEditVille',
                'as' => 'postEditVille',]);

            Route::post('/postDeleteVille', [
                'uses' => 'VilleController@postDeleteVille',
                'as' => 'postDeleteVille',]);

            //Gestion des quartiers

            Route::get('/liste-quartier', [
                'uses' => 'VilleController@getPageQuartier',
                'as' => 'liste-quartier',]);

            Route::post('/postSaveQuartier', [
                'uses' => 'VilleController@postQuartier',
                'as' => 'postSaveQuartier',]);

            Route::post('/postEditQuartier', [
                'uses' => 'VilleController@postEditQuartier',
                'as' => 'postEditQuartier',]);

            Route::post('/postDeleteQuartier', [
                'uses' => 'VilleController@postDeleteQuartier',
                'as' => 'postDeleteQuartier',]);

            // Création utilisateur formation sanitaire

            Route::post('/saveUserFormationSanitaire', [
                'uses' => 'UserController@saveUserFormationSanitaire',
                'as' => 'saveUserFormationSanitaire',]);

            Route::post('/deleteUserFormationSanitaire', [
                'uses' => 'UserController@deleteUserFormationSanitaire',
                'as' => 'deleteUserFormationSanitaire',]);
        });

        Route::group(['middleware' => ['quiz']], function () {
            /**
             * Gestion des QUIZ
             */
            Route::get('/add-new-quiz', [
                'uses' => 'QuizController@getQuizThemePage',
                'as' => 'add-new-quiz',]);

            Route::post('/save-new-quiz', [
                'uses' => 'QuizController@saveNewQuiz',
                'as' => 'save-new-quiz',]);

            Route::post('/delete-quiz-module', [
                'uses' => 'QuizController@deleteQuiz',
                'as' => 'delete-quiz-module',]);

            Route::get('/detail-add-new-qui-question', [
                'uses' => 'QuizController@showQuizQuestions',
                'as' => 'detail-add-new-qui-question',]);

            Route::post('/save-new-quiz-question', [
                'uses' => 'QuizController@addNewQuestion',
                'as' => 'save-new-quiz-question',]);

            Route::post('/delete-new-quiz-question', [
                'uses' => 'QuizController@deteleQuestion',
                'as' => 'delete-new-quiz-question',]);

            Route::post('/save-alement-reponse', [
                'uses' => 'QuizController@addElementReponse',
                'as' => 'save-alement-reponse',]);

            Route::post('/delete-element-reponse', [
                'uses' => 'QuizController@deteleElmtReponse',
                'as' => 'delete-element-reponse',]);

            Route::post('/change-quiz-statut', [
                'uses' => 'QuizController@activeQuiz',
                'as' => 'change-quiz-statut',]);

            Route::get('/quiz-admin-page', [
                'uses' => 'QuizController@getQuizPage',
                'as' => 'quiz-admin-page',]);

            Route::get('/detail-quiz-admin-page', [
                'uses' => 'QuizController@getDetailQuiz',
                'as' => 'detail-quiz-admin-page',]);
        });

        Route::group(['middleware' => ['parametrage']], function () {
            /**
             * Paramétrage prédefini
             */

            /**
             * Ecoles & Universités
             */
            Route::get('/gestion-etablissement', [
                'uses' => 'ParametrageController@getEtablissementForm',
                'as' => 'gestion-etablissement',]);

            Route::post('/postSaveEtablissementScolaire', [
                'uses' => 'ParametrageController@postEtablissementScolaire',
                'as' => 'postSaveEtablissementScolaire',]);

            Route::post('/postEditEtablissementScolaire', [
                'uses' => 'ParametrageController@postEditEtablissementScolaire',
                'as' => 'postEditEtablissementScolaire',]);

            Route::post('/postDeleteEtablissementScolaire', [
                'uses' => 'ParametrageController@postDeleteEtablissementScolaire',
                'as' => 'postDeleteEtablissementScolaire',]);

            /**
             * Associations
             */
            Route::get('/gestion-association', [
                'uses' => 'ParametrageController@getAssociationForm',
                'as' => 'gestion-association',]);

            Route::post('/postSaveAssociation', [
                'uses' => 'ParametrageController@postSaveAssociation',
                'as' => 'postSaveAssociation',]);

            Route::post('/postEditAssociation', [
                'uses' => 'ParametrageController@postEditAssociation',
                'as' => 'postEditAssociation',]);

            Route::post('/postDeleteAssociation', [
                'uses' => 'ParametrageController@postDeleteAssociation',
                'as' => 'postDeleteAssociation',]);

            /**
             * Type d'entretien
             */
            Route::get('/gestion-type-entretien', [
                'uses' => 'ParametrageController@getTypeEntretienForm',
                'as' => 'gestion-type-entretien',]);

            Route::post('/postSaveTypeEntretien', [
                'uses' => 'ParametrageController@postSaveTypeEntretien',
                'as' => 'postSaveTypeEntretien',]);

            Route::post('/postEditTypeEntretien', [
                'uses' => 'ParametrageController@postEditTypEntretien',
                'as' => 'postEditTypeEntretien',]);

            Route::post('/postDeleteTypeEntretien', [
                'uses' => 'ParametrageController@postDeleteTypeEntretien',
                'as' => 'postDeleteTypeEntretien',]);

            /**
             * Contenu d'entretien
             */
            Route::get('/gestion-contenu-entretien', [
                'uses' => 'ParametrageController@getContenuEntretienForm',
                'as' => 'gestion-contenu-entretien',]);

            Route::post('/postSaveContenuEntretien', [
                'uses' => 'ParametrageController@postSaveContenuEntretien',
                'as' => 'postSaveContenuEntretien',]);

            Route::post('/postEditContenuEntretien', [
                'uses' => 'ParametrageController@postEditContenuEntretien',
                'as' => 'postEditContenuEntretien',]);

            Route::post('/postDeleteContenuEntretien', [
                'uses' => 'ParametrageController@postDeleteContenuEntretien',
                'as' => 'postDeleteContenuEntretien',]);
        });

        Route::get('/tableau-de-bord-admin', [
            'uses' => 'AdminController@dashboard',
            'as' => 'tableau-de-bord-admin',]);

        Route::get('/export-liste-utilisateur-excel', [
            'uses' => 'AdminController@exportListeUserToExcel',
            'as' => 'export-liste-utilisateur-excel',]);

        Route::post('/saveEditUserFromAdmin', [
            'uses' => 'AdminController@editUserInfo',
            'as' => 'saveEditUserFromAdmin',]);

        Route::post('/saveAdminConvivial', [
            'uses' => 'AdminController@saveAdminConvivial',
            'as' => 'saveAdminConvivial',]);

        Route::post('/postDeleteUser', [
            'uses' => 'AdminController@deleteUser',
            'as' => 'postDeleteUser',]);


        Route::post('/postDiffuseAlerteUser', [
            'uses' => 'AdminController@sendSmsToUser',
            'as' => 'postDiffuseAlerteUser',]);

        /**
         * Profil administrateur
         */
        Route::get('/admin-profil', [
            'uses' => 'AccountController@adminProfil',
            'as' => 'admin-profil',]);

        Route::post('/modifierAdminInfo', [
            'uses' => 'AccountController@updateAdminInfo',
            'as' => 'modifierAdminInfo',]);

        Route::post('/modifierAdminProfile', [
            'uses' => 'AccountController@updateAdminProfile',
            'as' => 'modifierAdminProfile',]);

        Route::post('/modifierAdminPassword', [
            'uses' => 'AccountController@updateAdminPassword',
            'as' => 'modifierAdminPassword',]);

        // Création utilisateur téléconseiller

        Route::post('/saveUserTeleConseiller', [
            'uses' => 'UserController@saveUserTeleConseiller',
            'as' => 'saveUserTeleConseiller',]);

        Route::post('/deleteUserTeleConseiller', [
            'uses' => 'UserController@deleteUserTeleConseiller',
            'as' => 'deleteUserTeleConseiller',]);

        Route::post('/editUserTeleConseiller', [
            'uses' => 'UserController@saveEditUserTeleConseiller',
            'as' => 'editUserTeleConseiller',]);

        Route::post('/editUserTeleConseillerPwd', [
            'uses' => 'UserController@saveEditPswUserTeleConseiller',
            'as' => 'editUserTeleConseillerPwd',]);

        //Suivi des messages de chats

        Route::post('/delete-chat-message', [
            'uses' => 'TeleConseillerController@deleteChat',
            'as' => 'delete-chat-message',]);

        Route::get('/export-chat-message', [
            'uses' => 'TeleConseillerController@exportListeMessage',
            'as' => 'export-chat-message',]);

        /**
         * Suivi des rapports d'alertes
         */
        Route::get('/detail-rapport-alerte-sms', [
            'uses' => 'AlerteController@getDetailRapport',
            'as' => 'detail-rapport-alerte-sms',]);

        /**
         * Utilisateur rose bleue
         */
        Route::get('/liste-inscris-rose-bleue', [
            'uses' => 'AgendaController@getListeInscris',
            'as' => 'liste-inscris-rose-bleue',]);

        /**
         * Admin Innov Health
         */
        Route::post('/post-gestion-innov', [
            'uses' => 'AdminController@saveAdminInnov',
            'as' => 'post-gestion-innov',]);

        //Liste des admin suivi d'affectation de role

        Route::post('/save-affecter-role-admin', [
            'uses' => 'AdminController@postAffectation',
            'as' => 'save-affecter-role-admin',]);

        Route::post('/delete-affecter-role-admin', [
            'uses' => 'AdminController@postDeleteAffectation',
            'as' => 'delete-affecter-role-admin',]);
    });

    /**
     * Espace membre du PE universitaire
     */
    Route::post('/import-entretien-pair', [
        'uses' => 'PEController@importEntretienPair',
        'as' => 'import-entretien-pair',]);

    Route::get('/espace-membre-pair-educateur-universitaire', [
        'uses' => 'PEController@getPeUnivEspaceMembre',
        'as' => 'espace-membre-pair-educateur-universitaire',]);

    Route::get('/rapport-pair-educateur-universitaire', [
        'uses' => 'PEController@generateRapportPage',
        'as' => 'rapport-pair-educateur-universitaire',]);

    //Save Rapport

    Route::post('/save-rapport-pair-educateur-universitaire', [
        'uses' => 'PEController@generateRapport',
        'as' => 'save-rapport-pair-educateur-universitaire',]);

    //Historique des rapports
    Route::get('/historique-rapport-pair-educateur-universitaire', [
        'uses' => 'PEController@getHistoriqueRapportEnvoye',
        'as' => 'historique-rapport-pair-educateur-universitaire',]);


    /**
     * Superviseur ecole
     */
    Route::get('/rapport-superviseur-paire-educateur-scolaire', [
        'uses' => 'PEController@generateRapportPageSupScolaire',
        'as' => 'rapport-superviseur-paire-educateur-scolaire',]);

    //Historique des rapports
    Route::get('/historique-rapport-superviseur-educateur-ecole', [
        'uses' => 'PEController@getHistoriqueRapportEnvoyeSupEcole',
        'as' => 'historique-rapport-superviseur-educateur-ecole',]);

    //Detail des rapports de superviseur scolaire
    Route::get('/detail-rapport-superviseur-educateur-ecole', [
        'uses' => 'PEController@getDetailRapportSupEcole',
        'as' => 'detail-rapport-superviseur-educateur-ecole',]);

    //Rapport des superviseurs universitaire
    Route::get('/rapport-superviseur-universitaire', [
        'uses' => 'PEController@getSupUniversitaireEspaceMembre',
        'as' => 'rapport-superviseur-universitaire',]);

    //Générer Rapport des superviseurs universitaire
    Route::post('/generer-rapport-superviseur-universitaire', [
        'uses' => 'PEController@generateSupRapport',
        'as' => 'generer-rapport-superviseur-universitaire',]);

    //Historique des rapports du superviseur universitaire
    Route::get('/historique-rapport-travail', [
        'uses' => 'PEController@getHistoriqueRapportSup',
        'as' => 'historique-rapport-travail',]);

    //Détail de rapport
    Route::get('/detail-rapport-superviseur-universitaire', [
        'uses' => 'PEController@detailMesRapport',
        'as' => 'detail-rapport-superviseur-universitaire',]);

    //Suivi des PE universitaires
    Route::get('/liste-pe-univ-associe', [
        'uses' => 'PEController@getSuiviPeUnivBySup',
        'as' => 'liste-pe-univ-associe',]);

    //Suivi des PE universitaires
    Route::get('/rapport-suivi-pe-univ-associe', [
        'uses' => 'PEController@getListeRapportPeUniv',
        'as' => 'rapport-suivi-pe-univ-associe',]);

    /**
     * Espace membre du pair éducateurimport-entretien-pair
     */
    Route::get('/entretiens-pair-educateur', 'LoadEntretiensController@index')->name('entretiens-pair-educateur');

    Route::get('entretiens-participants', 'EntretienParticipantController')->name('entretiens-participants');
    Route::get('entretiens-participants-suite', 'EntretienParticipantControllerSuite')->name('entretiens-participants-suite');
    Route::get('/entretiens-participants-data', 'EntretienParticipantControllerData@data')->name('entretiens-participants-data');



    Route::get('/espace-membre-pair-educateur', [
        'uses' => 'PEController@index',
        'as' => 'espace-membre-pair-educateur',]);

    Route::post('/getContenuEntretienByType', [
        'uses' => 'PEController@getContenuByType',
        'as' => 'getContenuEntretienByType',]);

    Route::get('/create-eleve-account', [
        'uses' => 'PEController@getUtilisateurForm',
        'as' => 'create-eleve-account',]);

    Route::post('/postCreateUserEleve', [
        'uses' => 'PEController@saveCompteUtilisateur',
        'as' => 'postCreateUserEleve',]);

    Route::get('/liste-utilisateur-eleve-etudiant', [
        'uses' => 'PEController@getListeUtilisateur',
        'as' => 'liste-utilisateur-eleve-etudiant',]);

    Route::post('/getInfoUserByCode', 'PEController@getUserInfoByCode')->name('getInfoUserByCode');

    Route::post('/postSaveEntretienPEUser', [
        'uses' => 'PEController@postSaveEntretien',
        'as' => 'postSaveEntretienPEUser',]);

    Route::get('/liste-entretien-attente-validation-pe', [
        'uses' => 'PEController@getHistoriqueEntretien',
        'as' => 'liste-entretien-attente-validation-pe',]);

    Route::get('/liste-entretien-valider-pe', [
        'uses' => 'PEController@getHistoriqueEntretienValide',
        'as' => 'liste-entretien-valider-pe',]);

    Route::get('/valider-inscription-user-pe', [
        'uses' => 'PEController@getInscriptionAttente',
        'as' => 'valider-inscription-user-pe',]);

    Route::get('/liste-inscription-user-pe-valider', [
        'uses' => 'PEController@getInscriptionValider',
        'as' => 'liste-inscription-user-pe-valider',]);

    Route::get('/liste-inscription-user-pe-rejeter', [
        'uses' => 'PEController@getInscriptionRejeter',
        'as' => 'liste-inscription-user-pe-rejeter',]);

    /**
     * Nouveau pour PE
     */
    Route::post('/save-pe-entretien', [
        'uses' => 'PairEducateurController@postSaveEntretienInfo',
        'as' => 'save-pe-entretien',]);

    /**
     * Valider les inscriptions par les PE
     */
    Route::post('/postValideUserPeInscription', [
        'uses' => 'PEController@postValiderUserInscription',
        'as' => 'postValideUserPeInscription',]);

    Route::post('/postRejectUserPeInscription', [
        'uses' => 'PEController@postRejeterUserInscription',
        'as' => 'postRejectUserPeInscription',]);

    Route::post('/postEditAccountUserEleve', [
        'uses' => 'PEController@postEditCompteUtilisateur',
        'as' => 'postEditAccountUserEleve',]);

    Route::post('/postDeleteAccountUserEleve', [
        'uses' => 'PEController@deleteCompteUser',
        'as' => 'postDeleteAccountUserEleve',]);

    /**
     * Superviseur
     */
    Route::get('/liste-entretien-attente-validation-sup', [
        'uses' => 'SuperviseurController@getHistoriqueEntretien',
        'as' => 'liste-entretien-attente-validation-sup',]);

    Route::get('/liste-entretien-valider-sup', [
        'uses' => 'SuperviseurController@getHistoriqueEntretienValide',
        'as' => 'liste-entretien-valider-sup',]);

    Route::post('/postValidationSuperviseur', [
        'uses' => 'SuperviseurController@valideEntretien',
        'as' => 'postValidationSuperviseur',]);

    Route::get('/liste-utilisateur-sup', [
        'uses' => 'SuperviseurController@getListeUtilisateur',
        'as' => 'liste-utilisateur-sup',]);

    Route::get('/liste-de-suivi-de-pe-sup', [
        'uses' => 'SuperviseurController@getListePairEducateur',
        'as' => 'liste-de-suivi-de-pe-sup',]);

    Route::get('/suivi-de-pe-sup', [
        'uses' => 'SuperviseurController@suivrePairEducateur',
        'as' => 'suivi-de-pe-sup',]);

    /**
     * Admin ONG
     */
    Route::get('/liste-entretien-attente-validation-admin-ong', [
        'uses' => 'PEController@getEncadreurOngEspace',
        'as' => 'liste-entretien-attente-validation-admin-ong',]);

    //Historique des rapports
    Route::get('/historique-rapport-admin-ong', [
        'uses' => 'PEController@getEncadreurOngEspace',
        'as' => 'historique-rapport-admin-ong',]);

    Route::get('/liste-entretien-valider-admin-ong', [
        'uses' => 'AdminOngController@getHistoriqueEntretienValide',
        'as' => 'liste-entretien-valider-admin-ong',]);

    Route::post('/postValidationAdminOng', [
        'uses' => 'AdminOngController@valideEntretien',
        'as' => 'postValidationAdminOng',]);

    Route::get('/liste-utilisateur-admin-ong', [
        'uses' => 'AdminOngController@getListeUtilisateur',
        'as' => 'liste-utilisateur-admin-ong',]);

    Route::get('/liste-de-suivi-de-sup-ong', [
        'uses' => 'AdminOngController@getListeSuperviseur',
        'as' => 'liste-de-suivi-de-sup-ong',]);

    Route::get('/suivi-de-sup-ong', [
        'uses' => 'AdminOngController@suivreSuperviseur',
        'as' => 'suivi-de-sup-ong',]);

    /**
     * Admin Régionaux
     */
    Route::get('/liste-entretien-attente-validation-admin-reg', [
        'uses' => 'PEController@getEncadreurRegionaux',
        'as' => 'liste-entretien-attente-validation-admin-reg',]);

    Route::get('/liste-entretien-valider-admin-reg', [
        'uses' => 'AdminRegionauxController@getHistoriqueEntretienValide',
        'as' => 'liste-entretien-valider-admin-reg',]);

    Route::post('/postValidationAdminRegionaux', [
        'uses' => 'AdminRegionauxController@valideEntretien',
        'as' => 'postValidationAdminRegionaux',]);

    Route::get('/liste-utilisateur-admin-regionaux', [
        'uses' => 'AdminRegionauxController@getListeUtilisateur',
        'as' => 'liste-utilisateur-admin-regionaux',]);

    Route::get('/liste-de-suivi-de-ong-reg', [
        'uses' => 'AdminRegionauxController@getListeUserONG',
        'as' => 'liste-de-suivi-de-ong-reg',]);

    Route::get('/suivi-de-ong-reg', [
        'uses' => 'AdminRegionauxController@suivreUserOng',
        'as' => 'suivi-de-ong-reg',]);

    /**
     * Admin Formaion Sanitaire
     */

    Route::group(['middleware' => ['adminFormationSanitaire']], function () {
        Route::get('/admin-formation-sanitaire-grossesse-en-cours', [
            'uses' => 'InnovHealthController@getAdminFSGrossesseEnCours',
            'as' => 'admin-formation-sanitaire-grossesse-en-cours',]);

        Route::get('/admin-formation-sanitaire-grossesse-a-terme', [
            'uses' => 'InnovHealthController@getAdminFSGrossesseATerme',
            'as' => 'admin-formation-sanitaire-grossesse-a-terme',]);

        Route::get('/admin-formation-sanitaire-grossesse-flux', [
            'uses' => 'InnovHealthController@getAdminFSGrossesseFlux',
            'as' => 'admin-formation-sanitaire-grossesse-flux',]);

        Route::get('/admin-formation-sanitaire-vaccination-en-cours', [
            'uses' => 'InnovHealthController@getAdminFSVaccinEnCours',
            'as' => 'admin-formation-sanitaire-vaccination-en-cours',]);

        Route::get('/admin-formation-sanitaire-vaccination-a-terme', [
            'uses' => 'InnovHealthController@getAdminFSVaccinATerme',
            'as' => 'admin-formation-sanitaire-vaccination-a-terme',]);

        Route::get('/admin-formation-sanitaire-vaccination-flux', [
            'uses' => 'InnovHealthController@getAdminFSVaccinationFlux',
            'as' => 'admin-formation-sanitaire-vaccination-flux',]);

        Route::get('/admin-formation-sanitaire-pf-en-cours', [
            'uses' => 'InnovHealthController@getAdminFSPFEnCours',
            'as' => 'admin-formation-sanitaire-pf-en-cours',]);

        Route::get('/admin-formation-sanitaire-pf-a-terme', [
            'uses' => 'InnovHealthController@getAdminFSPFATerme',
            'as' => 'admin-formation-sanitaire-pf-a-terme',]);

        Route::get('/admin-formation-sanitaire-pf-flux', [
            'uses' => 'InnovHealthController@getAdminFSfluxPF',
            'as' => 'admin-formation-sanitaire-pf-flux',]);
    });

    /**
     * Administrateur Principal Formation Sanitaire
     */
    Route::group(['middleware' => ['superAdminFormationSanitaire']], function () {

        Route::post('/postAdminFSDeleteUser', [
            'uses' => 'AdminController@deleteAdminFSUser',
            'as' => 'postAdminFSDeleteUser',]);

        Route::get('/super-admin-formation-sanitaire-get-formation-sanitaire', [
            'uses' => 'InnovHealthController@getFormulaireCreationFS',
            'as' => 'super-admin-formation-sanitaire-get-formation-sanitaire',]);

        Route::post('/super-admin-formation-sanitaire-save-formation', [
            'uses' => 'InnovHealthController@creerFormationSanitaire',
            'as' => 'super-admin-formation-sanitaire-save-formation',]);

        Route::post('/super-admin-formation-sanitaire-update-formation', [
            'uses' => 'InnovHealthController@updateFormationSanitaire',
            'as' => 'super-admin-formation-sanitaire-update-formation',]);

        Route::get('/super-admin-formation-sanitaire-get-responsable-fs', [
            'uses' => 'InnovHealthController@getFormulaireCreationResponsableSanitaire',
            'as' => 'super-admin-formation-sanitaire-get-responsable-fs',]);

        Route::post('/super-admin-formation-sanitaire-save-responsable-fs', [
            'uses' => 'InnovHealthController@creerResponsableFS',
            'as' => 'super-admin-formation-sanitaire-save-responsable-fs',]);

        Route::post('/super-admin-formation-sanitaire-update-responsable-fs', [
            'uses' => 'InnovHealthController@updateResponsableFS',
            'as' => 'super-admin-formation-sanitaire-update-responsable-fs',]);

        Route::post('/super-admin-formation-sanitaire-save-prestataire-fs', [
            'uses' => 'InnovHealthController@creerPrestataire',
            'as' => 'super-admin-formation-sanitaire-save-prestataire-fs',]);

        Route::get('/super-admin-formation-sanitaire-get-prestataire-fs', [
            'uses' => 'InnovHealthController@getFormulaireCreationPrestataire',
            'as' => 'super-admin-formation-sanitaire-get-prestataire-fs',]);

        Route::get('/super-admin-formation-sanitaire-get-grossesses-en-cours', [
            'uses' => 'InnovHealthController@getListeGrossessesEncours',
            'as' => 'super-admin-formation-sanitaire-get-grossesses-en-cours',]);

        Route::get('/super-admin-formation-sanitaire-get-grossesses-historique-transfert', [
            'uses' => 'InnovHealthController@getListeGrossessesTransfert',
            'as' => 'super-admin-formation-sanitaire-get-grossesses-historique-transfert',]);

        Route::get('/super-admin-formation-sanitaire-get-grossesses-a-terme', [
            'uses' => 'InnovHealthController@getListeGrossessesATerme',
            'as' => 'super-admin-formation-sanitaire-get-grossesses-a-terme',]);

        Route::get('/super-admin-formation-sanitaire-get-vaccination-en-cours', [
            'uses' => 'InnovHealthController@getListeVaccinationEncours',
            'as' => 'super-admin-formation-sanitaire-get-vaccination-en-cours',]);

        Route::get('/super-admin-formation-sanitaire-get-vaccination-a-terme', [
            'uses' => 'InnovHealthController@getListeVaccinationATerme',
            'as' => 'super-admin-formation-sanitaire-get-vaccination-a-terme',]);

        Route::get('/super-admin-formation-sanitaire-get-pf-en-cours', [
            'uses' => 'InnovHealthController@getListePlanningFAEnCour',
            'as' => 'super-admin-formation-sanitaire-get-pf-en-cours',]);

        Route::get('/super-admin-formation-sanitaire-get-pf-a-terme', [
            'uses' => 'InnovHealthController@getListePlanningFAATerme',
            'as' => 'super-admin-formation-sanitaire-get-pf-a-terme',]);

        Route::get('/super-admin-formation-sanitaire-flux-grossesse', [
            'uses' => 'InnovHealthController@getSuperAdminFSGrossesseFlux',
            'as' => 'super-admin-formation-sanitaire-flux-grossesse',]);

        Route::get('/super-admin-formation-sanitaire-flux-vaccination', [
            'uses' => 'InnovHealthController@getSuperAdminFSVaccinationFlux',
            'as' => 'super-admin-formation-sanitaire-flux-vaccination',]);

        Route::get('/super-admin-formation-sanitaire-flux-pf', [
            'uses' => 'InnovHealthController@getSuperAdminFSfluxPF',
            'as' => 'super-admin-formation-sanitaire-flux-pf',]);
    });


    /**
     * Admin Femmes enceintes
     */
    Route::group(['middleware' => ['formationSanitaireCPN']], function () {
        Route::get('/nouveau-beneficiaire-suivi', [
            'uses' => 'InnovHealthController@getBeneficiaireCPNPage',
            'as' => 'nouveau-beneficiaire-suivi',]);
        Route::post('/beneficiaire-recu', [
            'uses' => 'InnovHealthController@upDateRecuCPN',
            'as' => 'beneficiaire-recu',]);
        Route::post('/terminer-cpn', [
            'uses' => 'InnovHealthController@terminerCPN',
            'as' => 'terminer-cpn',]);
        Route::post('/migrer-beneficiare', [
            'uses' => 'InnovHealthController@migrerBeneficiaire',
            'as' => 'migrer-beneficiare',]);
        Route::get('/liste-demande-suivi-grossesse', [
            'uses' => 'InnovHealthController@getListeSuiviGrossesse',
            'as' => 'liste-demande-suivi-grossesse',]);
        Route::get('/suivi-grossesse-a-terme', [
            'uses' => 'InnovHealthController@getListeSuiviTerme',
            'as' => 'suivi-grossesse-a-terme',]);
        Route::get('/flux-grossesses-en-cours', [
            'uses' => 'InnovHealthController@fluxGrossesse',
            'as' => 'flux-grossesses-en-cours',]);
        Route::get('/detail-suivi-grossesse', [
            'uses' => 'InnovHealthController@getDetailSuiviGrossesse',
            'as' => 'detail-suivi-grossesse',]);
    });

    /**
     * Fonction Formation sanitaire
     */
    Route::group(['middleware' => ['formationSanitaireFunctionCommun']], function () {
        Route::post('/save-suivi-beneficiaire', [
            'uses' => 'InnovHealthController@saveSuiviBeneficiaire',
            'as' => 'save-suivi-beneficiaire',]);
        Route::post('/update-suivi-grossesse-beneficiaire', [
            'uses' => 'InnovHealthController@updateSuiviGrossesseBeneficiaire',
            'as' => 'update-suivi-grossesse-beneficiaire',]);
        Route::post('/transfert-beneficiaire', [
            'uses' => 'InnovHealthController@transfererBeneficiaire',
            'as' => 'transfert-beneficiaire',]);
        Route::get('/detail-beneficiaire', [
            'uses' => 'InnovHealthController@getBeneficiaireDetails',
            'as' => 'detail-beneficiaire',]);
        Route::get('/generate-detail-pdf', [
            'uses' => 'InnovHealthController@generateBeneficiairePDF',
            'as' => 'generate-detail-pdf',]);
    });

    /**
     * Vaccination
     */
    Route::group(['middleware' => ['formationSanitaireVaccination']], function () {
        Route::get('/suivi-vaccination-en-cours', [
            'uses' => 'InnovHealthController@getListeSuiviVaccination',
            'as' => 'suivi-vaccination-en-cours',]);
        Route::get('/suivi-vaccination-a-terme', [
            'uses' => 'InnovHealthController@getListeSuiviVaccinationTerme',
            'as' => 'suivi-vaccination-a-terme',]);
        Route::get('/detail-suivi-vaccination', [
            'uses' => 'InnovHealthController@getDetailSuiviVacination',
            'as' => 'detail-suivi-vaccination',]);
        Route::get('/flux-vaccination', [
            'uses' => 'InnovHealthController@fluxVaccination',
            'as' => 'flux-vaccination',]);
        Route::get('/nouveau-beneficiaire-vaccin', [
            'uses' => 'InnovHealthController@getBeneficiaireVaccinPage',
            'as' => 'nouveau-beneficiaire-vaccin',]);
        Route::get('/beneficiaire-migrer-pour-vaccin', [
            'uses' => 'InnovHealthController@getBeneficiaireMigrerPourVaccin',
            'as' => 'beneficiaire-migrer-pour-vaccin',]);
        Route::post('/save-beneficiaire-migrer-pour-vaccin', [
            'uses' => 'InnovHealthController@saveBeneficiaireMigrerPourVaccin',
            'as' => 'save-beneficiaire-migrer-pour-vaccin',]);
        Route::post('/beneficiaire-recu-vaccin', [
            'uses' => 'InnovHealthController@upDateRecuVaccin',
            'as' => 'beneficiaire-recu-vaccin',]);
    });

    /**
     * Planning familial getListeSuiviPlanningFA
     */
    Route::group(['middleware' => ['formationSanitairePF']], function () {
        Route::get('/nouveau-beneficiaire-planning-familial', [
            'uses' => 'InnovHealthController@getBeneficiairePFPage',
            'as' => 'nouveau-beneficiaire-planning-familial',]);
        Route::get('/suivi-planning-familial', [
            'uses' => 'InnovHealthController@getListeSuiviPlanningFAEnCour',
            'as' => 'suivi-planning-familial',]);
        Route::get('/beneficiaire-migrer-pour-pf', [
            'uses' => 'InnovHealthController@getBeneficiaireMigrerPourPF',
            'as' => 'beneficiaire-migrer-pour-pf',]);
        Route::get('/suivi-pf-a-terme', [
            'uses' => 'InnovHealthController@getListeSuiviPlanningFAATerme',
            'as' => 'suivi-pf-a-terme',]);
        Route::post('/save-beneficiaire-migrer-pour-pf', [
            'uses' => 'InnovHealthController@saveBeneficiaireMigrerPourPF',
            'as' => 'save-beneficiaire-migrer-pour-pf',]);
        Route::get('/flux-pf', [
            'uses' => 'InnovHealthController@fluxPF',
            'as' => 'flux-pf',]);
    });

    /**
     * Rapport journalier grossesse
     */
    Route::get('/rapport-journalier-suivi-grossesse', [
        'uses' => 'InnovHealthController@getRapportJournalierSuiviGrossesse',
        'as' => 'rapport-journalier-suivi-grossesse',]);

    Route::get('/rapport-periodique-suivi-grossesse', [
        'uses' => 'InnovHealthController@getRapportPeriodiqueSuiviGrossesse',
        'as' => 'rapport-periodique-suivi-grossesse',]);

    Route::get('/detail-rapport-suivi-grossesse', [
        'uses' => 'InnovHealthController@getDetailRapportSuiviGrossesse',
        'as' => 'detail-rapport-suivi-grossesse',]);

    /**
     * Rapport journalier vaccination
     */
    Route::get('/rapport-journalier-suivi-vaccination', [
        'uses' => 'InnovHealthController@getRapportJournalierSuiviVaccination',
        'as' => 'rapport-journalier-suivi-vaccination',]);

    Route::get('/rapport-periodique-suivi-vaccination', [
        'uses' => 'InnovHealthController@getRapportPeriodiqueSuiviVaccination',
        'as' => 'rapport-periodique-suivi-vaccination',]);

    Route::get('/detail-rapport-suivi-vaccination', [
        'uses' => 'InnovHealthController@getDetailRapportSuiviVaccination',
        'as' => 'detail-rapport-suivi-vaccination',]);

    /**
     * Pvvih
     */
    Route::get('/enregistrer-pvvih', [
        'uses' => 'PvvihController@getFormPvvih',
        'as' => 'enregistrer-pvvih',]);

    Route::post('/save-enregistrer-pvvih', [
        'uses' => 'PvvihController@savePvvih',
        'as' => 'save-enregistrer-pvvih',]);

    Route::get('/liste-pvvih-attente-validation', [
        'uses' => 'PvvihController@getListeAttente',
        'as' => 'liste-pvvih-attente-validation',]);

    Route::get('/liste-pvvih-valider', [
        'uses' => 'PvvihController@getListeValider',
        'as' => 'liste-pvvih-valider',]);

    /**
     * PVVIH Admin
     */
    Route::post('/valider-enreg-pvvih', [
        'uses' => 'PvvihController@postValidation',
        'as' => 'valider-enreg-pvvih',]);

    Route::get('/liste-pvvih-attente-validation-superviseur', [
        'uses' => 'PvvihController@getListeAttenteSup',
        'as' => 'liste-pvvih-attente-validation-superviseur',]);

    Route::get('/liste-pvvih-valider-superviseur', [
        'uses' => 'PvvihController@getListeValiderSup',
        'as' => 'liste-pvvih-valider-superviseur',]);

    /**
     * Message femme enceintes
     */
    Route::get('/diffuser-message-femme-enceintes', [
        'uses' => 'InnovHealthController@getPageEnvoieSms',
        'as' => 'diffuser-message-femme-enceintes',]);

    Route::post('/post-message-femme-enceinte', [
        'uses' => 'InnovHealthController@postMessageFemmeEnceinte',
        'as' => 'post-message-femme-enceinte',]);

    Route::get('/liste-message-grossesse-diffuser', [
        'uses' => 'InnovHealthController@getListeMessageGrossesse',
        'as' => 'liste-message-grossesse-diffuser',]);

    Route::get('/detail-message-grossesse', [
        'uses' => 'InnovHealthController@detailMessageGrossesse',
        'as' => 'detail-message-grossesse',]);

    /**
     * Message pvvih
     */
    Route::get('/diffuser-message-pvvih', [
        'uses' => 'PvvihController@getPageEnvoieSms',
        'as' => 'diffuser-message-pvvih',]);

    Route::post('/post-message-pvvih', [
        'uses' => 'PvvihController@postMessagePvvih',
        'as' => 'post-message-pvvih',]);

    Route::get('/liste-message-pvvih-diffuser', [
        'uses' => 'PvvihController@getListeMessagePvvih',
        'as' => 'liste-message-pvvih-diffuser',]);

    Route::get('/detail-message-pvvih', [
        'uses' => 'PvvihController@detailMessagePvvih',
        'as' => 'detail-message-pvvih',]);

    /**
     * Sms envoyés
     */
    Route::get('/sms-send', 'SmsSendController');

    Route::get('send-sms', 'SendSmsController@index')->name('send-sms.index');

    Route::post('send-sms', 'SendSmsController@store')->name('send-sms.store');

    Route::prefix('ajax')->group(function () {
        Route::post('users', 'Ajax\UserController')->name('ajax.users.index');

        // Route::post('entretiens-pairs', 'Ajax\EntretienPairController')->name('ajax.entretiens-pairs.index');
        Route::post('entretiens-participants', 'Ajax\EntretienParticipantController')->name('ajax.entretiens-participants.index');
	
        Route::post('entretiens-participants-suite', 'Ajax\EntretienParticipantControllerSuite')->name('ajax.entretiens-participants-suite.index');
        // Route::get('/liste-demande-consultation-formation', [
        //     "uses" => "FormationSanitaireController@getListeDemandeConsultation",
        //     "as" =>  "liste-demande-consultation-formation"]);

        Route::post('demandes-consultations', 'Ajax\DemandeConsultationController')->name('ajax.demandes-consultations');

        Route::post('consultations-effectuees', 'Ajax\ConsultationEffectueeController')->name('ajax.consultations-effectuees');

        Route::post('resultat-consultations', 'Ajax\ResultatConsultationController')->name('ajax.resultat-consultations');

        Route::post('utilisateurs-assistes', 'Ajax\UtilisateurAssisteController')->name('ajax.utilisateurs-assistes');

        Route::post('suivis-regles', 'Ajax\SuiviRegleController')->name('ajax.suivis-regles');

        Route::post('suivis-ovulations', 'Ajax\SuiviOvulationController')->name('ajax.suivis-ovulations');

        Route::post('quiz', 'Ajax\QuizController')->name('ajax.quizzes');

        Route::post('suivis-grossesses', 'Ajax\SuiviGrossesseController')->name('ajax.suivis-grossesses');

        // Route::post('search-user', 'Ajax\SearchUserController')->name('ajax.search-user');

        Route::post('conseils-pratiques', 'Ajax\ConseilPratiqueController')->name('ajax.conseils-pratiques');

        Route::post('auto-test-result', 'Ajax\AutoTestResultController')->name('ajax.auto-test-result');
    });
});
