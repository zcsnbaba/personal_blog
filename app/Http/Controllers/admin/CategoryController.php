<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\admin\CegoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {   
        $cate = DB::table('category') -> paginate(5);
        return view('admin.category.index',['cate' => $cate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {   

        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(CegoryRequest $request)
    {
        $cate = $request -> only('name_class');
        $res = DB::table('category') -> insert(['name_class' => $cate['name_class']]);
        if($res){
            return redirect('/admin/category/index') -> with('success','添加成功');
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
        $cate = DB::table('category') -> where('id','=',$id) -> select() -> first();
        return view('admin.category.edit',['cate' => $cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(CegoryRequest $request, $id)
    {
        $cate = $request -> only('id','name_class');
        $res = DB::table('category') -> where('id','=',$id) -> update(['name_class' => $cate['name_class']]);
        if($res){
            return redirect('/admin/category/index') -> with('success','修改成功');
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
        $res = DB::table('category') -> where('id','=',$id) -> delete();
        if($res){
            return redirect('/admin/category/index') -> with('success','修改成功');
        }else{
            return back() -> with('error','修改失败');
        }
    }
}
