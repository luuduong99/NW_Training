<?php

namespace App\Http\Controllers;

use App\Services\Points\PointService;
use Illuminate\Http\Request;

class PointController extends Controller
{
   protected $pointService;

   public function __construct(PointService $pointService)
   {
       $this->pointService = $pointService;
   }
    public function index()
    {
       return $this->pointService->listPoints();
    }

    public function studentPoints($id)
    {
        return $this->pointService->showPoint($id);
    }

    public function point(Request $request)
    {
        return $this->pointService->addPoint($request);
    }

    public function pointStudent(Request $request)
    {
        return $this->pointService->addPointStudent($request);
    }

    public function multipleAddPoint(Request $request, $id)
    {
        $this->pointService->multipleAddPointStudent($request, $id);
    }
}
