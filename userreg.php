<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background: url('userreg.jpg') repeat; background-size: 1700px 1000px;
font-family : Arial;">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<center>
	<form action="" method="post">

			<ul name="list">
	<li>
	<a href="userlogin.php"><font size=5px><i class="fa fa-power-off"></i><b> User Login</b></font></a></li>
	<style>	
	a{text-decoration: none; color: black; display: block;}
	
	a:hover{background-color: powderblue; }
	
	ul li{float:left; width:1520px; height:40px; background-color: lightgoldenrodyellow;
	opacity: .9;
	line-height: 40px;
	text-align: center;
	font-size: 20px;}
	
	ul{margin: 0px;	padding: 0px; list-style: none;}
	</style>
		</ul>


		<br><br><br><br><br><font size="5" ><h1>Welcome To User Registration Page!!!</h1></font><br>
		<font size="5"><b>Enter username : <input type="text" name="username"></b></font><br><br>		
		<font size="5"><b>Enter mobile number : <input type="text" name="mno"></b></font><br><br>
		<font size="5"><b>Enter age : <input type="text" name="age"></b></font><br><br>		
		<font size="5"><b>Enter aadhar number : <input type="text" name="ano"></b></font><br><br>
		<font size="5"><b>Enter password : <input type="password" name="password"></b></font><br><br>
	<input type="submit" name="register" value="Register"><br>
	</form>	

<?php
$conn=new mysqli("localhost", "root", "", "cafe");
		if($conn->connect_error)
		die("Connection failed ".$conn->connect_error);
		if(isset($_POST['register']))

{

$uname=$_POST['username'];

$mno=$_POST['mno'];

$age=$_POST['age'];

$ano=$_POST['ano'];

$pass=$_POST['password'];

if(empty($_POST['username'])&&empty($_POST['mno'])&&empty($_POST['age'])&&empty($_POST['ano'])&&empty($_POST['password']))
{
	echo "<br><center><font color=red; size=4px><b>Username, mobile number, age, adhar number and password is mandatory!</b></font></center>";
}
else if(empty($_POST['username']))
{
	echo "<br><center><font color=red; size=4px><b>Username is mandatory!!!</b></font></center>";
}
else if(empty($_POST['mno']))
{
	echo "<br><center><font color=red; size=4px><b>Mobile number is mandatory!!!</b></font></center>";
}
else if(!preg_match('/^[7-9][0-9]{9}+$/',$mno))
{
echo "<br><center><b><font size=4px>Please enter proper contact number</font></b></center>";
}
else if(empty($_POST['age']))
{
echo "<br><center><font color=red; size=4px><b>Age is mandatory!!!</b></font></center>";
}
else if(!preg_match('/^[0-9]{2}+$/',$age))
{
echo "<br><center><b><font size=4px>Please enter proper age</font></b></center>";
}
else if(empty($_POST['ano']))
{
echo "<br><center><font color=red; size=4px><b>Aadhar number is mandatory!!!</b></font></center>";
}
else if(!preg_match('/^[0-9]{12}+$/',$ano))
{
echo "<br><center><b><font size=4px>Please enter proper 12 digit aadhar number</font></b></center>";
}
else if(empty($_POST['password']))
{
echo "<br><center><font color=red; size=4px><b>Password is mandatory!!!</b></font></center>";
}
else
{


$st="INSERT INTO user_reg(name,mobile_number,age,aadhar_id,password) VALUES ('$uname','$mno','$age','$ano','$pass')";

$res=mysqli_query($conn,$st);

if($res)

{
echo "<br><center>Below Data Added Successfully</center><br>";
echo "<center>User name is <b>".$uname."</b></center>";
echo "<center>Mobile number is <b>".$mno."</b></center>";
echo "<center>Age is <b>".$age."</b></center>";
echo "<center>Aadhar number is <b>".$ano."</b></center>";
echo "<center>Password is <b>".$pass."</b></center>";
}

else

{

echo "<center><br>There is a problem while inserting data in database</center>";

}

}

}

?>
</center>
</body>
</html>