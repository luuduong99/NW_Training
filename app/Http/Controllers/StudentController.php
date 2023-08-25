<?php

namespace App\Http\Controllers;

use App\Http\Requests\Students\AddOnePointRequest;
use App\Http\Requests\Students\AddPointStudentRequest;
use App\Http\Requests\Students\CreateOrUpdateStudentRequest;
use App\Http\Requests\Students\UpdateStudentRequest;
use App\Services\Students\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->studentService->getAllStudent($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->studentService->createStudent();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrUpdateStudentRequest $request)
    {
        return $this->studentService->storeStudent($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->studentService->profile($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->studentService->editStudent($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOrUpdateStudentRequest $request, $id)
    {
        return $this->studentService->updateStudent($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->studentService->deleteStudent($id);
    }

    public function updateProfile(Request $request, $id)
    {
    return $this->studentService->updateProfile($request, $id);
    }

    public function registerMultipleSubject(Request $request)
    {
        return $this->studentService->registerMultipleSubject($request);
    }

    public function sendNotification($id)
    {
        return $this->studentService->sendNoitice($id);
    }

    public function import(Request $request)
    {
        return $this->studentService->importPoints($request);
    }

    public function subjectOfStudent($id)
    {
        return $this->studentService->getAllSubject($id);
    }

    public function addPoint(AddOnePointRequest $request)
    {
        return $this->studentService->addPointSingle($request);
    }

    public function listPoint($id)
    {
        return $this->studentService->listPointOfStudent($id);
    }

    public function getPoint(Request $request)
    {
        return $this->studentService->getPointAjax($request);
    }

    public function addPointMultiple(AddPointStudentRequest $request, $id)
    {
        return $this->studentService->addPointAjax($request, $id);
    }
}
