<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //
        $link = DB::table('blog_link')->get();
        // dump($link);
        return view('admin.link.index',['link'=>$link]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        //
        return view('admin.link.create');
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
        $data = $request->except(['_token']);
        // dump($data); 
         $url = '';  
        if($request -> hasFile('link_logo')){
        //使用request 创建文件上传对象
        $profile = $request -> file('link_logo');
        // dump($profile);
        $ext = $profile -> getClientOriginalExtension();
        //处理文件名称
        $temp_name = str_random(20);
        $name = $temp_name.'.'.$ext;
        $dirname = date('Ymd',time());
        $profile -> move('./uploads/'.$dirname,$name);
        $url = ('/uploads/'.$dirname.'/'.$name);
        // dump($url);
        }
       $res = DB::table('blog_link')
            ->insert(['link_name'=>$data['link_name'],'link_title'=>$data['link_title'],'link_url'=>$data['link_url'],'link_logo'=>$url]);
        if($res){
            return redirect('/admin/link/index') -> with('success','添加成功');
        }else{
            return back() -> with('error','添加失败');
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
        //
        $data = DB::table('blog_link')->where('id','=',$id)->first();
        // dump($data);
        return view('admin.link.edit',['data'=>$data]);
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
        //
        $data = $request->except(['_token']);
        // dump($data);
        $res1 = false;
        if($request -> hasFile('link_logo')){
        //使用request 创建文件上传对象
        $profile = $request -> file('link_logo');
        // dump($profile);
        $ext = $profile -> getClientOriginalExtension();
        //处理文件名称
        $temp_name = str_random(20);
        $name = $temp_name.'.'.$ext;
        $dirname = date('Ymd',time());
        $profile -> move('./uploads/'.$dirname,$name);
        $data['link_logo'] = ('/uploads/'.$dirname.'/'.$name);
        $res1 = DB::table('blog_link')
            ->where('id','=',$id)
            ->update(['link_logo'=>$data['link_logo']]);
        }
       $res = DB::table('blog_link')
            ->where('id','=',$id)
            ->update(['link_name'=>$data['link_name'],'link_title'=>$data['link_title'],'link_url'=>$data['link_url']]);
        if($res || $res1){
            return redirect('/admin/link/index') -> with('success','修改成功');
        }else{
            return back() -> with('error','修改失败');
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
        //
        $res = DB::table('blog_link')->where('id', '=', $id)->delete();
        if($res){
            return redirect('/admin/link/index') -> with('success','删除成功');
        }else{
            return back() -> with('error','删除失败');
        }
    }
}
