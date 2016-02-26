<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Task;
use App\Repositories\SubjectRepositoryInterface;
use App\Repositories\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskRepository;
    protected $subjectRepository;

    public function __construct(TaskRepositoryInterface $taskRepository, SubjectRepositoryInterface $subjectRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->subjectRepository = $subjectRepository;
    }

    public function index()
    {
        return view('supervisor.tasks.index', [
            'tasks' => $this->taskRepository->paginate(Task::TASKS_PER_PAGE),
        ]);
    }

    public function create()
    {
        return view('supervisor.tasks.create');
    }

    public function store(Request $request)
    {
        $this->taskRepository->create($request->all());

        return redirect()->back();
    }

    public function show(Task $task)
    {
        return view('supervisor.tasks.show', [
            'task' => $task,
        ]);
    }

    public function edit(Task $task)
    {
        return view('supervisor.tasks.edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->only(['description']));
        return redirect('supervisor/subjects/' . $request->input('subject_id'))
            ->with('flash_message', trans('common.main.successEdit'));
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back()->with('flash_message', trans('common.main.successDelete'));
    }
}
