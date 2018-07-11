<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UserRequest;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        $username = $request->input('username');
        $user_data = DB::table('user')->where('uname','like','%'.$username.'%')->paginate(15);
        $user_data->setPath('index');
        $num=$user_data->lastPage();
        $nextpage=$num-$user_data->currentPage() ==0 ? $num : $user_data->currentPage()+1 ; 
        $lastpage=$user_data->currentPage()-1 <0 ? 1 : $user_data->currentPage()-1 ; 
        $user_data->next=$nextpage;
        $user_data->last=$lastpage;
        return view('admin.user.index',['user_data'=>$user_data,'$username'=>$username]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(UserRequest $request)
    {
        $user_data = $request->all();
        if($user_data['sex'] == 1){
            $user_data['sex'] = '男';
        }else{
            $user_data['sex'] = '女';
        }
        if($user_data['superuser'] == 1){
            $user_data['superuser'] = '游客';
        }else{
            $user_data['superuser'] = '博主';
        }
        $user_data['created_at'] = date('Y-m-d H.i.s',time());
        $profile = $request -> file('avatar');
        $ext = $profile->getClientOriginalExtension();
        $temp_name = str_random(20);
        $name =  $temp_name.'.'.$ext;
        $dirname = date('Ymd',time());
        $res = $profile -> move('./uploads/'.$dirname,$name);
        $avatar = ('/uploads/'.$dirname.'/'.$name);
        $res = DB::table('user')->insert([
            ['uname' => $user_data['uname'],
            'password' => $user_data['password'],
            'sex' => $user_data['sex'],
            'phone' => $user_data['phone'],
            'superuser' => $user_data['superuser'],
            'qq' => $user_data['qq'],
            'email' => $user_data['email'],
            'created_at' => $user_data['created_at'],
            'avatar' => $avatar],
        ]);
        if($res){
            return redirect('/admin/user/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败'); 
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
    public function getEdit($id)
    {
        $user_data = DB::table('user')->where('id','=',$id)->first();
        return view('admin.user.edit',['user_data'=>$user_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request, $id)
    {
        $user_data = $request->all();
        if($user_data['sex'] == 1){
            $user_data['sex'] = '男';
        }else{
            $user_data['sex'] = '女';
        }
        if($user_data['superuser'] == 1){
            $user_data['superuser'] = '游客';
        }else{
            $user_data['superuser'] = '博主';
        }
        $res = false;
        if($request -> hasFile('avatar')){
            $profile = $request -> file('avatar');
            $ext = $profile->getClientOriginalExtension();
            $temp_name = str_random(20);
            $name =  $temp_name.'.'.$ext;
            $dirname = date('Ymd',time());
            $res = $profile -> move('./uploads/'.$dirname,$name);
            $user_data['avatar'] = ('/uploads/'.$dirname.'/'.$name);
            $res = DB::table('user')
                ->where('id','=',$id)
                ->update(['avatar' => $user_data['avatar']]);
        }
        $user_res = DB::table('user')
            ->where('id','=',$id)
            ->update(['uname' => $user_data['uname'],'sex' => $user_data['sex'],'phone' => $user_data['phone'],'superuser' => $user_data['superuser'],'qq' => $user_data['qq'],'email' => $user_data['email']]);
        if($user_res || $res){
            return redirect('/admin/user/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy($id)
    {
        $user_res = DB::table('user')->where('id', '=', $id)->delete();
        if($user_res){
            return redirect('/admin/user/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败'); 
        }
    }
}
