<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>{{ $common['web']['0']['name'] }}</title>
<meta name="keywords" content="{{ $common['web']['0']['gjz'] }}" />
<meta name="description" content="{{ $common['web']['0']['describe'] }}" />
<link href="/homemoban/css/base.css" rel="stylesheet">
<link href="/homemoban/css/index.css" rel="stylesheet">
<link href="/homemoban/css/media.css" rel="stylesheet">
<link href="/homemoban/css/about.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
<style>
.flexslider {
  margin: 0px auto 20px;
  position: relative;
  width: 720px;
  height: 300px;
  overflow: hidden;
  zoom: 1;
}

.flexslider .slides img{
      width: 0px;
      height:0px;
    }


.flexslider .slides li {
  width: 100%;
  height: 100%;
} 



.flex-direction-nav a {
  width: 70px;
  height: 70px;
  line-height: 99em;
  overflow: hidden;
  margin: -35px 0 0;
  display: block;
  background: url(images/ad_ctr.png) no-repeat;
  position: absolute;
  top: 50%;
  z-index: 10;
  cursor: pointer;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: all .3s ease;
  border-radius: 35px;
}

.flex-direction-nav .flex-next {
  background-position: 0 -70px;
  right: 0;
}

.flex-direction-nav .flex-prev {
  left: 0;
}

.flexslider:hover .flex-next {
  opacity: 0.8;
  filter: alpha(opacity=25);
}

.flexslider:hover .flex-prev {
  opacity: 0.8;
  filter: alpha(opacity=25);
}

.flexslider:hover .flex-next:hover,
.flexslider:hover .flex-prev:hover {
  opacity: 1;
  filter: alpha(opacity=50);
}

.flex-control-nav {
  width: 100%;
  position: absolute;
  bottom: 10px;
  text-align: center;
}

.flex-control-nav li {
  margin: 0 2px;
  display: inline-block;
  zoom: 1;
  *display: inline;
}

.flex-control-paging li a {
  background: url(images/dot.png) no-repeat 0 -16px;
  display: block;
  height: 16px;
  overflow: hidden;
  text-indent: -99em;
  width: 16px;
  cursor: pointer;
}

.flex-control-paging li a.flex-active,
.flex-control-paging li.active a {
  background-position: 0 0;
}

.flexslider .slides a img {
  width: 100%;
  height: 382px;
  display: block;
}
.logo{position:absolute; z-index:20;}
..flexslider .slides img{position:absolute; z-index:10;}

#sjz{
      background: #333;
      text-align: center;
      line-height: 30px;
      border-radius: 15px;
      font-size:15px;
    }
@font-face{
    font-family: 'YaHei Consolas Hybrid';
    src : url('/YGYXSZITI2.0.TTF');
}
#sjz .zt{
    font-family: 'YaHei Consolas Hybrid';
    font-size: 16px;
}
 #sjz .zt{
   color:white;
}
#sjz .zt:hover { color:#ff95ca;}
#sjz:hover { color:white;}
#sjz:focus { color:black;}
</style>
</head>
<body>
<div class="ibody">
  <header>
    <h1>如影随形</h1>
    <h2>影子是一个会撒谎的精灵，它在虚空中流浪和等待被发现之间;在存在与不存在之间....</h2>
    <div class="logo"><a href="/"></a></div>
    <nav id="topnav">
      @foreach($common['daohang'] as $k => $v)
        <a href="{{ $v['url'] }}">{{ $v['name'] }}</a>
      @endforeach
    </nav>
  </header>
@section('content')


@show

  <aside>
    <div class="avatar"><a href="/home/about"><span>关于杨青</span></a></div>
    <div class="topspaceinfo">
      <h1>执子之手，与子偕老</h1>
      <p>于千万人之中，我遇见了我所遇见的人....</p>
    </div>
    <div class="about_c">
      <p>网名：ZcwdJss | 止步不前</p>
      <p>职业：金牌试睡员、姿势设计 </p>
      <p>籍贯：重庆市—梁平县</p>
      <p>电话：15736355417</p>
      <p>邮箱：2641801425@qq.com</p>
    </div>
    <div class="bdsharebuttonbox"><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
    <div class="tj_news">
      <h2>
        <p class="tj_t1">最新文章</p>
      </h2>
      <ul>
      @foreach($common['wenzhang'] as $k => $v)
        <li><a href="/home/article/index/{{ $v['id'] }}">{{ $v['title'] }}</a></li>
      @endforeach
      </ul>
      <h2>
        <p class="tj_t2">推荐文章</p>
      </h2>
      <ul>
      @foreach($common['wenzhang2'] as $k => $v)
        <li><a href="/home/article/index/{{ $v['id'] }}">{{ $v['title'] }}</a></li>
      @endforeach
      </ul>
    </div>
    <div class="links">
      <h2>
        <p>友情链接</p>
      </h2>
      <ul>
      @foreach($common['link'] as $k => $v)
        <b><i><li><a href="http://{{ $v['link_url'] }}">{{ $v['link_name'] }}</a></li></i></b>
      @endforeach
      </ul>
    </div>
    <div class="copyright">
      <ul>
        <b><p> nibaba by <a href="/">{{ $common['web']['0']['cright'] }}</a></p>
        <p>{{ $common['web']['0']['filing'] }}</p></b>
        </p>
      </ul>
    </div>
  </aside>
  <script src="/homemoban/js/silder.js"></script>
  <div class="clear"></div>
  <!-- 清除浮动 --> 
</div>
</body>
</html>