<?php

namespace App\Actions\Consultant;

use App\Models\Consultant;


class GetConsultant
{
    public function execute ($consultantID)
    {
        $consultant = Consultant::where('ID', '=', $consultantID)->get();

        if ($consultant)
        {
            $response = [
                'consultants' => $consultant,
                'message' => 'Consultant loaded successfully'
            ];
        }
        else
        {
            $response = [
                'consultants' => [],
                'message' => 'Consultant was not found'
            ];
        }
        return $response;
    }
}