<?php
namespace App\Services\Nationality;

interface NationalityServiceInterface
{
    public function createNationality($request);
    public function getNationalities();
    public function getNationality($nationalityID);
    public function paginateNationality($request);
    public function updateNationality($request, $nationalityID);
    public function deleteNationality($nationalityID);
}
