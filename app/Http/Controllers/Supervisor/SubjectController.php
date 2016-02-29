<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSubjectRequest;
use App\Http\Requests;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Task;
use App\Repositories\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $subjectRepository;

    public function __construct(SubjectRepositoryInterface $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function index()
    {
        $subjects = $this->subjectRepository->getRowsPaginated();
        return view('supervisor.subjects.list', ['subjects' => $subjects]);
    }

    public function create()
    {
        return view('supervisor.subjects.create');
    }

    public function show(Subject $subject)
    {
        return view('supervisor.subjects.show', [
            'subject' => $subject,
            'tasks' => $subject->tasks()->paginate(Task::TASKS_PER_PAGE),
            'courses' => $subject->course()->paginate(Course::COURSES_PER_PAGE),
        ]);
    }

    public function store(CreateSubjectRequest $request)
    {
        try {
            $subjectData = $request->all();

            $this->subjectRepository->create($subjectData);
            session()->flash('flash_message', trans('message.success_subject'));
        } catch (Exception $e) {
            session()->flash('flash_error', trans('message.error_subject'));
        }

        return redirect('supervisor/subjects');
    }

    public function edit(Subject $subject)
    {
        try {
            return view('supervisor.subjects.edit', [
                'subject' => $subject,
                'user' => $this->user,
            ]);
        } catch (ModelNotFoundException $e) {
            \Session::flash('flash_error', trans('message.error_subject_edit'));
        }

        return redirect('/supervisor/subjects');
    }

    public function update(Request $request, Subject $subject)
    {
        $subject->update($request->only(['name', 'description']));
        return redirect('supervisor/subjects', [
            'flash_message' => trans('message.success_subject_edit'),
        ]);
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->back()->with(
            'flash_message',
            trans('message.success_subject_delete')
        );
    }
}

