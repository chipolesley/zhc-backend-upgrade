<?php

namespace App\Actions\Consultant;

use App\Models\Consultant;

class DeleteConsultant
{
    public function execute($consultantID)
    {
        $consultant = Consultant::where('ID','=',$consultantID)->get();

        if($consultant)
        {
            $consultant->delete();
            $response = [
                'consultant' => $consultant,
                'message' => 'Consultant was deleted successfully'
            ];
        }
        else
        {
            $response = [
                'consultant' => $consultant,
                'message' => 'Consultant was not found'
            ];
        }
        
        return $response;
    }
}