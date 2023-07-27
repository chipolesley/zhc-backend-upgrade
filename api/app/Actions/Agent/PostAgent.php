<?php

namespace App\Actions\Agent;

use App\Models\Agent;

class PostAgent
{
    public function execute($request)
    {
        try{
            $agent = new Agent();
            $agent->content = $request->input('content');
            $agent->save();

            return [
                'isSuccess' => true,
                'data' => $agent,
                'message' => 'Agent created successfully',
                'statusCode' => 201
            ];
        }
        catch(\throw $th){
            return [
                'isSuccess' => false,
                'data' => [],
                'message' => $th->getMessage(),
                'statusCode' => 500
            ];
        }
        
        
    }
}