<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {   
        // 操作数据库
        $cate = DB::table('category') -> paginate(5);
        // dump($cate);

        // 显示数据 分配到模板
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
    public function postStore(Request $request)
    {
        // 获取值
        $cate = $request -> only('name_class');
        // dump($cate);
        // 执行添加
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
        // 获取要修改的值 显示到模板中
        $cate = DB::table('category') -> where('id','=',$id) -> select() -> first();
         dump($cate);
        return view('admin.category.edit',['cate' => $cate]);
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
        // 获取文本值
        // dump($request);
        $cate = $request -> only('id','name_class');
        // dump($cate);
        // 执行修改
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
