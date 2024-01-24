<?php

namespace App\Console\Commands;

use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Services\GenerateUserCode;

class UpdateCodeUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:update-code';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update code user';

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
        $query = User::with('region')->whereNotNull('numero')
            ->whereHas('typeuser', function ($query) {
                $query->utilisateurs();
            })
            ->orderBy('created_at', 'DESC');
        
        $progressBar = $this->output->createProgressBar(
            $query->count()
        );
        
        $query->chunk(25, function ($users) use($progressBar) {
            foreach ($users as $user) {
                if (strlen($user->numero) !== 13) continue;
                
                // $code = GenerateUserCode::generate(
                //     $user->numero,
                //     $user->sexe ?: 'M',
                //     Carbon::today()->diffInYears($user->datenaissance),
                //     null,
                //     $user->profession ?: 'Autre',
                //     $user->region->code ?: 'LC'
                // );
                
                $code = GenerateUserCode::generate(
                    $user->numero,
                    $user->sexe ?: 'M',
                    $user->datenaissance,
                    $user->profession ?: 'Autre',
                    $user->region->code ?: 'LC'
                );
                
                $user->update(['codeUser' => $code]);
                
                $progressBar->advance();
            }
        });
        
        $progressBar->finish();
        
        // foreach ($users as $user) {
        //     // $this->info($user->toJson());
            
        //     $code = GenerateUserCode::generate(
        //         $user->numero,
        //         $user->sexe ?: 'M',
        //         Carbon::today()->diffInYears($user->datenaissance),
        //         null,
        //         $user->profession ?: 'Autre',
        //         $user->region->code ?: 'LC'
        //     );
            
        //     $this->info('Code: ' . $code);
        // }
        // $users = User::whereHas('typeuser', function ($query) {
        //     $query->where('libelle', 'utilisateur');
        // })->get();
        
         // foreach ($users as $user) {
        //     $user->notify(new RepliedToThread('Notification sur votre suivi de grossesse', $admin));
        // }
		
        // $admin = User::where('type_user_id', 2)->first();
        
        // $users = User::whereHas('typeuser', function ($query) {
        //     $query->where('libelle', 'utilisateur');
        // })->chunk(20, function ($users) use ($admin) {
        //     foreach ($users as $user) {
        //         $user->notify(new RepliedToThread('Notification sur votre suivi de grossesse', $admin));
        //     }
        // });
        
        // $this->info('Utilisateurs notifiés sur toute la plateforme');
    }
}