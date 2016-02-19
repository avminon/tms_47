<?php

use Carbon\Carbon;
use App\Models\Course;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 1; $i <= 10; $i++) {
            $status = $i % 2 == 0 ? Course::STATUS_START : Course::STATUS_TRAINING;

            $coursesData[] = [
                'name' => 'Programming 1' . str_pad($i, 2, 0, STR_PAD_LEFT),
                'description' => $faker->paragraph(1),
                'status' => $status,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        Course::insert($coursesData);
    }
}
