<?php
 
 namespace App\Actions\Consultant;

 use App\Models\Consultant;
 use App\Models\ConsultantConsultant;


class GetConsultants
{
   public function execute()
   {
        $consultants = Consultant::all();

        if($consultants)
        {
            $response = [
                'consultants' => $consultants,
                'message' => 'Consultant loaded successfully'
            ];
        }
        else
        {
            $response = [
                'consultants' => $consultants,
                'message' => 'Consultant was not found'
            ];
        }
        
        return $response;
    }
}