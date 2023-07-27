<?php
 
 namespace App\Actions\Consultant;

 use App\Models\Consultant;
 use App\Models\ConsultantConsultant;


class GetConsultants
{
   public function execute()
   {
        $consultants = Consultant::all();

        if($consultants !== null)
        {
            return [
                'isSuccess' => true,
                'data' => $consultants,
                'message' => 'Consultant loaded successfully',
                'statusCode' => 200
            ];
        }
        else
        {
            return [
                'isSuccess' => false,
                'data' => $consultants,
                'message' => 'Consultant was not found',
                'statusCode' => 404
            ];
        }
    }
}