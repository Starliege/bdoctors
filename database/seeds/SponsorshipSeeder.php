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
        //
        // $dateNow = Carbon::now();
        // $dateNowFormat = $dateNow->format('d-m-Y H:i');
        // $date5YrsAgo = Carbon::now()->subYears(5);
        // $date5YrsAgoFormat = $date5YrsAgo->format('d-m-Y H:i');
        // 
        // for ($i=0, $i<25; $i++;) {
        //     $start_adv = $faker->dateTimeBetween($date5YrsAgoFormat, $dateNowFormat);
        //     $sponsorship = new Sponsorship();
        //     $sponsorship->start_adv = $start_adv;
        //     $carbon_date = Carbon::parse($start_adv);
        //     $sponsorship->end_adv = $carbon_date->addHours(12);
        //     
        //     $sponsorship->save();
        // }
        $sponsors = [
                ['type'=> 'Bronze',
                'price'=> 2.99,
                'hours'=> 24],

                ['type'=> 'Silver',
                'price'=> 5.99,
                'hours'=> 72],

                ['type'=> 'Gold',
                'price'=> 9.99,
                'hours'=> 144],
             ];

        $user = User::all()->pluck('id');
        for ($d = 0; $d < 25; $d++) {
            $advs = $sponsors[rand(0, 2)];
            $sponsorship = new Sponsorship();
            $sponsorship -> type = $advs['type'];
            $sponsorship -> price = $advs['price'];
            $sponsorship -> hours = $advs['hours'];

            $sponsorship -> save();

            $dateNow = Carbon::now();
            $dateExpiration = Carbon::now()->addHour($advs['hours']);

            $userIds = $user[$d];
            $sponsorship->users()->attach($userIds,[
                     'start_adv' => $dateNow,
                     'end_adv' => $dateExpiration,
                 ]);
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
    }       }
}
