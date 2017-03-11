<?php
session_start();
unset($_SESSION['user_id']);
if(session_destroy())
{
header("Location: admin_login.html");
}
?>


