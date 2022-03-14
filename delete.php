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
		<br><br><br><h1>Delete operations</h1>
		Enter user id : <input type="text" size="40" name="uid" placeholder="Enter user id in 2 digit format"><br><br>
		Enter object id : <input type="text" size="40" name="oid" placeholder="Enter object id in 2 digit format"><br><br>
		Select a table to delete a row from it : <select name="table" size="1">
		<option value="admindetails">Administrator Details</option>		
		<option value="usagedetails">User Usage Details</option>
		<option value="inventorydetails">Inventory Details</option>
		<option value="userregdetails">Registered User Details</option>
	</select><br><br>
	<input type="submit" name="submit" value="Delete">
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
$uid=$_POST['uid'];
if(empty($_POST['uid']))
{
	echo "<br><center><font color=red; size=4px><b>User id is mandatory!</b></font></center>";
}
else if(!preg_match('/^[0-9]{2}+$/',$uid))
{
echo "<br><center><b><font size=4px>Please enter proper user id in 2 digit format</font></b></center>";
}
else
{
$st="Delete from admin_login where user_id='$uid'";
$res=mysqli_query($conn,$st);
if($res)
{
echo "<br><center>Deletion on admin details table done successfully!!!</center><br>";
}
else
{
echo "<center><br>There is a problem while deleting data from admin details table.</center>";
}
}
}


if($_POST['table']=="usagedetails") 
{
$uid=$_POST['uid'];
if(empty($_POST['uid']))
{
	echo "<br><center><font color=red; size=4px><b>User id is mandatory!</b></font></center>";
}
else if(!preg_match('/^[0-9]{2}+$/',$uid))
{
echo "<br><center><b><font size=4px>Please enter proper user id in 2 digit format.</font></b></center>";
}
else
{
$st="Delete from user_usage where user_id='$uid'";
$res=mysqli_query($conn,$st);
if($res)
{
echo "<br><center>Deletion on user usage details table done successfully!!!</center><br>";
}
else
{
echo "<center><br>There is a problem while deleting data from user usage details table.</center>";
}
}
}


if($_POST['table']=="inventorydetails") 
{
$oid=$_POST['oid'];
if(empty($_POST['oid']))
{
	echo "<br><center><font color=red; size=4px><b>Object id is mandatory!</b></font></center>";
}
else if(!preg_match('/^[0-9]{2}+$/',$oid))
{
echo "<br><center><b><font size=4px>Please enter proper object id in 2 digit form</font></b></center>";
}
else
{
$st="Delete from inventory where Object_id='$oid'";
$res=mysqli_query($conn,$st);
if($res)
{
echo "<br><center>Deletion on inventory details table done successfully!!!</center><br>";
}
else
{
echo "<center><br>There is a problem while deleting data from inventory details table.</center>";
}
}
}


if($_POST['table']=="userregdetails") 
{
$uid=$_POST['uid'];
if(empty($_POST['uid']))
{
	echo "<br><center><font color=red; size=4px><b>User id is mandatory!</b></font></center>";
}
else if(!preg_match('/^[0-9]{2}+$/',$uid))
{
echo "<br><center><b><font size=4px>Please enter proper user id in 2 digit format.</font></b></center>";
}
else
{
$st="Delete from user_reg where user_id='$uid'";
$res=mysqli_query($conn,$st);
if($res)
{
echo "<br><center>Deletion on user details table done successfully!!!</center><br>";
}
else
{
echo "<center><br>There is a problem while deleting data from user details table.</center>";
}
}
}

}
?>

</body>
</html>