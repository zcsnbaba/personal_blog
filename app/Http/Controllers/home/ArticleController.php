<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use PDO;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request,$id)
    {
        $uid = session('user_login')['id'];
        $shuaige = DB::table('shuaige')
            ->where('uid','=',$uid)
            ->get();
        $article_data = DB::table('article as a')
            ->join('user as u','a.uid','=','u.id')
            ->where('a.id','=',$id)
            ->select('u.uname','a.*')
            ->first();
        $comment = DB::table('comment as c') 
            -> where('c.pid','=',$id)
            -> join('user as u','c.uid','=','u.id')
            -> orderBy('c.id','desc')
            ->select('u.uname','c.*')
            ->paginate(10);
        $comment->setPath(' ');
        $num=$comment->lastPage();
        $nextpage=$num-$comment->currentPage() ==0 ? $num : $comment->currentPage()+1 ; 
        $lastpage=$comment->currentPage()-1 <0 ? 1 : $comment->currentPage()-1 ; 
        $comment->next=$nextpage;
        $comment->last=$lastpage;
        return view('home.article.index',['article_data'=>$article_data,'comment'=>$comment,'shuaige'=>$shuaige]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate(Request $request)
    {
        $wz_name = $request->input('name');
       $wz_data = DB::table('article as a')
            ->where('a.title','like','%'.$wz_name.'%')
            ->join('user as u','a.uid','=','u.id')
            ->join('category as c','c.id','=','a.cid')
            ->select('u.uname','c.name_class','a.*')
            ->paginate(15);
        $nima = [];
        foreach ($wz_data as $key => $value) {
            $lz = DB::table('comment')
            ->where('pid','=',$value['id'])
            ->count(); 
            $nima[$key] = $lz;
            
        }
        if($request->session()->has('user_login')){
            $uid = session('user_login')['id'];
            $sc_data = DB::table('shouchang')
                ->where('uid','=',$uid)
                ->get();
        }else{
            $sc_data['cid'] = '1';
        }
        $wz_data->setPath('create');
        $num=$wz_data->lastPage();
        $nextpage=$num-$wz_data->currentPage() ==0 ? $num : $wz_data->currentPage()+1 ; 
        $lastpage=$wz_data->currentPage()-1 <0 ? 1 : $wz_data->currentPage()-1 ; 
        $wz_data->next=$nextpage;
        $wz_data->last=$lastpage;
        return view('home.article.create',['wz_data'=>$wz_data,'wz_name'=>$wz_name,'nima'=>$nima,'sc_data'=>$sc_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//评论添加操作
  public function getStore(Request $request)
    {
        

         $content = $request -> input('content');   
         $pid = $request -> input('pid');
         $mrphoto = '/uploads/20180718/Bj6vCx9Ms2Na7EIS9mtI.jpg';
        
         // $value = $request->session()->all();
         //  $uid = session('user_login')['id'];
         $a = session('user_login')['id'];
         $time = date('Y-m-d H.i.s',time());
         $name = DB::table('user as u')->where('u.id','=',$a)->select('uname','avatar')->first();
         $n = $name['uname']; 
         $photo = $name['avatar'];
          if(isset($photo)){
             $photo = $name['avatar'];
          }else{
            $photo = $mrphoto;
          }

         $res = DB::table('comment')
                 ->insertGetId(['uid'=>$a,'created_at'=>$time,'content'=>$content,'name'=>$n,'pid'=>$pid,'photo'=>$photo]);
        
        $plc = DB::table('comment as c')->where('c.id','=',$res) -> select('content','name','created_at','photo')-> first();
        $plzs = DB::table('comment as c')->where('c.pid','=',$pid)->count();

        

        $plcontent = $plc['content'];
        $plname = ','.$plc['name'];
        $pltime = ','.$plc['created_at'];
        $plphoto = ','.$plc['photo'];
        $plcount = ','.$plzs;
        echo $plcontent;
        echo $plname;
        echo $pltime;
        echo $plphoto;
        echo $plcount; 
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow($dian,$id)
    {
        DB::table('article')
            ->where('id','=',$id)
            ->update(['ckick_count' => $dian]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit(Request $request)
    {
        $id = $request->input('id');
        $nums = $request->input('bang');
        $uid = session('user_login')['id'];
        DB::table('comment')
            ->where('id','=',$id)
            ->update(['bang' => $nums]);
        DB::table('shuaige')->insert(
            ['uid' => $uid,'cid' => '2','mid' => $id]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUpdate(Request $request)
    {
        $id = $request->input('id');
        $nums = $request->input('cai'); 
        $uid = session('user_login')['id'];
        DB::table('comment')
            ->where('id','=',$id)
            ->update(['cai' => $nums]);
        DB::table('shuaige')->insert(
            ['uid' => $uid,'cid' => '1','mid' => $id]
        );
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
