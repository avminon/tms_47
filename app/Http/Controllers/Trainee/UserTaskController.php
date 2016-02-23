<?php

namespace App\Http\Controllers\Trainee;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Http\Requests;
use App\Models\UserTask;
use App\Models\UserSubject;
use App\Http\Controllers\Controller;

class UserTaskController extends Controller
{
    public function batchUpdate(Request $request)
    {
        foreach ($request->taskId as $taskId) {
            $this->user->tasks()->updateExistingPivot($taskId, [
                'end_date' => Carbon::now(),
                'status' => UserTask::STATUS_FINISH
            ]);
        }
        return redirect()->back()->with('statusFinish',
            UserTask::STATUS_FINISH);
    }
}