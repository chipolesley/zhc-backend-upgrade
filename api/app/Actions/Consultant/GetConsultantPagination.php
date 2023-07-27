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
        
        if ($consultant !== null) {
            
            return [
                'isSuccess' => true,
                'data' => $consultant,
                'message' => 'Consultant loaded successfully',
                'statusCode' => 200
            ];
        }
        else
        {
            return [
                'isSuccess' => false,
                'data' => $consultant,
                'message' => 'Consultant was not found',
                'statusCode' => 404
            ];
        }
    }
    
}