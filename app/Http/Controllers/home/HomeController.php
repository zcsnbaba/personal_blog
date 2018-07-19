<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {

        $wz_data = DB::table('article as a')
            ->join('user as u','a.uid','=','u.id')
            ->where('is_recommend','=','1')
            ->select('u.uname','a.*')
            ->paginate(6);
        $data = DB::table('carousel as c')
           ->get();
        $nima = [];
        foreach ($wz_data as $key => $value) {
            $lz = DB::table('comment')
            ->where('pid','=',$value['id'])
            ->count(); 
            $nima[$key] = $lz;
        }   
        return view('home.index.index',['wz_data'=>$wz_data,'nima'=>$nima,'data'=>$data]);
    }
}
