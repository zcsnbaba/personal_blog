<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>{{ $common['web']['0']['name'] }}</title>
<meta name="keywords" content="{{ $common['web']['0']['gjz'] }}" />
<meta name="description" content="{{ $common['web']['0']['describe'] }}" />
<link href="/homemoban/css/base.css" rel="stylesheet">
<link href="/homemoban/css/index.css" rel="stylesheet">
<link href="/homemoban/css/media.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
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
    <div class="avatar"><a href="about.html"><span>关于杨青</span></a></div>
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
        <li><a href="/">{{ $v['title'] }}</a></li>
      @endforeach
      </ul>
      <h2>
        <p class="tj_t2">推荐文章</p>
      </h2>
      <ul>
      @foreach($common['wenzhang2'] as $k => $v)
        <li><a href="/">{{ $v['title'] }}</a></li>
      @endforeach
      </ul>
    </div>
    <div class="links">
      <h2>
        <p>友情链接</p>
      </h2>
      <ul>
      @foreach($common['link'] as $k => $v)
        <b><i><li><a href="{{ $v['link_url'] }}">{{ $v['link_name'] }}</a></li></i></b>
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