<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use DB;



class ApiController extends Controller
{
    public function register(Request $request)
    {
		$input = $request->all();

    	$register = new Register;
    	$register->first_name = $input['first_name'];
    	$register->last_name = $input['last_name'];
    	$register->phone = $input['phone'];
    	$register->password = SHA1($input['password']);
    	$response = $register->save();

    	if($response)
    	{
    		return response()->json(["code"=>"200", "status"=>true, "message"=> 'Register Success']);
    	}
    	else
    	{
    		return response()->json(["code"=>"200", "status"=>false, "message"=> 'Register Failed']);
    	}

    }


    public function login(Request $request)
    {
    	
    	$input = $request->all();

    	$phone = $input['phone'];
    	$password = SHA1($input['password']);

    	$data = Register::where(array('phone'=>$phone, 'password'=>$password))->get();
    	if($data->count()==1)
    	{
    		return response()->json([
    			"code"=>"200", 
    			"status"=>true, 
    			"message"=> 'Login Success',
    			"data" => $data
    		]);
    	
    	}
    	else
    	{
    		return response()->json([
    			"code"=>"200", 
    			"status"=>false, 
    			"message"=> 'Login Failed',
    			"data" => []
    		]);
    	}

    } 
}
