<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Review;
use App\User;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = user::all()->pluck('id');
        for ($i = 0; $i < 1000; $i++) {
            $date = Carbon::today()->subDays(rand(7,300))->addSeconds(rand(0,86400));
            $new_review = new Review();
            $new_review -> name_reviewer = $faker->firstName();
            $new_review -> surname_reviewer = $faker->lastName();
            $new_review -> review = $faker->text(rand(50, 200));
            $new_review -> user_id = $faker->randomElement($user);
            $new_review -> created_at = $date;

            $new_review -> save();
        }
    }
}
