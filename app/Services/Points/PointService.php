<?php

namespace App\Services\Points;

use App\Repositories\Students\StudentRepository;
use App\Repositories\StudentSubject\StudentSubjectRepository;
use Illuminate\Http\Request;

class PointService
{
    protected $studentSubjectRepository, $studentRepository;

    public function  __construct(StudentSubjectRepository $studentSubjectRepository,
                                 StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->studentSubjectRepository = $studentSubjectRepository;
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
        $students = $this->studentRepository->all();

        return view('points.point', ['data' => $data, 'students' => $students, 'id' => $id]);
    }

    public function addPointStudent(Request $request)
    {
        $data = $request->all();
        $this->studentSubjectRepository->pointStudent($data);

        return redirect()->back();
    }
}
