<?php

use Illuminate\Database\Seeder;
use App\Star;
use App\User;
use Faker\Generator as Faker;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <50 ; $i++) { 
            $star = new Star();

            $star->vote = $faker->numberBetween(1, 5);

            $star->save();
        }
    }
}
