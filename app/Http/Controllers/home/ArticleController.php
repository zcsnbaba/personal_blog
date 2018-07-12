<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex($id)
    {
        $article_data = DB::table('article as a')
            ->join('user as u','a.uid','=','u.id')
            ->where('a.id','=',$id)
            ->select('u.uname','a.*')
            ->first();
        return view('home.article.index',['article_data'=>$article_data]);
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
        $wz_data->setPath('create');
        $num=$wz_data->lastPage();
        $nextpage=$num-$wz_data->currentPage() ==0 ? $num : $wz_data->currentPage()+1 ; 
        $lastpage=$wz_data->currentPage()-1 <0 ? 1 : $wz_data->currentPage()-1 ; 
        $wz_data->next=$nextpage;
        $wz_data->last=$lastpage;
        return view('home.article.create',['wz_data'=>$wz_data,'wz_name'=>$wz_name]);
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
