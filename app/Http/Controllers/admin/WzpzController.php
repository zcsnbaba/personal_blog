<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class WzpzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //
        $data = DB::table('blog_webs')
              ->get();
              // dump($data);
              // exit;

        return view('admin/wp/index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(Request $request)
    {
      
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
        $data = DB::table('blog_webs as d')
              -> where('d.id','=',$id)
              ->select('d.name','d.describe','d.logo','d.filing','d.telephone','d.url','d.cright','d.id')
              ->first(); 

        return view('admin/wp/edit',['data'=>$data]);
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
            if($request -> hasFile('logo')){
              // 使用request 创建文件上传对象
                $profile = $request -> file('logo');
                dump($profile);
                $ext = $profile->getClientOriginalExtension();
                // 处理文件名称
                $temp_name = str_random(20);
                $name =  $temp_name.'.'.$ext;
                $dirname = date('Ymd',time());
                //echo $dirname;
                $res = $profile -> move('./uploads/'.$dirname,$name);
                $lujing = '/uploads/'.$dirname.'/'.$name;
           }else{
              $data2 = DB::table('blog_webs as d')
              -> where('d.id','=',$id)
              ->select('d.logo')
              ->first();
              $lujing = $data2['logo']; 

           }
           DB::beginTransaction();
           $res = DB::table('blog_webs')->where('id','=',$id)->update(['name'=>$data['name'],'describe'=>$data['describe'],'logo'=>$lujing,'filing'=>$data['filing'],'telephone'=>$data['telephone'],'url'=>$data['url'],'cright'=>$data['cright']]);
           if($res){
            DB::commit();
            return redirect('/admin/wp/index')->with('success','修改成功');
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
        
    }
}
