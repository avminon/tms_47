<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Repositories\SubjectRepositoryInterface as SubjectRepository;

class SubjectController extends Controller
{
    protected $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function index()
    {
        $subjects = $this->subjectRepository->getRowsPaginated();

        return view('supervisors/subjects/list', ['subjects' => $subjects ]);
    }
}
