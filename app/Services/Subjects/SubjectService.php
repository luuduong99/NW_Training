<?php

namespace App\Services\Subjects;

use App\Repositories\Subjects\SubjectRepository;

class SubjectService
{
    protected $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function listSubjects()
    {
        
    }
}