<!DOCTYPE html>
<html>
<head>
	<title>{{ $common['web']['0']['name'] }}</title>
	
<link href="/layui/css/layui.css" rel="stylesheet">
<script type="text/javascript" src="/layui/layui.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link rel="stylesheet" href="/homemoban/login/css/style.css" type="text/css" media="all">
</head>
<body>
@if (count($errors) > 0)
<script type="text/javascript">
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
  
  @foreach ($errors->all() as $error)
    layer.msg("{{ $error }}",{icon: 5});
  @endforeach
  
});
</script>
@endif
@if(session('success'))
<script type="text/javascript">
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
  
  layer.msg("{{ session('success') }}",{icon: 6});
});
</script>
@endif
@if(session('error'))
<script type="text/javascript">

layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
  
  layer.msg("{{ session('error') }}",{icon: 5});
});
</script>
@endif
	<h1>登录</h1>
	<div class="container w3layouts agileits">
		<div class="login w3layouts agileits">
			<h2>登 录</h2>
			<form action="/home/login/store" method="post">
			{{ csrf_field() }}
				<input type="text" name="uname" placeholder="用户名" required="">
				<input type="password" name="password" placeholder="密码" required="">
    			<input placeholder="验证码" type="text" style="width:180px" class="tt-text" name="captcha">{!! captcha_img() !!}
			<ul class="tick w3layouts agileits">
				<li>
					<input type="checkbox" id="brand1" value="1" name="jizhu">
					<label for="brand1"><span></span>记住我</label>
				</li>
			</ul>
			<p style="clear:both"></p>
			<div class="send-button w3layouts agileits">
					<input type="submit" value="登 录"> &nbsp;
					<input type="submit" onclick="fun()" value="免费注册">
					<script type="text/javascript">
						function fun(){
							location.replace('/home/login/edit');
						}
						function funs(){
							var nb = document.getElementById('error')
							nb.style.display = 'none';
						}
					</script>
			</div>
			</form>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</body>
</html>