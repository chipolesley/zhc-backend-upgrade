<?php

namespace App\Actions\Consultant;

use App\Models\Consultant;

class PostConsultant
{
    public function execute($request)
    {
        try
        {
            $consultant = new Consultant();
            $consultant->content = $request->input('content');
            $consultant->save();

            return  [
                'isSuccess' => true,
                'data' => $consultant,
                'message' => 'Consultant was created successfully',
                'statusCode' => 201
            ];
            
        }
        catch(\Throwable $th)
        {
            return  [
                'isSuccess' => false,
                'data' => $consultant,
                'message' => $th->getMessage(),
                'statusCode' => 200
            ];
        }
    }
}