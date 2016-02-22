<?php

namespace App\Http\Controllers\Trainee;

use Illuminate\Http\Request;

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
        return view('trainee.courses.index')->with([
            'courses' => $this->courseRepository->paginate(Course::COURSES_PER_PAGE),
            'statuses' => Course::getStatusList(),
        ]);
    }

    public function show($id)
    {
        return view('trainee.courses.show')->with([
            'course' => $this->courseRepository->findOrFail($id)
        ]);
    }
}
