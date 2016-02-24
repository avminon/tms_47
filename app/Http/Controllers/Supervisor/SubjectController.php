<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSubjectRequest;
use App\Repositories\SubjectRepositoryInterface;

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

        return view('supervisor/subjects/list', [
            'subjects' => $subjects,
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

        $subjects = $this->subjectRepository->getRowsPaginated();

        return view('supervisor/subjects/index', [
            'subjects' => $subjects,

        ]);
    }

}
