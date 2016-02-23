<?php

use Carbon\Carbon;
use App\Models\UserCourse;
use Illuminate\Database\Seeder;

class UserCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 8; $i++) {
            $userCoursesData[] = [
                'user_id' => $i,
                'course_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        UserCourse::insert($userCoursesData);
    }
}
