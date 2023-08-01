<?php

namespace App\Services\Subjects;

use App\Http\Requests\subjects\CreateSubjectRequest;
use App\Http\Requests\Subjects\UpdateSubjectRequest;
use App\Repositories\Faculties\FacultyRepository;
use App\Repositories\Subjects\SubjectRepository;
use Illuminate\Http\Request;

class SubjectService
{
    protected $subjectRepository;
    protected $facultyRepository;

    public function __construct(SubjectRepository $subjectRepository, FacultyRepository $facultyRepository)
    {
        $this->subjectRepository = $subjectRepository;
        $this->facultyRepository = $facultyRepository;
    }

    public function listSubjects(Request $request)
    {
        $subjects = $this->subjectRepository->getAllSubject();
        return view('subjects.index', ['subjects' => $subjects]);
    }

    public function createSubject()
    {
        $faculties = $this->facultyRepository->all();
        return view('subjects.create', ['faculties' => $faculties]);
    }

    public function storeSubject(CreateSubjectRequest $request)
    {
        $subject = $request->all();

        $this->subjectRepository->createSubject($subject);
        
        return redirect()->route('edu.subjects.list_subjects')->with('add_subject', 'Successfully add subject');
    }

    public function editSubject($id)
    {
        $subject = $this->subjectRepository->find($id);
        $faculties = $this->facultyRepository->all();

        return view('subjects.update', ['subject' => $subject, 'faculties' => $faculties]);
    }

    public function updateSubject($id, UpdateSubjectRequest $request)
    {
        $subject = $request->all();

        $this->subjectRepository->updateSubject($id, $subject);

        return redirect()->route('edu.subjects.list_subjects')->with('update_subject', 'Successfully update subject');
    }

    public function deleteSubject($id)
    {
        $this->subjectRepository->deleteSubject($id);

        return redirect()->route('edu.subjects.list_subjects')->with('delete_subject', 'Successfully delete subject');
    }
}