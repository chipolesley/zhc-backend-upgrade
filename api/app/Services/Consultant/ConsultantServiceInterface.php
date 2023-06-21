<?php
namespace App\Services\Consultant;

interface ConsultantServiceInterface
{
    public function createConsultant($request);
    public function retrieveConsultants();
    public function retrieveConsultant($consultantID);
    public function paginateConsultant($request);
    public function updateConsultant($request, $consultantID);
    public function removeConsultant($consultantID);
}