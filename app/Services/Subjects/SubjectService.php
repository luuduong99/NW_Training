<?php

namespace App\Services\Subjects;

use App\Enums\Page;
use App\Http\Requests\Subjects\CreateOrUpdateSubjectRequest;
use App\Http\Requests\Subjects\UpdateSubjectRequest;
use App\Repositories\Faculties\FacultyRepository;
use App\Repositories\Subjects\SubjectRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubjectService
{
    protected $subjectRepository, $facultyRepository;

    public function __construct(SubjectRepository $subjectRepository, FacultyRepository $facultyRepository,)
    {
        $this->subjectRepository = $subjectRepository;
        $this->facultyRepository = $facultyRepository;
    }

    public function listSubjects()
    {
        if (Auth::user()->role->role == '1' && Auth::user()->student != null) {
            $subjects = Auth::user()->student->subjects()->with('faculty')->paginate(Page::page);
            $results = Auth::user()->student->subjects->pluck('id')->toArray();
            return view('subjects.index', ['subjects' => $subjects, 'results' => $results]);
        } else {
            $subjects = $this->subjectRepository->pagination(['students', 'faculty']);

            return view('subjects.index', ['subjects' => $subjects]);
        }
    }

    public function createSubject()
    {
        $faculties = $this->facultyRepository->getAll();
        return view('subjects.create', ['faculties' => $faculties]);
    }

    public function storeSubject(CreateOrUpdateSubjectRequest $request)
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
        if(!$subject)
        {
            abort(404);
        }
        $faculties = $this->facultyRepository->getAll();

        return view('subjects.update', ['subject' => $subject, 'faculties' => $faculties]);
    }

    public function updateSubject($id, CreateOrUpdateSubjectRequest $request)
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
            if(!$subject)
            {
                abort(404);
            }
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
