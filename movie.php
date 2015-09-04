<?php
	include 'header.inc';
	include 'connect_database.inc';
?>



		<?php
			$sql = "select * from 12222_movie;";
			$result = mysql_query($sql);
			if (!$result) 
			{
				die("查询影片失败".mysql_error());
			}
			while ($row = mysql_fetch_array($result)) 
			{
				echo "<div style='width:500px; height:250px; background-color:#ffff99'>";
				echo "<div style='width:150px; height:250px; float:left'>";
				echo "<img src='images/movies/".$row['Movie_ID'].".jpg' style='position:relative; left=30; top:20'/>";
				echo "</div>";
				echo "<div style='width:350px; height:250px; float:left; text-align:left'>";
				echo "<h3>";
				echo "<a href='running_movie.php"."?Movie_ID=".$row['Movie_ID']."'>";
				echo $row['Movie_Name'];
				echo "</a>";
				echo "</h3>";

				echo "年份:  ".$row['Production_Year'];
				echo "<br />类型： ".$row['Movie_Type'];
				echo "<br />导演： ".$row['Director'];
				echo "<br />主演： ".$row['Actors'];
				echo "<br />介绍： ".$row['Movie_Desc'];
				echo "</div>";
				echo "</div>";	
			}
			
		?>
<?php
    include 'footer.inc';
?>