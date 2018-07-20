@extends('home.common.common')

@section('content') 
<style type="text/css">
    .xiaoshi{
        display: none;
    }
</style>
<script type="text/javascript" src="/pl/ajax3.0-min.js"></script>
<link href="/homemoban/css/about.css" rel="stylesheet">
  <script type="text/javascript" src="/pl/jquery-1.8.3.min.js"></script>
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
      </ul>
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
                    <input type="submit" class="Csubmit"  onselectstart="return false" pid="0" aid="0" value="发布评论">
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
              </form>
              </div>
              <div class="CMain">
                <div class="CMTitle">
                    <div class="MTContent" >评论</div>
                    <div class="MTCount" id="plzs">
                        本页共计    
                        <span class="TCNumber">{{ count($comment) }}</span>条评论
                    </div>
                </div>
                <div class="CMLists">
                    <div class="MLTitle">
                        <i class="LTBg"></i>
                        最新评论
                    </div>
                    
                <div class="MLContents" id="father">
                <div class="LCSub">
                @foreach($comment as $k => $v)
                        <div class="CPortrait">
                          <img src="{{$v['photo']}}" pid="14" class="PortImg">
                        </div>
                      <div class="ContMsg">
                          <div class="UserInfo">
                              <span class="MsgTime">{{ $v['created_at'] }}</span>
                              <span class="UserAdd" style="color:#f0c">{{ $v['uname'] }}</span>
                          </div>
                        <div class="CommentInfo">{{ $v['content'] }}</div>
                            @if(session('user_login'))
                                <div class="CommentBtn" pid="180">
                                    <div id="q{{ $v['id'] }}">
                                        <div class="CBCai" >    
                                            <input type="hidden" class="ycy" value="{{ $v['id'] }}">                              
                                            <span class="CaiCount" name="zan">{{ $v['cai'] }}</span>
                                            <input type="text" class="iconCai" style="border:0px;cursor:pointer">
                                        </div>
                                        <div class="CBDing">
                                            <input type="hidden" class="ycy" value="{{ $v['id'] }}"> 
                                            <span class="dingCount">{{ $v['bang'] }}</span>
                                            <input type="text" class="iconDing" style="border:0px;cursor:pointer">
                                        </div>  
                                    </div> 
                                    @foreach($shuaige as $key => $val)
                                    @if($v['id'] == $val['mid'])
                                        @if($val['cid'] == 2)
                                        <div class="CBCai">    
                                            <input disabled type="hidden" class="ycy" value="{{ $v['id'] }}">                              
                                            <span disabled class="CaiCount" name="zan">{{ $v['cai'] }}</span>
                                            <input disabled type="text" class="iconCai" style="border:0px;cursor:pointer;background:#fff;background-image:url(/message/images/cai.png)">
                                        </div>
                                        <div class="CBDing">
                                            <input disabled type="hidden" class="ycy" value="{{ $v['id'] }}"> 
                                            <span disabled class="dingCount">{{ $v['bang'] }}</span>
                                            <input disabled type="text" class="iconDing" style="border:0px;cursor:pointer;background:#fff;background-image:url(/message/images/ding_active.png)">
                                        </div> 
                                        @else
                                        <div class="CBCai">    
                                            <input disabled type="hidden" class="ycy" value="{{ $v['id'] }}">                              
                                            <span disabled class="CaiCount" name="zan">{{ $v['cai'] }}</span>
                                            <input disabled type="text" class="iconCai" style="border:0px;cursor:pointer;background:#fff;background-image:url(/message/images/cai_active.png)">
                                        </div>
                                        <div class="CBDing">
                                            <input disabled type="hidden" class="ycy" value="{{ $v['id'] }}"> 
                                            <span disabled class="dingCount">{{ $v['bang'] }}</span>
                                            <input disabled type="text" class="iconDing" style="border:0px;cursor:pointer;background:#fff;background-image:url(/message/images/ding.png)">
                                        </div> 
                                        @endif
                                        <script type="text/javascript">
                                        var id = {{ $v['id'] }}
                                        $('#q'+id+'').addClass('xiaoshi');
                                    </script>
                                    @endif    
                                    @endforeach
                                </div>
                            @else
                            <div class="CommentBtn" pid="180">
                                    <div class="CBCai">                            
                                        <span class="CaiCount" name="zan">{{ $v['cai'] }}</span>
                                        <input type="text" class="isCai" style="border:0px;cursor:pointer">
                                    </div>
                                    <div class="CBDing">
                                        <span class="dingCount">{{ $v['bang'] }}</span>
                                        <input type="text" class="isDing" style="border:0px;cursor:pointer">
                                    </div>
                                </div>
                            @endif
                    </div>
                    <hr>
                @endforeach
              </div>
            </div>
            </div>
            
        </div>
        @if ($comment->LastPage() > 1)
      <a href="{{ $comment->Url(1) }}&id={{ $article_data['id']}}" class="item{{ ($comment->CurrentPage() == 1) ? ' disabled' : '' }}">
          <i class="icon left arrow"></i> 
          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">首页</b>&nbsp;
      </a> 
      <a href="{{ $comment->Url($comment->last) }}&id={{ $article_data['id']}}" class="item{{ ($comment->CurrentPage() == 1) ? ' disabled' : '' }}">
          <i class="icon left arrow"></i> 
          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">上一页</b>
      </a>  
      @for ($i = 1; $i <= $comment->LastPage(); $i++)
      @if(($comment->last + 1) == $i)

          <a href="{{ $comment->Url($i) }}&id={{ $article_data['id']}}" class="item{{ ($comment->CurrentPage() == $i) ? ' active' : '' }}" name="nb" value="1"><b style="color:#ccc;font-size: 20px;border:4px #ccc dotted">&nbsp;{{ $i }}&nbsp;</b></a>
      @else
          <a href="{{ $comment->Url($i) }}&id={{ $article_data['id']}}" class="item{{ ($comment->CurrentPage() == $i) ? ' active' : '' }}" name="nb" value="1"><b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">&nbsp;{{ $i }}&nbsp;</b></a>
      @endif
      @endfor
    <a href="{{ $comment->Url($comment->next) }}&id={{ $article_data['id']}}" class="item{{ ($comment->CurrentPage() == 1) ? ' disabled' : '' }}">
          <i class="icon left arrow"></i> 
          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">下一页</b>&nbsp;
      </a>
      <a href="{{ $comment->Url($comment->LastPage()) }}&id={{ $article_data['id']}}" class="item{{ ($comment->CurrentPage() == $comment->LastPage()) ? ' disabled' : '' }}">
          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">尾页</b>
          <i class="icon right arrow"></i>
      </a>
  @endif
  </article>

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
                       $("#father").prepend('<div class="LCSub"><div class="CPortrait"><img src="'+photo+'" pid="14" class="PortImg"></div><div class="ContMsg"><div class="UserInfo"><span class="MsgTime">'+data+'</span><span class="UserAdd" style="color:#f0c">'+name+'</span></div><div class="CommentInfo">'+content+'</div><div class="CommentBtn" pid="180"><div class="CBCai"><span class="CaiCount">0</span><i class="iconCai"></i></div><div class="CBDing"><span class="dingCount">0</span><i class="iconDing"></i></div></div></div></div>');
                    })

                      //console.log(count);
                      $(document).ready(function(){
                          $(".TCNumber").text(count);
                    })
                    layui.use(['layer', 'form'], function(){
                      var layer = layui.layer
                      ,form = layui.form;
                      
                      layer.msg("评论成功！",{icon: 6});
                    });
                          
            });
      
    
      
      return false;
    } 
  </script>
  <script type="text/javascript">
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
      Ajax('HTML',true).get('/home/article/update?cai='+nums+'&id='+id,function(msg){
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
      Ajax('HTML',true).get('/home/article/edit?bang='+nums+'&id='+id,function(msg){
      });
 })
  </script>
@endsection