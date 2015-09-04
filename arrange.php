<?php
	include 'header.inc';
	include 'connect_database.inc';
?>
<?php
	if (!isset($_SESSION['username']) || $_SESSION['username'] != 'admin') 
	{
		echo "<h2>您不是管理员，不能排片</h2><br>";
		echo "<h2>请先以管理员身份登录</h2>";
		exit();
	}

	if (isset($_POST['movie'])) 
	{
		//根据admin提交的信息排片
		print_r($_POST);
		$movie  = $_POST['movie'];
		$hall   = $_POST['hall'];
		$hour   = $_POST['hour'];
		$minute = $_POST['minute'];
		$price  = $_POST['price'];

		$sql = "insert into 12222_running_movie(Movie_ID, Hall_ID, Showtime, Price) value("
					.$movie.",".$hall.",'2014-01-21 ".$hour.":".$minute.":00',".$price.");";
		echo "<br />".$sql;
		$result = mysql_query($sql);
		if (!$result) 
		{
			die("<h2>排片失败</h2>".mysql_error());
		}
		else
		{
			echo "<h2>排片成功</h2>";
		}

		//为该场次安排座位
		$Running_Movie_ID = mysql_insert_id();
		for ($i = 1; $i <= 12; $i++) 
		{ 
			for ($j = 1; $j <= 12; $j++) 
			{ 
				$sql = "insert into 12222_Seat_On_Sale(Running_Movie_ID, Row_Num, Column_Num) "
							."value(".$Running_Movie_ID.",".$i.",".$j.");";
				echo "<br />".$sql;
				$result = mysql_query($sql);
				if (!$result) 
				{
					die("安排座位失败".mysql_error());
				}
			}
		}
		exit();	
	}
?>
	
	<p>
	<form action="" method="post">
		电影
		<select name="movie">
			<?php
				$sql = "select Movie_ID, Movie_Name from 12222_movie;";
				$result = mysql_query($sql);
				if (!$result) 
				{
					echo "查询失败";	
				}
				while ($row = mysql_fetch_array($result)) 
				{
					echo "<option value ='".$row['Movie_ID']."'>".$row['Movie_Name']."</option>";
				}
			?>
		</select>
		&nbsp&nbsp影厅
		<select name="hall">
	 		<option value ="1">1号厅</option>
	  		<option value ="2">2号厅</option>
	  		<option value="3">3号厅</option>
	  		<option value="4">4号厅</option>
	  		<option value="5">5号厅</option>
		</select>
		&nbsp&nbsp放映时间
		<select name="hour">
			<option value ="9">9</option>
			<option value ="10">10</option>
			<option value ="11">11</option>
			<option value ="12">12</option>
			<option value ="13">13</option>
			<option value ="14">14</option>
			<option value ="15">15</option>
			<option value ="16">16</option>
			<option value ="17">17</option>
			<option value ="18">18</option>
			<option value ="19">19</option>
			<option value ="20">20</option>
			<option value ="21">21</option>
			<option value ="22">22</option>
			<option value ="23">23</option>
		</select>时
		<select name="minute">
			<option value ="0">00</option>
			<option value ="10">10</option>
			<option value ="20">20</option>
			<option value ="30">30</option>
			<option value ="40">40</option>
			<option value ="50">50</option>
		</select>分
		&nbsp&nbsp价格
		<input type="text" name="price" style="width:50px">元
		<br /><br />
		<input type="submit" value="排片">

	</form>
	</p>
<?php
    include 'footer.inc';
?>