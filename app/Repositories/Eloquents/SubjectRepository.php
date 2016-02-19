<?php

namespace App\Repositories\Eloquents;

use App\Models\Subject;
use App\Repositories\SubjectRepositoryInterface;

class SubjectRepository extends Repository implements SubjectRepositoryInterface
{

    public function getRowsPaginated()
    {
        return $this->model->paginate(Subject::SUBJECTS_PER_PAGE);
    }

}
