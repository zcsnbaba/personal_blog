<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class PlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        $value = $request->session()->all();
          $uid = session('user_login')['id'];

        $search = $request -> input('search','');
        //paginate 分页 get();
        $pl = DB::table('comment as c')
              -> where('c.content','like','%'.$search.'%')
              ->join('article as a','a.id','=','c.pid')
              ->select('a.title','c.*')
              ->paginate(20);
        $pl->setPath(' ');
        $num=$pl->lastPage();
        $nextpage=$num-$pl->currentPage() ==0 ? $num : $pl->currentPage()+1 ; 
        $lastpage=$pl->currentPage()-1 <0 ? 1 : $pl->currentPage()-1 ; 
        $pl->next=$nextpage;
        $pl->last=$lastpage;
        return view('admin/pl/index',['pl'=>$pl,'search'=>$search]);       
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
        $pl = DB::table('comment as c')
              -> where('c.id','=',$id)
              ->select('c.content','c.id')
              ->first();   
        return view('/admin/pl/edit',['pl'=>$pl]);
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
        //dump($data);
        DB::beginTransaction();
        $res = DB::table('comment')->where('id','=',$id)->update(['content'=>$data['content']]);
        if($res){
            DB::commit();
            return redirect('/admin/pl/index')->with('success','修改成功');
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
                $res = DB::table('comment')->where('id','=',$id)->delete();
                if($res){
                    DB::commit();
                    return redirect('/admin/pl/index')->with('success','删除成功');
                }else{
                    DB::rollBack();
                    return back()-> with('error','删除失败');
                }
    }
}
