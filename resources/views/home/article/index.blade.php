@extends('home.common.common')

@section('content') 
<script type="text/javascript" src="/pl/ajax3.0-min.js"></script>
<link href="/homemoban/css/about.css" rel="stylesheet">
 <article>
    <h3 class="about_h">您现在的位置是：<a href="/">首页</a><a href="1/">所有文章</a></h3>
    <div class="about">
      <h2>{{ $article_data['title'] }}</h2>
      <ul>
         <li style="color:#f0f;font-size: 15px;"><i> 作者：{{ $article_data['uname'] }} &amp; 时间：{{ $article_data['created_at']}} &amp; 阅读：{{ $article_data['ckick_count'] }}</i></li>
      </ul>
      <ul class="slides">
        <li> 
            <img src="{{ $article_data['file'] }}" style=" width:300px;" src="images/alpha.png" >
        </li>
      </ul>
      <br>
      <hr>

      <ul>
      <br>
        {!! $article_data['content'] !!}
      </ul
      <h2>About my blog</h2>
      <ul class="blog_a">
        <div class="bdsharebuttonbox bdshare-button-style1-32" data-bd-bind="1531300058720"><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
      </ul>
    </div>
    
 
<link rel="stylesheet" href="/message/css/icomoon.css">
<link rel="stylesheet" href="/message/css/index_1.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
  <div id="container">
        <div id="Comment">
            <div class="CommentTop"></div>
            <div class="CHeader">
                <div class="CPersonal">

                </div>
                <form  method="get" id="myform" action="/home/article/store">
                
                <div class="CContent">
                    <textarea name="content" class="Ccontents" placeholder="来说两句吧..."></textarea>
                </div>
                  
                        @if(session('user_login'))
                    <input type="submit" class="Csubmit"  onselectstart="return false" pid="0" aid="0" value="发布留言">
                    <script type="text/javascript">
                        console.log();
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
              </form>
              </div>
              <div class="CMain">
                <div class="CMTitle">
                    <div class="MTContent" >评论</div>
                    <div class="MTCount" id="plzs">
                        共计    
                        <span class="TCNumber">{{ count($comment) }}</span>条留言
                    </div>
                </div>
                <div class="CMLists">
                    <div class="MLTitle">
                        <i class="LTBg"></i>
                        最新评论
                    </div>
                    
                <div class="MLContents" id="father">@foreach($comment as $k => $v)
                    <div class="LCSub">
                   
                        <div class="CPortrait">
                          <a href="http://3.com" class="CPLink" target="_blank"><img src="{{$v['photo']}}" pid="14" class="PortImg"></a>
                        </div>
                      <div class="ContMsg">
                          <div class="UserInfo">
                              <span class="MsgTime">{{ $v['created_at'] }}</span>
                              <span class="UserAdd" style="color:#f0c">{{ $v['name'] }}</span>
                          </div>
                        <div class="CommentInfo">{{ $v['content'] }}</div>
                        <div class="CommentBtn" pid="180">
                          <div class="CBCai">
                            <span class="CaiCount">0</span>
                            <i class="iconCai"></i>
                          </div>
                        <div class="CBDing">
                          <span class="dingCount">0</span>
                          <i class="iconDing"></i>
                        </div>
                      </div>
                    </div>
                <br><br><br>
              
                </div>@endforeach
            </div>
            </div>
            
        </div>
  </article>
  <script type="text/javascript" src="/pl/jquery-1.8.3.min.js"></script>
  <script type="text/javascript">
  // var id = $(this).prev().prev().val();
  // Ajax('HTML',true).get('/home/article/store?conten'+content+'&pid='+pid,function(msg){
  //          console.log(msg);  
  //     });
    var form = document.forms[0];
      form.onsubmit = function(){
            // 获取用户数据
            var content = form.content.value; 
            //console.log(content);
            // 发送ajax  ?id='+id
            Ajax('HTML',true).get('/home/article/store?content='+content+'&pid='+{{$article_data['id']}},function(msg){
                  console.log(msg);
                   arr=msg.split(',');
                    for(var i=0;i<arr.length;i++)
                    {
                      var content = arr[0];
                      var name = arr[1];
                      var data = arr[2];
                      var photo = arr[3];
                      var count = arr[4];
                    } 
                    $(document).ready(function(){
                       $("#father").prepend('<div class="LCSub"><div class="CPortrait"><a href="http://3.com" class="CPLink" target="_blank"><img src="'+photo+'" pid="14" class="PortImg"></a></div><div class="ContMsg"><div class="UserInfo"><span class="MsgTime">'+data+'</span><span class="UserAdd" style="color:#f0c">'+name+'</span></div><div class="CommentInfo">'+content+'</div><div class="CommentBtn" pid="180"><div class="CBCai"><span class="CaiCount">0</span><i class="iconCai"></i></div><div class="CBDing"><span class="dingCount">0</span><i class="iconDing"></i></div></div></div><br><br><br></div>');
                    })

                      //console.log(count);
                      $(document).ready(function(){
                          $(".TCNumber").text(count);
                    })
                          
            });
      
    
      
      return false;
    } 
  </script>
@endsection