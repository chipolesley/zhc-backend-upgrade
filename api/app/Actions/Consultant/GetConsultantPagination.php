<?php

namespace App\Actions\Consultant;

use App\Models\Consultant;

class GetConsultantPagination
{
    public function execute($request)
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
    
}