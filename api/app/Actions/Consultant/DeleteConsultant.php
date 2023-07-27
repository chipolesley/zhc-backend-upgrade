<?php

namespace App\Actions\Consultant;

use App\Models\Consultant;

class DeleteConsultant
{
    public function execute($consultantID)
    {
        $consultant = Consultant::where('ID','=',$consultantID)->get();

        if($consultant !== null)
        {
            $consultant->delete();
            return [
                'isSuccess' => true,
                'data' => $consultant,
                'message' => 'Consultant was deleted successfully',
                'statusCode' => 200
            ];
        }
        else
        {
            return [
                'isSuccess' => false,
                'data' => $consultant,
                'message' => 'Consultant was not found',
                'statusCode' => 404
            ];
        }
    }
}