<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class SjzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $data = DB::table('sjz')->get();
        return view('admin/sjz/index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        //
        return view('admin/sjz/create');
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
         $this->validate($request,[
            'title' => 'required|between:0,60',
          ],[
            'title.required' => '导航名必填',
            'title.between' => '内容不能超过六十字',
          ]);
        DB::beginTransaction();
        //接收 提交的数据
        $data = $request -> only('title');

        $time = date('Y-m-d H.i.s',time());
        $res = DB::table('sjz')->insert(['title'=>$data['title'],'time'=>$time]);
        if($res){
            DB::commit();
            return redirect('/admin/sjz/index')->with('success','添加成功');
        }else{
            DB::rollBack();
            return back()->with('error','修改失败');
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
        $data = DB::table('sjz as s')
              -> where('s.id','=',$id)
              ->select('s.title','s.id')
              ->first();   
        return view('admin/sjz/edit',['data'=>$data]);
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
        $data = $request -> except(['_token']);
        DB::beginTransaction();
        $res = DB::table('sjz')->where('id','=',$id)->update(['title'=>$data['title']]);
        if($res){
            DB::commit();
            return redirect('/admin/sjz/index')->with('success','修改成功');
        }else{
            DB::rollBack();
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
        DB::beginTransaction();
        $res = DB::table('sjz')->where('id','=',$id)->delete();
        if($res){
            DB::commit();
            return redirect('/admin/sjz/index')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()-> with('error','删除失败');
        }
    }
}
