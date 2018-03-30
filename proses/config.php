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
	
	function pesan($tipe,$isi,$header=null){
		$_SESSION[$tipe] = $isi;
		if(!empty($header)){
			header("location:$header");
			exit;
		}
	}

	function msghandling($arr=array("danger","success","warning")){
		foreach($arr as $r){
			if(isset($_SESSION[$r])){
				echo "
				<div class='alert alert-$r'>
					<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
					<strong>$_SESSION[$r]</strong>
				</div>";
				unset($_SESSION[$r]);
			}
		}
	}
	
 ?>