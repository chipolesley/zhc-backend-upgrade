<?php

namespace App\Actions\Agent;

use App\Models\Agent;

class GetAgentPagination
{
    public function execute($request)
    {
        $currAgentID = $request->input('AgentID');

        if($request->input('first')){
            $agent = Agent::OrderBy('AgentID','asc')->first();
        }
        elseif ($request->input('last'))
        {
            $agent = Agent::OrderBy('AgentID','desc')->first();
        }
        elseif ($request->input('prior'))
        {
            $agent = Agent::where('AgentID','<',$currAgentID)->orderByDesc('AgentID')->first();
        }
        elseif ($request->input('next'))
        {
            $agent = Agent::where('AgentID','>',$currAgentID)->orderBy('AgentID','asc')->first();
        }
        else
        {
            $agent = Agent::where('AgentID', '=', $currAgentID)->get();
        }

        if ($agent)
        {
            $response = [
                'agent' => $agent,
                'message' => 'Agent was loaded successfully'
                ];
        }
        else
        {
            $response = [
                'agent' => $agent,
                'message' => 'Agent not found'
                ];
        }
        return $response;
    }
    
}