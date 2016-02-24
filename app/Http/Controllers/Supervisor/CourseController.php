<?php

namespace App\Http\Controllers\Supervisor;

use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests;
use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Repositories\CourseRepositoryInterface;

class CourseController extends Controller
{
    protected $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        return view('supervisor.courses.index')->with([
            'courses' => $this->courseRepository->paginate(Course::COURSES_PER_PAGE),
            'statuses' => Course::getStatusList(),
        ]);
    }

    public function create()
    {
        return view('supervisor.courses.create')->with([
            'statuses' => Course::getStatusList(),
        ]);
    }

    public function store(Request $request)
    {
        $this->courseRepository->create($request->only(['name', 'description', 'status']));
        return redirect('supervisor/courses')->with([
            'flash_message' => trans('successAdd'),
        ]);
    }

    public function show(Course $course)
    {
        return view('supervisor.courses.show')->with([
            'course' => $course,
            'subjects' => $course->subjects,
        ]);
    }

    public function edit(Course $course)
    {
        return view('supervisor.courses.edit')->with([
            'course' => $course,
            'statuses' => Course::getStatusList(),
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->only(['name', 'description', 'status']));
        return redirect('supervisor/courses')->with([
            'flash_message' => trans('successEdit'),
        ]);
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->back()->with('flash_message', trans('successDelete'));
    }

    public function members(Request $request, Course $course)
    {
        return view('supervisor.courses.members')->with([
            'tPage' => $request->tPage == 1 ?: $request->tPage, // Page variable for trainees pagination
            'sPage' => $request->sPage == 1 ?: $request->sPage, // Page variable for supervisors pagination
            'modalAddTitle' => trans('courses.add_member'),
            'course' => $course,
            'trainees' => $course->users()->trainees()->paginate(Course::MEMBERS_PER_PAGE, ['*'], 'tPage'),
            'supervisors' => $course->users()->supervisors()->paginate(Course::MEMBERS_PER_PAGE, ['*'], 'sPage'),
            'traineesNotInCourse' =>$course->getTraineesNotInCourse()->lists('name', 'id'),
            'supervisorsNotInCourse' =>$course->getSupervisorsNotInCourse()->lists('name', 'id'),
        ]);
    }

    public function deleteMember(Request $request, User $user)
    {
        $user->courses()->detach($request->course_id);
        return redirect()->back()->with('flash_message', trans('common.main.successDelete'));
    }

    public function addMember(Request $request, Course $course)
    {
        User::findOrFail($request->user_id)->courses()->attach($course->id);
        return redirect()->back()->with('flash_message', trans('common.main.successAdd'));
    }
}
