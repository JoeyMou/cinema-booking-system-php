<?php
	session_start();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>高大上电影院</title>
		<style type="text/css">
		.nav {height: 44px;	width: 400px;}
		.nav ul{list-style:none; margin: 0; width: 400px; text-align: center;} 
		.nav li{float:left;width:100px;background:#CCC;margin-left:3px;line-height:30px;} 
		.nav a{display:block;text-align:center;height:30px;} 
		.nav a:link{color:#666;background:#CCC no-repeat 5px 12px;text-decoration:none;} 
		.nav a:visited{color:#666;text-decoration:underline;} 
		.nav a:hover{color:#FFF; font-weight:bold;text-decoration:none;background:#F00 no-repeat 5px 12px;}  

        .box{
         width:700px;
         height:460px;
         border:solid 1px #CCC;
         padding:5px;
        }
        .box .box1{
         width:700px;
         height:460px;
         position:relative;
         overflow:hidden;
        }
        .box .box1 .picbox{
         width:700px;
         height:460px;
         position:relative;
         display:none;
        }
        .box .box1 .picbox .shadow{
         width:100%;
         height:30px;
         position:absolute;
         bottom:0px;
         left:0px;
         background:#666;
         opacity:0.5;
         filter:alpha(opacity=50);
        }
        .box .box1 .picbox .title{
         width:50px;
         height:30px;
         margin: 0px;
         line-height:30px;
         position:absolute;
         bottom:0px;
         left:0px;
         text-indent:0.5em;
         color:#FFF;
        }
        .box1 .picbtn{
         width:155px;
         height:30px;
         position:absolute;
         right:0px;
         bottom:-8px;
        }
        .box1 .picbtn a{
         width:25px;
         height:12px;
         display:block;
         float:left;
         margin-right:5px;
         background:#FFF no-repeat left top;
        }
        .box1 .picbtn a.act{
         background:#DC4E1B no-repeat left top;
        }
		</style>
	</head>
		<body>
		<div align="right" style="color:#666">
			<?php
				if (isset($_SESSION['username'])) 
				{
					echo $_SESSION['username']."，欢迎您";
					echo "&nbsp&nbsp";
					echo "<a href='login_out.php'>退出<a>";
					echo "&nbsp&nbsp";
					echo "<a href='my.php'>我的高大上</a>";
				}
				else
				{
					echo "<a href='login.php'>登陆</a>";
					echo "&nbsp&nbsp";
					echo "<a href='register.php'>注册</a>";
				}
			?>
		</div>
		<div align="center">
			<h1 style="color:#DC4E1B">高大上电影院</h1>		
			<div class="nav"><ul> 
				<li><a href="index.php">首页</a></li> 
				<li><a href="movie.php">正在热映</a></li>
				<li><a href="arrange.php">排片</a></li>
			</ul></div> 
			<br>