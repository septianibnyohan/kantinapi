<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserList;
use Yajra\DataTables\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.user_list');
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
        //
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
        $userlist = Userlist::where('user_id', $id)->first();
        return $userlist;
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

        $user = Userlist::where('user_id', $id)->update([
            "first_name" => $input['first_name'],
            "last_name" => $input['last_name'],
            "email" => $input['email'],
            "phone" => $input['phone'],
            "emoney" => $input['balance'],
            "status" => $input['status_aktif']
        ]);

        return $user;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userlist = Userlist::where('user_id', $id)->delete();
        return $userlist;
    }


    public function apiUserlist()
    {
        $userlist = Userlist::all();
        return Datatables::of($userlist)
            ->addColumn('created_at', function($userlist){
                return '<div style="text-align:center;">'.date('d-m-Y', strtotime($userlist->created_at)).'</div>';
            })
            ->addColumn('user_id', function($userlist){
                return '<div style="text-align:center;">'.$userlist->user_id.'</div>';
            })
            ->addColumn('status', function($userlist){
                if($userlist->status == 1)
                {
                    return 'Active';
                }
                else
                {
                    return 'Non Active';
                }
            })
            ->addColumn('first_name', function($userlist){
                return '<div>'.$userlist->first_name.' '.$userlist->last_name.'</div>';
            })
            ->addColumn('action', function($userlist){
                return '<center>
                 <a id="btn_edit" onclick="editForm('.$userlist->user_id.')" class="btn btn-outline-warning waves-effect waves-light btn-sm"><i class="fa fa-edit"></i></a>'.
                 '<a style="margin-left:2px;" id="btn_reject" onclick="deleteForm('.$userlist->user_id.')" class="btn btn-outline-primary waves-effect waves-light btn-sm"><i class="fa fa-trash"></i></a></center>';
        })->rawColumns(['created_at','user_id','first_name','status','action'])->make(true);
    }
}
