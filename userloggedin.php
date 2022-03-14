<!DOCTYPE html>
<html>
<link href='userloggedin.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<form name="a" method="post">
<ul name="list">
	<li><a href="userlogin.php"><font size=5px><i class="fa fa-power-off"></i><b> Logout</b></a></font></li>
	<style>	
		body
		{
			background: url('userloggedin.jpg') no-repeat;
			background-position: center;
			font-family : Arial;
			background-size: 1700px 1400px;
		}
	a{text-decoration: none; color: black; display: block;}
	
	a:hover{background-color: lightyellow; }
	
	ul li{float:left; width:1520px; height:40px; background-color: palegreen;
	opacity: .9;
	line-height: 40px;
	text-align: center;
	font-size: 20px;}
	
	ul{margin: 0px;	padding: 0px; list-style: none;}
</style></ul>
</form>
<head>
	<title></title>
</head>
<body>
<center>
	<form method="post">
		<br><br><br><br><br><br><h1><font color="DarkPink">Hello User</font></h1>
	</form>	
</center>
<?php
session_start();
if(isset($_SESSION['name']))
{
echo "<center><h1>Welcome ".$_SESSION['name'].", you will be logged out after <font color=red>".$_SESSION['timer']."</font> minutes!!!</h1><center>";
	if((time()-$_SESSION['last_login_timestamp'])>$_SESSION['timer']*60)
	{
		header('location:logout.php');
	}
	else
	{
		$_SESSION['last_login_timestamp']=time();
	}
}
?>

</body>
</html>