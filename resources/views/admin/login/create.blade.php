<!DOCTYPE html>
<html>
<head>
	<title>{{ $common['web']['0']['name'] }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="text/javascript" src="/adminmoban/login/jquery-1.8.3.min.js"></script>
		<link rel="stylesheet" href="/adminmoban/login/css/style.css" type="text/css" media="all">
</head>
<body>
	<h1>注册</h1>
	<div class="container w3layouts agileits">
		<div class="login w3layouts agileits">
			<h2>注 册</h2>
			@if(session('success'))
				<div style="border:1px red solid;color:red;font-size: 25px;width:80%;height:30px" id="error" onclick="funs()">
					{{ session('success') }}
				</div>
			@endif
			<form action="/admin/login/update" method="post">
			{{ csrf_field() }}
				<input type="text" id="uname" name="uname" placeholder="用户名" required="" onblur="uname_check()">
				<span id="zc1" name="zc"></span>
				@if(session('error'))
					<span id="zc6" style="color:#d93a49;opacity:0.5">{{ session('error') }}</span>
				@endif
				<input type="text" id="email" placeholder="邮箱" name="email" required="" onblur="email_check()">
				<span name="zc" id="zc2"></span>
				<input type="password" id="passwords" placeholder="密码" required="" onblur="password_check()">
				<span id="zc3" name="zc"></span>
				<input type="password" id="password" placeholder="重复密码" name="password" required="" onblur="password_check()">
				<span name="zc" id="zc4"></span>
				<input type="text" id="phone" placeholder="手机号码" name="phone" required="" onblur="mobile_check()">
				<span name="zc" id="zc5"></span>
			<div class="send-buttone w3layouts agileits">
				<br>&nbsp;<br>
				<input type="submit" onclick="fun()" value="返回首页">&nbsp;
				<input type="submit" onclick="funs()" value="去登录">&nbsp;
				<input type="submit" value="免费注册">
				<script type="text/javascript">
					function fun(){
						location.replace('/');
					}		
					function funs(){
						location.replace('/admin/login/index');
					}	
				</script>
				<script type="text/javascript">
				     $('#passwords').click(function(){
				     	$("#zc3").html(" ");
				     });
				     $('#password').click(function(){
				     	$("#zc4").html(" ");
				     });
				     $('#email').click(function(){
				     	$("#zc2").html(" ");
				     });
				     $('#phone').click(function(){
				     	$("#zc5").html(" ");
				     });
				     $('#uname').click(function(){
				     	$("#zc1").html(" ");
				     	$("#zc6").html(" ");
				     });
 function uname_check() {
     var reg = /^.{2,8}$/; 
     if ($("#uname").val().search(reg) == -1) {
         $("#uname").next().html("请填写2-8位名称");
         $("#zc1").css("color","#d93a49");
         $("#zc1").css("opacity","0.5");
         /*alert("密码只能是6-9位数字");*/
         return false;
     } else {
         $("#uname").next().html("验证成功");
         $("#zc1").css("color","#1d953f");
         $("#zc1").css("opacity","0.5");
         return true;
     }
     return true;
 }	  	

 //邮箱验证
 function email_check() {
     var reg = /^\w+@\w+(\.\w+){1,2}$/; //因为邮箱 xxx @ xxx . xxx     xxx 可以是 数字字母下划线 结束 可以 是 .com 或者 .com.cn
     if ($("#email").val().search(reg) == -1) {
         $("#email").next().html("邮箱格式不正确");
         $("#zc2").css("color","#d93a49");
         $("#zc2").css("opacity","0.5");
         /*alert("密码只能是6-9位数字");*/
         return false;
     } else {
         $("#email").next().html("邮箱验证成功");
         $("#zc2").css("color","#1d953f");
         $("#zc2").css("opacity","0.5");
         return true;
     }
     return true;
 }						
 //密码验证  让其只能是 6位 纯数字的密码
 function password_check() {
     var reg = /^.{6,18}$/; //正则表达式 必须以数字开头和结尾  6-9位

     if ($("#passwords").val().search(reg) == -1) {
         $("#zc3").html("请填写6-18位密码");
         $("#zc3").css("color","#d93a49");
         $("#zc3").css("opacity","0.5");
         /*alert("密码只能是6-9位数字");*/
         return false;
     } else {
         $("#zc3").html("密码验证成功");
         $("#zc3").css("color","#1d953f");
         $("#zc3").css("opacity","0.5");
         /*  alert("验证成功");*/
         return true;
     }
     return true;
 }

 function password_check2() {
     var reg = /^.{6,18}$/;
     if ($("#password").val().search(reg) == -1) {
         $("#password").next().html("请填写6-18位密码");
         $("#zc4").css("color","#d93a49");
         $("#zc4").css("opacity","0.5");
         /*alert("密码只能是6-9位数字");*/
         return false;
     } else {
         if ($("#passwords").val() !== $("#password").val()) {
             $("#password").next().html("两次输入的密码不相同");
             $("#zc4").css("color","#d93a49");
         	 $("#zc4").css("opacity","0.5");
             return false;
         } else {
             $("#password").next().html("密码确认成功");
             $("#zc4").css("color","#1d953f");
         	 $("#zc4").css("opacity","0.5");
             return true;
         }
     }
     return true;
 }
 //手机验证
 function mobile_check() {
     var reg = /^(13|15|17|18)\d{9}$/; 
     if ($("#phone").val().search(reg) == -1) {
         $("#phone").next().html("手机格式不正确");
         $("#zc5").css("color","#d93a49");
         $("#zc5").css("opacity","0.5");
         return false;
     } else {
         $("#phone").next().html("手机验证成功");
         $("#zc5").css("color","#1d953f");
         $("#zc5").css("opacity","0.5");
         return true;
     }
     return true;
 }

 $("#passwords").blur(password_check);
 $("#password").blur(password_check2);
 $("#email").blur(email_check);
 $("#uname").blur(uname_check);
 $("#phone").blur(mobile_check);


 function tijiao() {
     /* alert( typeof (zhanghao_yz() && password_check() && password_check2() && email_check() && mobile_check() && web_check()));
      * 这里弹出 boolean 类型的值
      * */
     if ($("#account").val() == "" || $("#passwords").val() == "" || $("#name_shengao").val() == "" || $("#email").val() == "" || $("#phone").val() == "" || $("#uname").val() == "") {
         $("#reset").next().html("看看你是不是填完了");
         return false;
     }
     if (!(password_check() && password_check2() && email_check() && mobile_check() && web_check())) { //只要有其中一项 返回值是 false 就会 进入 这个 语句
         $("#reset").next().html("上面的验证都通过了吗？");
         return false;
     } else {
         $("#reset").next().html("好的 验证通过了。");
         return true;
     }
     return true;
 }
 $("#myform").submit(function() {
     return tijiao();
 });
				
				</script>
			</div>
			</form>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</body>
</html>