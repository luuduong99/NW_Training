<?php

namespace App\Services\Faculties;

use App\Http\Requests\Faculties\CreatOrUpdateFacultyRequest;
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
        $faculties = $this->facultyRepository->pagination();

        return view('faculties.index', ['faculties' => $faculties]);
    }

    public function createFaculty()
    {
        return view('faculties/create');
    }

    public function storeFaculty(CreatOrUpdateFacultyRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $this->facultyRepository->create($data);
            DB::commit();

            return redirect()->route('edu.faculties.index')->with('add_faculty', 'Successfully add faculty');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    public function editFaculty($id)
    {
        $faculty = $this->facultyRepository->find($id);

        if(!$faculty)
        {
            abort(404);
        }

        return view('faculties/update', ['faculty' => $faculty]);
    }

    public function updateFaculty($id, CreatOrUpdateFacultyRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $this->facultyRepository->update($id, $data);
            DB::commit();

            return redirect()->route('edu.faculties.index')->with('update_faculty', 'Successfully update faculty');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    public function deleteFaculty($id)
    {
        DB::beginTransaction();
        try {
            $faculty = $this->facultyRepository->find($id);

            if(!$faculty)
            {
                abort(404);
            }

            if (count($faculty->students) != 0 && count($faculty->subjects) != 0) {
                return redirect()->back()->with('delete_false',
                    'This faculty already has a subject or student registered' . ', it cannot be deleted');
            } else {
                $this->facultyRepository->delete($id);
                DB::commit();

                return redirect()->route('edu.faculties.index')->with('delete_faculty', 'Successfully delete faculty');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }
}
