<?php

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i <= 10; $i++) {
            $activityData = [
                'user_id' => 1,
                'description' => $faker->paragraph(1),
            ];
        }
        Activity::create($activityData);
    }
}
