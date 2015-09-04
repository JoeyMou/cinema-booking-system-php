<?php
	include 'header.inc';
	include 'connect_database.inc';
?>

		<a href="my_info.php">我的资料</a>
		<a href="my_orders.php">我的订单</a>
		<a href="my_comments.php">我的评论</a>
		
		<div style="width:500px; height:300px; background-color:#ffff99">
			<h2>基本信息</h2>
			<div style='text-align:left; position:relative; left:170'>
			<?php
				$sql = "select * from 12222_Customer where Customer_ID=".$_SESSION['Customer_ID'];
				$result = mysql_query($sql);
				if (!$result) 
				{
					die("查询基本信息失败： ".mysql_error());
				}
				$row = mysql_fetch_array($result);
				echo "<br>用户名： ".$row['Nickname'];
				echo "<br>手&nbsp&nbsp机： ".$row['Tel'];
				echo "<br>邮&nbsp&nbsp箱： ".$row['Email'];
				if ($row['Sex'] == 1) 
				{
					echo "<br>性&nbsp&nbsp别： 男";
				}
				else
				{
					echo "<br>性&nbsp&nbsp别： 女";
				}
				
			?>
			</div>
		</div>

<?php
    include 'footer.inc';
?>