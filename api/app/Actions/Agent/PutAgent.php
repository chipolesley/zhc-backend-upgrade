<?php

namespace App\Actions\Agent;

use App\Models\Agent;

class PutAgent
{
    public function execute($request, $agentID)
    {
        $agent = Agent::where('AgentID','=',$agentID)->get();
        if ($agent !== null) {
            try
            {
                $agent->content = $request->input('content');
                $agent->save();

                return [
                    'isSuccess' => true,
                    'data' => $agent,
                    'message' => 'Agent was successfully updated',
                    'statusCode' => 200
                ];
            }
            catch (\Throwable $th)
            {
                return [
                    'isSuccess' => false,
                    'data' => $agent,
                    'message' => $th->getMessage(),
                    'statusCode' => 500
                ];
            }
        }
        else
        {
            return [
                'isSuccess' => false,
                'data' => [],
                'message' => 'AgentID'.$agentID.' was not found',
                'statusCode' => 404
            ];
        }
    }
}