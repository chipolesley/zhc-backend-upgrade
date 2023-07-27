<?php

namespace App\Actions\Consultant;

use App\Models\Consultant;

class PutConsultant
{
    public function execute($request, $consultantID)
    {
        $consultant = Consultant::where('ID','=',$consultantID)->get();

        if ($consultant !== null)
        {
            try
            {
                $consultant->content = $request->input('content');
                $consultant->save();
                
                return [
                    'isSuccess' => true,
                    'data' => $consultant,
                    'message' => 'Consultant was updated successfully',
                    'statusCode' => 200
                ];

            } catch (\Throwable $th) {
                return [
                    'isSuccess' => false,
                    'data' => $consultant,
                    'message' => $th->getMessage(),
                    'statusCode' => 500
                ];
            }
        }
        else
        {
            return [
                'isSuccess' => false,
                'data' => [],
                'message' => 'Consultant was not found',
                'statusCode' => 200
            ];
        }
    }
}