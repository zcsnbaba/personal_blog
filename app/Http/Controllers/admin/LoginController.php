<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('admin.login.index');
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
    public function postStore(Request $request)
    {
        $login_data = $request->except(['_token']);
        $res = DB::table('user')
            ->where('uname','=',$login_data['uname'])
            ->where('password','=',$login_data['password'])
            ->first();
        if($res){
            session(['user_login'=>$res]);
            return redirect('/')->with('success','登录成功');
        }else{
            return back()->with('error','用户名或密码错误!!'); 
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
    public function getEdit()
    {
        return view('admin.login.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request)
    {
        $login_data = $request->except(['_token']);
        $data_uname = DB::table('user')
            ->where('uname','=',$login_data['uname'])
            ->first();
        if($data_uname){
            return back()->with('error','用户名已存在'); 
        }
        $dirname = date('Y-m-d H.i.s',time());
        $res = DB::table('user')->insert([
            'uname' => $login_data['uname'],
            'email' => $login_data['email'],
            'password' => $login_data['password'],
            'phone' => $login_data['phone'],
            'superuser' => '游客',
            'created_at' =>$dirname,]
        );
        if($res){
            return redirect('/')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败'); 
        }
        dd($login_data);    
        
        
        
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
