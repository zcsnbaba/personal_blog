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

    public function getTpcreate()
    {
        $data = DB::table('photo-cate')-> get(); 
        return view('admin/xc/tpcreate',['data'=>$data]);
    }

     public function postTpstore(Request $request)
    {
        $data = $request -> except('_token');
       //  dump($data);

       //  if($request -> hasFile('avatar')){
       //    // 使用request 创建文件上传对象
       //      $profile = $request -> file('avatar');
       //      $ext = $profile->getClientOriginalExtension();
       //      //getClientOriginalExtension();
       //      // 处理文件名称
       //      $temp_name = str_random(20);
       //      $name =  $temp_name.'.'.$ext;
       //      $dirname = date('Ymd',time());
       //      $res = $profile -> move('./photos/'.$dirname,$name);
            
       // }

       $profile = $request -> file('avatar');
        foreach ($profile as $key => $value) {
            $hz = $value -> getClientOriginalExtension();
            // 处理文件名称
            $temp_name = str_random(20);
            $name =  $temp_name.'.'.$hz;
            $dirname = date('Ymd',time());
            $res = $value -> move('./photos/'.$dirname,$name);
            $lujing = '/photos/'.$dirname.'/'.$name;
            $res = DB::table('photo')
                ->insert(['cid'=>$data['cid'],'photo'=>$lujing]);
        }

        if($res){
            return redirect('/admin/xc/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败'); 
        }


    }

    public function postTpjd(Request $request,$id)
    {
        $data = $request -> except('_token');

         // $data = DB::table('photo as p')
         //      -> where('p.id','=',$id)
         //      ->select('p.photo','p.id','p.cid')
         //      ->first();
         //  dump($data);
         //  exit;
         $a = DB::table('photo-cate as pc')
             -> where('pc.id','=',$data['cid'])
             ->select('name')
             ->first();

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
              $data2 = DB::table('photo as p')
              -> where('p.id','=',$id)
              ->select('p.photo')
              ->first();
              $lujing = $data2['photo']; 

           }


        $res = DB::table('photo')
                ->where('id','=',$id)
                ->update(['cid'=>$data['cid'],'photo'=>$lujing]);


        if($res){
            return redirect('/admin/xc/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败'); 
        }

    }
     public function getTpedit($id)
    {
        // ->join('photo-cate as pc','p.cname','=','pc.name')
        //       ->select('p.photo','pc.name','p.id')
        $data = DB::table('photo as p')
              -> where('p.id','=',$id)
              ->select('p.photo','p.id','p.cid')
              ->first();
        $data2 = DB::table('photo-cate')->get();

        return view('admin/xc/tpedit',['data'=>$data,'data2'=>$data2]);

    }

    public function getTpdestroy( Request $request,$id)
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

    public function getShow(Request $request ,$id)
    {
        

 

       $data = DB::table('photo as p')
              ->where('cid','=',$id)
              ->join('photo-cate as pc','p.cid','=','pc.id')
              ->select('p.photo','pc.name','p.id')
              ->paginate(10); 
        return view('admin/xc/show',['data'=>$data]);
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
        $res = DB::table('photo-cate')->where('id','=',$id)->delete();
        if($res){
            DB::commit();
            return redirect('/admin/xc/index')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()-> with('error','删除失败');
        }
    }
}
