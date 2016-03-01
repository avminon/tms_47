<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\UserSubject;
use App\Models\UserTask;
use App\Repositories\UserRepositoryInterface as UserRepository;
use Exemption;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = $this->user;
        $currentUser->userType = $currentUser->isTrainee() ? trans('message.trainee') : trans('message.supervisor');
        $courses = $currentUser->courses()->with(['subjects.tasks'])->get();

        foreach ($courses as $course) {
            $course->status = $this->setStatus($course->status);

            foreach ($course->subjects as $subject) {
                $userSubject = $subject->userSubjects->first();
                $subject->status = is_null($userSubject) ? UserSubject::STATUS_START : $userSubject->status;
                $subject->status = $this->setStatus($subject->status);

                foreach ($subject->tasks as $task) {
                    $userTask = $task->userTasks->first();
                    $task->status = is_null($userTask) ? UserTask::STATUS_START : $userTask->status;
                    $task->status = $this->setStatus($task->status);
                }
            }
        }

        return view('trainee.users.index', [
            'user' => $currentUser,
            'courses' => $courses,
            'activities' => $currentUser->activities,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $userType = $this->userRepository->listUserType();
        return view('trainee.users.edit', compact(['userType', 'user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        try {
            if ($request->hasFile('image')) {
                $user->avatar = $this->userRepository->uploadImage($request);
            }
            $user->update($request->all());
            session()->flash('flash_message', trans('message.success_edit_user'));
        } catch (Exception $e) {
            session()->flash('flash_error', trans('message.error_edit_user'));
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listActivities(User $user)
    {
        return view('trainee.activities.list', [
            'activities' => $user->activities,
            'user' => $user,
        ]);
    }

    public function setStatus($status)
    {
        switch ($status) {
            case UserSubject::STATUS_START:
                $status = trans('common.main.start');
                break;
            case UserSubject::STATUS_TRAINING:
                $status = trans('common.main.training');
                break;
            case UserSubject::STATUS_FINISH:
                $status = trans('common.main.finish');
                break;
            default:
                $status = trans('common.main.start');
                break;
        }

        return $status;
    }
}
