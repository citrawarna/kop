<?php 
	include "config.php";

	switch ($_GET['id']) {
		case 'nasabah':
			$ktp = $_POST['ktp'];
			$nama_nasabah = $_POST['nama_nasabah'];
			$tempat_lahir = $_POST['tempat_lahir'];
			$tanggal_lahir = $_POST['tanggal_lahir'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$alamat = $_POST['alamat'];
			$status = $_POST['status'];
			

			$query = mysqli_query($connect, "INSERT INTO nasabah values ('', '$ktp', '$nama_nasabah',
				'$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$alamat', '$status')");

			if($query == true){
				echo "<script>alert('Data Berhasil ditambah'); location.href='../anggota.php'</script>";
			} else {
				echo "gagal";
			}

			break;

		case 'user':
			$nama = $_POST['nama'];
			$username = $_POST['username'];
			$password = sha1($_POST['password']);
			$tempat_lahir = $_POST['tempat_lahir'];
			$tanggal_lahir = $_POST['tanggal_lahir'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$alamat = $_POST['alamat'];
			$email = $_POST['email'];
			$level = $_POST['level'];

			$query = mysqli_query($connect, "INSERT INTO user VALUES ('', '$username', '$password', '$nama', 
				'$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$email', '$level')");

			if($query == true){
				echo "<script>alert('Data Berhasil ditambah'); location.href='../staff.php'</script>";
			} else {
				echo "gagal";
			}


			break;

		case 'peminjaman':
			$tanggal = $_POST['tanggal'];
			$id_nasabah = $_POST['id_nasabah'];
			$nama_peminjaman = $_POST['nama_peminjaman'];
			$jumlah = $_POST['jumlah'];
			$id_angsuran = $_POST['id_angsuran'];
			$id_user = $_POST['id_user'];
			$keterangan = $_POST['keterangan'];

			$insert = mysqli_query($connect, "INSERT INTO peminjaman 
				(tanggal, id_nasabah, nama_peminjaman, jumlah, id_angsuran, id_user, keterangan)
				VALUES 
				('$tanggal', '$id_nasabah','$nama_peminjaman','$jumlah','$id_angsuran', '$id_user', '$keterangan')");
			
			$update = mysqli_query($connect, "UPDATE nasabah SET status='0' WHERE id_nasabah = '$id_nasabah' ");

			if($insert == true) {
				echo "insert sukses";
			} else {
				echo "gagal";
			}

			break;
		
		default:
			# code...
			break;
	}
 ?>