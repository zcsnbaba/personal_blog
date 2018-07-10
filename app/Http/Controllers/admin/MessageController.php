<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        $username = $request->input('username');
        $message_data = DB::table('message as m')
            -> join('user as u','m.uid','=','u.id')
            -> where('u.uname','like','%'.$username.'%')
            -> select('u.uname','m.*')
            ->paginate(15);
        $ss = $message_data->setPath('index');
        $num=$message_data->lastPage();
        $nextpage=$num-$message_data->currentPage() ==0 ? $num : $message_data->currentPage()+1 ; 
        $lastpage=$message_data->currentPage()-1 <0 ? 1 : $message_data->currentPage()-1 ; 
        $message_data->next=$nextpage;
        $message_data->last=$lastpage;

        return view('admin.message.index',['message_data'=>$message_data]);
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
        $res = DB::table('message')->where('id', '=',$id)->delete();
        if($res){
            return redirect('/admin/message/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败'); 
        }
    }
}
