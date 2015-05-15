<?php

// connect to data case
$db = mysqli_connect("localhost", "radius", "radpass", "radius");
if(mysqli_connect_errno($db))
{
	echo "FAILED TO CONNECT TO MySQL: " . mysqli_connect_error();
}

session_start();

// get the userlist


$sql = "SELECT distinct(username) FROM radcheck";
$user_list = mysqli_query($db, $sql);
$number_of_users = mysqli_num_rows($user_list);

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	session_destroy();
	header('location: admin.php');
}

?>


<html>

<head>
	<script language="javascript">
	function jump_to_user(username) {
		// do something;
		var url = "real_admin_edit.php?username=" + username;
		window.location.assign(url);
	}
	</script>
</head>

<body>

<h1>Hello: Dear <?php echo $_SESSION['login_user']?></h1>

<FORM action="" method="POST">
	<input type='submit' name='logout' value='LogOut!'>
</FORM>

<?php
print "<p>User List</p>";
print "there are ";
print $number_of_users;
print " users.<br/><br />";
?>

<div>
	<table border=1>
		<td>Username</td>
		<td>Hourly Flow Limit</td>
		<td>Daily Session Limit</td>
		<td>Modify</td>
<!-- 這裡隨著使用者變長 -->
<?php
for($count=0; $count<$number_of_users; $count++)
{
	$tmp = mysqli_fetch_array($user_list, MYSQLI_ASSOC);
	$tmp_user_name = $tmp['username'];
	$sql = "SELECT * FROM radcheck WHERE username=$tmp_user_name";
	$result = mysqli_query($db, $sql);
	// initialization
	$hourly_limit = "-1";
	$daily_limit = "-1";
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		if($row['attribute'] == "Max-Hourly-Traffic")
		{
			$hourly_limit = $row['value'];
		}
		else if($row['attribute'] == "Max-Daily-Session")
		{
			$daily_limit = $row['value'];
		}
	}
	print "<tr>";
	print "<td>" . $tmp_user_name . "</td>";
	print "<td>" . $hourly_limit . "</td>";
	print "<td>" . $daily_limit . "</td>";
	print "<td><input type='button' onclick='jump_to_user($tmp_user_name);' name='$tmp_user_name' value='Edit'></td>";
}
print "<tr>";
?>
<!-- 這裡隨著使用者變長 -->
	</table>
</div>
</body>
</html>
