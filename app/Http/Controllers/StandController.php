<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\Datatables;
use App\Stand;
use App\StandActive;
use App\Tenant;
use App\Open;
use File;
use App\PhotoStand;

class StandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.stand_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $stand = new Stand;
        $stand->number_stand = $input['stand_number'];
        $stand->category = $input['category'];
        $stand->save();

        return $stand;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['active'] = StandActive::where('stan_id_active', $id)->get()->first();
        $response['hour'] = Open::where('stand_id_active', $id)->get()->first();
        $tenant_id = $response['active']->tenant_id;
        $response['tenancy'] = date('Y-m-d', strtotime($response['active']->tenant_date));
        $response['tenant'] = DB::table('table_tenant')->where('tenant_id', $tenant_id)->get()->first();
        $response['foto'] = DB::table('table_photo_stand')->where('stand_id_active', $id)->get()->first();




        return $response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $response = DB::table('table_stand_active')->where('stan_id_active', $id)
            ->update([
                "number_stan" => $input['stand_number_edit'],
                "tenant_date" => $input['tenancy_edit'],
                "status_active" => $input['status_aktif_edit'],
                "stan_category" => $input['stand_type_edit']

            ]);

        
            DB::table('table_open_hours_stand')->where('stand_id_active', $id)
                ->update([
                    "open_time" => $input['open_edit'],
                    "close_time" => $input['close_edit']
                ]);

            


            $unik = uniqid();

            if($request->hasFile('foto_stand'))
            {
                
                $cek = DB::table('table_photo_stand')->where('stand_id_active', $id)->get()->first();
                $foto_lama = $cek->photo_stand;
                if(!empty($foto_lama))
                {
                    File::delete('./images/stand/'.$foto_lama);
                }

                $input['foto_stand'] = $unik.'.png';
                $request->foto_stand->move(public_path('/images/stand'), $input['foto_stand']);

                DB::table('table_photo_stand')->where('stand_id_active', $id)
                                ->update([
                                    "photo_stand" => $input['foto_stand']
                                ]);

            }


            
        


        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $foto = PhotoStand::where('stand_id_active', $id)->first();
        if(!empty($foto))
        {
            File::delete('./images/stand/'.$foto);
        }

        $response = StandActive::where('stan_id_active', $id)->delete();
        return $response;
    }


    public function apiStandlist()
    {
        $standlist = DB::table('table_stand_active')
            ->join('table_tenant', 'table_stand_active.tenant_id', '=', 'table_tenant.tenant_id')
            ->select('table_stand_active.*', 'table_tenant.name_profile', 'table_tenant.phone')
            ->get();
        return Datatables::of($standlist)
            ->addColumn('status_active', function($standlist){
                if($standlist->status_active == 1)
                {
                    return 'active';
                }
                else
                {
                    return 'non active';
                }

            })
            ->addColumn('action', function($standlist){
                return '<center>
                 <a id="btn_edit" onclick="editForm('.$standlist->stan_id_active.')" class="btn btn-outline-warning waves-effect waves-light btn-sm"><i class="fa fa-edit"></i></a>'.
                 '<a style="margin-left:2px;" id="btn_reject" onclick="deleteForm('.$standlist->stan_id_active.')" class="btn btn-outline-primary waves-effect waves-light btn-sm"><i class="fa fa-trash"></i></a></center>';
        })->rawColumns(['status_active','created_at','user_id','first_name','status','action'])->make(true);
    }

    ///// API REGION //////
    public function list_stand()
    {
        $list_stand = Stand::get();
        return response()->json([
            "code"=>"200", 
            "status"=>true,
            'message' => 'success',
            "data" => $list_stand
        ]);
    }

    public function add_stand(Request $request)
    {
		$input = $request->all();

    	$stand = new Stand;
    	$stand->number_stand = $input['number_stand'];
    	$stand->category = $input['category'];
    	$response = $stand->save();

    	if($response)
    	{
    		return response()->json(["code"=>"200", "status"=>true, "message"=> 'Insert Stand Success']);
    	}
    	else
    	{
    		return response()->json(["code"=>"200", "status"=>false, "message"=> 'Insert Stand Failed']);
    	}

    }

    public function update_stand(Request $request)
    {
        $input = $request->all();

        $tenant = new Tenant;
        $tenant->phone = $input['phone'];
        $tenant->email = $input['email'];
        $tenant->name_profile = $input['name_profile'];
        $response = $tenant->save();

        $stand_active = new StandActive;
        $stand_active->stand_id = $input['stand_id'];
        $stand_active->number_stan = $input['number_stan'];
        $stand_active->tenant_date = $input['tenant_date'];
        $stand_active->status_active = $input['status_active'];
        $response = $stand_active->save();

        $stand_id_active = $response->stand_id_active;

        $photo_stand = $request->file('photo_stand');
        $dir_to = public_path().'/images/stand/';
        $photo_stand->move($dir_to, $stand_id_active . '_'.$photo_stand->getClientOriginalName());
        
        $photo_stand = new PhotoStand;
        $photo_stand->stand_id_active = $stand_id_active;
        $photo_stand->photo_stand = '/images/stand/'. $stand_id_active . '_'.$photo_stand->getClientOriginalName();
        $photo_stand->save();

        $json_list_open_hour = $input['list_open_hour'];
        $list_open_hour = json_decode($json_list_open_hour);

        foreach ($list_open_hour as $item)
        {
            $open_hours = new Open;
            $open_hours->stand_id_active = $stan_id_active;
            $open_hours->open_time = $item->open_time;
            $open_hours->close_time = $item->close_time;
            $response = $stand_active->save();
        }
        
        if($response)
    	{
    		return response()->json(["code"=>"200", "status"=>true, "message"=> 'Update Stand Success']);
    	}
    	else
    	{
    		return response()->json(["code"=>"200", "status"=>false, "message"=> 'Update Stand Failed']);
    	}
    }

    public function delete_stand($id)
    {
        $stand_active = StandActive::where('stand_id', $id)->first();
        $response = Tenant::where('tenant_id', $stand_active->tenant_id)->delete();
        
        $foto = PhotoStand::where('stand_id_active', $stand_active->stan_id_active)->first();
        if(!empty($foto))
        {
            File::delete('./images/stand/'.$foto);
        }
        $response = PhotoStand::where('stand_id_active', $stand_active->stan_id_active)->delete();
        $response = Open::where('stand_id_active', $stand_active->stan_id_active)->delete();
        $response = StandActive::where('stand_id', $id)->delete();
        $response = Stand::where('stan_id', $id)->delete();
    }
}
