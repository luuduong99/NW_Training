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

    public function __construct(SubjectRepository $subjectRepository, FacultyRepository $facultyRepository)
    {
        $this->subjectRepository = $subjectRepository;
        $this->facultyRepository = $facultyRepository;
    }

    public function listSubjects()
    {
        if (Auth::user()->role->role == '1' && Auth::user()->student != null) {
            $subjects = Auth::user()->student->faculty->subjects()->with('faculty')->paginate(Page::page);
            $results = Auth::user()->student->subjects->pluck('id')->toArray();

            return view('subjects.index', compact('subjects', 'results'));
        } else {
            $subjects = $this->subjectRepository->pagination(['students', 'faculty']);

            return view('subjects.index', ['subjects' => $subjects]);
        }
    }

    public function createSubject()
    {
        $faculties = $this->facultyRepository->getAll();
        return view('subjects.create_update', ['faculties' => $faculties]);
    }

    public function storeSubject(CreateOrUpdateSubjectRequest $request)
    {
        DB::beginTransaction();
        try {
            $subject = $request->all();
            $this->subjectRepository->create($subject);
            DB::commit();

            return redirect()->route('subjects.index')->with('success', 'Successfully add subject');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    public function editSubject($id)
    {
        $subject = $this->subjectRepository->find($id);
        $faculties = $this->facultyRepository->getAll();

        if(!$subject)
        {
            abort(404);
        }

        return view('subjects.create_update', ['subject' => $subject, 'faculties' => $faculties, 'id' => $id]);
    }

    public function updateSubject($id, CreateOrUpdateSubjectRequest $request)
    {
        DB::beginTransaction();
        try {
            $subject = $request->all();
            $this->subjectRepository->update($id, $subject);
            DB::commit();

            return redirect()->route('subjects.index')->with('success', 'Successfully update subject');
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
                return redirect()->back()->with('errors',
                    'There are already students registered for this subjects'.
                    ', cannot be deleted');
            } else {
                $this->subjectRepository->delete($id);
                DB::commit();

                return redirect()->route('subjects.index')
                    ->with('success', 'Successfully delete subject');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }
}
