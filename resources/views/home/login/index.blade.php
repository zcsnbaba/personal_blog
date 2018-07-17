<!DOCTYPE html>
<html>
<head>
	<title>{{ $common['web']['0']['name'] }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link rel="stylesheet" href="/homemoban/login/css/style.css" type="text/css" media="all">
</head>
<body>
	<h1>登录</h1>
	<div class="container w3layouts agileits">
		<div class="login w3layouts agileits">
			<h2>登 录</h2>
			@if(session('error'))
				<div style="border:1px red solid;color:red;font-size: 25px;width:80%;height:30px" id="error" onclick="funs()">
					{{ session('error') }}
				</div>
			@endif
			<form action="/home/login/store" method="post">
			{{ csrf_field() }}
				<input type="text" name="uname" placeholder="用户名" required="">
				<input type="password" name="password" placeholder="密码" required="">
			
			<ul class="tick w3layouts agileits">
				<li>
					<input type="checkbox" id="brand1" value="1" name="jizhu">
					<label for="brand1"><span></span>记住我</label>
				</li>
			</ul>
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