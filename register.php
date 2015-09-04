<?php
	include 'header.inc';
?>
<?php
	if (isset($_POST["username"]))
	{
		include 'connect_database.inc';
		echo "<br />输入的密码：".$_POST['password'];
		echo "<br />md5值：".md5($_POST['password']);
		$password = "'".md5($_POST['password'])."'";
		$username = "'".$_POST['username']."'";
		$tel      = "'".$_POST['tel']."'";
		$email    = "'".$_POST['email']."'";
		$sex      = "'".$_POST['sex']."'";
		$sql = "insert into 12222_customer(Pwd, Nickname, Tel, Email, Sex) value($password, $username, $tel, $email, $sex)";
		$result = mysql_query($sql);
		if (!$result) 
		{
			die("Can't insert into table".mysql_error());
		}
		$_SESSION['username']    = $_POST['username'];
		$_SESSION['Customer_ID'] = mysql_insert_id();
		header("location:register.php");
	}
	if (isset($_SESSION['username'])) 
	{
		echo "<h2>恭喜你，注册成功！</h2>";
		exit();
	}
	
?>
	<div style="width:500px; height:300px; background-color:#ffff99">
		<h2>注册</h2>	
		<form action="" onsubmit="return validate_form(this)" method="post">
			<p>用户名：<input type="text" name="username"></p>
			<p>密&nbsp&nbsp码：<input type="password" name="password"></p>
			<p>手&nbsp&nbsp机：<input type="text" name="tel"</p>
			<p>邮&nbsp&nbsp箱：<input type="text" name="email"</p>
			<p>性&nbsp&nbsp别：<input type="radio" checked="checked" name="sex" value="1" />男
								<input type="radio" name="sex" value="0" />女
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
			<input type="submit" value="注册">
		</form>
	</div>


<script type="text/javascript">
	function validate_form(thisform)
	{
		if (thisform.username.value == null || thisform.username.value=="") 
		{
			alert("用户名不能为空！");
			return false;
		}
		else if (thisform.tel.value == null || thisform.tel.value=="") 
		{
			alert("手机号码不能为空！");
			return false;
		}
		else if (thisform.email.value == null || thisform.email.value=="") 
		{
			alert("邮箱不能为空！");
			return false;
		}
		return true;
	}
</script>
<?php
    include 'footer.inc';
?>