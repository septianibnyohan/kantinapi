<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use DB;
use App\Http\Controllers;



class DashboardController extends Controller
{
    public function get_summary()
    {
    	
    	$input = $request->all();

    	$phone = $input['phone'];
    	$password = SHA1($input['password']);

        $user = Register::get();
        $data['user_total'] = $user->count();
        return response()->json([
            "code"=>"200", 
            "status"=>true,
            'message' => 'success',
            "data" => $data
        ]);

    	// if($data->count()==1)
    	// {
    	// 	return response()->json([
    	// 		"code"=>"200", 
        //         "status"=>true,
        //         'message' => 'success',
    	// 		"data" => $data
    	// 	]);
    	
    	// }
    	// else
    	// {
    	// 	return response()->json([
    	// 		"code"=>"200", 
    	// 		"status"=>false, 
    	// 		"message"=> 'Login Failed',
    	// 		"data" => []
    	// 	]);
    	// }

    } 
}
