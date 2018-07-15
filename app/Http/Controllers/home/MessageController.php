<?php

namespace App\Http\Controllers\home;

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
    public function Index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        //
        $message = DB::table('message as m')
            -> join('user as u','m.uid','=','u.id')
            -> select('m.content','m.created_at','u.uname','u.avatar')
            ->orderBy('m.id','desc')
            ->paginate(10);
        // dump($message);

        return view('home.message.index',['message'=>$message]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(Request $request)
    {
        //
        $data = session('user_login')['id'];
        $message = $request -> except(['_token']);
        $message['created_at'] = date('Y-m-d H:i:s',time());
        $res = DB::table('message')
            ->insert(['content'=>$message['content'],
                'uid'=>$data,
                'created_at'=>$message['created_at']]);
        // dump($message);
        if($res){
            return redirect('/home/message/create') -> with('success','留言成功');
        }else{
            return back() -> with('error','留言失败');
        }

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
    public function destroy($id)
    {
        //
    }
}
