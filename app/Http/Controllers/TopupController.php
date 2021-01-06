<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableTopupRequest;
use App\Models\TableTopupConfirmation;

class TopupController extends Controller
{
    public function create_topup(Request $request)
    {
        $topup_request = new TableTopupRequest;
        //$topup_request->submit_date = date("Y-m-d H:i:s");
        $topup_request->user_id = $request->user_id;
        $topup_request->total_amount = $request->total_amount;
        $topup_request->status_topup = 0;
        $response = $topup_request->save();

        $confirmation_topup_photo = $request->file('confirmation_topup_photo');
        $dir_to = public_path().'/images/topup/';
        $confirmation_topup_photo->move($dir_to, $topup_request->id . '_'.$confirmation_topup_photo->getClientOriginalName());

        $topup_confirm = new TableTopupConfirmation;
        $topup_confirm->submit_date = date("Y-m-d H:i:s");
        $topup_confirm->bank_name = $request->bank_name;
        $topup_confirm->account_name = $request->account_name;
        $topup_confirm->account_number = $request->account_number;
        $topup_confirm->status = 0;
        $topup_confirm->update_note = '';
        $topup_confirm->confirmation_topup_photo = $dir_to . $topup_request->id . '_'.$confirmation_topup_photo->getClientOriginalName();
        $response = $topup_confirm->save();

        if($response)
    	{
    		return response()->json(["code"=>"200", "status"=>true, "message"=> 'Topup is waiting for confirm']);
    	}
    	else
    	{
    		return response()->json(["code"=>"400", "status"=>false, "message"=> 'Topup Failed']);
    	}
    }

    public function list_topup(Request $request)
    {
        $user_id = $request->user_id;
        $list_data = TableTopupRequest::where('user_id', $user_id)->orderBy('topup_id', 'DESC')->get();

        return response()->json([
            "code"=>"200", 
            "status"=>true,
            'message' => 'success',
            "data" => $list_data
        ]);

        if($response)
    	{
    		return response()->json(["code"=>"200", "status"=>true, "message"=> 'List Success', "data" => $list_data]);
    	}
    	else
    	{
    		return response()->json(["code"=>"400", "status"=>false, "message"=> 'List Failed']);
    	}
    }
}
