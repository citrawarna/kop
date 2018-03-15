<?php require_once "view/head.php"; ?>
  
  <?php require_once "view/sidebar.php"; ?>

    <h2>Data Angsuran Peminjaman</h2>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
	  Tambah Data
	</button>

    <br><br>
    <div class="table-responsive">
      	<table class="table table-sm">
      		<tr>
      			<th>#</th>
      			<th>Tanggal Angsur</th>
      			<th>Nama Nasabah</th>
      			<th>Jumlah Angsur</th>
      			<th>Total Pinjaman</th>
      			<th>Sisa Pinjaman</th>
      			<th>Jangka Angsuran</th>
      			<th>Keterangan</th>
      		</tr>
      		<?php 
      			$no = 1;
      			$query = mysqli_query($connect, "SELECT * FROM detail_angsuran 
      				INNER JOIN peminjaman ON peminjaman.id_peminjaman=detail_angsuran.id_peminjaman 
      				INNER JOIN nasabah ON nasabah.id_nasabah=peminjaman.id_nasabah
      				INNER JOIN angsuran ON angsuran.id_angsuran=peminjaman.id_angsuran "); 
      			while($row = mysqli_fetch_array($query)){
      		?>
      		<tr>
      			<td><?= $no++ ?></td>
      			<td><?= $row['tanggal_angsur'] ?></td>
      			<td><?= $row['nama_nasabah'] ?></td>
      			<td><?= $row['jumlah_angsur'] ?></td>
      			<td><?= $row['jumlah'] ?></td>
      			<td><?= $row['sisa_pinjaman'] ?></td>
      			<td><?= $row['bulan'] ?> Bulan</td>
      			<td><?= $row['keterangan_angsuran'] ?></td>
      		</tr>
      		<?php } ?>
      	</table>
    </div>
	<!-- Modal Add -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	     
	      <div class="modal-body">
	      	<h5>Form Angsuran</h5>
	       <form action="proses/add_data.php?id=angsuran" method="post">
		       <table class="table">
		       		<tr>
			       		<td>Tanggal Angsur </td>
			       		<td>: </td>
			       		<td><input type="text" class="form-control" name="tanggal_angsur" value="<?= date('Y-m-d'); ?>"></td>
			       	</tr>
			       	<tr>
			       		<td>Nama Nasabah </td>
			       		<td>: </td>
			       		<td>
			       			<select name="id_peminjaman" class="form-control">
			       			<?php $query = mysqli_query($connect, "SELECT * FROM peminjaman INNER JOIN nasabah on nasabah.id_nasabah=peminjaman.id_nasabah  WHERE lunas='n'"); ?>
			       				<option value=""> - Pilih - </option>
			       				<?php while ($peminjaman = mysqli_fetch_array($query)){ ?>
			       				<option value="<?= $peminjaman['id_peminjaman'] ?>"><?= $peminjaman['nama_nasabah'] ?></option>
			       				<?php } ?>
			       			</select>
			       		</td>
			       	</tr>
			       	
			       	<tr>
			       		<td>Jumlah Angsur </td>
			       		<td>: </td>
			       		<td><input type="text" class="form-control" name="jumlah_angsur"></td>
			       	</tr>
			       	<tr>
			       		<td>Keterangan </td>
			       		<td>: </td>
			       		<td><input type="text" class="form-control" name="keterangan_angsuran"></td>
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