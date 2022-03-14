<!DOCTYPE html>
<html>

<form name="a" method="post">
<ul name="list">
	<li><a href="adminloggedin.php"><font size=5px><b><- Back</b></font></a></li>
	<style>
		body{
			background : url('adminloggedin.jpg') no-repeat;
background-position: center;
font-family : Arial;
background-size: 1700px 1400px;
}
		ul
{
margin: 0px;
padding: 0px;
list-style: none;

}
	ul li
{
	float: left;
	width: 1520px;
	height: 40px;
	background-color: lightyellow;
	opacity: .9;
	line-height: 40px;
	text-align: center;
	font-size: 20px;
	border: 2px;
}	
ul li a
{
text-decoration: none;
color: black;
display: block;
}

ul li a:hover
{
	background-color: yellow;
}
	</style>
	</ul>
</form>
<head>
	<title></title>
</head>
<body>
	
<center>
	<form method="post">
		<br><br><br><h1>Insert operations</h1>
		<input type="text" size="40" name="uid" placeholder="Enter user id in 2 digit format">  
		<input type="text" size="40" name="name" placeholder="Enter name">
		<input type="text" size="40" name="pass" placeholder="Enter password"><br><br>

		<input type="text" size="40" name="mno" placeholder="Enter mobile number in 10 digit format">
		<input type="text" size="40" name="email" placeholder="Enter email id">
		<input type="text" size="40" name="age" placeholder="Enter age in 2 digit format"><br><br>

		<input type="text" size="51" name="aid" placeholder="Enter aadhar id in 12 digit format">
		<input type="date" size="40" name="date" placeholder="Enter date">
		<input type="text" size="51" name="print" placeholder="Enter print quantity in 3 digit format"><br><br>
		
		<input type="text" size="40" name="scan" placeholder="Enter scan quantity in 2 digit format">
		<input type="text" size="40" name="time" placeholder="Enter time spent in 3 digit format">
		<input type="text" size="40" name="oid" placeholder="Enter object id in 2 digit format"><br><br>
		
		<input type="text" size="40" name="obj" placeholder="Enter object name">
		<input type="text" size="40" name="oquan" placeholder="Enter object quantity in 2 digit format">
		<input type="text" size="40" name="oprice" placeholder="Enter object price in 7 digit format"><br><br>

		Select a table to perform insert operation on it : <select name="table" size="1">
		<option value="admindetails">Administrator Details</option>		
		<option value="usagedetails">User Usage Details</option>
		<option value="inventorydetails">Inventory Details</option>
		<option value="userregdetails">Registered User Details</option>
	</select><br><br>
	<input type="submit" name="submit" value="Insert">
	</form>	
</center>
<?php
$conn=new mysqli("localhost", "root", "", "cafe");
		if($conn->connect_error)
		die("Connection failed ".$conn->connect_error);

if(isset($_POST['submit']))
{

if($_POST['table']=="admindetails") 
{
$pass=$_POST['pass'];
$mno=$_POST['mno'];
$email=$_POST['email'];
if(empty($_POST['pass'])&&empty($_POST['mno'])&&empty($_POST['email']))
{
	echo "<br><center><font color=red; size=4px><b>Password, mobile number and email id is mandatory!</b></font></center>";
}
else if(empty($_POST['pass']))
{
	echo "<br><center><font color=red; size=4px><b>Password is mandatory!!!</b></font></center>";
}
else if(empty($_POST['mno']))
{
	echo "<br><center><font color=red; size=4px><b>Mobile number is mandatory!!!</b></font></center>";
}
else if(!preg_match('/^[7-9][0-9]{9}+$/',$mno))
{
echo "<br><center><b><font size=4px>Please enter proper contact number</font></b></center>";
}
else if(empty($_POST['email']))
{
echo "<br><center><font color=red; size=4px><b>Email id is mandatory!!!</b></font></center>";
}
else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
echo "<br><center><b><font size=4px>Invalid mail format</font></b></center>";
}
else
{
$st="INSERT INTO admin_login(password,mobile_number,email) VALUES ('$pass','$mno','$email')";
$res=mysqli_query($conn,$st);
if($res)
{
echo "<br><center>Insertion on admin details table done successfully!!!</center><br>";
}
else
{
echo "<center><br>There is a problem while inserting data in admin details table.</center>";
}
}
}


