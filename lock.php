<?php
echo "Entering lock.php";
include('config.php');
$user_check=$_SESSION['login_user'];
echo "user_check gotten";
$ses_sql = mysqli_query($db, "select account from user_info where account='$user_check'");
echo "sql query issued";
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['username'];

if(!isset($login_session))
{
header("Location: login.php");
?>
