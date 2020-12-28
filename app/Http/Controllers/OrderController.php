<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Order;
use App\Models\TableProducts;
use Yajra\DataTables\Datatables;

class OrderController extends Controller
{
    public function create_order(Request $request)
    {
        $input = $request->all();

        $json_list_order= $input['order_detail'];
        $list_order = $json_list_order;

        $total_transaction = 0;
        foreach ($list_order as $item)
        {
            $product_id = $item['product_id'];
            $product = TableProducts::where('product_id', $product_id)->first();

            $total_transaction = $total_transaction + $item['qty'] * ($product->product_price - $product->product_discount);
        }

        $tran = new Transaction;
        $tran->user_id = $input['user_id'];
        $tran->stand_id_active = $input['stand_id_active'];
        $tran->product_id = $product_id;
        $tran->customer_name = $input['customer_name'];
        $tran->table_number = $input['table_number'];
        $tran->total_transaction = $total_transaction;
        $tran->discount = $product->product_discount;
        $tran->order_notes = $input['order_notes'];
        $tran->payment_method = $input['payment_method'];
        $tran->order_time = date("Y-m-d H:i:s");
        $tran->order_status = $input['order_status'];
        $res_tran = $tran->save();

        $tran_id = $tran->id;
        $data['transaction_id'] = $tran_id;

        foreach ($list_order as $item)
        {
            $product_id = $item['product_id'];
            $product = TableProducts::where('product_id', $product_id)->first();

            $order = new Order;
            $order->transaction_id = $tran_id;
            $order->product_id =  $product_id;
            $order->product_name = $product->product_name;
            $order->qty = $item['qty'];
            $order->harga = $product->product_price;
            $order->discount = $product->product_discount;
            $order->total = $item['qty'] * ($product->product_price - $product->product_discount);
            $response = $order->save();
        }
        
        if($response)
    	{
    		return response()->json(["code"=>"200", "status"=>true, "message"=> 'Transaction Success', "data" => $data]);
    	}
    	else
    	{
    		return response()->json(["code"=>"400", "status"=>false, "message"=> 'Transaction Failed']);
    	}
    }
}
