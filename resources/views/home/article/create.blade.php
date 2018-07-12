@extends('home.common.common')

@section('content')
<article>
<div class="bloglist">
<br><br><br><br>
      <form  method="get" action="/home/article/create" style="float:right">
            <input type="text" class="usersearch ab" value="" name="name" id="smart_input" autocomplete="off" disableautocomplete="" style="width:350px;height:40px;border:2px #ccc outset;font-size: 20px">
            &nbsp;
            <input id="searchbtn" type="submit" class="ab usersure" style="width:80px;height:40px;color:#fff;background-color:#6a96e9;border:2px #4d7ed9 solid;font-weight: 900;font-size: 20px;border-radius:10%" value="搜 索">
    </form>
  <br><br><br>
      <h2>
        <p><span>全部</span>文章</p>
      </h2>
      @foreach($wz_data as $k => $v)
      <div class="blogs">
        <h3><a href="/">{{ $v['title'] }}</a></h3>
        <figure><img src="{{ $v['file'] }}" style="height:110px"></figure>
        <ul>
          <p>{{ $v['desc'] }}</p>
          <a href="/home/article/index/{{ $v['id'] }}" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：{{ $v['uname'] }}</span><span>分类：【<a href="/">{{ $v['name_class'] }}</a>】</span><span>浏览（{{ $v['ckick_count'] }}）</span><span>评论（<a href="/">1</a>）</span></p>
        <div class="dateview">{{ $v['created_at'] }}</div>
      </div>
      @endforeach
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