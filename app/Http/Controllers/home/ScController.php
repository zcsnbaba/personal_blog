<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ScController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        $uid = session('user_login')['id'];
        $wz_name = $request->input('name');
       $wz_data = DB::table('article as a')
            ->where('a.title','like','%'.$wz_name.'%')
            ->join('shouchang as s','s.cid','=','a.id')
            ->where('s.uid','=',$uid)
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow(Request $request,$id)
    {

        $uid = session('user_login')['id'];

        $time = date('Y-m-d H:i:s',time());

        DB::table('shouchang')->insert(
            ['uid' => $uid,'cid' => $id,'times' => $time]
        );
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
