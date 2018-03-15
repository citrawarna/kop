<?php 
	$link = "$_SERVER[REQUEST_URI]";
    $url = '/kop/'; //url ini dirubah sesuai nama domain

    //konek database
    $dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'kop';

	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Koneksi ke database gagal'); 


	function cek_login(){
		session_start();
		if(empty($_SESSION['username'])){
			echo "<script>alert('Silahkan Login terlebih dahulu!'); location.href='index.php'</script>";
		}
	}
	
	
 ?>