<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use DB;
use App\Models\TableProducts;



class ProductController extends Controller
{
    public function list_product(Request $request)
    {
        $stand_id = $request->stand_id;
        $list_data = TableProducts::where('stand_id_active', $stand_id)->get();
        return response()->json([
            "code"=>"200", 
            "status"=>true,
            'message' => 'success',
            "data" => $list_data
        ]);
    }
}
