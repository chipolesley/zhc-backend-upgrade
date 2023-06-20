<?php

namespace App\Actions\Agent;

use App\Models\Agent;

class PutAgent
{
    public function execute($request, $agentID)
    {
        $agent = Agent::where('AgentID','=',$agentID)->get();
        if ($agent) {
        
            try {
                $agent->content = $request->input('content');
                $agent->save();

                $response = [
                    'agent' => $agent,
                    'message' => 'Agent was successfully updated'
                ];
            } catch (\Throwable $th) {
                $response = [
                    'agent' => $agent,
                    'message' => 'Agent was successfully updated'
                ];
                throw $th;
            }
        }
        else
        {
            $response = [
                'agent' => [],
                'message' => 'AgentID'.$agentID.' was not found'
            ];
        }
        return $response;
    }
}