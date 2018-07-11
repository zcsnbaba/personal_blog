@extends('home.common.common')

@section('content') 
  <article>
    <div class="banner">
      <ul class="texts">
        <p>The best life is use of willing attitude, a happy-go-lucky life. </p>
        <p>最好的生活是用心甘情愿的态度，过随遇而安的生活。</p>
      </ul>
    </div>
    <div class="bloglist">
      <h2>
        <p><span>推荐</span>文章</p>
      </h2>
      @foreach($wz_data as $k => $v)
      <div class="blogs">
        <h3><a href="/">{{ $v['title'] }}</a></h3>
        <figure><img src="{{ $v['file'] }}" style="height:110px"></figure>
        <ul>
          <p>{{ $v['desc'] }}</p>
          <a href="/" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：{{ $v['uname'] }}</span><span>分类：【<a href="/">日记</a>】</span><span>浏览（{{ $v['ckick_count'] }}）</span><span>评论（<a href="/">1</a>）</span></p>
        <div class="dateview">{{ $v['created_at'] }}</div>
      </div>
      @endforeach
    </div>
  </article>
  @endsection