<?php

namespace App\Services\Nationality;

use App\Models\Nationality;

class NationalityService implements NationalityServiceInterface
{
    public function createNationality($request)
    {
        $message = '';
        try
        {
            $nationality = new Nationality();
            $nationality->content = $request->input('content');
            $nationality->save();
            $message = 'Nationality was successfully created';
        }
        catch (\Throwable $th)
        {
            $message = $th;
            throw $th;
        }
        
        return [
                'nationality' => $nationality,
                'message' => $message
        ];
    }

    public function getNationalities()
    {
        try
        {
            $nationalities = Nationality::all();

            if($nationalities)
            {
                $response = [
                    'nationalities' => $nationalities,
                    'message' => 'Nationalities were loaded successfully'
                ];
            }
            else
            {
                $response = [
                    'nationalities' => [],
                    'message' => 'Nationalities were not found'
                ];
            }
            
        }
        catch(\Throwable $th)
        {
            $response = [
                'nationalities' => [],
                'message' => $th
            ];
            throw $th;
        }
        
        return $response;
    }

    public function getNationality($nationalityID)
    {
        $message = '';
        $nationality = Nationality::where('ID', '=', $nationalityID)->get();

        if ($nationality)
        {
            $message = 'Nationality was successfully loaded';
        }
        else
        {
            $message = 'Nationality was not found';
        }
        return [
            'nationality' => $nationality,
            'message' => $message
        ];
    }

    public function paginateNationality($request)
    {
        $nationality = [];
        $currNationalityID = $request->input('NationalityID');

        if($request->input('first'))
        {
            $nationality = Nationality::OrderBy('ID','asc')->first();
        }
        elseif($request->input('last'))
        {
            $nationality = Nationality::OrderBy('ID','desc')->first();
        }
        elseif($request->input('prior'))
        {
            $nationality = Nationality::where('ID','<',$currNationalityID)->orderByDesc('NationalityID')->first();
        }
        elseif($request->input('next'))
        {
            $nationality = Nationality::where('ID','>',$currNationalityID)->orderBy('NationalityID','asc')->first();
        }
        else
        {
            $nationality = Nationality::where('ID', '=', $currNationalityID)->get();
        }

        if ($nationality) {
            $message = 'Nationality was successfully loaded';
        }
        else
        {
            $message = 'Nationality was not found';
        }

        return [
            'nationality' => $nationality,
            'message' => $message
        ];
    }

    public function updateNationality($request, $nationalityID)
    {
        $nationality = Nationality::where('ID','=',$NationalityID)->get();
        if (count($nationality)!=0) {
            $nationality->content = $request->input('content');
            $nationality->save();
            return response()->json(['nationality' => $nationality], 200);

        }
        return response()->json(['message' => 'Document not found'], 404);

    }

    public function deleteNationality($nationalityID)
    {
        $nationality = Nationality::where('ID','=',$NationalityID)->get();
        $nationality->delete();
        return response()->json(['message' => 'Nationality deleted'], 200);
    }
}