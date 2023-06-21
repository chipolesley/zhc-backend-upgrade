<?php
namespace App\Services\Consultant;

/** Actions Import*/
use App\Actions\Consultant\PutConsultant;
use App\Actions\Consultant\GetConsultant;
use App\Actions\Consultant\PostConsultant;
use App\Actions\Consultant\GetConsultants;
use App\Actions\Consultant\DeleteConsultant;
use App\Actions\Consultant\GetConsultantPagination;

class ConsultantService implements ConsultantServiceInterface
{
    public function __construct(
        protected PutConsultant $putConsultantAction,
        protected PostConsultant $postConsultantAction,
        protected DeleteConsultant $deleteConsultantAction,
        protected GetConsultant $getConsultantAction,
        protected GetConsultants $getConsultantsAction,
        protected GetConsultantPagination $getConsultantPaginationAction,
    ){}

    public function createConsultant($request)
    {
        $consultant = $this->postConsultantAction->execute($request);
        return $consultant;
    }

    public function retrieveConsultants()
    {
        $consultants = $this->getConsultantsAction->execute();
        return $consultants;
    }

    public function retrieveConsultant($consultantID)
    {
        $consultant = $this->getConsultantAction->execute($consultantID);
        return $consultant;
    }

    public function paginateConsultant($request)
    {
        $consultants = $this->getConsultantPaginationAction->execute($request);
        return $consultants;
    }

    public function updateConsultant($request, $consultantID)
    {
        $consultant = $this->putConsultantAction->execute($request, $consultantID);
        return $consultant;
    }

    public function removeConsultant($consultantID)
    {
        $consultant = $this->deleteConsultantAction->execute($consultantID);
        return $consultant;
    }
}