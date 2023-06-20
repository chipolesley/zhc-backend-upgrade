<?php
 
 namespace App\Actions\Agent;

 use App\Models\Agent;
 use App\Models\AgentConsultant;


class GetAgents
{
   public function execute(){
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
}