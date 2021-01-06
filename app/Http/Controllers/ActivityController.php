<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableTopupRequest;
use App\Models\TableTopupConfirmation;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function list_activity(Request $request)
    {
        $user_id = $request->user_id;
        $order_status = $request->order_status;
        //DB::enableQueryLog();
        $list_data = DB::table('table_transaction')
            ->leftJoin('table_products', 'table_transaction.product_id', '=', 'table_products.product_id')
            ->where('table_transaction.user_id', '=', $user_id)
            ->where('table_transaction.order_status', '=', $order_status)
            ->select('table_products.*', 'table_transaction.*')
            ->get();
        
            // $query = DB::getQueryLog();
            // $query = end($query);
            // print_r($query);die();

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

    public function detail_activity(Request $request)
    {
        $trans_id = $request->transaction_id;
        //DB::enableQueryLog();
        $list_item = DB::table('table_transaction')
            ->join('table_products', 'table_products.product_id', '=', 'table_transaction.product_id')
            ->join('table_order_detail', 'table_order_detail.transaction_id', '=', 'table_transaction.transaction_id')
            ->where('table_transaction.transaction_id', '=', $trans_id)
            ->select('table_products.product_name', 'table_transaction.*', 'table_order_detail.*')
            ->get();

        $data['pesanan'] = [];
        $estimation = 0;
        $discount = 0;
        $payment_method = 1;
        foreach($list_item as $item)
        {
            $d['product_name'] = $item->product_name;
            $d['product_price'] = $item->total;
            $estimation = $estimation + (int)$item->total;
            $discount = (int)$item->discount;
            $payment_method = $item->payment_method;
            $data['pesanan'][] = $d;
        }

        $data['estimation'] = $estimation;
        $data['discount'] = $discount;
        $data['total_pay'] = $estimation - $discount;
        $data['payment_method'] = $payment_method;

        return response()->json([
            "code"=>"200", 
            "status"=>true,
            'message' => 'success',
            "data" => $data
        ]);
    }
}
