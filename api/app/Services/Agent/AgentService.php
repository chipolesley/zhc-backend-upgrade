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
        return  $this->postAgentAction->execute($request);
    }

    public function retrieveAgent($agentID)
    {
        return $this->getAgentAction->execute($agentID);
    }

    public function retrieveAgents()
    {
        return $this->getAgentsAction->execute();
    }

    public function paginateAgent($request)
    {
        return $this->getAgentPaginationAction->execute($request);
    }

    public function updateAgent($request, $agentID)
    {
        return $this->putAgentAction->execute($request, $agentID);
    }

    public function RemoveAgent($agentID)
    {
        return $this->deleteAgentAction->execute($agentID);
    }
}
