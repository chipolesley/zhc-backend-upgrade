<?php

namespace App\Services\Agent;

/** Actions Import*/
use App\Actions\Agent\PutAgent;
use App\Actions\Agent\GetAgent;
use App\Actions\Agent\PostAgent;
use App\Actions\Agent\GetAgents;
use App\Actions\Agent\DeleteAgent;
use App\Actions\Agent\GetAgentPagination;

class AgentService implements AgentServiceInterface
{
       
    public function __construct(
        protected PutAgent $putAgentAction,
        protected PostAgent $postAgentAction,
        protected DeleteAgent $deleteAgentAction,
        protected GetAgent $getAgentAction,
        protected GetAgents $getAgentsAction,
        protected GetAgentPagination $getAgentPaginationAction,
    ){}

    public function createAgent($request)
    {
        $agent = $this->postAgentAction->execute($request);
        return $agent;
    }

    public function retrieveAgent($agentID)
    {
        $agent = $this->getAgentAction->execute($agentID);
        return $agent;
    }

    public function retrieveAgents()
    {
        $agents = $this->getAgentsAction->execute();
        return $agents;
    }

    public function paginateAgent($request)
    {
        $agentsPagination = $this->getAgentPaginationAction->execute($request);
        return $agentsPagination;
    }

    public function updateAgent($request, $agentID)
    {
        $agent = $this->putAgentAction->execute($request, $agentID);
        return $agent;        
    }

    public function RemoveAgent($agentID)
    {
        $agent = $this->deleteAgentAction->execute($agentID);
        return $agent;
    }
}
