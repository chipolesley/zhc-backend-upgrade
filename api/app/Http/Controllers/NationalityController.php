<?php
namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Services\Nationality\NationalityServiceInterface as iNationalityService;


class NationalityController extends Controller
{
    public function __construct(
        protected iNationalityService $iNationalityService
    ){}

    public function createNationality(Request $request)
    {
        $nationality = $this->iNationalityService->createNationality($request);
        return response()->json($nationality, 201);
    }

    public function getNationalities()
    {
        $nationalities = $this->iNationalityService->getNationalities();
        return response()->json($nationalities, 200);
    }

    public function getNationality($nationalityID)
    {
        $nationality = $this->iNationalityService->getNationality($nationalityID);
        return response()->json($nationality, 200);
    }

    public function paginateNationality(Request $request)
    {
        $nationality = $this->iNationalityService->paginateNationality($request);
        return response()->json($nationality, 200);
    }

    public function updateNationality(Request $request, $nationalityID)
    {
        $nationality = $this->iNationalityService->updateNationality($request, $nationalityID);
        return response()->json($nationality, 201);
    }

    public function deleteNationality($nationalityID)
    {
        $nationality = $this->iNationalityService->deleteNationality($nationalityID);
        return response()->json($nationality, 201);
    }
}