<?php

namespace App\Actions\Consultant;

use App\Models\Consultant;

class PostConsultant
{
    public function execute($request)
    {
        $message = '';
        try
        {
            $consultant = new Consultant();
            $consultant->content = $request->input('content');
            $consultant->save();

            $message = 'Consultant was created successfully';
            
        }
        catch(\Throwable $th)
        {
            $message = $th;

            throw $th;
        }

        return  [
            'consultant' => $consultant,
            'message' => $message
        ];
    }
}