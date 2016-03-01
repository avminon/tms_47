<?php

namespace App\Repositories\Eloquents;

use Carbon\Carbon;
use App\Models\Subject;
use App\Models\Activity;
use App\Models\UserSubject;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\SubjectRepositoryInterface;

class SubjectRepository extends Repository implements SubjectRepositoryInterface
{
    public function getRowsPaginated()
    {
        return $this->model->paginate(Subject::SUBJECTS_PER_PAGE);
    }

    public function getConstStatus()
    {
        return [
            'start' => UserSubject::STATUS_START,
            'training' => UserSubject::STATUS_TRAINING,
            'finish' => UserSubject::STATUS_FINISH,
        ];
    }

    public function getSubjectTasks($id)
    {
        return $this->model->with('tasks')->findOrFail($id);
    }

    public function getUserActivities($userId, $subjectId)
    {
        return Activity::userSubjectActivity($userId, $subjectId)->get();
    }

    public function getUserSubject($userId, $subjectId)
    {
        return UserSubject::findSubject($userId, $subjectId)->first();
    }

    public function computePercentage($subjects)
    {
        $i = 0;
        $computedSubject = [];
        foreach ($subjects as $subject) {
            $computedSubject[$i] = $subject->subject;
            $start = strtotime($subject->subject->start_date);
            $end = strtotime($subject->subject->end_date);
            $total_secs = $end - $start;
            $elapsed_secs = time() - $start;
            $percentage = round(($elapsed_secs / $total_secs) * 100);
            $computedSubject[$i]['percent'] = $percentage . '%';
            $i++;
        }
        return $computedSubject;
    }
}
