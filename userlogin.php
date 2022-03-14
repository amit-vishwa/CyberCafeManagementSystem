<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background: url('userlogin.png') no-repeat; background-size: 1710px 920px;
font-family : Arial;">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<center>
	<form action="" method="post">
		<ul name="list" style="margin: 0px;	padding: 0px; list-style: none;">
	<li style="float:left; width:1520px; height:40px; background-color: lightblue;
	opacity: .9;
	line-height: 40px;
	text-align: center;
	font-size: 20px;">
	<a href="home.php"><font size=5px><i class="fa fa-home"><b> Home</b></i></font></a></li>
		</ul>
		<style>	
	a{text-decoration: none; color: black; display: block;}
	
	a:hover{background-color: blue; }
	
	ul li{float:left; width:1520px; height:40px; background-color: lightyellow;
	opacity: .9;
	line-height: 40px;
	text-align: center;
	font-size: 20px;}
	
	ul{margin: 0px;	padding: 0px; list-style: none;}
	</style>
		<br><br><br><br><br><br><br><br><br><br><br><font size="5"><h1>Welcome To User Login Page!!!</h1></font>
		<font size="5"><b>Enter username : <input type="text" name="username"></b></font><br><br>
		<font size="5"><b>Enter password : <input type="password" name="password"></b></font><br><br>
		<font size="5"><b>Set timer in minutes : <input type="text" name="timer" placeholder="should be in 3 digit format"></b></font><br><br>
	<input type="submit" name="submit" value="Login">
	</form>	

<?php
session_start();
$conn=new mysqli("localhost", "root", "", "cafe");
		if($conn->connect_error)
		die("Connection failed ".$conn->connect_error);
		if(isset($_POST['submit']))
		{
			$user=$_POST['username'];
			$pass=$_POST['password'];

if(empty($_POST['username'])&&empty($_POST['password']))
{
	echo "<br><center><font color=red; size=4px><b>Username and password is mandatory!!!</b></font></center>";
}
else if(empty($_POST['username']))
{
	echo "<br><center><font color=red; size=4px><b>Username is mandatory!!!</b></font></center>";
}
else if(empty($_POST['password']))
{
echo "<br><center><font color=red; size=4px><b>Password is mandatory!!!</b></font></center>";
}
else if(empty($_POST['timer']))
{
echo "<br><center><font color=red; size=4px><b>Timer is mandatory in order to browse further!!!</b></font></center>";
}
else if(!preg_match('/^[0-9]{3}+$/',$_POST['timer']))
{
echo "<br><center><b><font size=4px>Please enter timer in minutes in proper 3 digit format</font></b></center>";
}
else
{
		
			//$_SESSION['name']=$_POST['username'];
			//$_SESSION['last_login_timestamp']=time();

				$sql="Select * from user_reg where name='$user' and password='$pass'";
				$result=$conn->query($sql);
				if($result->num_rows>0)
				{
					while($row=$result->fetch_assoc())
					{
						$u=$row['name'];
						$p=$row['password'];
					}
					if(($user==$u)&&($pass==$p))
					{
						echo "Login successful";						
						$_SESSION['name']=$_POST['username'];
						$_SESSION['timer']=$_POST['timer'];
						$_SESSION['last_login_timestamp']=time();
						header("location:userloggedin.php");
					}
				}
				else
				{
					echo "<br><font color=red; size=4px><b>Login failed, ask admin to provide correct username and password.</b></font>";
				}
			}	
}

?>
</center>
</body>
</html>