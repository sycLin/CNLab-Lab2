<?php
//include("lock.php");
include("config.php");
session_start();
$user = $_SESSION['login_user'];
echo "user = $user";
$sql = "SELECT * FROM radacct WHERE username='$user'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
echo "session input # bytes = ";
echo $row['acctinputoctets'];
echo "<br />";
echo "session output # bytes = ";
echo $row['acctoutputoctets'];
echo "<br />";

?>
<head>
<script language="javascript">
function my_func() {
    var tmp = window.location.href;
    window.location.assign(tmp);
}
function logout() {
    window.location.assign("http://localhost/login.php");
}
</script>
</head>
<body>
<h1>Welcome <?php echo $_SESSION['login_user'] ?></h1>
<input type="button" onclick="my_func()" value="Refresh!">
<input type="button" onclick="logout()" value="Log Out!">
</body>
