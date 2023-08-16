<?php

namespace App\Services\Subjects;

use App\Enums\Page;
use App\Http\Requests\Subjects\CreateSubjectRequest;
use App\Http\Requests\Subjects\UpdateSubjectRequest;
use App\Models\StudentSubject;
use App\Repositories\Faculties\FacultyRepository;
use App\Repositories\StudentSubject\StudentSubjectRepository;
use App\Repositories\Subjects\SubjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubjectService
{
    protected $subjectRepository, $facultyRepository, $studentSubjectRepository;

    public function __construct(SubjectRepository        $subjectRepository, FacultyRepository $facultyRepository,
                                StudentSubjectRepository $studentSubjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
        $this->facultyRepository = $facultyRepository;
        $this->studentSubjectRepository = $studentSubjectRepository;
    }

    public function listSubjects()
    {
        if (Auth::user()->role->role == '1') {
            $subjects = Auth::user()->student->faculty->subjects()->paginate(Page::page);
            $results = Auth::user()->student->subjects->pluck('id')->toArray();

            return view('subjects.index', ['subjects' => $subjects, 'results' => $results]);
        } else {
            $subjects = $this->subjectRepository->pagination();
            $data = $this->studentSubjectRepository->getAll();
            $array = [];
            foreach ($data as $result) {
                array_push($array, $result->subject_id);
            }

            return view('subjects.index', ['subjects' => $subjects, 'array' => $array]);
        }
    }

    public function createSubject()
    {
        $faculties = $this->facultyRepository->getAll();
        return view('subjects.create', ['faculties' => $faculties]);
    }

    public function storeSubject(CreateSubjectRequest $request)
    {
        DB::beginTransaction();
        try {
            $subject = $request->all();
            $this->subjectRepository->create($subject);
            DB::commit();

            return redirect()->route('edu.subjects.index')->with('add_subject', 'Successfully add subject');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    public function editSubject($id)
    {
        $subject = $this->subjectRepository->find($id);
        $faculties = $this->facultyRepository->getAll();

        return view('subjects.update', ['subject' => $subject, 'faculties' => $faculties]);
    }

    public function updateSubject($id, UpdateSubjectRequest $request)
    {
        DB::beginTransaction();
        try {
            $subject = $request->all();
            $this->subjectRepository->update($id, $subject);
            DB::commit();

            return redirect()->route('edu.subjects.index')->with('update_subject', 'Successfully update subject');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    public function deleteSubject($id)
    {
        DB::beginTransaction();
        try {
            $subject = $this->subjectRepository->find($id);
            if (count($subject->students) != 0) {
                return redirect()->back()->with('delete_false',
                    'There are already students registered for this subjects'.
                    ', cannot be deleted');
            } else {
                $this->subjectRepository->delete($id);
                DB::commit();

                return redirect()->route('edu.subjects.index')
                    ->with('delete_subject', 'Successfully delete subject');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
