@extends('home.common.common')

@section('content') 
<link href="/homemoban/css/about.css" rel="stylesheet">
 <article>
    <h3 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="1/">所有文章</a></h3>
    <div class="about">
      <h2>{{ $article_data['title'] }}</h2>
      <ul>
         <li style="color:#f0f;font-size: 15px;"><i> 作者：{{ $article_data['uname'] }} &amp; 时间：{{ $article_data['created_at']}} &amp; 阅读：{{ $article_data['ckick_count'] }}</i></li>
      </ul>
      <ul class="slides">
        <li> 
            <img src="{{ $article_data['file'] }}" style=" width:300px;" src="images/alpha.png" >
        </li>
      </ul>
      <br>
      <hr>

      <ul>
      <br>
        {!! $article_data['content'] !!}
      </ul>
      <h2>About my blog</h2>
      <ul class="blog_a">
        <div class="bdsharebuttonbox bdshare-button-style1-32" data-bd-bind="1531300058720"><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
      </ul>
    </div>
  </article>
@endsection