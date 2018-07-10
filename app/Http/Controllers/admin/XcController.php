<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class XcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $data = DB::table('photo-cate')-> get();
         
        return view('admin/xc/index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {

        return view('admin/xc/create');
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
          ],[
            'name.required' => '相册名称必填',
          ]);

         $data = $request -> except('_token');
 
         $res = DB::table('photo-cate')
                ->insert(['name'=>$data['name']]);
        if($res){
            return redirect('/admin/xc/index')->with('success','添加成功');
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


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        //
            
        $data = DB::table('photo-cate as p')
              ->where('id','=',$id)
              ->select('p.id','p.name')
              ->first();
        return view('admin/xc/edit',['data'=>$data]);
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
        $data = $request -> except(['_token']);
        DB::beginTransaction();
        $res = DB::table('photo-cate')->where('id','=',$id)->update(['name'=>$data['name']]);
        if($res){
            DB::commit();
            return redirect('/admin/xc/index')->with('success','修改成功');
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
        //
        DB::beginTransaction();
        $res = DB::table('photo')->where('id','=',$id)->delete();
        if($res){
            DB::commit();
            return redirect('/admin/xc/index')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()-> with('error','删除失败');
        }
    }
}
