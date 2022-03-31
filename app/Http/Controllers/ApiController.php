<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    // for view api home page

    public function api_home()
    {
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://dummy.restapiexample.com/api/v1/employees',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode( $response );
        return view('api.api_home')->with('employee_list',$response);
    }
}
