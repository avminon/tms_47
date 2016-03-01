<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Http\Requests;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Activity;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use App\Models\CourseSubject;
use App\Http\Controllers\Controller;
use App\Repositories\SubjectRepositoryInterface as SubjectRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        parent::__construct();
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->user->courses;
        $courseIds = $courses->lists('id');
        $userCourses = UserCourse::byCourseIds($courseIds)->with('user')->get();
        $usersIds = $userCourses->pluck('user_id');
        $subjects = CourseSubject::whereIn('course_id', $courseIds)->with('subject')->get();
        $computedSubjects = $this->subjectRepository->computePercentage($subjects);
        if ($this->user->isSupervisor()) {
            return view('supervisor.home', [
                'computedSubjects' => $computedSubjects,
                'activities' => Activity::whereIn('user_id', $usersIds)->with('user')->paginate(Activity::ACTIVITY_PER_PAGE),
                'courses' => $courses,
                'subjects' => $subjects,
                'tasks' => Task::whereIn('subject_id', $subjects->pluck('subject_id'))->get(),
                'users' => User::listTrainee($usersIds)->trainees()->get(),
            ]);
        } else {
            return view('trainee.home');
        }
    }
}
