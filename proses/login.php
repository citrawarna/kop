<?php 
include "config.php";

$username = $_POST['username'];
$password = sha1($_POST['password']);

$login = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
$row = mysqli_fetch_array($login);

if($row){
	session_start();
	$_SESSION['id_user'] = $row['id_user'];
	$_SESSION['username'] = $row['username'];
	header("location:../dashboard.php");
} else {
	echo "<script>alert('username atau password salah'); location.href='../index.php'</script>";
}


 ?>