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
        return $this->postConsultantAction->execute($request);
    }

    public function retrieveConsultants()
    {
        return $this->getConsultantsAction->execute();
    }

    public function retrieveConsultant($consultantID)
    {
        return $this->getConsultantAction->execute($consultantID);
    }

    public function paginateConsultant($request)
    {
        return $this->getConsultantPaginationAction->execute($request);
    }

    public function updateConsultant($request, $consultantID)
    {
        return $this->putConsultantAction->execute($request, $consultantID);
    }

    public function removeConsultant($consultantID)
    {
        return $this->deleteConsultantAction->execute($consultantID);
    }
}