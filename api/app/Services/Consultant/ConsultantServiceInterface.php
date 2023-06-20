<?php
namespace App\Services\Consultant;

interface ConsultantServiceInterface
{
    public function createConsultant($request);
    public function getConsultants();
    public function getConsultant($consultantID);
    public function paginateConsultant($request);
    public function updateConsultant($request, $consultantID);
    public function deleteConsultant($consultantID);
}