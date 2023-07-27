<?php

namespace App\Actions\Agent;

use App\Models\Agent;


class GetAgent
{
    public function execute ($agentID)
    {
        $agent = Agent::where('AgentID', '=', $agentID)->first();
            
            if ($agent !== null) {
               return  [
                    'isSuccess' => true,
                    'data' => $agent,
                    'message' => 'Agent was loaded successfully',
                    'statusCode' => 200
                ];
            }
            else
            {
               return [
                    'isSuccess' => false,
                    'data' => [],
                    'message' => 'Agent was not found',
                    'statusCode' => 404
                ];
            }
    }
}