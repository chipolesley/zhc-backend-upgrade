<?php

namespace App\Services\Agent;

use App\Models\Agent;
use App\Models\AgentConsultant;

class AgentService implements AgentServiceInterface
{
    public function createAgent($request)
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

    public function getAgent($agentID)
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

    public function getAgents()
    {
        $agents = Agent::with('AgentConsultant')
                        ->OrderBy('AgentID','desc')
                        ->get();
        if($agents)
        {
            $response = [
                'agents' => $agents,
                'message' => 'Agents were loaded successfully'
            ];
        }
        else
        {
            $response = [
                'agents' => $agents,
                'message' => 'No agents found'
            ];
        }
        return $response;
    }

    public function paginateAgent($request)
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

    public function updateAgent($request, $agentID)
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

    public function deleteAgent($agentID)
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
