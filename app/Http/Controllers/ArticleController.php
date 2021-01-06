<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableArticles;
use DB;
use App\Models\TableProducts;



class ArticleController extends Controller
{
    public function list_article(Request $request)
    {
        $stand_id = $request->stand_id;
        $list_data = TableArticles::get();
        return response()->json([
            "code"=>"200", 
            "status"=>true,
            'message' => 'success',
            "data" => $list_data
        ]);
    }

    public function detail_article(Request $request)
    {
        
    }
}
