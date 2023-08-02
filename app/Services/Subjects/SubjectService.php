<?php

namespace App\Services\Subjects;

use App\Http\Requests\subjects\CreateSubjectRequest;
use App\Http\Requests\Subjects\UpdateSubjectRequest;
use App\Models\StudentSubject;
use App\Repositories\Faculties\FacultyRepository;
use App\Repositories\Subjects\SubjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectService
{
    protected $subjectRepository;
    protected $facultyRepository;

    public function __construct(SubjectRepository $subjectRepository, FacultyRepository $facultyRepository)
    {
        $this->subjectRepository = $subjectRepository;
        $this->facultyRepository = $facultyRepository;
    }

    public function listSubjects()
    {

        if (Auth::user()->role->role == 'student') {
            $subjects = $this->subjectRepository->getSubjectOfFaculty(Auth::user()->student->faculty_id);
            $results = Auth::user()->student->subjects->pluck('id')->toArray();

            return view('subjects.index', ['subjects' => $subjects, 'results' => $results]);
        } else {
            $subjects = $this->subjectRepository->getAllSubject();
            $data = StudentSubject::all();
            $array = [];
            foreach ($data as $result) {
                array_push($array, $result->subject_id);
            }

            return view('subjects.index', ['subjects' => $subjects, 'array' => $array]);
        }
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
