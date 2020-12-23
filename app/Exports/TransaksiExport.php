<?php

namespace App\Exports;

use App\Transaksi;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class TransaksiExport implements FromView
{
    

    protected $dari;
    protected $sampai;
    protected $status;


    function __construct($dari, $sampai, $status) {
	   $this->dari = $dari;
	   $this->sampai = $sampai;
	   $this->status = $status;
	}

    public function view(): View
    {
     	$sampai = $this->sampai;
        $dari = $this->dari;
        $status = $this->status;

        $tgl = date('Y-m-d', strtotime('+1 days', strtotime($sampai)));

    	if(!empty($status))
    	{
    		$transaksi_prepaid = DB::table('tbl_prepaid_txn')
            ->select('order_id', 'user_id', 'order_dtm', 'payment_dtm', 'txn_name', 'txn_type', 'cust_no', 'vendor_amount', 'tot_bill_amount', 'coupon_amount', 'profit', 'status')
            ->whereBetween('order_dtm', [$dari, $tgl])
            ->where('status', $status)
            ->get();

        	$transaksi_postpaid = DB::table('tbl_postpaid_txn')
             ->select('order_id', 'user_id', 'order_dtm', 'payment_dtm', 'txn_name', 'txn_type', 'cust_no', 'tot_bill_amount_vendor as vendor_amount', 'tot_bill_amount', 'coupon_amount', 'profit', 'status')
            ->whereBetween('order_dtm', [$dari, $tgl])
            ->where('status', $status)
            ->get();
    	}
    	else
    	{
	    	$transaksi_prepaid = DB::table('tbl_prepaid_txn')
	            ->select('order_id', 'user_id', 'order_dtm', 'payment_dtm', 'txn_name', 'txn_type', 'cust_no', 'vendor_amount', 'tot_bill_amount', 'coupon_amount', 'profit', 'status')
	            ->whereBetween('order_dtm', [$dari, $tgl])
	            ->get();

	        $transaksi_postpaid = DB::table('tbl_postpaid_txn')
	             ->select('order_id', 'user_id', 'order_dtm', 'payment_dtm', 'txn_name', 'txn_type', 'cust_no', 'tot_bill_amount_vendor as vendor_amount', 'tot_bill_amount', 'coupon_amount', 'profit', 'status')
	            ->whereBetween('order_dtm', [$dari, $tgl])
	            ->get();

    	}

    	

        $transaksi = $transaksi_prepaid->merge($transaksi_postpaid);
 
        return view('transaction.transaksi_excel', ['transaksi'=>$transaksi]);
    }
}

