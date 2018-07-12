@extends('home.common.common')

@section('content')
<article>
  <div class="bloglist">
      <h2>
        <p><span>时间轴</span>列表</p>
      </h2>
      @foreach($sjz as $k => $v)
      <div class="blogs"> 
      <div id="sjz"><p class="zt">{{$v['title']}}</p></div>
        <div class="dateview">{{$v['time']}}</div>
      </div>
      @endforeach
    </div> 
</article>
<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/slider.js"></script>

@endsection