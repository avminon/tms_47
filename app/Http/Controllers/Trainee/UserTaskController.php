<?php

namespace App\Http\Controllers\Trainee;

use App\Events\ActivityEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Subject;
use App\Models\Task;
use App\Models\UserSubject;
use App\Models\UserTask;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserTaskController extends Controller
{
    public function batchUpdate(Request $request)
    {
        $userId = $this->user->id;
        $subject = Subject::findOrFail($request->subjectId);
        $subjectId = $subject->id;
        $courseId = $subject->course()->first()->id;

        if (!is_null($request->taskId)) {
            foreach ($request->taskId as $taskId) {
                $task = $subject->tasks()->where('id', $taskId)->first();
                $activity = $this->user->name . trans('common.main.finishedTask') . $task->description;

                $taskData = [
                    'user_id' => $userId,
                    'subject_id' => $subjectId,
                    'course_id' => $courseId,
                    'description' => $activity,
                ];

                \Event::fire(new ActivityEvent($taskData));

                $this->user->tasks()->updateExistingPivot($taskId, [
                    'end_date' => Carbon::now(),
                    'status' => UserTask::STATUS_FINISH,
                ]);
            }
        }

        $subjectStatus = UserSubject::STATUS_FINISH;
        $tasks = $this->user->tasks()->where('user_tasks.subject_id', $subjectId)->get();
        foreach ($tasks as $task) {
            if ($task->pivot->status != UserTask::STATUS_FINISH) {
                $subjectStatus = UserSubject::STATUS_TRAINING;
                break;
            }
        }
        if ($subjectStatus == UserSubject::STATUS_FINISH) {
            $this->user->subjects()->updateExistingPivot($subjectId, [
                'end_date' => Carbon::now(),
                'status' => UserSubject::STATUS_FINISH,
            ]);

            $subjectData = [
                'user_id' => $userId,
                'subject_id' => $subjectId,
                'course_id' => $courseId,
                'description' => $this->user->name . trans('common.main.finishedSubject') . $subject->name,
            ];

            \Event::fire(new ActivityEvent($subjectData));
        }

        return redirect()->back()->with('statusFinish',
            UserTask::STATUS_FINISH);
    }
}