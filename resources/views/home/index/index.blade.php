@extends('home.common.common')

@section('content') 
<article>
    <div id="banner_tabs" class="flexslider">
  <ul class="slides">
    @foreach($data as $k => $v)
    <li>
      <a title="" target="_blank" href="#">
        <img src="{{$v['address']}}" style=" width:720px height:300px no-repeat center;" src="images/alpha.png" >
      </a>  
    </li>

    @endforeach
  </ul>
  <ul class="flex-direction-nav">
    <li><a class="flex-prev" href="javascript:;">Previous</a></li>
    <li><a class="flex-next" href="javascript:;">Next</a></li>
  </ul>
  <ol id="bannerCtrl" class="flex-control-nav flex-control-paging">
  @foreach($data as $k => $v)
    <li><a>{{$k}}</a></li>
  @endforeach
  </ol>
</div>
    <div class="bloglist">
      <h2>
        <p><span>推荐</span>文章</p>
      </h2>
      <div class="blogs">
        <h3><a href="/">犯错了怎么办？</a></h3>
        <figure><img src="/homemoban/images/01.jpg" ></figure>
        <ul>
          <p>看到昔日好友发了一篇日志《咎由自取》他说他是一个悲观者，感觉社会抛弃了他，脾气、性格在6年的时间里变化很大，很难适应这个社会。人生其实就是不断犯错的过程，在这个过程中不断的犯错，不断的吸取教训，不断的成长。也许日子里的惊涛骇浪，不过是人生中的水花摇晃，别用显微镜放大你的悲伤。</p>
          <a href="/" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：杨青</span><span>分类：【<a href="/">日记</a>】</span><span>浏览（<a href="/">459</a>）</span><span>评论（<a href="/">30</a>）</span></p>
        <div class="dateview">2014-04-08</div>
      </div>
      <div class="blogs">
        <h3><a href="/">个人博客模板（2014草根寻梦）</a></h3>
        <figure><img src="/homemoban/images/02.jpg" ></figure>
        <ul>
          <p>2014第一版《草根寻梦》个人博客模板简单、优雅、稳重、大气、低调。专为年轻有志向却又低调的草根站长设计。模板采用html5+css3设计，nav导航实现鼠标悬停渐变显示英文标题的效果。banner部分，选择大图作为背景，利用css3中animation属性结合文字图片实现文字从左到右的渐变效果</p>
          <a href="/" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：杨青</span><span>分类：【<a href="/">个人博客模板</a>】</span><span>浏览（<a href="/">459</a>）</span><span>评论（<a href="/">30</a>）</span></p>
        <div class="dateview">2014-02-19</div>
      </div>
      <div class="blogs">
        <h3><a href="/">我的个人博客之——阿里云空间选择</a></h3>
        <figure><img src="/homemoban/images/03.png" ></figure>
        <ul>
          <p>之前服务器放在电信机房， 联通用户访问速度很不稳定，经常出现访问速度慢的问题，换到阿里云解决了之前的问题。很多人都问我的博客选得什么空间，一年的费用得多少钱，今天我列个表出来，供大家参考。</p>
          <a href="/" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：杨青</span><span>分类：【<a href="/">网站建设</a>】</span><span>浏览（<a href="/">459</a>）</span><span>评论（<a href="/">30</a>）</span></p>
        <div class="dateview">2014-01-18</div>
      </div>
      <div class="blogs">
        <h3><a href="/">从摄影作品中获取网页颜色搭配技巧</a></h3>
        <figure><img src="/homemoban/images/04.jpg" ></figure>
        <ul>
          <p>作为一个优秀、专业的网页设计师，首先要了解各种颜色的象征，以及不同类型网站常用的色彩搭配。色彩搭配看似复杂,但并不神秘。一般来说,网页的背景色应该柔和一些、素一些、淡一些,再配上深色的文字,使人看起来自然、舒畅。色彩是人的视觉最敏感的东西。主页的色彩处理得好，可以锦上添花，达到事半功倍的效果。</p>
          <a href="/" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：杨青</span><span>分类：【<a href="/">心得笔记</a>】</span><span>浏览（<a href="/">459</a>）</span><span>评论（<a href="/">30</a>）</span></p>
        <div class="dateview">2014-01-09</div>
      </div>
      <div class="blogs">
        <h3><a href="/">css3制作的一个魔方</a></h3>
        <figure><img src="/homemoban/images/04.png" ></figure>
        <ul>
          本应用由CSS3代码实现，无图片和flash，请使用Chrome等webkit内核浏览器或Firefox打开。破解攻略和大家分享下：首先，破解魔方，我们就要先了解它的结构，魔方共6色6面，每面又分为中央块（最中间的块6个）、角块（4角的块8个）和边块（4条边中间的块12个）...
          </p>
          <a href="/" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：杨青</span><span>分类：【<a href="/">css3</a>】</span><span>浏览（<a href="/">459</a>）</span><span>评论（<a href="/">30</a>）</span></p>
        <div class="dateview">2013-09-05</div>
      </div>
    </div>
  </article>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/slider.js"></script>
<script type="text/javascript">
$(function() {
  var bannerSlider = new Slider($('#banner_tabs'), {
    time: 5000,
    delay: 400,
    event: 'hover',
    auto: true,
    mode: 'fade',
    controller: $('#bannerCtrl'),
    activeControllerCls: 'active'
  });
  $('#banner_tabs .flex-prev').click(function() {
    bannerSlider.prev()
  });
  $('#banner_tabs .flex-next').click(function() {
    bannerSlider.next()
  });
})
</script>
  @endsection