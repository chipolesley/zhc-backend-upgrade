<?php
namespace App\Services\Consultant;

use App\Models\Consultant;

class ConsultantService implements ConsultantServiceInterface
{
    public function createConsultant($request)
    {
        $message = '';
        try
        {
            $consultant = new Consultant();
            $consultant->content = $request->input('content');
            $consultant->save();

            $message = 'Consultant was created successfully';
            
        }
        catch(\Throwable $th)
        {
            $message = $th;

            throw $th;
        }

        return  [
            'consultant' => $consultant,
            'message' => $message
        ];
    }

    public function getConsultants()
    {
        $consultants = Consultant::all();

        if($consultants)
        {
            $response = [
                'consultants' => $consultants,
                'message' => 'Consultant loaded successfully'
            ];
        }
        else
        {
            $response = [
                'consultants' => $consultants,
                'message' => 'Consultant was not found'
            ];
        }
        
        return $response;
    }

    public function getConsultant($consultantID)
    {
        $consultant = Consultant::where('ID', '=', $consultantID)->get();

        if ($consultant)
        {
            $response = [
                'consultants' => $consultant,
                'message' => 'Consultant loaded successfully'
            ];
        }
        else
        {
            $response = [
                'consultants' => [],
                'message' => 'Consultant was not found'
            ];
        }
        return $response;
    }

    public function paginateConsultant($request)
    {
        $currConsultantID = $request->input('ConsultantID');
        if($request->input('first'))
        {
            $consultant = Consultant::OrderBy('ID','asc')->first();
        }
        elseif($request->input('last'))
        {
            $consultant = Consultant::OrderBy('ID','desc')->first();
        }
        elseif($request->input('prior'))
        {
            $consultant = Consultant::where('ID','<',$currConsultantID)->orderByDesc('ID')->first();
        }
        elseif($request->input('next'))
        {
            $consultant = Consultant::where('ID','>',$currConsultantID)->orderBy('ID','asc')->first();
        }
        else
        {
            $consultant = Consultant::where('ID', '=', $currConsultantID)->get();
        }
        
        if ($consultant) {
            
            $response = [
                'consultants' => $consultant,
                'message' => 'Consultant loaded successfully'
            ];
        }
        else
        {
            $response = [
                'consultants' => $consultant,
                'message' => 'Consultant was not found'
            ];
        }
        return $response;


    }

    public function updateConsultant($request, $consultantID)
    {
        $message = '';
        $consultant = Consultant::where('ID','=',$consultantID)->get();

        if ($consultant)
        {
            try
            {
                $consultant->content = $request->input('content');
                $consultant->save();

                $message = 'Consultant was updated successfully';

            } catch (\Throwable $th) {
                $message = $th;
                throw $th;
            }
            
            $response = [
                'consultant' => $consultant,
                'message' => $message
            ];

        }
        else
        {
            $response = [
                'consultant' => [],
                'message' => 'Consultant was not found'
            ];
        }

        return $response;
    }

    public function deleteConsultant($consultantID)
    {
        $consultant = Consultant::where('ID','=',$ConsultantID)->get();

        if($consultant)
        {
            $consultant->delete();
            $response = [
                'consultant' => $consultant,
                'message' => 'Consultant was deleted successfully'
            ];
        }
        else
        {
            $response = [
                'consultant' => $consultant,
                'message' => 'Consultant was not found'
            ];
        }
        
        return $response;
    }
}