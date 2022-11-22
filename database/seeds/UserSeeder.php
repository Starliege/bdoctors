<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Specialization;
use Faker\Generator as Faker;
use App\Star;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        $specialization = Specialization::all()->pluck('id');
        $star = Star::all()->pluck('id');
        $services = [
            'In studio',
            'Da remoto',
            'Sia in studio che da remoto'
        ];

        for ($i = 0; $i < 50; $i++) {
            $new_doctor = new User();
            $new_doctor->name = $faker->firstName();
            $new_doctor->surname = $faker->lastName();
            $new_doctor->address = $faker->address();
            $new_doctor->email = $new_doctor->name . $new_doctor->surname . rand(1, 200) . '@gmail.com';
            $new_doctor->password = Hash::make('socionosnitch');
            $new_doctor->services = $services[rand(0, 2)];
            $new_doctor->phone = $faker->phoneNumber();
            
            $new_doctor->save();
            $specializationIds = $specialization->shuffle()->take(rand(1,4))->all();
            $new_doctor->specializations()->sync($specializationIds);
            for($j = 0; $j < rand(0,50); $j++) {
            $starIds = $star->shuffle()->take(1)->all();
            $date = Carbon::today()->subDays(rand(2,365))->addSeconds(rand(0,86400));
            $new_doctor->stars()->attach($starIds, [
                'created_at' => $date
            ]);
            }
        }
    }
}
