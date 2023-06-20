<?php

namespace App\Services\Agent;

interface AgentServiceInterface{
    
    /**
     * @return agents
     */
    public function retrieveAgents();
    
    /**
     * @param int $AgentID
     * @return agent
     */
    public function retrieveAgent($agentID);
    
    /**
     * @param array $request
     ** @return agent
     */
    public function createAgent($request);
    
    /**
     * @param array $request
     ** @return agent
     */
    public function paginateAgent($request);
    
    /**
     * @param array $request,
     * @param int $AgentID
     ** @return agent
     */
    public function updateAgent($request, $agentID);
    
    /**
     * @param int $AgentID
     ** @return agentID
     */
    public function RemoveAgent($agentID);

   
}
