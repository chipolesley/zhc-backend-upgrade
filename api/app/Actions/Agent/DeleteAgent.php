<?php

namespace App\Actions\Agent;

use App\Models\Agent;

class DeleteAgent
{
    public function execute($agentID)
    {
        $agent = Agent::where('AgentID','=',$agentID)->get();
        if ($agent)
        {
            $agent->delete();
            $response = [
                'agent' => $agentID,
                'message' => 'Agent was deleted'
            ];
        }
        else
        {
            $response = [
                'agent' => $agentID,
                'message' => 'Agent was not found'
            ];
        }
        return $response;
    }
}