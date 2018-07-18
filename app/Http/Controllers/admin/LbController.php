<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class LbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //
        $data = DB::table('carousel as c')
              ->get();
              //dump($data);
        return view('admin/lb/index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        //
        return view('admin/lb/create');
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
            'carousel_name' => 'required',
            'url' => 'required',
          ],[
            'carousel_name.required' => '图片名必填',
            'url.required' => 'url地址必填',
          ]);
         $data = $request -> except('_token');

         //$data = $request -> all();
         if($request -> hasFile('avatar')){
          // 使用request 创建文件上传对象
            $profile = $request -> file('avatar');
            $ext = $profile->getClientOriginalExtension();
            //getClientOriginalExtension();
            // 处理文件名称
            $temp_name = str_random(20);
            $name =  $temp_name.'.'.$ext;
            $dirname = date('Ymd',time());
            $res = $profile -> move('./uploads/'.$dirname,$name);
            
       }
       $lujing = '/uploads/'.$dirname.'/'.$name;
       //dump($lujing);

        $res = DB::table('carousel')
                ->insert(['url'=>$data['url'],'carousel_name'=>$data['carousel_name'],'address'=>$lujing]);
        if($res){
            return redirect('/admin/lb/index')->with('success','添加成功');
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
        //
         $data = DB::table('carousel as d')
              -> where('d.id','=',$id)
              ->select('d.carousel_name','d.url','d.address','d.id')
              ->first();
                 
        return view('admin/lb/edit',['data'=>$data]);
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
        if($request -> hasFile('avatar')){
          // 使用request 创建文件上传对象
            $profile = $request -> file('avatar');
            $ext = $profile->getClientOriginalExtension();
            //getClientOriginalExtension();
            // 处理文件名称
            $temp_name = str_random(20);
            $name =  $temp_name.'.'.$ext;
            $dirname = date('Ymd',time());
            $res = $profile -> move('./uploads/'.$dirname,$name);   
            $lujing = '/uploads/'.$dirname.'/'.$name;        
       }else{
              $data2 = DB::table('carousel as d')
              -> where('d.id','=',$id)
              ->select('d.address')
              ->first();
              $lujing = $data2['address']; 

           }
       
       //dump($lujing);

        DB::beginTransaction();
        $res = DB::table('carousel')->where('id','=',$id)->update(['carousel_name'=>$data['carousel_name'],'url'=>$data['url'],'address'=>$lujing]);
        if($res){
            DB::commit();
            return redirect('/admin/lb/index')->with('success','修改成功');
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
        $res = DB::table('carousel')->where('id','=',$id)->delete();
        if($res){
            DB::commit();
            return redirect('/admin/lb/index')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()-> with('error','删除失败');
        }
    }
}
