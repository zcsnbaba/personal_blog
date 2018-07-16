@extends('home.common.common')

@section('content') 
<script type="text/javascript" src="/pl/ajax3.0-min.js"></script>
<link href="/homemoban/css/about.css" rel="stylesheet">
 <article>
    <h3 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="1/">所有文章</a></h3>
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
  <div id="container">
        <div id="Comment">
            <div class="CommentTop"></div>
            <div class="CHeader">
                <div class="CPersonal">

                </div>
                <form  method="post" action="/home/article/store">
                {{ csrf_field() }}
                <div class="CContent">
                    <textarea name="content" class="Ccontents" placeholder="来说两句吧..."></textarea>
                </div>
                  
                    <input type="submit" class="Csubmit"  onselectstart="return false" pid="0" aid="0" value="发布评论" name="submit">
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
                   
                        <div class="CPortrait">
                          <a href="http://3.com" class="CPLink" target="_blank"><img src="" pid="14" class="PortImg"></a>
                        </div>
                      <div class="ContMsg">
                          <div class="UserInfo">
                              <span class="MsgTime"></span>
                              <span class="UserAdd" style="color:#f0c"></span>
                          </div>
                        <div class="CommentInfo"></div>
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
                <br><hr><br>
              
                </div>
            </div>
            </div>
            
        </div>
  </article>
  
  <script type="text/javascript">

    var form = document.forms[0];
    // form.onsubmit = function(){
    //   var content = form.content.value;
    //      $.ajax({
    //        type:"POST",
    //        url:"{{url('home/article/store')}}",
    //        data:{'content':content}
    //        dataType:'json',
    //        function(msg){
    //           if(msg != 'error'){
    //       // 创建元素并且赋值
    //           var tr = table.insertRow(); //创建tr对象
    //           tr.insertCell(0).innerHTML = msg;
    //           tr.insertCell(1).innerHTML = uid;
    //           tr.insertCell(2).innerHTML = name;
    //           tr.insertCell(3).innerHTML = content;
    //           tr.insertCell(4).innerHTML = '<a href="javascript:;" >删除</a>';
    //         }else{
    //           alert('添加失败');
    //         }
    //      });

    //   return false;
    // }

      form.onsubmit = function(){
      // 获取用户数据
      var content = form.content.value;
      // 发送ajax  
      Ajax('HTML',true).post('/home/article/store',{'content':content},function(msg){
        if(msg != 'error'){
          // 创建元素并且赋值
          var tr = table.insertRow(); //创建tr对象
          tr.insertCell(0).innerHTML = msg; //id
          tr.insertCell(1).innerHTML = username;
          tr.insertCell(2).innerHTML = email;
          tr.insertCell(3).innerHTML = phone;
          tr.insertCell(4).innerHTML = '<a href="javascript:;" >删除</a>';
        }else{
          alert('添加失败');
        }
      });
      
      return false;
    }


  </script>
@endsection