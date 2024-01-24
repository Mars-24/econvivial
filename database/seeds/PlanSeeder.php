<?php

namespace Database\Seeders;

use App\plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $plans = [
            [
                'name' => 'Sucre',
                'slug' => 'Accès à l’information et à l\’assistance en ligne 12h/5j',
                'stripe_plan' => 'price_1ND1ONCrcg0PjdIzFScPmKej',
                'price' => 0,
                'description' => 'Articles conseils pratiques - Web vidéos - Quiz - 1 Assistance en ligne 12h/5j - 1 sms/mois pour le suivi du cycle menstruel',
            ],
            [
                'name' => 'Miel',
                'slug' => 'Option Sucre ++',
                'stripe_plan' => 'price_1ND1TbCrcg0PjdIzKNmMuryC',
                'price' => 0.76,
                'description' => 'Articles conseils pratiques - Web vidéos - Quiz - 3 Assistance en ligne 12h/5j - 1 sms/mois pour le suivi du cycle menstruel - 1 sms/mois pour le suivi de l’ovulation',
            ],
            [
                'name' => 'Fraise',
                'slug' => 'Option Miel + services de soins',
                'stripe_plan' => 'price_1ND1VnCrcg0PjdIzs8vOOQaz',
                'price' => 1.99,
                'description' => 'Articles conseils pratiques - Web vidéos - Quiz - Assistance en ligne 24h/7j - 2 sms/mois pour le suivi du cycle menstruel - 2 sms/mois pour le suivi de l’ovulation - Consultation en ligne - Gynécologue ',
            ],


        ];
        foreach($plans as $plan){
            Plan::create($plan);
        }
    }
}
