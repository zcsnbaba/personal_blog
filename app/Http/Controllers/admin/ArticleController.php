<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\admin\ArticleRequest;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //
        $article = DB::table('article as p')
            -> join('user as u','p.uid','=','u.id')
            -> join('category as a','p.cid','=','a.id')
            -> select('u.uname','a.name_class','p.*')
            -> paginate(15);
        $article->setPath('index');
        $num=$article->lastPage();
        $nextpage=$num-$article->currentPage() ==0 ? $num : $article->currentPage()+1 ; 
        $lastpage=$article->currentPage()-1 <0 ? 1 : $article->currentPage()-1 ; 
        $article->next=$nextpage;
        $article->last=$lastpage;
        return view('admin.article.index',['article' => $article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        $article = DB::table('category')->select('name_class','id')->get();
        return view('admin.article.create',['article'=>$article]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(ArticleRequest $request)
    {
        $data = $request->except(['_token']);
        $created_at = date('Y-m-d H.i.s',time());

        $profile = $request -> file('file');
        $ext = $profile->getClientOriginalExtension();
        $temp_name = str_random(20);
        $name =  $temp_name.'.'.$ext;
        $dirname = date('Ymd',time());
        $res = $profile -> move('./uploads/'.$dirname,$name);
        $file = ('/uploads/'.$dirname.'/'.$name);

       $res = DB::table('article')->insert([
            'title' => $data['title'], 
            'cid' => $data['cid'],
            'is_recommend' => $data['is_recommend'],
            'desc' => $data['desc'],
            'content' => $data['content'],
            'ckick_count' => '0',
            'created_at' => $created_at,
            'file' => $file,
        ]);
        if($res){
            return redirect('/admin/article/index')->with('success','添加成功');
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
        $article = DB::table('category')->select('name_class','id')->get();
        $article_data =  DB::table('article')->where('id','=',$id)->first();
        // dd($article_data['title']);

        return view('admin.article.edit',['article_data'=>$article_data,'article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(ArticleRequest $request, $id)
    {
        $data = $request->except(['_token']);
        $res1 = false;
        if($request -> hasFile('file')){
            $profile = $request -> file('file');
            $ext = $profile->getClientOriginalExtension();
            $temp_name = str_random(20);
            $name =  $temp_name.'.'.$ext;
            $dirname = date('Ymd',time());
            $res = $profile -> move('./uploads/'.$dirname,$name);
            $file = ('/uploads/'.$dirname.'/'.$name);
            $res1 = DB::table('article')
                ->where('id','=',$id)
                ->update(['file' => $file]);
        }

        $res2 = DB::table('article')
                ->where('id','=',$id)
                ->update(['title' => $data['title'],'cid' => $data['cid'],'is_recommend'=>$data['is_recommend'],'desc'=>$data['desc'],'content'=>$data['content']]);
        if($res2 || $res1){
            return redirect('/admin/article/index')->with('success','修改成功');
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
    public function getDestroy($id)
    {
        // echo $id;
        $res = DB::table('article')->where('id', '=', $id)->delete();
        if($res){
            return redirect('/admin/article/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败'); 
        }
    }
}
