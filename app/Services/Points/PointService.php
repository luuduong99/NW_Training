<?php

namespace App\Services\Points;

use App\Models\StudentSubject;
use App\Repositories\Students\StudentRepository;
use App\Repositories\StudentSubject\StudentSubjectRepository;
use App\Repositories\Subjects\SubjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PointService
{
    protected $studentSubjectRepository, $studentRepository, $subjectRepository;

    public function __construct(StudentSubjectRepository $studentSubjectRepository,
                                StudentRepository        $studentRepository, SubjectRepository $subjectRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->studentSubjectRepository = $studentSubjectRepository;
        $this->subjectRepository = $subjectRepository;
    }

    public function listPointAllStudent()
    {

        $data = $this->studentSubjectRepository->pagination();
        $students = $this->studentRepository->getAll();

        return view('points.index', ['data' => $data, 'students' => $students]);
    }

    public function addPoint(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $this->studentSubjectRepository->addSinglePoint($data);
            DB::commit();

            return redirect()->route('edu.points.list')->with('add_point_success', 'Add success points');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('add_point_false', 'Add failed points');
        }
    }


    public function listPointOneStudent($id)
    {
        $student = $this->studentRepository->find($id);
        $data = $student->subjects()->paginate(5);
        $subjects = $student->subjects()->wherePivot('point', null)->get();

        return view('points.point', ['data' => $data, 'student' => $student, 'id' => $id,
            'subjects' => $subjects]);
    }

    public function addPointStudent(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $this->studentSubjectRepository->addSinglePoint($data);
            DB::commit();

            return redirect()->back()->with('add_point_success', 'Add success points');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('add_point_false', 'Add failed points');
        }
    }

    public function multipleAddPointStudent(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $this->studentSubjectRepository->multipleAddPointOneStudent($id, $data);
            DB::commit();

            return redirect()->back()->with('add_point_success', 'Add success points');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('add_point_false', 'Add failed points');
        }
    }
}
