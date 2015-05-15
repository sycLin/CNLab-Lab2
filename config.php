<html>
<body>
<?php
/*
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '@yourwill');
define('DB_DATABASE', 'wifi_user');
*/

$uamsecret = "uamsecret";

$userpassword=1;

$db = mysqli_connect("localhost", "radius", "radpass", "radius");
if (mysqli_connect_errno($db))
{
echo "FAILED TO CONNECT TO MySQL: " . mysqli_connect_error();
}
?>
<body>
</html>
