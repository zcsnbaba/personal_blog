@extends('home.common.common')

@section('content')
<link rel="stylesheet" href="/message/css/icomoon.css">
<link rel="stylesheet" href="/message/css/index_1.css">
<script type="text/javascript" src="/adminmoban/login/jquery-1.8.3.min.js"></script>
<article>

<h3 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="#">关于我</a></h3>
	<div id="container">
        <div id="Comment">
            <div class="CommentTop"></div>
            <div class="CHeader">
                <div class="CPersonal">

                </div>
                <form action="/home/message/store" method="post">
                {{ csrf_field() }}
                <div class="CContent">
                    <textarea name="content" class="Ccontents" placeholder="来说两句吧..."></textarea>
                </div>
                @if(session('user_login'))
                    <input type="submit" class="Csubmit"  onselectstart="return false" pid="0" aid="0" value="发布留言">
                 @else
                    <input type="submit" class="Csubmit"  onselectstart="return false" pid="0" aid="0" value="登陆" onclick="denglu()">
                   
                 @endif   
                 <script type="text/javascript">
                        function denglu(){
                            location.replace('/admin/login/edit');
                        }
                    </script>
            	
            	</form>
            	</div>
                        <div class="CMain">
                <div class="CMTitle">
                    <div class="MTContent">评论</div>
                    <div class="MTCount">
                        共计
                        <span class="TCNumber">34</span>条评论
                    </div>
                </div>
                <div class="CMLists">
                    <div class="MLTitle">
                        <i class="LTBg"></i>
                        最新评论
                    </div>
                    
                <div class="MLContents">
                    <div class="LCSub">
                    @foreach($message as $k => $v)
                        <div class="CPortrait">
                        	<a href="http://3.com" class="CPLink" target="_blank"><img src="{{ $v['avatar'] }}" pid="14" class="PortImg"></a>
                        </div>
                    	<div class="ContMsg">
                        	<div class="UserInfo">
    	                        <span class="MsgTime">{{ $v['created_at'] }}</span>
                            	<span class="UserAdd" style="color:#f0c">{{ $v['uname'] }}</span>
                        	</div>
                        <div class="CommentInfo">{{ $v['content'] }}</div>
		                    <div class="CommentBtn" pid="180">
			                    <div class="CBCai">                                    
			                    	<span class="CaiCount" name="zan">0</span>
			                    	<input type="text" class="iconCai" style="border:0px;cursor:pointer">
			                    </div>
    		                    <div class="CBDing">
    		                    	<span class="dingCount">0</span>
    		                    	<input type="text" class="iconDing" style="border:0px;cursor:pointer">
    		                    </div>
                    	</div>
                    </div>
                <br><hr><br>
                @endforeach
                <script type="text/javascript">     
                   $('.iconCai').click(function(){
                    
                    var n = $(this).prev().html();
                    var nums = parseInt(n)+1;
                    $(this).prev().html(nums);
                    $(this).attr('disabled','disabled'); 
                    $(this).css('background','#fff');
                    $(this).css('background-image','url(/message/images/cai_active.png)');
 
                    $(this).parent().next().find('input').css('background','#fff');
                    $(this).parent().next().find('input').attr('disabled','disabled');
                    $(this).parent().next().find('input').css('background-image','url(/message/images/ding.png)'); 
                   })

                   $('.iconDing').click(function(){
                    var n = $(this).prev().html();
                    var nums = parseInt(n)+1;
                    $(this).prev().html(nums);
                    $(this).attr('disabled','disabled');
                    $(this).css('background','#fff'); 
                    $(this).css('background-image','url(/message/images/ding_active.png)'); 

                    
                    $(this).parent().prev().find('input').css('background','#fff');
                    $(this).parent().prev().find('input').attr('disabled','disabled');
                    $(this).parent().prev().find('input').css('background-image','url(/message/images/ding.png)'); prev
                   })
                </script>
                </div>
            </div>
            </div>
        
        </div>
</article>
@endsection