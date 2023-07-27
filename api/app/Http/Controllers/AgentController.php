<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Agent\AgentServiceInterface as iAgentService;
use App\Services\SendResponseService;



class AgentController extends Controller
{
    public function __construct(
        protected iAgentService $iAgentService,
        protected SendResponseService $sendResponseService
    ){}

    public function createAgent(Request $request)
    {
        $data = $this->iAgentService->createAgent($request);
        return $this->response($data);
    }

    public function getAgents()
    {
        $data = $this->iAgentService->retrieveAgents();
        return $this->response($data);
    }

    public function getAgent($agentID)
    {
        $data = $this->iAgentService->retrieveAgent($agentID);
        return $this->response($data);
    }

    public function paginateAgent(Request $request)
    {
        $data = $this->iAgentService->paginateAgent($request);
        return $this->response($data);
    }

    public function updateAgent(Request $request, $agentID)
    {
        $data = $this->iAgentService->updateAgent($request, $agentID);
        return $this->response($data);
    }

    public function deleteAgent($agentID)
    {
        $data = $this->iAgentService->removeAgent($agentID);
        return $this->response($data);
    }

    private function response($data)
    {
        if($data['isSuccess'])
        {
          return $this->sendResponseService->sendResponse($data['data'], $data['message'], $data['statusCode']);
        }
 
        return $this->sendResponseService->sendError($data['data'], $data['message'], $data['statusCode']);
    }
}
