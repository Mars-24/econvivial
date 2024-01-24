<?php

namespace App\Http;

use App\Http\Middleware\AdminMiddlewre;
use App\Http\Middleware\AuhtentificationMiddlewre;
use App\Http\Middleware\ConseilMiddleware;
use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\FormationSaniMiddleware;
use App\Http\Middleware\FormationSanitaireAdminMiddleware;
use App\Http\Middleware\FormationSanitaireCPNMiddleware;
use App\Http\Middleware\FormationSanitaireFunctionCommunMiddleware;
use App\Http\Middleware\FormationSanitaireMiddleware;
use App\Http\Middleware\FormationSanitairePFMiddleware;
use App\Http\Middleware\FormationSanitaireSuperAdminMiddleware;
use App\Http\Middleware\FormationSanitaireVaccinationMiddleware;
use App\Http\Middleware\MenstruMiddlewares;
use App\Http\Middleware\ParametrageMiddlewares;
use App\Http\Middleware\PeMiddleware;
use App\Http\Middleware\PlanningMiddleware;
use App\Http\Middleware\QuizMiddlewares;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\SuperAdminMiddleware;
use App\Http\Middleware\TelConseillerMiddleware;
use App\Http\Middleware\TeleconseillerMiddleware;
use App\Http\Middleware\TrimStrings;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Middleware\WebSerieMiddleware;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        CheckForMaintenanceMode::class,
        ValidatePostSize::class,
        TrimStrings::class,
        ConvertEmptyStringsToNull::class,
        AddQueuedCookiesToResponse::class,
        StartSession::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            EncryptCookies::class,

            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => Authenticate::class,
        'auth.basic' => AuthenticateWithBasicAuth::class,
        'bindings' => SubstituteBindings::class,
        'can' => Authorize::class,
        'guest' => RedirectIfAuthenticated::class,
        'throttle' => ThrottleRequests::class,
        'authentification' => AuhtentificationMiddlewre::class,
        'admin' => AdminMiddlewre::class,
        'utilisateur' => UserMiddleware::class,
        'formation' => FormationSanitaireMiddleware::class,
        'teleconseiller' => TeleconseillerMiddleware::class,

        'superAdmin' => SuperAdminMiddleware::class,
        'webSerie' => WebSerieMiddleware::class,

        'teleConseillerAdmin' => TelConseillerMiddleware::class,
        'pairEducateur' => PeMiddleware::class,

        'planning' => PlanningMiddleware::class,
        'conseil' => ConseilMiddleware::class,


        'menstruation' => MenstruMiddlewares::class,
        'formationSanitaire' => FormationSaniMiddleware::class,
        'adminFormationSanitaire' => FormationSanitaireAdminMiddleware::class,
        'formationSanitaireCPN' => FormationSanitaireCPNMiddleware::class,
        'formationSanitaireVaccination' => FormationSanitaireVaccinationMiddleware::class,
        'formationSanitairePF' => FormationSanitairePFMiddleware::class,
        'formationSanitaireFunctionCommun' => FormationSanitaireFunctionCommunMiddleware::class,
        'superAdminFormationSanitaire' => FormationSanitaireSuperAdminMiddleware::class,

        'quiz' => QuizMiddlewares::class,
        'parametrage' => ParametrageMiddlewares::class,

    ];
}
