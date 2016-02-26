<?php

namespace App\Http\Controllers\Supervisor;

use Illuminate\Http\Request;

use Session;
use Exemption;
use App\Http\Requests;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Repositories\UserRepositoryInterface as UserRepository;

class UserController extends Controller
{
    protected $userRepository;

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
        $courses = $this->user->courses()->with(['subjects.tasks'])->get();
        return view('supervisor.users.index', [
            'user' => $this->user,
            'courses' => $courses,
            'activities' => $this->user->activities,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisor.users.create', [
            'userType' => $this->userRepository->listUserType()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            $userData = $request->all();
            $userData['avatar'] = $this->userRepository->uploadImage($request);
            $userData['password'] = bcrypt($request->password);
            $this->userRepository->create($userData);
            session()->flash('flash_message', trans('message.success_user'));
        } catch (Exception $e) {
            session()->flash('flash_error', trans('message.error_user'));
        }

        return view('supervisor.users.create', [
            'userType' => $this->userRepository->listUserType()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->userType = $user->isTrainee() ? trans('message.trainee') : trans('message.supervisor');
        $courses = $user->courses()->with(['subjects.tasks'])->get();
        return view('supervisor.users.show', [
            'user' => $user,
            'courses' => $courses,
            'activities' => $user->activities,
        ]);
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
        return view('supervisor.users.edit', compact(['userType', 'user']));
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
    public function destroy(User $user)
    {
        try {
            $user->delete();
            session()->flash('flash_message',
                trans('message.success_delete_user'));
        } catch (Exception $e) {
            session()->flash('flash_error', trans('message.error_delete_user'));
        }
        return redirect()->route('supervisor.users.index');
    }

    public function listActivities(User $user)
    {
        return view('supervisor.activities.list', [
            'activities' => $user->activities,
            'user' => $user,
        ]);
    }
}
