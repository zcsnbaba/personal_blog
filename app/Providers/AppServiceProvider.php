<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $daohang = DB::table('daohang')->get();
        $wenzhang = DB::table('article')->select('title','id')->orderBy('id','desc')->paginate(10);
        $wenzhang2 = DB::table('article')->where('is_recommend','=','1')->select('title','id')->paginate(10);
        $link = DB::table('blog_link')->get();
        $web = DB::table('blog_webs')->get();
        $common = ['daohang'=>$daohang,'wenzhang'=>$wenzhang,'wenzhang2'=>$wenzhang2,'link'=>$link,'web'=>$web];
         view()->share('common', $common);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
