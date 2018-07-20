<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ScController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $sc_data = DB::table('shouchang as s')
            -> join('user as u','s.uid','=','u.id')
            -> join('article as a','s.cid','=','a.id')
            -> select('u.uname','a.title','s.id','s.times')
            -> orderBy('id','desc')
            -> paginate(15);
            $sc_data->setPath('index');
        $num=$sc_data->lastPage();
        $nextpage=$num-$sc_data->currentPage() ==0 ? $num : $sc_data->currentPage()+1 ; 
        $lastpage=$sc_data->currentPage()-1 <0 ? 1 : $sc_data->currentPage()-1 ; 
        $sc_data->next=$nextpage;
        $sc_data->last=$lastpage;
        return view('admin.sc.index',['sc_data'=>$sc_data]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy($id)
    {
        $res = DB::table('shouchang')->where('uid', '=', $id)->delete();
        if($res){
            return redirect('/admin/sc/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败'); 
        }
    }
}
