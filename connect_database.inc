<?php
	$con = mysql_connect("localhost", "mlhu5y21_201311", "20131111");
	if (!$con) 
	{
		die("Can't connect: ".mysql_error());
	}
	$db = mysql_select_db("mlhu5y21_201311", $con);
	if (!$db) 
	{
		die("Can't select the database: ".mysql_error());
	}
	mysql_query("set names utf8");
?>