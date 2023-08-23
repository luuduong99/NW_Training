<?php

namespace App\Http\Controllers;

use App\Http\Requests\Faculties\CreatOrUpdateFacultyRequest;
use App\Http\Requests\Faculties\UpdateFacultyRequest;
use App\Services\Faculties\FacultyService;
use Illuminate\Http\Request;

class FacultyController extends Controller
{

    protected $facultyService;

    public function __construct(FacultyService $facultyService)
    {
        $this->facultyService = $facultyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->facultyService->listFaculties();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->facultyService->createFaculty();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatOrUpdateFacultyRequest $request)
    {
        return $this->facultyService->storeFaculty($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->facultyService->editFaculty($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, CreatOrUpdateFacultyRequest $request)
    {
        return $this->facultyService->updateFaculty($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->facultyService->deleteFaculty($id);
    }
}
