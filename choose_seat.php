<?php
	include 'header.inc';
	include 'connect_database.inc';
?>
<?php
	//根据POST得来的Running_Movie_ID查询座位信息
	if (isset($_POST['Running_Movie_ID'])) 
	{
		print_r($_POST);
		$Running_Movie_ID = $_POST['Running_Movie_ID'];
		$_SESSION['Running_Movie_ID'] = $_POST['Running_Movie_ID'];
		$sql = "select * from 12222_seat_on_sale where Running_Movie_ID="
					.$Running_Movie_ID." order by Row_Num asc, Column_Num asc;";
		$result = mysql_query($sql);
		if (!$result) 
		{
			die("查询座位失败: ".mysql_error());
		}
		echo "<table cellspacing='8'>";
		$count = 0; //计算一行输入td的个数
		while ($row = mysql_fetch_array($result))
		{
			//新的一行
			if ($count == 0) 
			{
				echo "<tr>";
				echo "<td>第".$row['Row_Num']."排</td>";
			}
			//echo "Row_Num: ".$row['Row_Num']."&nbsp&nbsp";
			//echo "Collumn_Num: ".$row['Column_Num']."&nbsp&nbsp";
			if ($row['Is_Reserved']) 
			{
				echo "<td width='20' bgcolor='red'>1";
			}
			else
			{
				echo "<td width='20' bgcolor='#1ec5e5'>0";
			}
			echo "</td>";
			$count++;
			//一行输出完毕
			if ($count == 12) 
			{
				echo "</tr>";
				$count = 0;
			}
		}
		echo "</table>";
		//根据Running_Movie_ID获取票价
		$sql = "select Price from 12222_Running_Movie where Running_Movie_ID=".$Running_Movie_ID;
		$result = mysql_query($sql);
		if (!$result) 
		{
			die("查询票价信息失败： ".mysql_error());
		}
		$row = mysql_fetch_array($result);
		$_SESSION['Price'] = $row['Price'];
	}

	//根据GET得来的行号和列号，修改座位的预定状态并生成订单
	if (isset($_GET['Row_Num']) && isset($_GET['Column_Num'])) 
	{
		//首先判断用户是否登录
		if (!isset($_SESSION['username'])) 
		{
			echo "<h3>您还未登录，请先去<a href='login.php'>登录</a></h3>";
			exit();
		}

		//判断该作为是否已经被预定
		$sql = "select * from 12222_seat_on_sale where Running_Movie_ID=".$_SESSION['Running_Movie_ID']
					." and Row_Num=".$_GET['Row_Num']." and Column_Num=".$_GET['Column_Num'];
		$result = mysql_query($sql);
		if (!$result) 
		{
			die("修改座位预定状态失败: ".mysql_error());
		}
		if ($row = mysql_fetch_array($result)) 
		{
			if ($row['Is_Reserved'] == 1) 
			{
				echo "<h3>订票失败： 该位置已被预定</h3>";
				exit();
			}
			else
			{
				$_SESSION['Seat_ID'] = $row['Seat_ID'];
			}
		}
		//修改该位置的预定状态
		$sql = "update 12222_seat_on_sale set Is_Reserved=1 where Running_Movie_ID=".$_SESSION['Running_Movie_ID']
					." and Row_Num=".$_GET['Row_Num']." and Column_Num=".$_GET['Column_Num'];
		$result = mysql_query($sql);
		if (!$result) 
		{
			die("修改座位预定状态失败: ".mysql_error());
		}
		echo "<h3>预定成功</h3>";
		//生成订单信息
		$Customer_ID = $_SESSION['Customer_ID'];
		$Seat_ID     = $_SESSION['Seat_ID'];
		date_default_timezone_set("Etc/GMT-8");
		$Order_Date  = date("Y-m-d H:i:s");
		echo "<h1>".gettype($Order_Date).": $Order_Date";
		$Price       = $_SESSION['Price'];
		$sql = "insert into 12222_Orders(Customer_ID, Seat_ID, Order_Date, Total_Price) value
					($Customer_ID, $Seat_ID, '$Order_Date', $Price)";
		$result = mysql_query($sql);
		if (!$result) 
		{
			die("生成订单信息失败: ".mysql_error());
		}
		echo "<h3>生成订单信息成功</h3>";

		exit();
	}

?>
		<h3>请选择您的座位</h3>
		<form action="" method="get">
			行号:
			<select name="Row_Num">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
			列号：
			<select name="Column_Num">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
			&nbsp&nbsp
			<input type="submit" value="确定">
		</form>
		
<?php
    include 'footer.inc';
?>