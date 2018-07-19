@extends('home.common.common')

@section('content')
<article>
<script type="text/javascript" src="/homemoban/login/jquery-1.8.3.min.js"></script>
<h3 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="#">个人中心</a></h3><br><br>
<form class="layui-form layui-form-pane" action="/home/geren/update/{{ $geren_data['id'] }}" method="post" style="margin:0px 0px 15px 120px;">
  <div class="layui-form-item layui-col-md9">
    <label for="test1"><img id="avatar" name="avatar" src="{{ $geren_data['avatar'] }}" style="border:1px red solid;width:100px;height:100px;border-radius:50%"></label>
      {{ csrf_field() }}
      <button type="button" class="layui-btn" id="test1" style="display:none">
        <i class="layui-icon">&#xe67c;</i>上传图片
      </button> 
   
  </div>
  <script>
layui.use('upload', function(){
  var upload = layui.upload;
  //执行实例
  var uploadInst = upload.render({
    elem: '#test1' //绑定元素
    ,url: '/home/geren/uploads' //上传接口
    ,data:{'_token':$('input[type=hidden]').val()}
    ,field:'avatar'
    ,done: function(res){
      //上传完毕回调
      if(res.code == 0){
        // layer.msg('上传成功', {icon: 6});
        $('#avatar').attr('src',res.data.src);
      }else{
        layer.msg('上传失败', {icon: 5});
      }
    }
  });
});
</script>
{{ csrf_field() }}
  <div class="layui-form-item layui-col-md9">
    <label class="layui-form-label">用户名：</label>
    <div class="layui-input-block">
       <input type="text" name="uname" required="" lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" data-form-un="1531818126138.489" value="{{ $geren_data['uname'] }}">
    </div>
  </div>
  <div class="layui-form-item layui-col-md9" pane>
    <label class="layui-form-label">性别：</label>
    <div class="layui-input-block">
      <input type="radio" name="sex" value="男" title="男" @if($geren_data['sex'] == '男') checked @endif>
      <input type="radio" name="sex" value="女" title="女" @if($geren_data['sex'] == '女') checked @endif>
    </div>
  </div>
  <div class="layui-form-item layui-col-md9">
    <label class="layui-form-label">手机号：</label>
    <div class="layui-input-block">
      <input type="text" name="phone" required  lay-verify="required" placeholder="请输入手机号码" autocomplete="off" class="layui-input" value="{{ $geren_data['phone'] }}">
    </div>
  </div>
  <div class="layui-form-item layui-col-md9">
    <label class="layui-form-label">QQ号：</label>
    <div class="layui-input-block">
      <input type="text" name="qq" required  lay-verify="required" placeholder="请输入QQ号码" autocomplete="off" class="layui-input" value="{{ $geren_data['qq'] }}">
    </div>
  </div>

  <div class="layui-form-item layui-col-md9">
    <label class="layui-form-label">邮箱：</label>
    <div class="layui-input-block">
      <input type="email" name="email" required  lay-verify="required" placeholder="请输入邮箱" autocomplete="off" class="layui-input" value="{{ $geren_data['email'] }}">
    </div>
  </div> 
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">提交并修改</button>
      <a href="/home/message/create" class="layui-btn layui-btn-primary">返回</a>
    </div>
  </div>
</form>
 
<script>
//Demo
layui.use('form', function(){
  var form = layui.form;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
    return true;
  });
});
</script>
</article>
@endsection