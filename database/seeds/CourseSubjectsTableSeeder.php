<?php

use Carbon\Carbon;
use App\Models\CourseSubject;
use Illuminate\Database\Seeder;

class CourseSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $subjectsPerCourse = 5;

        for($x = 1; $x <= 10; $x++) {
            for($y = 1; $y <= $subjectsPerCourse; $y++) {
                $courseSubjectsData[] = [
                    'course_id' => $x,
                    'subject_id' => mt_rand(1,20),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }

        CourseSubject::insert($courseSubjectsData);
    }
}
