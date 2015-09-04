<?php
	include 'header.inc';
	include 'connect_database.inc';
?>
<?php
	if (isset($_GET['Movie_ID'])) 
	{
		$sql = "select * from 12222_running_movie where Movie_ID=".$_GET['Movie_ID'];
		$result = mysql_query($sql);
		if (!$result) 
		{
			die("查询失败".mysql_error());
		}
		//表单
		echo "<form action='choose_seat.php' method='post'>";
		while ($row = mysql_fetch_array($result)) 
		{
			$Running_Movie_ID = $row['Running_Movie_ID'];
			$Movie_ID         = $_GET['Movie_ID'];
			$Hall_ID          = $row['Hall_ID'];
			$Showtime 		  = $row['Showtime'];
			$Price    		  = $row['Price'];
			echo "<input type='radio' name='Running_Movie_ID' value='$Running_Movie_ID'>";
			echo "影厅：$Hall_ID 号厅&nbsp&nbsp";
			echo "时间：$Showtime&nbsp&nbsp";
			echo "价格：$Price&nbsp&nbsp";
			echo "<br />";
		}
		echo "<br />";
		echo "<input type='submit' value='在线选座'>";
		echo "</form>";
	}
?>

<?php
    include 'footer.inc';
?>