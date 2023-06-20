<?php

namespace App\Actions\Agent;

use App\Models\Agent;


class GetAgent
{
    public function execute ($agentID)
    {
        $agent = Agent::where('AgentID', '=', $agentID)->get();
            
            if ($agent) {
                $response = [
                    'agent' => $agent,
                    'message' => 'Agent was loaded successfully'
                ];
            }
            else
            {
                $response = [
                    'agent' => [],
                    'message' => 'Agent was not found'
                ];
            }
            return $response;
    }
}