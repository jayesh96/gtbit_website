<?php

include_once ('connection.php');
session_start();

$uname = $_POST['uname'];
$upass = md5($_POST['upass']);

$sql = $conn->prepare("SELECT * FROM adminlogin WHERE `idadminlogin` = ? AND `adminpassword` = ?");
$sql->bind_param('ss', $uname ,$upass);

$sql->execute();
$query = $sql->get_result();



if ($query->num_rows > 0) {
	
	//while($row = $query->fetch_assoc()) {
	
	
	$row = $query->fetch_assoc();
	$user_id = $row['idadminlogin'];
	
	
	$_SESSION['user_id'] = $user_id;
	$_SESSION['user_group'] = 'Administrator';
	$sessionactive=md5(rand());
	$_SESSION['user_active'] = $sessionactive;
	$sql = "UPDATE adminlogin SET adminactive='$sessionactive' WHERE idadminlogin=$uname";
	if ($conn->query($sql) === TRUE) {
		header('Location: admin_main.php');
	} else {
		echo "Error";
	}
	
	
	
	header('Location: admin_main.php');
	
	//}
} else 
{
	echo "<b>Invalid Username/Password or Inactive Account.</b> | <a href=index.php>Try again</a>";
}
$conn->close();


?>
