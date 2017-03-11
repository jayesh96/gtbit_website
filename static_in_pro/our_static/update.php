<?php
include_once ('connection.php');
session_start();
$sql = $conn->prepare("SELECT * FROM adminlogin WHERE `idadminlogin` = ? ");
$sql->bind_param('s', ($_SESSION['user_id']));
 
$sql->execute();
$query = $sql->get_result();
if ($query->num_rows > 0) {
	$row = $query->fetch_assoc();
	$user_active = $row['adminactive'];
}
 
if (!(isset($_SESSION['user_id'])&& ($_SESSION['user_group']=='Administrator')&& ($_SESSION['user_active']==$user_active)))
{
	header('Location: admin_login.html');
}
else
{   
    $table=$_POST['type'];
	$ndate = $_POST['date'];
	$ntitle = $_POST['title'];
	$ndescshort = $_POST['shortdesc'];
	$idmy = $_POST['id']
	$ndescfull = nl2br(htmlentities($_POST['longdesc']));
	
	
	$sql = "UPDATE $table SET title=$ntitle, date=$ndate, shortdesc=$ndescshort, longdesc=$ndescfull WHERE id=$idmy"
	
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
		header('Location: admin_main.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();

	}
?>



