<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Agent\AgentService;
use App\Services\Agent\AgentServiceInterface as IAgentService;



class AgentController extends Controller
{
    public function __construct(
        protected IAgentService $IAgentService
    ){}

    public function postAgent(Request $request)
    {
        $agent = $this->IAgentService->create($request);
        return response()->json($agent, 201);
    }

    public function getAgents()
    {
        $agents = $this->IAgentService->getAgents();
        return response()->json($agents, 200);
    }

    public function getAgent($AgentID)
    {
        $agent = $this->IAgentService->getAgent($AgentID);
        return response()->json($agent, 200);
    }

    public function paginateAgent(Request $request)
    {
        $agent = $this->IAgentService->packageAgent($request);
        return response()->json($agent, 200);
    }

    public function putAgent(Request $request, $AgentID)
    {
        $agent = $this->IAgentService->putAgent($request, $AgentID);
        return response()->json($agent, 201);
    }

    public function deleteAgent($AgentID)
    {
        $agent = $this->IAgentService->deleteAgent($AgentID);
        return response()->json($agent, 200);
    }
}