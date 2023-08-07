<?php

namespace App\Services\Faculties;

use App\Http\Requests\Faculties\CreateFacultyRequest;
use App\Http\Requests\Faculties\UpdateFacultyRequest;
use App\Models\Faculty;
use App\Repositories\Faculties\FacultyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacultyService
{

    protected $facultyRepository;

    public function __construct(FacultyRepository $facultyRepository)
    {
        $this->facultyRepository = $facultyRepository;
    }

    public function listFaculties()
    {
        $faculties = $this->facultyRepository->getAll();

        return view('faculties.index', ['faculties' => $faculties]);
    }

    public function createFaculty()
    {
        return view('faculties/create');
    }

    public function storeFaculty(CreateFacultyRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();

            $this->facultyRepository->create($data);

            DB::commit();

            return redirect()->route('edu.faculties.list')->with('add_faculty', 'Successfully add faculty');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    public function editFaculty($id)
    {
        $faculty = $this->facultyRepository->findFacultyId($id);
        return view('faculties/update', ['faculty' => $faculty]);
    }

    public function updateFaculty($id, UpdateFacultyRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $this->facultyRepository->update($id, $data);
            DB::commit();

            return redirect()->route('edu.faculties.list')->with('update_faculty', 'Successfully update faculty');
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function deleteFaculty($id)
    {
        $this->facultyRepository->deleteFaculty($id);
        return redirect()->route('edu.faculties.list')->with('delete_faculty', 'Successfully delete faculty');
    }
}
