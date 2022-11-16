<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Specialization;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = include('config\doctors.php');
        $specialization = Specialization::all()->pluck('id');
        $services = [
            'In studio',
            'Da remoto',
            'Sia in studio che da remoto'
        ];

        for ($i = 0; $i < 50; $i++) {
            $new_doctor = new User();
            $new_doctor->name = $data['names'][rand(0, 19)];
            $new_doctor->surname = $data['surnames'][rand(0, 19)];
            $new_doctor->address = $data['addresses'][rand(0, 19)];
            $new_doctor->email = $new_doctor->name . $new_doctor->surname . rand(1, 200) . '@gmail.com';
            $new_doctor->password = Hash::make('socionosnitch');
            $rnd_telephone = strval(rand(1111111111, intval(9999999999)));
            $new_doctor->services = $services[rand(0, 2)];
            $new_doctor->phone = $rnd_telephone;

            $new_doctor->save();
            $specializationIds = $specialization->shuffle()->take(1)->all();
            $new_doctor->specializations()->sync($specializationIds); 
        }
    }
}
