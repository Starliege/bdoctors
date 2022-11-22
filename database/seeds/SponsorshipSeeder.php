<?php

use Illuminate\Database\Seeder;
use App\Sponsorship;
use App\User;
use Faker\Generator as Faker;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $sponsors = [
            [
                'type' => 'Bronze',
                'price' => 2.99,
                'hours' => 24
            ],

            [
                'type' => 'Silver',
                'price' => 5.99,
                'hours' => 72
            ],

            [
                'type' => 'Gold',
                'price' => 9.99,
                'hours' => 144
            ],
        ];
        $u = [];
        foreach ($sponsors as $sponsor) {
            $sponsorship = new Sponsorship();
            $sponsorship->type = $sponsor['type'];
            $sponsorship->price = $sponsor['price'];
            $sponsorship->hours = $sponsor['hours'];
            $sponsorship->save();
        }
        for($t = 0; $t < rand(10,20); $t++){
            $user = User::all()->pluck('id'); 
            $u = User::all()->pluck('id');
            $dateS = Carbon::now();
            $dateE = Carbon::now()->addHour($sponsorship->hours);
            $userIds = $u->shuffle()->take(1)->all();
            $sponsorship->users()->attach($userIds, [
                'start_adv' => $dateS,
                'end_adv' => $dateE,
            ]);
            $u->forget($userIds);
        
        }
        for ($j = 0; $j < rand(50, 200); $j++) {
                $user = User::all()->pluck('id');
                $dateStart = Carbon::today()->subDays(rand(7,300))->addSeconds(rand(0,86400));
                $dateExpiration = Carbon::parse($dateStart)->addHour($sponsorship->hours); 
                $userIds = $user->shuffle()->take(1)->all();
                if($dateExpiration < Carbon::now()){
                    $sponsorship->users()->attach($userIds, [
                        'start_adv' => $dateStart,
                        'end_adv' => $dateExpiration,
                    ]);

                }

               
            
        }
        
            
        }
    }
  



            // for ($j = 0; $j < 25; $j++) {
            //     $userIds = $user[$j];
            //     $sponsorship->users()->attach($userIds,[
            //         'start_adv' => $dateNow,
            //         'end_adv' => $dateExpiration,
            //     ]);
            // }

            // $userIds = $user->shuffle()->take(1)->all();
            // $sponsorship->users()->attach($userIds,[
            //     'start_adv' => $dateNow,
            //     'end_adv' => $dateExpiration,
            // ]);

                // for ($d=0, $d<50; $d++;) {
                // $start_adv = $faker->dateTimeBetween($date5YrsAgoFormat, $dateNowFormat);
                // $sponsorship = new Sponsorship();
                // $sponsorship->start_adv = $start_adv;
                // $carbon_date = Carbon::parse($start_adv);
                // $sponsorship->end_adv = $carbon_date->addHours(12);
                // }
