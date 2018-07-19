@extends('home.common.common')

@section('content')
<article>
<link rel="stylesheet" href="/homemoban/article/css/font-awesome.min.css">
<script type="text/javascript" src="/homemoban/login/ajax3.0-min.js"></script>
<script type="text/javascript" src="/homemoban/login/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" href="/homemoban/article/css/anlou/style.css">
<div class="bloglist">
<br><br><br><br>
      <form  method="get" action="/home/article/create" style="float:right">
       <div class="search d6">
        <input type="text" placeholder="搜索从这里开始..." name="name">
        <button type="submit"></button>
  </div>
    </form>
  <br><br><br>
      <h2>
        <p><span>全部</span>文章</p>
      </h2>
      @foreach($wz_data as $k => $v)
      <div class="blogs">
        <h3>&nbsp;&nbsp;{{ $v['title'] }}</h3>
        <figure><img src="{{ $v['file'] }}" style="height:110px"></figure>
        <ul>
          <p>{{ $v['desc'] }}</p>
          <input type="hidden" class="ycy" value="{{ $v['id'] }}"> 
          <a href="/home/article/index/{{ $v['id'] }}" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor">
          <span>作者：{{ $v['uname'] }}</span>
          <span>分类：【{{ $v['name_class'] }}】</span>浏览(<span>{{ $v['ckick_count'] }}</span>) &nbsp;&nbsp; 
          评论(<span>{{$nima[$k]}}</span>)
        </p>
        <div class="dateview">{{ $v['created_at'] }}</div>
      </div>
      @endforeach
      <script>
        $('.readmore').click(function(){
          var ss = $(this).parent().next().children().eq(2).text();
          var nums = parseInt(ss)+1;
          var id = $(this).prev().val();
          $(this).parent().next().children().eq(2).text(nums);
          Ajax('HTML',true).get('/home/article/show/'+nums+'/'+id,function(msg){
          });
        })
      </script>
    </div>
  @if ($wz_data->LastPage() > 1)
      <a href="{{ $wz_data->Url(1) }}&name={{ $wz_name}}" class="item{{ ($wz_data->CurrentPage() == 1) ? ' disabled' : '' }}">
          <i class="icon left arrow"></i> 
          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">首页</b>&nbsp;
      </a> 
      <a href="{{ $wz_data->Url($wz_data->last) }}&name={{ $wz_name}}" class="item{{ ($wz_data->CurrentPage() == 1) ? ' disabled' : '' }}">
          <i class="icon left arrow"></i> 
          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">上一页</b>
      </a>  
      @for ($i = 1; $i <= $wz_data->LastPage(); $i++)
      @if(($wz_data->last + 1) == $i)

          <a href="{{ $wz_data->Url($i) }}&name={{ $wz_name}}" class="item{{ ($wz_data->CurrentPage() == $i) ? ' active' : '' }}" name="nb" value="1"><b style="color:#ccc;font-size: 20px;border:4px #ccc dotted">&nbsp;{{ $i }}&nbsp;</b></a>
      @else
          <a href="{{ $wz_data->Url($i) }}&name={{ $wz_name}}" class="item{{ ($wz_data->CurrentPage() == $i) ? ' active' : '' }}" name="nb" value="1"><b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">&nbsp;{{ $i }}&nbsp;</b></a>
      @endif
      @endfor
    <a href="{{ $wz_data->Url($wz_data->next) }}&name={{ $wz_name}}" class="item{{ ($wz_data->CurrentPage() == 1) ? ' disabled' : '' }}">
          <i class="icon left arrow"></i> 
          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">下一页</b>&nbsp;
      </a>
      <a href="{{ $wz_data->Url($wz_data->LastPage()) }}&name={{ $wz_name}}" class="item{{ ($wz_data->CurrentPage() == $wz_data->LastPage()) ? ' disabled' : '' }}">
          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">尾页</b>
          <i class="icon right arrow"></i>
      </a>
  @endif
  </article>

@endsection