<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background: url('forgotadminpassword.png') repeat; background-size: 1600px 800px;
font-family : Arial;">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<center>
	<form action="" method="post">

		<ul name="list">
	<li>
	<a href="adminlogin.php"><font size=5px><i class="fa fa-power-off"></i><b> Admin Login</b></font></a>
	</li>
	<style>	
	a{text-decoration: none; color: black; display: block;}
	
	a:hover{background-color: green; }
	
	ul li{float:left; width:1520px; height:40px; background-color: lightgreen;
	opacity: .9;
	line-height: 40px;
	text-align: center;
	font-size: 20px;}
	
	ul{margin: 0px;	padding: 0px; list-style: none;}
	</style>
		</ul>

		<br><br><br><font size="5"><h1>Welcome To Forgot Admin Password Page!!!</h1></font><br><br>
		<font size="5" color="blue"><b>Enter mobile number : <input type="text" name="mno"></b></font><br><br>
		<font size="5" color="blue"><b>Enter email id : <input type="text" name="email"></b></font><br><br>
	<input type="submit" name="submit" value="Submit">
	</form>	

<?php
$conn=new mysqli("localhost", "root", "", "cafe");
		if($conn->connect_error)
		die("Connection failed ".$conn->connect_error);
		if(isset($_POST['submit']))
		{
			$mno=$_POST['mno'];
			$email=$_POST['email'];		

if(empty($_POST['mno'])&&empty($_POST['email']))
{
echo "<br><center><font size=4px><b>Mobile number and email id is mandatory!!!</b></font></center>";
}
else if(empty($_POST['mno']))
{
	echo "<br><center><font size=4px><b>Mobile number is mandatory!!!</b></font></center>";
}
else if(!preg_match('/^[7-9][0-9]{9}+$/',$mno))
{
echo "<br><center><b><font size=4px>Please enter proper contact number</font></b></center>";
}
else if(empty($_POST['email']))
{
	echo "<br><center><font size=4px><b>Email id is mandatory!!!</b></font></center>";
}
else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
echo "<br><center><b><font size=4px>Invalid mail format</font></b></center>";
}
else
{

				$sql="Select * from admin_login where mobile_number='$mno' and email='$email'";
				$result=$conn->query($sql);
				if($result->num_rows>0)
				{
					while($row=$result->fetch_assoc())
					{
						$u=$row['mobile_number'];
						$p=$row['email'];
						$a=$row['user_id'];
						$b=$row['password'];
					}
					if(($mno==$u)&&($email==$p))
					{
						echo "<br><br><font color=black><b>Details are correct :</b></font><br><br>";
						echo "<center><font color=yellow>User name is <b>".$a."</b></font></center>";
						echo "<center><font color=yellow>Password is <b>".$b."</b></font></center>";
						//header("location:adminloggedin.php");
					}
				}
				else
				{
					echo "<br><font size=4px><b>Incorrect details, try again.</b></font>";
				}
			}
		}
?>
</center>
</body>
</html>