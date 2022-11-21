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
        $stars = [1,2,3,4,5];
        foreach( $stars as $star){
            $new_star = new Star();
            $new_star->vote = $star;
            $new_star->save();
        }
}
}
