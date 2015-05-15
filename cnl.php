<?php
$db = mysqli_conenct(.........);
session_start();
$username = $_SESSION['login_user'];
$sql = "SELECT * FROM radcheck";
$result = mysqli_query($db, $sql);
$number_of_user = mysqli_count_row($result);


?>


<html>
<head>
	<div style="margin: 0px auto; border: 2px solid blue; width:150px">
		:)<br>
	</div>
	<script language="javascript">
	function jump_to_user() {
		// do something;
	}
	</script>
</head>
<body>
<?php
print "there are " . $number_of_user . " users.";
?>
	<div>
		<table border="1">
		　<tr>
		　<td>USER</td>
		　<td>MAX_FLOW</td>
		 <td>每日使用時間上限</td>
		  <td>修改</td>
		  
		　</tr>
<!-- 這裡隨著使用者變長 -->
<?php
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$row['username'];
$row['Max-Daily-Session'];
print "<tr>
		　<td>poorman</td>
		  <td>50</td>
		  <td>10秒</td>
		  <td><form action="./user.html"><input type="button" onclick="" value="modify"></form></td>
		　</tr>"
?>
		　
<!-- 這裡隨著使用者變長 -->

		</table>	
		<br />
		
	</div>
</body>
</html>