if($_POST['table']=="usagedetails") 
{
$uid=$_POST['uid'];
$pass=$_POST['pass'];
$date=$_POST['date'];
$print=$_POST['print'];
$scan=$_POST['scan'];
$time=$_POST['time'];

if(empty($_POST['uid'])&&empty($_POST['date'])&&empty($_POST['print'])&&empty($_POST['scan'])&&empty($_POST['time']))
{
	echo "<br><center><font color=red; size=4px><b>User id, date, print, scan and time is mandatory!</b></font></center>";
}
else if(empty($_POST['uid']))
{
	echo "<br><center><font color=red; size=4px><b>User id is mandatory!!!</b></font></center>";
}
else if(!preg_match('/^[0-9]{2}+$/',$uid))
{
echo "<br><center><b><font size=4px>Please enter proper user id in 2 digit format.</font></b></center>";
}
else if(empty($_POST['print']))
{
	echo "<br><center><font color=red; size=4px><b>Print quantity is mandatory!!!</b></font></center>";
}
else if(!preg_match('/^[0-9]{3}+$/',$print))
{
echo "<br><center><b><font size=4px>Please enter proper print in 3 digit format.</font></b></center>";
}
else if(empty($_POST['scan']))
{
	echo "<br><center><font color=red; size=4px><b>Scan quantity is mandatory!!!</b></font></center>";
}
else if(!preg_match('/^[0-9]{2}+$/',$scan))
{
echo "<br><center><b><font size=4px>Please enter proper scan quantity in 2 digit format.</font></b></center>";
}

else if(empty($_POST['time']))
{
	echo "<br><center><font color=red; size=4px><b>Time is mandatory!!!</b></font></center>";
}
else if(!preg_match('/^[0-9]{3}+$/',$time))
{
echo "<br><center><b><font size=4px>Please enter proper time in minutes in 3 digit format.</font></b></center>";
}
else
{
	$charge=($time*0.5)+($print*5)+($scan*5);
$st="INSERT INTO user_usage(user_id,date,print,scan,time_spent,total_charge) VALUES ('$uid','$date','$print','$scan','$time','$charge')";
$res=mysqli_query($conn,$st);
if($res)
{
echo "<br><center>Insertion on user usage details table done successfully!!!</center><br>";
}
else
{
echo "<center><br>There is a problem while inserting data in user usage details table.</center>";
}
}
}


if($_POST['table']=="inventorydetails") 
{
$oid=$_POST['oid'];
$obj=$_POST['obj'];
$oquan=$_POST['oquan'];
$oprice=$_POST['oprice'];
if(empty($_POST['oid'])&&empty($_POST['obj'])&&empty($_POST['oquan'])&&empty($_POST['oprice']))
{
	echo "<br><center><font color=red; size=4px><b>Object id, name, quantity, and price is mandatory!</b></font></center>";
}
else if(empty($_POST['oid']))
{
	echo "<br><center><font color=red; size=4px><b>Object id is mandatory!!!</b></font></center>";
}
else if(!preg_match('/^[0-9]{2}+$/',$oid))
{
echo "<br><center><b><font size=4px>Please enter proper object id in 2 digit form</font></b></center>";
}
else if(empty($_POST['obj']))
{
	echo "<br><center><font color=red; size=4px><b>Object name is mandatory!!!</b></font></center>";
}
else if(empty($_POST['oquan']))
{
echo "<br><center><font color=red; size=4px><b>Object quantity is mandatory!!!</b></font></center>";
}	
else if(!preg_match('/^[0-9]{2}+$/',$oquan))
{
echo "<br><center><b><font size=4px>Please enter proper object quantity in 2 digit form</font></b></center>";
}
else if(empty($_POST['oprice']))
{
echo "<br><center><font color=red; size=4px><b>Object price is mandatory!!!</b></font></center>";
}
else if(!preg_match('/^[0-9]{7}+$/',$oprice))
{
echo "<br><center><b><font size=4px>Please enter proper object price in 7 digit form</font></b></center>";
}
else
{
$otp=$oprice*$oquan;
$st="INSERT INTO inventory(Object_id,Object,Quantity,Price,Total_price) VALUES ('$oid','$obj','$oquan','$oprice','$otp')";
$res=mysqli_query($conn,$st);
if($res)
{
echo "<br><center>Insertion on inventory details table done successfully!!!</center><br>";
}
else
{
echo "<center><br>There is a problem while inserting data in inventory details table.</center>";
}
}
}


if($_POST['table']=="userregdetails") 
{
$uname=$_POST['name'];
$mno=$_POST['mno'];
$age=$_POST['age'];
$ano=$_POST['aid'];
$pass=$_POST['pass'];
if(empty($_POST['name'])&&empty($_POST['mno'])&&empty($_POST['age'])&&empty($_POST['aid'])&&empty($_POST['pass']))
{
	echo "<br><center><font color=red; size=4px><b>Username, mobile number, age, adhar number and password is mandatory!</b></font></center>";
}
else if(empty($_POST['name']))
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
echo "<br><center><b><font size=4px>Please enter proper age in 2 digit</font></b></center>";
}
else if(empty($_POST['aid']))
{
echo "<br><center><font color=red; size=4px><b>Aadhar number is mandatory!!!</b></font></center>";
}
else if(!preg_match('/^[0-9]{12}+$/',$ano))
{
echo "<br><center><b><font size=4px>Please enter proper 12 digit aadhar number</font></b></center>";
}
else if(empty($_POST['pass']))
{
echo "<br><center><font color=red; size=4px><b>Password is mandatory!!!</b></font></center>";
}
else
{
$st="INSERT INTO user_reg(name,mobile_number,age,aadhar_id,password) VALUES ('$uname','$mno','$age','$ano','$pass')";
$res=mysqli_query($conn,$st);
if($res)
{
echo "<br><center>Insertion on user details table done successfully!!!</center><br>";
}
else
{
echo "<center><br>There is a problem while inserting data in user details table.</center>";
}
}
}

}
?>

</body>
</html>