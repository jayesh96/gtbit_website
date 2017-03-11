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
$ndate = $_POST['date'];
$ntitle = $_POST['title'];

$errors= array();
$file_name = $_FILES['image']['name'];
$file_size =$_FILES['image']['size'];
$file_tmp =$_FILES['image']['tmp_name'];
$file_type=$_FILES['image']['type'];
$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

$expensions= array("jpeg","jpg","png","pdf","doc","docx");

if(in_array($file_ext,$expensions)=== false){
	$errors[]="extension not allowed, please choose a JPEG or PNG file.";
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

// Check if file already exists
if (file_exists($target_file)) {
	$errors[]= "Sorry, file already exists.";
	
}


if($file_size > 2097152){
	$errors[]='File size must be excately 2 MB';
}

if(empty($errors)==true){
	if( move_uploaded_file($file_tmp,"uploads/".$file_name))
	{	echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
        $sql =  $conn->prepare("INSERT INTO notices (title, date,file)
        VALUES (?, ? ,?)");
        
        $sql->bind_param('sss', $ntitle,$ndate,$target_file);
       
        
        if ($sql->execute() === TRUE) {
        		echo "New record created successfully";
        	header('Location: admin_main.php');
        	
        	
        } else {
        	echo "Error";
        }
	}
}else{
	print_r($errors);
}

}
?>