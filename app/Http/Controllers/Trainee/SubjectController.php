<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Subject;
use App\Models\UserSubject;
use App\Models\UserTask;
use App\Repositories\SubjectRepositoryInterface as SubjectRepository;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    private $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        parent::__construct();
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
        $userSubject = $this->user->subjects()->where('subject_id', $subject->id)->first();

        return view('trainee.subjects.show', [
            'activities' => $this->user->activities()->where('subject_id', $subject->id)->orderBy('id', 'desc')->get(),
            'userSubject' => $userSubject,
            'subject' => $subject,
            'tasks' => $this->user->tasks()->where('tasks.subject_id', $subject->id)->get(),
            'isFinish' => UserSubject::isFinished($userSubject->pivot->status),
        ]);
    }
}
