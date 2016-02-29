<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Course;
use App\Models\UserSubject;
use App\Repositories\CourseRepositoryInterface;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        parent::__construct();
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        return view('trainee.courses.index')->with([
            'courses' => $this->courseRepository->paginate(Course::COURSES_PER_PAGE),
            'statuses' => Course::getStatusList(),
        ]);
    }

    public function show(Course $course)
    {
        $activities = $this->user->activities()
            ->where('course_id', $course->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('trainee.courses.show')->with([
            'course' => $course,
            'subjects' => $course->subjects,
            'activities' => $activities,
        ]);
    }

    public function members(Request $request, Course $course)
    {
        return view('trainee.courses.members')->with([
            'tPage' => $request->tPage == 1 ?: $request->tPage, // Page variable for trainees pagination
            'sPage' => $request->sPage == 1 ?: $request->sPage, // Page variable for supervisors pagination
            'course' => $course,
            'trainees' => $course->users()->trainees()->paginate(Course::MEMBERS_PER_PAGE, ['*'], 'tPage'),
            'supervisors' => $course->users()->supervisors()->paginate(Course::MEMBERS_PER_PAGE, ['*'], 'sPage'),
        ]);
    }
}
