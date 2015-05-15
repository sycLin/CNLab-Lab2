<?php
include("config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password send from Form
$myusername = mysqli_real_escape_string($db, $_POST['username']);
$mypassword = mysqli_real_escape_string($db, $_POST['password']);

$sql = "insert into radcheck (username,attribute,op,value) values ('$myusername','Cleartext-Password',':=','$mypassword')";
$result = mysqli_query($db, $sql);

$sql = "insert into radusergroup (username,groupname) values ('$myusername','user')";

$limit1 = "insert into radcheck (username, attribute, op, value) values ('$myusername', 'Max-Hourly-Traffic', ':=', '5000000')";

$limit2 = "insert into radcheck (username, attribute, op, value) values ('$myusername', 'Acct-Interim-Interval', ':=', '60')";

$limit3 = "insert into radcheck (username, attribute, op, value) values ('$myusername', 'Max-Daily-Session', ':=', '10')";

$result = mysqli_query($db, $sql);

$dummy = mysqli_query($db, $limit1);
$dummy = mysqli_query($db, $limit2);
$dummy = mysqli_query($db, $limit3);

header("location: hotspotlogin.php?res=notyet");
}
?>


<h1>Register Here</h1>
<form action="" method="POST">
<label>Account:</label>
<input type="text" name="username"><br/>
<label>Password:</label>
<input type="password" name="password"><br/>
<input type="submit" value="Submit">
</form>
