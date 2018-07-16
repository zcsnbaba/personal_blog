<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class PlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function postStore(Request $request , $id)
    {
             //     $a = DB::table('photo-cate as pc')
             // -> where('pc.id','=',$data['cid'])
             // ->select('name')
             // ->first();

        $b = $request -> input('content');     
        $value = $request->session()->all();
        $a = $value['user_login']['id'];
        $time = date('Y-m-d H.i.s',time());
        $name = DB::table('user as u')->where('u.id','=',$a)->select('uname')->first();
        $res = DB::table('comment')
                ->insert(['uid'=>$a,'created_at'=>$time,'content'=>$b,'name'=>$name['uname']]);
        // if($res){
        //     return redirect('/home/article/index/$id')->with('success','修改成功');
        // }else{
        //     return back()->with('error','修改失败'); 
        //}

         if($res){
        //返回id
        echo $pdo -> lastInsertId(); //返回最后插入的id号
            }else{
                echo 'error';
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
