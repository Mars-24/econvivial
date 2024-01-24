<?php

namespace App\Console\Commands;

use App\User;
use App\TypeUser;
use Illuminate\Console\Command;
use App\Notifications\RepliedToThread;

class JobCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'JobCommand:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envoie régulier de notification aux utilisateurs';

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
