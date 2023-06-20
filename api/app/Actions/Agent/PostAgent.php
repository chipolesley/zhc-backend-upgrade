<?php

namespace App\Actions\Agent;

use App\Models\Agent;

class PostAgent
{
    public function execute($request)
    {
        $agent = [];
        $message = '';
        try{            
            $agent = new Agent();
            $agent->content = $request->input('content');
            $agent->save();

            $message = 'Agent created successfully';
        }
        catch(\throw $th){
            $message = $th;
            throw $th;
        }
        
        return [
            'agent' => $agent,
            'message' => $message
        ];
    }
}