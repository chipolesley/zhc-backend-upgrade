<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Agent\AgentServiceInterface as iAgentService;



class AgentController extends Controller
{
    public function __construct(
        protected iAgentService $iAgentService
    ){}

    public function createAgent(Request $request)
    {
        $agent = $this->iAgentService->createAgent($request);
        return response()->json($agent, 201);
    }

    public function getAgents()
    {
        $agents = $this->iAgentService->retrieveAgents();
        return response()->json($agents, 200);
    }

    public function getAgent($agentID)
    {
        $agent = $this->iAgentService->retrieveAgent($agentID);
        return response()->json($agent, 200);
    }

    public function paginateAgent(Request $request)
    {
        $agent = $this->iAgentService->paginateAgent($request);
        return response()->json($agent, 200);
    }

    public function updateAgent(Request $request, $agentID)
    {
        $agent = $this->iAgentService->updateAgent($request, $agentID);
        return response()->json($agent, 201);
    }

    public function deleteAgent($agentID)
    {
        $agent = $this->iAgentService->removeAgent($agentID);
        return response()->json($agent, 200);
    }
}
