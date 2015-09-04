<?php
	include 'header.inc';
	include 'connect_database.inc';
	function get_Movie_Name_By_Movie_ID($Movie_ID)
	{
		$sql2 = "select Movie_Name from 12222_Movie where Movie_ID=".$Movie_ID;
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
?>

		
		<a href="my_info.php">我的资料</a>
		<a href="my_orders.php">我的订单</a>
		<a href="my_comments.php">我的评论</a>
		<div style="width:500px; height:300px; background-color:#ffff99">
			<h2>我的评论</h2>
			<?php
				$sql = "select 12222_Movie_Comment.Order_ID, 12222_Movie_Comment.Movie_ID,12222_Movie_Comment.Comment_Date, 12222_Movie_Comment.Comment 
							from 12222_Movie_Comment, 12222_Orders
								where 12222_Orders.Customer_ID=".$_SESSION['Customer_ID']
								." and 12222_Movie_Comment.Order_ID=12222_Orders.Order_ID";
				$result = mysql_query($sql);
				if (!$result) 
				{
					die("查询订单信息失败: ".mysql_error());
				}
				echo "<table border='1'>";
				echo "<tr>";
				echo "<th>订单号</th>";
				echo "<th>电影</th>";
				echo "<th>评论日期</th>";
				echo "<th>内容</th>";
				echo "</tr>";
				while ($row = mysql_fetch_array($result)) 
				{
					echo "<tr>";
					echo "<td>".$row['Order_ID']."</td>";
					echo "<td>".get_Movie_Name_By_Movie_ID($row['Movie_ID'])."</td>";
					echo "<td>".$row['Comment_Date']."</td>";
					echo "<td>".$row['Comment']."</td>";
					echo "</tr>";
				}

				echo "</table>";
			?>
		</div>	

<?php
    include 'footer.inc';
?>