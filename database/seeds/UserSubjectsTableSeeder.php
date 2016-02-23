<?php

use App\Models\Subject;
use App\Models\UserSubject;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setData = [
            [
                'user_id' => 1,
                'course_id' => 1,
                'subject_id' => 1,
                'status' => UserSubject::STATUS_START,
                'end_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'course_id' => 1,
                'subject_id' => 2,
                'status' => UserSubject::STATUS_START,
                'end_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'user_id' => 3,
                'course_id' => 1,
                'subject_id' => 1,
                'status' => UserSubject::STATUS_START,
                'end_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'user_id' => 4,
                'course_id' => 1,
                'subject_id' => 2,
                'status' => UserSubject::STATUS_START,
                'end_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'user_id' => 5,
                'course_id' => 1,
                'subject_id' => 1,
                'status' => UserSubject::STATUS_START,
                'end_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'user_id' => 6,
                'course_id' => 1,
                'subject_id' => 2,
                'status' => UserSubject::STATUS_START,
                'end_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'user_id' => 7,
                'course_id' => 1,
                'subject_id' => 1,
                'status' => UserSubject::STATUS_START,
                'end_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'user_id' => 8,
                'course_id' => 1,
                'subject_id' => 2,
                'status' => UserSubject::STATUS_START,
                'end_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
        ];
        UserSubject::insert($setData);
    }
}
