<?php require_once "view/head.php"; ?>
  
  <?php require_once "view/sidebar.php"; ?>

    <h2>Data Peminjaman</h2>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
	  Tambah Data
	</button>

	<?= msghandling() ?>
	
    <br><br>
    <div class="table-responsive">
      	<table class="table table-sm">
      		<tr>
      			<th>#</th>
      			<th>Nama Nasabah</th>
      			<th>Nama Pinjmana</th>
      			<th>Jumlah Pinjam</th>
      			<th>Tanggal Pinjam</th>
      			<th>Angsuran</th>
      			<th>Nama Petugas</th>
      			<th>Keterangan</th>
      		</tr>
      		<?php 
      			$no = 1;
      			$query = mysqli_query($connect, "SELECT * FROM peminjaman 
      				INNER JOIN user on user.id_user = peminjaman.id_user
      				INNER JOIN angsuran on angsuran.id_angsuran = peminjaman.id_angsuran 
      				INNER JOIN nasabah on nasabah.id_nasabah = peminjaman.id_nasabah "); 
      			while($row = mysqli_fetch_array($query)){
      		?>
      		<tr>
      			<td><?= $no++ ?></td>
      			<td><?= $row['nama_nasabah'] ?></td>
      			<td><?= $row['nama_peminjaman'] ?></td>
      			<td><?= $row['jumlah'] ?></td>
      			<td><?= $row['tanggal'] ?></td>
      			<td><?= $row['nama_angsuran'] ?></td>
      			<td><?= $row['nama'] ?></td>
      			<td><?= $row['keterangan'] ?></td>
      		</tr>
      		<?php } ?>
      	</table>
    </div>
	<!-- Modal Add -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	     
	      <div class="modal-body">
	      	<h5>Form Tambah Data Peminjaman</h5>
	       <form action="proses/add_data.php?id=peminjaman" method="post">
		       <table class="table">
		       
		       	<input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">
		       		<tr>
			       		<td>Tanggal </td>
			       		<td>: </td>
			       		<td><input type="text" class="form-control" name="tanggal" value="<?= date('Y-m-d') ?>"></td>
			       	</tr>
			       	<tr>
			       		<td>Nama Nasabah </td>
			       		<td>: </td>
			       		<td>
			       			<select name="id_nasabah" class="form-control">
			       			<?php $query = mysqli_query($connect, "SELECT * FROM nasabah WHERE status = 1 "); ?>
			       				<option value=""> - Pilih - </option>
			       				<?php while ($nasabah = mysqli_fetch_array($query)){ ?>
			       				<option value="<?= $nasabah['id_nasabah'] ?>"><?= $nasabah['nama_nasabah'] ?></option>
			       				<?php } ?>
			       			</select>
			       		
			       		</td>
			       	</tr>
			       	<tr>
			       		<td>Nama Peminjaman</td>
			       		<td>: </td>
			       		<td><input type="text" class="form-control" name="nama_peminjaman"></td>
			       	</tr>
			       	<tr>
			       		<td>Jumlah Pinjam </td>
			       		<td>: </td>
			       		<td><input type="text" class="form-control" name="jumlah"></td>
			       	</tr>
			       	<tr>
			       		<td>Jangka Angsuran </td>
			       		<td>: </td>
			       		<td>
			       			<select name="id_angsuran" class="form-control">
			       			<?php $query = mysqli_query($connect, "SELECT * FROM angsuran "); ?>
			       				<option value=""> - Pilih - </option>
			       				<?php while ($angsuran = mysqli_fetch_array($query)){ ?>
			       				<option value="<?= $angsuran['id_angsuran'] ?>"><?= $angsuran['nama_angsuran'] ?> - <?= $angsuran['bulan'] ?> Bulan </option>
			       				<?php } ?>
			       			</select>
			       		</td>
			       	</tr>
			       	<tr>
			       		<td>Keterangan </td>
			       		<td>: </td>
			       		<td><textarea name="keterangan" class="form-control"></textarea></td>
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