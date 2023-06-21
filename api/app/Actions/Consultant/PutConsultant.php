<?php

namespace App\Actions\Consultant;

use App\Models\Consultant;

class PutConsultant
{
    public function execute($request, $agentID)
    {
        $message = '';
        $consultant = Consultant::where('ID','=',$consultantID)->get();

        if ($consultant)
        {
            try
            {
                $consultant->content = $request->input('content');
                $consultant->save();

                $message = 'Consultant was updated successfully';

            } catch (\Throwable $th) {
                $message = $th;
                throw $th;
            }
            
            $response = [
                'consultant' => $consultant,
                'message' => $message
            ];

        }
        else
        {
            $response = [
                'consultant' => [],
                'message' => 'Consultant was not found'
            ];
        }

        return $response;
    }
}