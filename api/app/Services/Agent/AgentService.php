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
        
        $response = [
            'agent' => $agent, 
            'message' => $message
        ];

        return $response;
    }

    public function getAgent($AgentID)
    {
        $agent = Agent::where('AgentID', '=', $AgentID)->get();
        
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
        else if($request->input('last'))
        {
            $agent = Agent::OrderBy('AgentID','desc')->first();
        }
        else if($request->input('prior'))
        {
            $agent = Agent::where('AgentID','<',$currAgentID)->orderByDesc('AgentID')->first();
        }
        else if($request->input('next'))
        {
            $agent = Agent::where('AgentID','>',$currAgentID)->orderBy('AgentID','asc')->first();
        }
        else 
        {
            $agent = Agent::where('AgentID', '=', $currAgentID)->get();
        }

        if ($booking) 
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

    public function updateAgent($request, $AgentID)
    {
        $agent = Agent::where('AgentID','=',$AgentID)->get();
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
                'message' => 'AgentID'.$AgentID.' was not found'
            ];
        }
        return $response;
    }

    public function deleteAgent($AgentID)
    {
        $agent = Agent::where('AgentID','=',$AgentID)->get();
        if ($agent) 
        {
            $agent->delete();
            $response = [
                'agent' => $AgentID,
                'message' => 'Agent was deleted'
            ];
        }
        else
        {
            $response = [
                'agent' => $AgentID,
                'message' => 'Agent was not found'
            ];
        }
        return $response;
    }
}