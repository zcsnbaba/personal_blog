<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class DhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        //
         //获取搜索关键字
        $search = $request -> input('search','');
        //paginate 分页 get();
        $data = DB::table('daohang as d')
              -> where('name','like','%'.$search.'%')
              ->select('d.id','d.name','d.url')
              ->paginate(20);
        return view('admin/dh/index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        //
        return view('admin/dh/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'url' => 'required',
          ],[
            'name.required' => '导航名必填',
            'url.required' => 'url地址必填',
          ]);
        DB::beginTransaction();
        //接收 提交的数据
        $data = $request -> only('name','url');
        $res = DB::table('daohang')->insert(['name'=>$data['name'],'url'=>$data['url']]);
        if($res){
            DB::commit();
            return redirect('/admin/dh')->with('success','添加成功');
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
         $data = DB::table('daohang as d')
              -> where('d.id','=',$id)
              ->select('d.name','d.url','d.id')
              ->first();   
        return view('/admin/dh/edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request,$id)
    {
        
        $data = $request -> except(['_token']);
        //dump($data);
        DB::beginTransaction();
        $res = DB::table('daohang')->where('id','=',$id)->update(['name'=>$data['name'],'url'=>$data['url']]);
        if($res){
            DB::commit();
            return redirect('/admin/dh/index')->with('success','修改成功');
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
                $res = DB::table('daohang')->where('id','=',$id)->delete();
                if($res){
                    DB::commit();
                    return redirect('/admin/dh/index')->with('success','删除成功');
                }else{
                    DB::rollBack();
                    return back()-> with('error','删除失败');
                }
    }
}

