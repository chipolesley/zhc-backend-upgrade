<?php
namespace App\Services\Agent;

interface AgentServiceInterface{
    
    /**
     * @param array $data
     * @return agents
     */
    public function getAgents();
    
    /**
     * @param int $AgentID
     * @return agent
     */
    public function getAgent($AgentID);
    
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
    public function updateAgent($request, $AgentID);
    
    /**
     * @param int $AgentID
     ** @return agentID
     */
    public function deleteAgent($AgentID);

   
}