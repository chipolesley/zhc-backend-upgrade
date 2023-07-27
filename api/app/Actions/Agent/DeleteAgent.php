<?php

namespace App\Actions\Agent;

use App\Models\Agent;

class DeleteAgent
{
    public function execute($agentID)
    {
        $agent = Agent::where('AgentID','=',$agentID)->get();
        if ($agent !== null)
        {
            $agent->delete();
            return [
                    'isSuccess' => true,
                    'data' => $agentID,
                    'message' => 'Agent was deleted',
                    'statusCode' => 200
                ];
        }
        else
        {
            return [
                'isSuccess' => false,
                'data' => $agentID,
                'message' => 'Agent was not found',
                'statusCode' => 404
            ];
        }
    }
}