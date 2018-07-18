<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class GerenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request,$id)
    {
        
        $geren_data = DB::table('user')->where('id','=',$id)->first();
        return view('home.geren.index',['geren_data'=>$geren_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postUploads(Request $request)
    {
        $profile = $request -> file('avatar');
        $ext = $profile->getClientOriginalExtension();
        $temp_name = str_random(20);
        $name =  $temp_name.'.'.$ext;
        $dirname = date('Ymd',time());
        $res = $profile -> move('./uploads/'.$dirname,$name);
        $avatar = ('/uploads/'.$dirname.'/'.$name);
        $id = session('user_login')['id'];
        DB::table('user')
            ->where('id','=',$id)
            ->update(['avatar' => $avatar]);
        if($res){
            $arr = [
                  "code"=> 0,
                  "msg"=>"上传成功",
                  "data"=>[
                    "src"=>$avatar
                  ]
                ];
        }else{
            $arr = [
                  "code"=>1,
                  "msg"=>"上传失败",
                  "data"=>[
                    "src"=>''
                  ]
                ];
        }
        echo json_encode($arr);
    }

    public function postUpdate(Request $request, $id)
    {
        $data = $request->except(['_token']);
        $res = DB::table('user')
            ->where('id','=',$id)
            ->update([
                'uname' => $data['uname'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'qq' => $data['qq'],
                'sex' => $data['sex']
                ]);
        if($res){
            return redirect('/home/geren/index/'.$id)->with('success','修改成功');
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
    public function destroy($id)
    {
        //
    }
}
