<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Consultant\ConsultantServiceInterface as iConsultantService;


class ConsultantController extends Controller
{
    public function __construct(protected iConsultantService $iConsultantService)
    {}

    public function createConsultant(Request $request)
    {
        $consultant = $this->iConsultantService->createConsultant($request);
        return response()->json($consultant, 201);
    }

    public function getConsultants()
    {
        $consultant = $this->iConsultantService->getConsultants();
        return response()->json($consultant, 200);
    }

    public function getConsultant($consultantID)
    {
        $consultant = $this->iConsultantService->getConsultant($consultantID);
        return response()->json($consultant, 200);
    }

    public function paginateConsultant(Request $request)
    {
        $consultant = $this->iConsultantService->paginateConsultant($request);
        return response()->json($consultant, 200);
    }

    public function updateConsultant(Request $request, $consultantID)
    {
        $consultant = $this->iConsultantService->updateConsultant($request, $consultantID);
        return response()->json($consultant, 200);
    }

    public function deleteConsultant($consultantID)
    {
        $consultant = $this->iConsultantService->deleteConsultant($consultantID);
        return response()->json($consultant, 200);
    }
}