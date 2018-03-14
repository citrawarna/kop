<?php require_once "view/head.php"; ?>
  
  <?php require_once "view/sidebar.php"; ?>

    <h2>Data Staff User</h2>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
	  Tambah Staff
	</button>

    <br><br>
    <div class="table-responsive">
      	<table class="table table-sm">
      		<tr>
      			<th>#</th>
      			<th>Nama</th>
      			<th>Username</th>
      			<th>Tempat, Tanggal Lahir</th>
      			<th>Jenis Kelamin</th>
      			<th>Alamat</th>
      			<th>Email</th>
      			<th>Level</th>
      		</tr>
      		<?php 
      			$no = 1;
      			$query = mysqli_query($connect, "SELECT * FROM user"); 
      			while($row = mysqli_fetch_array($query)){
      		?>
      		<tr>
      			<td><?= $no++ ?></td>
      			<td><?= $row['nama'] ?></td>
      			<td><?= $row['username'] ?></td>
      			<td><?= $row['tempat_lahir'] ?>, <?= $row['tanggal_lahir'] ?></td>
      			<td><?= $row['jenis_kelamin'] ?></td>
      			<td><?= $row['alamat'] ?></td>
      			<td><?= $row['email'] ?></td>
      			<td><?= $row['level'] ?></td>
      		</tr>
      		<?php } ?>
      	</table>
    </div>
	<!-- Modal Add -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	     
	      <div class="modal-body">
	      	<h5>Form Tambah Data Staff User</h5>
	       <form action="proses/add_data.php?id=user" method="post">
		       <table class="table">
			       	<tr>
			       		<td>Nama </td>
			       		<td>: </td>
			       		<td><input type="text" class="form-control" name="nama"></td>
			       	</tr>
			       	<tr>
			       		<td>Username </td>
			       		<td>: </td>
			       		<td><input type="text" class="form-control" name="username"></td>
			       	</tr>
			       	<tr>
			       		<td>Password </td>
			       		<td>: </td>
			       		<td><input type="password" class="form-control" name="password"></td>
			       	</tr>
			       	<tr>
			       		<td>Tempat Lahir </td>
			       		<td>: </td>
			       		<td><input type="text" class="form-control" name="tempat_lahir"></td>
			       	</tr>
			       	<tr>
			       		<td>Tanggal Lahir </td>
			       		<td>: </td>
			       		<td><input type="text" class="form-control" name="tanggal_lahir"></td>
			       	</tr>
			       	<tr>
			       		<td>Jenis Kelamin </td>
			       		<td>: </td>
			       		<td>
			       			<input type="radio" value="Laki - Laki" name="jenis_kelamin"> Laki - Laki &nbsp;
			       			<input type="radio" value="Perempuan" name="jenis_kelamin"> Perempuan 
			       		</td>
			       	</tr>
			       	<tr>
			       		<td>Alamat </td>
			       		<td>: </td>
			       		<td><textarea name="alamat" class="form-control"></textarea></td>
			       	</tr>
			       	<tr>
			       		<td>Email </td>
			       		<td>: </td>
			       		<td><input type="text" class="form-control" name="email"></td>
			       	</tr>
			       	<tr>
			       		<td>level </td>
			       		<td>: </td>
			       		<td><input type="text" class="form-control" name="level"></td>
			       	</tr>
		       </table>
	       
	      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <input type="submit" class="btn btn-primary" value="Simpan">
		      </div>
	      </form>

	    </div>
	  </div>
	</div>
  
  <?php require_once "view/footer.php" ?>