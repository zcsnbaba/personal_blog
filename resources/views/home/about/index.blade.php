@extends('home.common.common')

@section('content')
<article>
    <h3 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="#">关于我</a></h3>
    <div class="about">
      <h2>Just about me</h2>
      <ul>
        {!! $about[0]['content'] !!}
      <h2>About my blog</h2>
    </div>
  </article>
@endsection