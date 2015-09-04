<?php
	include 'header.inc';
	include 'connect_database.inc';
?>
<?php
	function get_Movie_Name_By_Seat_ID($Seat_ID)
	{
		$sql2 = "select 12222_Movie.Movie_Name from 12222_Movie, 12222_Running_Movie, 12222_Seat_On_Sale
					where 12222_Seat_On_Sale.Seat_ID=".$Seat_ID
						." and 12222_Running_Movie.Running_Movie_ID=12222_Seat_On_Sale.Running_Movie_ID"
						." and 12222_Movie.Movie_ID=12222_Running_Movie.Movie_ID";
		$result2 = mysql_query($sql2);
		if (!$result2) 
		{
			die("查询电影名称失败".mysql_error());		
		}
		if ($row2 = mysql_fetch_array($result2)) 
		{
			return $row2['Movie_Name'];
		}

	}

	function get_Movie_ID_By_Seat_ID($Seat_ID)
	{
		$sql3 = "select 12222_Movie.Movie_ID, 12222_Running_Movie.Running_Movie_ID from 12222_Movie, 12222_Running_Movie, 12222_Seat_On_Sale
					where 12222_Seat_On_Sale.Seat_ID=".$Seat_ID
						." and 12222_Running_Movie.Running_Movie_ID=12222_Seat_On_Sale.Running_Movie_ID
						   and 12222_Movie.Movie_ID=12222_Running_Movie.Movie_ID";
		$result3 = mysql_query($sql3);
		if (!$result3) 
		{
			die("查询Movie_ID失败".mysql_error());		
		}
		if ($row3 = mysql_fetch_array($result3)) 
		{
			return $row3['Movie_ID'];
		}

	}
?>


		<a href="my_info.php">我的资料</a>
		<a href="my_orders.php">我的订单</a>
		<a href="my_comments.php">我的评论</a>
		<div style="width:500px; height:300px; background-color:#ffff99">
			<h2>我的订单</h2>
			<?php
				$sql = "select * from 12222_Orders where Customer_ID=".$_SESSION['Customer_ID'];
				$result = mysql_query($sql);
				if (!$result) 
				{
					die("查询订单信息失败: ".mysql_error());
				}
				echo "<table border='1'>";
				echo "<tr>";
				echo "<th>订单号</th>";
				echo "<th>电影</th>";
				echo "<th>日期</th>";
				echo "<th>票价</th>";
				echo "<th>状态</th>";
				echo "</tr>";
				while ($row = mysql_fetch_array($result)) 
				{
					echo "<tr>";
					echo "<td>".$row['Order_ID']."</td>";
					echo "<td>".get_Movie_Name_By_Seat_ID($row['Seat_ID'])."</td>";
					echo "<td>".$row['Order_Date']."</td>";
					echo "<td>".$row['Total_Price']."</td>";
					echo "<td>";
					if ($row['Is_Commented']) 
					{
						echo "已评价";
					}
					else
					{
						echo "<input type='button' value='点评' onclick='comment("
								.$row['Order_ID'].", ".get_Movie_ID_By_Seat_ID($row['Seat_ID']).")'>";
					}
					echo "</td>";
					echo "</tr>";
				}

				echo "</table>";
			?>
		</div>
<script type="text/javascript">
	function comment(Order_ID, Movie_ID)
	{
		var content = prompt("这部电影怎么样，说说呗","");
		location.href = "insert_comment.php?Order_ID=" + Order_ID + "&Movie_ID=" + Movie_ID + "&content=" + content;
	}
</script>

<?php
    include 'footer.inc';
?>