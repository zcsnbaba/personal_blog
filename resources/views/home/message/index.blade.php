@extends('home.common.common')

@section('content')
<style type="text/css">
    .xiaoshi{
        display: none;
    }
</style>
<link rel="stylesheet" href="/message/css/icomoon.css">
<link rel="stylesheet" href="/message/css/index_1.css">
<script type="text/javascript" src="/homemoban/login/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/homemoban/login/ajax3.0-min.js"></script>
<article>
<h3 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="#">给我留言</a></h3>
	<div id="container">
        <div id="Comment">
        @if(session('user_login'))
            <div class="CPortrait">
                <a href="/home/geren/index/{{ session('user_login')['id'] }}"><img src="{{ $sss }}" pid="14" class="PortImg"></a>
            </div>
            <br>
            &nbsp;<span style="color:red;font-size:20px"><b><a href="/home/geren/index/{{ session('user_login')['id'] }}">个人中心</a></b></span>
        @else
            <div class="CPortrait">
                <img src="{{ session('user_login')['avatar'] }}" pid="14" class="PortImg">
            </div>
            <br>
            &nbsp;<span style="color:#ccc;font-size:20px" disabled><b>个人中心</b></span>
        @endif 
            <div class="CommentTop"></div>
            <div class="CHeader">
                <div class="CPersonal">
                </div>
                <form action="/home/message/store" method="post" id="myform">
                {{ csrf_field() }}
                <div class="CContent">
                    <textarea name="content" class="Ccontents" placeholder="来说两句吧..."></textarea>
                </div>
                @if(session('user_login'))
                    <input type="submit" class="Csubmit"  onselectstart="return false" pid="0" aid="0" value="发布留言">
                    <script type="text/javascript">
                        $('#myform').submit(function(){
                            if($('.Ccontents').val()){
                                return true;
                            }else{
                                 layui.use(['layer', 'form'], function(){
                                      var layer = layui.layer
                                      ,form = layui.form;
                                      
                                      layer.msg("请输入留言内容",{icon: 5});
                                    });
                                return false;
                            }
                        })
                    </script>
                    </form>
                 @else
                 </form>
                    <input type="submit" class="Csubmit" pid="0" aid="0" value="登陆" onclick="denglu()">
                       <script type="text/javascript">
                            function denglu(){
                               location.replace('/home/login/index'); 
                            }
                        </script>
                 @endif   
            	</div>
            <div class="CMain">
                <div class="CMTitle">
                    <div class="MTContent">留言</div>
                    <div class="MTCount">
                        共计
                        <span class="TCNumber">{{ $message -> total() }}</span>条留言
                    </div>
                </div>
                <div class="CMLists">
                    <div class="MLTitle">
                        <i class="LTBg"></i>
                        最新留言
                    </div>
                    
                <div class="MLContents">
                    <div class="LCSub">
                    @foreach($message as $k => $v)
                        <div class="CPortrait">
                        	<img src="{{ $v['avatar'] }}" pid="14" class="PortImg">
                        </div>
                    	<div class="ContMsg">
                        	<div class="UserInfo">
    	                        <span class="MsgTime">{{ $v['created_at'] }}</span>
                            	<span class="UserAdd" style="color:#f0c">{{ $v['uname'] }}</span>
                        	</div>
                        <div class="CommentInfo">{{ $v['content'] }}</div>
                            @if(session('user_login'))
                                <div class="CommentBtn" pid="180">
                                    <div id='q{{ $v['id'] }}'>
                                        <div class="CBCai" >    
                                            <input type="hidden" class="ycy" value="{{ $v['id'] }}">                              
                                            <span class="CaiCount" name="zan">{{ $v['badreview'] }}</span>
                                            <input type="text" class="iconCai" style="border:0px;cursor:pointer">
                                        </div>
                                        <div class="CBDing">
                                            <input type="hidden" class="ycy" value="{{ $v['id'] }}"> 
                                            <span class="dingCount">{{ $v['praise'] }}</span>
                                            <input type="text" class="iconDing" style="border:0px;cursor:pointer">
                                        </div>  
                                    </div> 
                                    @foreach($caiji as $key => $val)
                                    @if($v['id'] == $val['mid'])
                                        @if($val['cid'] == 1)
                                        <div class="CBCai">    
                                            <input disabled type="hidden" class="ycy" value="{{ $v['id'] }}">                              
                                            <span disabled class="CaiCount" name="zan">{{ $v['badreview'] }}</span>
                                            <input disabled type="text" class="iconCai" style="border:0px;cursor:pointer;background:#fff;background-image:url(/message/images/cai_active.png)">
                                        </div>
                                        <div class="CBDing">
                                            <input disabled type="hidden" class="ycy" value="{{ $v['id'] }}"> 
                                            <span disabled class="dingCount">{{ $v['praise'] }}</span>
                                            <input disabled type="text" class="iconDing" style="border:0px;cursor:pointer;background:#fff;background-image:url(/message/images/ding.png)">
                                        </div> 
                                        @else
                                        <div class="CBCai">    
                                            <input disabled type="hidden" class="ycy" value="{{ $v['id'] }}">                              
                                            <span disabled class="CaiCount" name="zan">{{ $v['badreview'] }}</span>
                                            <input disabled type="text" class="iconCai" style="border:0px;cursor:pointer;background:#fff;background-image:url(/message/images/cai.png)">
                                        </div>
                                        <div class="CBDing">
                                            <input disabled type="hidden" class="ycy" value="{{ $v['id'] }}"> 
                                            <span disabled class="dingCount">{{ $v['praise'] }}</span>
                                            <input disabled type="text" class="iconDing" style="border:0px;cursor:pointer;background:#fff;background-image:url(/message/images/ding_active.png)">
                                        </div> 
                                        @endif
                                        <script type="text/javascript">
                                        var id = {{ $v['id'] }}
                                        $('#q'+id+'').addClass('xiaoshi')
                                    </script>
                                    @endif    
                                    @endforeach
                                </div>
                            @else
    		                    <div class="CommentBtn" pid="180">
                                    <div class="CBCai">                            
                                        <span class="CaiCount" name="zan">{{ $v['badreview'] }}!</span>
                                        <input type="text" class="isCai" style="border:0px;cursor:pointer">
                                    </div>
                                    <div class="CBDing">
                                        <span class="dingCount">{{ $v['praise'] }}</span>
                                        <input type="text" class="isDing" style="border:0px;cursor:pointer">
                                    </div>
                                </div>
                            @endif
                    </div>
                <br><hr><br>
                @endforeach
                <script type="text/javascript">
                    $('.isCai').click(function(){
                        alert('请先登录!');
                    }); 
                    $('.isDing').click(function(){
                        alert('请先登录!');
                    });    
                    $('.iconCai').click(function(){      
                        var n = $(this).prev().html();
                        var nums = parseInt(n)+1;
                        var id = $(this).prev().prev().val();
                        $(this).prev().html(nums);
                        $(this).attr('disabled','disabled'); 
                        $(this).css('background','#fff');
                        $(this).css('background-image','url(/message/images/cai_active.png)');
     
                        $(this).parent().next().find('input').css('background','#fff');
                        $(this).parent().next().find('input').attr('disabled','disabled');
                        $(this).parent().next().find('input').css('background-image','url(/message/images/ding.png)'); 
                        Ajax('HTML',true).get('/home/message/index?cai='+nums+'&id='+id,function(msg){
                        });
                    });

                   $('.iconDing').click(function(){
                        var n = $(this).prev().html();
                        var nums = parseInt(n)+1;
                        var id = $(this).prev().prev().val();
                        $(this).prev().html(nums);
                        $(this).attr('disabled','disabled');
                        $(this).css('background','#fff'); 
                        $(this).css('background-image','url(/message/images/ding_active.png)');   
                        $(this).parent().prev().find('input').css('background','#fff');
                        $(this).parent().prev().find('input').attr('disabled','disabled');
                        $(this).parent().prev().find('input').css('background-image','url(/message/images/cai.png)');
                        Ajax('HTML',true).get('/home/message/show?bang='+nums+'&id='+id,function(msg){
                        });
                   })
                </script>
                </div>
            </div>
            </div>
        
        </div>
        @if ($message->LastPage() > 1)
      <a href="{{ $message->Url(1) }}" class="item{{ ($message->CurrentPage() == 1) ? ' disabled' : '' }}">
          <i class="icon left arrow"></i> 
          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">首页</b>&nbsp;
      </a> 
      <a href="{{ $message->Url($message->last) }}" class="item{{ ($message->CurrentPage() == 1) ? ' disabled' : '' }}">
          <i class="icon left arrow"></i> 
          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">上一页</b>
      </a>  
      @for ($i = 1; $i <= $message->LastPage(); $i++)
      @if(($message->last + 1) == $i)

          <a href="{{ $message->Url($i) }}" class="item{{ ($message->CurrentPage() == $i) ? ' active' : '' }}" name="nb" value="1"><b style="color:#ccc;font-size: 20px;border:4px #ccc dotted">&nbsp;{{ $i }}&nbsp;</b></a>
      @else
          <a href="{{ $message->Url($i) }}" class="item{{ ($message->CurrentPage() == $i) ? ' active' : '' }}" name="nb" value="1"><b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">&nbsp;{{ $i }}&nbsp;</b></a>
      @endif
      @endfor
    <a href="{{ $message->Url($message->next) }}" class="item{{ ($message->CurrentPage() == 1) ? ' disabled' : '' }}">
          <i class="icon left arrow"></i> 
          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">下一页</b>&nbsp;
      </a>
      <a href="{{ $message->Url($message->LastPage()) }}" class="item{{ ($message->CurrentPage() == $message->LastPage()) ? ' disabled' : '' }}">
          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">尾页</b>
          <i class="icon right arrow"></i>
      </a>
  @endif
</article>
@endsection