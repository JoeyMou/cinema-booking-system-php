<?php
	include 'connect_database.inc';
	if (!isset($_GET['Order_ID']) || !isset($_GET['Movie_ID']) || !isset($_GET['content'])) 
	{
		header("location:index.php");	
	}
	//通过GET方法接受到参数，并向数据库插入评论数据
	date_default_timezone_set("Etc/GMT-8");
	$sql = "insert into 12222_Movie_Comment(Movie_ID, Order_ID, Comment_Date, Comment) 
				value(".$_GET['Movie_ID'].", ".$_GET['Order_ID']
							.", '".date("Y-m-d H:i:s")."', '".$_GET['content']."');";
	$result = mysql_query($sql);
	if (!$result) 
	{
		die("插入数据库失败： ".mysql_error());
	}
	//修改orders表的评价状态
	$sql = "update 12222_Orders set Is_Commented=1 where Order_ID=".$_GET['Order_ID'];
	$result = mysql_query($sql);
	if (!$result) 
	{
		die("修改orders表的评价状态失败： ".mysql_error());
	}
	header("location:my_orders.php");
	mysql_close($con);
?>
