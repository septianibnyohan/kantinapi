<?php

namespace App\Exports;

use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class HistoryExport implements FromView
{
    

    protected $dari;
    protected $sampai;
    

    function __construct($dari, $sampai) {
	   $this->dari = $dari;
	   $this->sampai = $sampai;
	   
	}

    public function view(): View
    {
     	$sampai = $this->sampai;
        $dari = $this->dari;
        

        $tgl = date('Y-m-d', strtotime('+1 days', strtotime($sampai)));

    	$history_deposit = DB::table('tbl_deposit_txn')
        ->select('order_id', 'user_id', 'order_dtm as date', 'txn_name', 'tot_bill_amount as total')
        ->whereBetween('order_dtm', [$dari, $tgl])
        ->get();

        $history_prepaid = DB::table('tbl_prepaid_txn')
        ->select('order_id', 'user_id', 'order_dtm as date', 'txn_name', 'tot_bill_amount as total')
        ->whereBetween('order_dtm', [$dari, $tgl])
        ->get();

        $history_postpaid = DB::table('tbl_postpaid_txn')
        ->select('order_id', 'user_id', 'order_dtm as date', 'txn_name', 'tot_bill_amount as total')
        ->whereBetween('order_dtm', [$dari, $tgl])
        ->get();

        $history_upgrade = DB::table('tbl_upgrade_account_txn')
        ->select( 'order_id', 'user_id', 'cre_dtm as date', DB::raw("CONCAT('UPGRADE AGEN PREMIUM','') AS txn_name"), 'amount as total')
        ->whereBetween('cre_dtm', [$dari, $tgl])
        ->get();

        $history_transfer_out = DB::table('tbl_transfer_deposit_txn')
        ->select('order_id', 'o_user_id as user_id', 'cre_dtm as date', DB::raw("CONCAT('TRANSFER DEPOSIT (Out)','') AS txn_name"), 'amount as total')
        ->whereBetween('cre_dtm', [$dari, $tgl])
        ->get();

        $history_transfer_in = DB::table('tbl_transfer_deposit_txn')
        ->select('order_id', 'd_user_id as user_id', 'cre_dtm as date', DB::raw("CONCAT('TRANSFER DEPOSIT (In)','') AS txn_name"), 'amount as total')
        ->whereBetween('cre_dtm', [$dari, $tgl])
        ->get();


        $history_manual = DB::table('tbl_manual_deposit_txn')
        ->select('order_id', 'user_id', 'cre_dtm as date', DB::raw("CONCAT('Manual Top Up Deposit PAYFAZZ','') AS txn_name"), 'amount as total')
        ->whereBetween('cre_dtm', [$dari, $tgl])
        ->get();

        $merge_1 = $history_deposit->merge($history_prepaid);
        $merge_2 = $history_postpaid->merge($history_upgrade);
        $merge_3 = $history_transfer_out->merge($history_transfer_in);

        $merge_new1 = $merge_1->merge($merge_2);
        $merge_new2 = $merge_3->merge($history_manual);


        $history = $merge_new1->merge($merge_new2);
 
        return view('wallet.history_excel', ['wallet'=>$history]);
    }
}

