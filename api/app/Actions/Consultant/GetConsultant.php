<?php

namespace App\Actions\Consultant;

use App\Models\Consultant;


class GetConsultant
{
    public function execute ($consultantID)
    {
        $consultant = Consultant::where('ID', '=', $consultantID)->get();

        if ($consultant !== null)
        {
            return [
                'isSuccess' => true,
                'data' => $consultant,
                'message' => 'Consultant loaded successfully',
                'statusCode' => 200
            ];
        }
        else
        {
            return [
                'isSuccess' => false,
                'data' => [],
                'message' => 'Consultant was not found',
                'statusCode' => 404
            ];
        }
    }
}