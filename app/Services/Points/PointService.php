<?php

namespace App\Services\Points;

use App\Models\StudentSubject;
use App\Repositories\Students\StudentRepository;
use App\Repositories\StudentSubject\StudentSubjectRepository;
use App\Repositories\Subjects\SubjectRepository;
use Illuminate\Http\Request;

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

    public function listPoints()
    {

        $data = $this->studentSubjectRepository->getAllPoint();
        $students = $this->studentRepository->all();

        return view('points.index', ['data' => $data, 'students' => $students]);
    }

    public function addPoint(Request $request)
    {
        $data = $request->all();
        $this->studentSubjectRepository->pointStudent($data);

        return redirect()->route('edu.points.list_point_all');
    }


    public function showPoint($id)
    {
        $data = $this->studentSubjectRepository->showPointStudent($id);
        $subjects = $this->studentSubjectRepository->getSubjectPointNullOfStudent($id);
        $student = $this->studentRepository->findStudentId($id);

        return view('points.point', ['data' => $data, 'student' => $student, 'id' => $id,
            'subjects' => $subjects]);
    }

    public function addPointStudent(Request $request)
    {
        $data = $request->all();
        $this->studentSubjectRepository->pointStudent($data);

        return redirect()->back();
    }

    public function multipleAddPointStudent(Request $request, $id)
    {
        foreach ($request->subject as $key => $value) {
            $result = StudentSubject::where('student_id', $id)
                ->where('subject_id', $value)
                ->first();
            if ($result) {
                $result->update([
                    'point' => $request->point[$key],
                ]);
            }
        }
    }
}
