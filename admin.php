<?php

$db = mysqli_connect("localhost", "radius", "radpass", "radius");

if (mysqli_connect_errno($db))
{
	echo "FAILED TO CONNECT TO MySQL: " . mysqli_connect_error();
}

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// data sent from HTML FORM
	$myusername = mysqli_real_escape_string($db, $_POST['username']);
	$mypassword = mysqli_real_escape_string($db, $_POST['password']);

	$sql = "SELECT * FROM radcheck WHERE username='$myusername' and value='$mypassword'";
	$result = mysqli_query($db, $sql);
	$user_row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);

	if($count == 1)
	{
		$sql = "SELECT * FROM radusergroup WHERE username='$myusername'";
		$result = mysqli_query($db, $sql);
		$group_row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if($group_row['groupname'] == "SuperUser")
		{
			// yes, you're admin!
			$_SESSION['login_user'] = $myusername;
			header("location: real_admin.php");
		}
		else
		{
			$err_msg = "You're not an admin!";
		}
	}
	else
	{
		$err_msg = "Username or Password is invalid!";
	}

	echo $err_msg;

}
?>
<html>
<head>
<title>Admin Page</title>
</head>
<body>
<h1>Admin Page</h1>

<form action="" method="POST">
<label>Account:</label>
<input type="text" name="username">
<br>
<label>Password:</label>
<input type="password" name="password">
<br>
<input type="submit" value="Log In!">
</form>
</body>
</html>

