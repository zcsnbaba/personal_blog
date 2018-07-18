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
    public function getIndex(Request $request)
    {
        $id = $request->input('id');
        $nums = $request->input('cai');
        $uid = session('user_login')['id'];
        DB::table('message')
            ->where('id','=',$id)
            ->update(['badreview' => $nums]);
        DB::table('caiji')->insert(
            ['uid' => $uid,'cid' => '1','mid' => $id]
        );
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
            -> select('m.*','u.uname','u.avatar')
            ->orderBy('m.id','desc')
            ->paginate(10);
        $uid = session('user_login')['id'];
        $caiji = DB::table('caiji')
            ->where('uid','=',$uid)
            ->get();
        return view('home.message.index',['message'=>$message,'caiji'=>$caiji]);
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
         dump($message);
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
    public function getShow(Request $request)
    {
        $id = $request->input('id');
        $nums = $request->input('bang');
        $uid = session('user_login')['id'];
        DB::table('message')
            ->where('id','=',$id)
            ->update(['praise' => $nums]);
        DB::table('caiji')->insert(
            ['uid' => $uid,'cid' => '2','mid' => $id]
        );
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
