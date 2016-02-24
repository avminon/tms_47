<?php
use App\Models\Task;
use App\Models\UserTask;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTasksTableSeeder extends Seeder
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
                'task_id' => 1,
                'user_id' => 1,
                'course_id' => 1,
                'subject_id' => 1,
                'status' => UserTask::STATUS_START,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'task_id' => 1,
                'user_id' => 1,
                'course_id' => 1,
                'subject_id' => 2,
                'status' => UserTask::STATUS_START,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'task_id' => 1,
                'user_id' => 1,
                'course_id' => 2,
                'subject_id' => 1,
                'status' => UserTask::STATUS_START,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'task_id' => 1,
                'user_id' => 1,
                'course_id' => 2,
                'subject_id' => 2,
                'status' => UserTask::STATUS_START,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'task_id' => 1,
                'user_id' => 2,
                'course_id' => 1,
                'subject_id' => 1,
                'status' => UserTask::STATUS_START,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'task_id' => 1,
                'user_id' => 2,
                'course_id' => 1,
                'subject_id' => 2,
                'status' => UserTask::STATUS_START,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'task_id' => 1,
                'user_id' => 3,
                'course_id' => 2,
                'subject_id' => 1,
                'status' => UserTask::STATUS_START,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'task_id' => 1,
                'user_id' => 3,
                'course_id' => 2,
                'subject_id' => 2,
                'status' => UserTask::STATUS_START,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        UserTask::insert($setData);
    }
}
