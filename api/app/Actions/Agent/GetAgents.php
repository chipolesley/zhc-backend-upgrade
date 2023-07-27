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

        if($agents !== null)
        {
            return [
            'isSuccess' => true,
            'data' => $agents,
            'message' => 'Agents were loaded successfully',
            'statusCode' => 200
            ];
        }
        else
        {
            return [
            'isSuccess' => false,
            'data' => $agents,
            'message' => 'No agents found',
            'statusCode' => 404
            ];
        }
    }
}