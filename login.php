<?php
	include 'header.inc';
	include 'connect_database.inc';
?>
<?php
	if (isset($_POST['username']) && isset($_POST['password']))
	{
		$username = "'".$_POST['username']."'";
		$sql = "select Customer_ID, Pwd from 12222_customer where Nickname = ".$username;
		$result = mysql_query($sql);
		if (!$result) 
		{
			die("Can't query: ".mysql_error());
		}
		echo "查找密码成功";
		$row = mysql_fetch_array($result);
		echo "<br />输入的密码：".md5($_POST['password']);
		echo "<br />数据库的密码：".$row['Pwd'];
		if (md5($_POST['password']) == $row['Pwd']) 
		{
			$_SESSION['username']    = $_POST['username'];
			$_SESSION['Customer_ID'] = $row['Customer_ID'];
			header("location:login.php");
		}
		else
		{
			echo "<h2>密码错误</h2>";
		}
		mysql_close();
		exit();
	}
	if (isset($_SESSION['username'])) 
	{
		echo "<h2>登陆成功</h2>";
		exit();
	}
?>
	<div style="width:500px; height:300px; background-color:#ffff99">
		<h2>登陆</h2>
		<form action="" method="post">
			<p>用户名：<input type="text" name="username"></p>
			<p>密&nbsp&nbsp码：<input type="password" name="password"></p>
			<input type="submit" value="登陆">
		</form>
	</div>
<?php
    include 'footer.inc';
?>
