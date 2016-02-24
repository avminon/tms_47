<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Requests;
use App\Models\Subject;
use App\Models\UserTask;
use App\Models\UserSubject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SubjectRepositoryInterface as SubjectRepository;

class SubjectController extends Controller
{
    private $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        $currentUser = auth()->user();
        $tasks = $currentUser->tasks()->where('tasks.subject_id', $subject->id)->get();
        $activities = $currentUser->activities()->where('subject_id', $subject->id)->get();
        $userSubject = $currentUser->subjects()->where('subject_id', $subject->id)->first();
        return view('trainee.subjects.show', [
            'activities' => $activities,
            'userSubject' => $userSubject,
            'subject' => $subject,
            'tasks' => $tasks,
            'isFinish' => UserSubject::isFinished($userSubject->pivot->status),
            'statusFinish' => UserTask::STATUS_FINISH,
        ]);
    }
}
