<?php require_once "view/head.php"; ?>
  
  <?php require_once "view/sidebar.php"; ?>

    <h2>Data Anggota Nasabah</h2>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
	  Tambah Data
	</button>

    <br><br>
    <div class="table-responsive">
      	<table class="table table-sm">
      		<tr>
      			<th>#</th>
      			<th>KTP</th>
      			<th>Nama Nasabah</th>
      			<th>Tempat, Tanggal Lahir</th>
      			<th>Jenis Kelamin</th>
      			<th>Alamat</th>
      			<th>Status</th>
      		</tr>
      		<?php 
      			$no = 1;
      			$query = mysqli_query($connect, "SELECT * FROM nasabah"); 
      			while($row = mysqli_fetch_array($query)){
      		?>
      		<tr>
      			<td><?= $no++ ?></td>
      			<td><?= $row['ktp'] ?></td>
      			<td><?= $row['nama_nasabah'] ?></td>
      			<td><?= $row['tempat_lahir'] ?>, <?= $row['tanggal_lahir'] ?></td>
      			<td><?= $row['jenis_kelamin'] ?></td>
      			<td><?= $row['alamat'] ?></td>
      			<td><?= $row['status'] ?></td>
      		</tr>
      		<?php } ?>
      	</table>
    </div>
	<!-- Modal Add -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	     
	      <div class="modal-body">
	      	<h5>Form Tambah Data Nasabah</h5>
	       <form action="proses/add_data.php?id=nasabah" method="post">
		       <table class="table">
			       	<tr>
			       		<td>KTP </td>
			       		<td>: </td>
			       		<td><input type="text" class="form-control" name="ktp"></td>
			       	</tr>
			       	<tr>
			       		<td>Nama </td>
			       		<td>: </td>
			       		<td><input type="text" class="form-control" name="nama_nasabah"></td>
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
			       		<td>Status </td>
			       		<td>: </td>
			       		<td>
			       			<select name="status">
			       				<option value="">- Pilih -</option>
			       				<option value="1"> Active </option>
			       				<option value="0"> Not Active</option>
			       			</select>
			       		</td>
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