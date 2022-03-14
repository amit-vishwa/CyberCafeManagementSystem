<!DOCTYPE html>
<html>
<link href='adminloggedin.css' rel='stylesheet'>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<form name="a" method="post">
<ul name="list">
	<li value="logout"><a href="adminlogin.php"><font size=5px><i class="fa fa-power-off"></i><b> Logout</b></font></a></li>
	
	<li><a><font size=5px><b>Operations !!!</b></font></a>
		<ul>
			<li><a href="insert.php">Insert</a></li>
			<li><a href="update.php">Update</a></li>
			<li><a href="delete.php">Delete</a></li>
		</ul>
	</li>
	</ul>
</form>
<head>
	<title></title>
</head>
<body>
<center>
	<form method="post">
		<br><br><br><br><br><br><h1>Hello Admin</h1>
		Select table : <select name="table" size="1">
		<option value="admindetails">Administrator Details</option>		
		<option value="usagedetails">User Usage Details</option>
		<option value="inventorydetails">Inventory Details</option>
		<option value="userregdetails">Registered User Details</option>
	</select><br><br>
	Select operation : <select name="operation" size="1" disabled="true">
		<option value="select">Show</option>
	</select><br><br>
	<input type="submit" name="submit" value="Submit">
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
$sql="Select * from admin_login";
$result=$conn->query($sql);
if($result->num_rows>0)
{
echo "<br><center>Below Data Fetched From Admin Details Table</center><br>";
echo "<center><table><tr><td> <b>User id</b> </td><td> <b>Password</b> </td><td> <b>Mobile number</b> </td><td> <b>Email</b></td></tr></center>";

while($row=$result->fetch_assoc())
{
echo "<center><tr><td>".$row['user_id']."</td><td>".$row['password']."</td><td>".$row['mobile_number']."</td><td>".$row['email']."</td></tr></center>";
}
}
else
{
echo "<center><br>There is a problem while selecting data from admindetails table</center>";
}
}


if($_POST['table']=="usagedetails") 
{
$sql="Select * from user_usage";
$result=$conn->query($sql);
if($result->num_rows>0)
{

echo "<br><center>Below Data Fetched From User Usage Details Table</center><br>";
echo "<center><table><tr><td> <b>User id</b> </td><td> <b>Date</b> </td><td> <b>Print quantity</b> </td><td> <b>Scan quantity</b></td><td> <b>Time spent</b> </td><td> <b>Total Charges</b> </td></tr></center>";
while($row=$result->fetch_assoc())
{

echo "<center><tr><td>".$row['user_id']."</td><td>".$row['date']."</td><td>".$row['print']."</td><td>".$row['scan']."</td><td>".$row['time_spent']."</td><td>".$row['total_charge']."</td></tr></center>";
}
}
else
{
echo "<center><br>There is a problem while selecting data from usagedetails table</center>";
}
}


if($_POST['table']=="inventorydetails") 
{
$sql="Select * from inventory";
$result=$conn->query($sql);
if($result->num_rows>0)
{
echo "<br><center>Below Data Fetched From Inventory Details Table</center><br>";
echo "<center><table><tr><td> <b>Object id</b> </td><td> <b>Object</b> </td><td> <b>Quantity</b> </td><td> <b>Price</b> </td><td> <b>Total price</b></td></tr></center>";
while($row=$result->fetch_assoc())
{

echo "<center><tr><td>".$row['Object_id']."</td><td>".$row['Object']."</td><td>".$row['Quantity']."</td><td>".$row['Price']."</td><td>".$row['Total_price']."</td></tr></center>";
}
}
else
{
echo "<center><br>There is a problem while selecting data from inventorydetails table</center>";
}
}


if($_POST['table']=="userregdetails") 
{
$sql="Select * from user_reg";
$result=$conn->query($sql);
if($result->num_rows>0)
{
echo "<br><center>Below Data Fetched From Registered User Details Table</center><br>";
echo "<center><table><tr><td> <b>User id</b> </td><td> <b>Name</b> </td><td> <b>Mobile Number</b> </td><td> <b>Age</b> </td><td> <b>Aadhar number</b> </td><td> <b>Password</b> </td></tr></center>";
while($row=$result->fetch_assoc())
{
echo "<center><tr><td>".$row['user_id']."</td><td>".$row['name']."</td><td>".$row['mobile_number']."</td><td>".$row['age']."</td><td>".$row['aadhar_id']."</td><td>".$row['password'];"</td></tr></center>";
}
}
else
{
echo "<center><br>There is a problem while selecting data from userregdetails table</center>";
}
}

}

?>

</body>
</html>