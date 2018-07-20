@extends('home.common.common')

@section('content') 
<style type="text/css">
    .xiaoshi{
        display: none;
    }
</style>
<script type="text/javascript" src="/homemoban/login/ajax3.0-min.js"></script>
<script type="text/javascript" src="/homemoban/login/jquery-1.8.3.min.js"></script>
<article>
    <div id="banner_tabs" class="flexslider">
  <ul class="slides">
    @foreach($data as $k => $v)
    <li>
      <a title="" target="_blank" href="{{$v['url']}}">
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
      @foreach($wz_data as $k => $v)
      <div class="blogs">
        <h3><a href="/">&nbsp;&nbsp;{{ $v['title'] }}</a></h3>
        <figure><img src="{{ $v['file'] }}" style="height:110px"></figure>
        <ul>
          <p>{{ $v['desc'] }}</p>
          <input type="hidden" class="ycy" value="{{ $v['id'] }}"> 
          <a href="/home/article/index/{{ $v['id'] }}" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：{{ $v['uname'] }}</span><span>分类：【日记】</span>浏览(<span>{{ $v['ckick_count'] }}</span>)&nbsp;&nbsp; 评论(<span>{{ $nima[$k] }}</span>)
        
         @if(session('user_login'))
         <input disabled type="hidden" class="ycy" value="{{ $v['id'] }}">
          <span style="float:right" class="scs" id="q{{ $v['id'] }}"><label for="sc" class="ss">收藏 </label><img src="/homemoban/images/6264.png" id="sc"></span>
          @foreach($sc_data as $key => $val)
            
           @if($val['cid'] == $v['id'])

              <span style="float:right" disabled class="sb"><label for="sc" class="ss">以收藏 </label><img src="/homemoban/images/6264.png" id="sc"></span>
           <script type="text/javascript">
            var id = {{ $v['id'] }}
            $('#q'+id+'').addClass('xiaoshi')
          </script>
           @endif
          @endforeach
         @else
         <span style="float:right" class="sbdl"><label for="sc" class="ss">收藏 </label><img src="/homemoban/images/6264.png" id="sc"></span>
          @endif
         </p>

        <div class="dateview">{{ $v['created_at'] }}</div>
      </div>
      @endforeach
      <script>
        $('.readmore').click(function(){
          var ss = $(this).parent().next().children().eq(2).text();
          var nums = parseInt(ss)+1;
          console.log(nums);
          var id = $(this).prev().val();
          $(this).parent().next().children().eq(2).text(nums);
          Ajax('HTML',true).get('/home/article/show/'+nums+'/'+id,function(msg){
          });
        })
        $('.sbdl').click(function(){
          layui.use(['layer', 'form'], function(){
            var layer = layui.layer
            ,form = layui.form;
            layer.msg("请登录",{icon: 5});
          });
        });
        $('.sb').click(function(){
          layui.use(['layer', 'form'], function(){
            var layer = layui.layer
            ,form = layui.form;
            layer.msg("以收藏",{icon: 5});
          });
        });
        $('.scs').click(function(){
          $(this).css('display','none');
          var id = parseInt($(this).prev().val());
          layui.use(['layer', 'form'], function(){
            var layer = layui.layer
            ,form = layui.form;
            layer.msg("收藏成功",{icon: 6});
          });
          Ajax('HTML',true).get('/home/sc/show/'+id,function(msg){
          });
        });

      </script>
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