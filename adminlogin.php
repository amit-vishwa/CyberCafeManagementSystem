<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background: url('adminlogin.jpg') repeat; background-size: 1700px 1000px;
font-family : Arial;">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<center>
	<form action="" method="post">
		<ul name="list">
	<li>
	<a href="home.php"><font size=5px><i class="fa fa-home"><b> Home</b></i></font></a></li>
	<style>	
	a{text-decoration: none; color: black; display: block;}
	
	a:hover{background-color: yellow; }
	
	ul li{float:left; width:1520px; height:40px; background-color: lightyellow;
	opacity: .9;
	line-height: 40px;
	text-align: center;
	font-size: 20px;}
	
	ul{margin: 0px;	padding: 0px; list-style: none;}
	</style>
		</ul>
		<br><br><br><br><br><br><font size="5" color="red"><h1>Welcome To Admin Login Page!!!</h1></font><br><br><br>
		<font size="5" color="Yellow"><b>Enter username : <input type="text" name="username"></b></font><br><br>
		<font size="5" color="Yellow"><b>Enter password : <input type="password" name="password"></b></font><br><br>
	<a href="forgotadminpassword.php"><font size="5"; color="blue"><u><b>Forgot password?</b></u></font></a>
	<br><input type="submit" name="submit" value="Login">
	</form>	

<?php
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
else
{
				$sql="Select * from admin_login where user_id='$user' and password='$pass'";
				$result=$conn->query($sql);
				if($result->num_rows>0)
				{
					while($row=$result->fetch_assoc())
					{
						$u=$row['user_id'];
						$p=$row['password'];
					}
					if(($user==$u)&&($pass==$p))
					{
						echo "Login successful";
						header("location:adminloggedin.php");
					}
				}
				else
				{
					echo "<br><font color=red; size=4px>Login failed</font>";
				}
			}
		}
?>
</center>
</body>
</html>