<?php

namespace App\Repositories\Subjects;

use App\Models\Subject;
use App\Repositories\BaseRepository;

class SubjectRepository extends BaseRepository
{
    public function getModel()
    {
        return Subject::class;
    }

    public function getAllSubject()
    {
        return $this->getAll();
    }

    public function findSubjectId($id)
    {
        return $this->find($id);
    }

    public function createSubject($attributes = [])
    {
        return $this->create($attributes);
    }

    public function updateSubject($id, $attributes = [])
    {
        return parent::update($id, $attributes);
    }

    public function deleteSubject($id)
    {
        return parent::delete($id);
    }

    public function getSubjectOfFaculty($faculty_id)
    {
        return Subject::where('faculty_id', $faculty_id)->paginate(5);
    }
}
