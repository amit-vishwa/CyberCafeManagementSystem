<!DOCTYPE html>
<html>
<link href='adminloggedin.css' rel='stylesheet'>
<form name="a" method="post">
<ul name="list">
	<li><a href="home.php">Home</a></li>
	<li><a>About</a>
		<ul>
			<li><a>Admin Details</a></li>
			<li><a>User Details</a></li>
			<li><a>Inventory Details</a></li>
		</ul>
	</li>
	<li><a>Check</a>
		<ul>
			<li><a>Admin Table</a></li>
			<li><a>User Table</a></li>
			<li><a>Inventory Table</a></li>
		</ul>
	</li>
	</ul>
</form>
<head>
	<title></title>
</head>
<body>
<center>
	<form action="" method="post">
		<br><br><br><br><br><br><h1>Hello Admin</h1>
		Select options to browse accordingly : <select name="" size="1">
		<option value="admindetails">Administrator Details</option>		
		<option value="userdetails">User Details</option>
		<option value="inventorydetails">Inventory Details</option>
	</select><br><br>
	<input type="submit" name="submit" value="submit">
	</form>	
</center>
<?php
if(isset($_POST['a']))
{if($_POST['list']=='home')
header("location:cafe.php");
}
?>

</body>
</html>