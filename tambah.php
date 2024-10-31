<?php
	include "koneksi.php";

	if (isset($_POST['btnSimpan'])) 
	{
		$nokartu	= $_POST['nokartu'];
		$nama		= $_POST['nama'];
		$alamat		= $_POST['alamat'];

		$simpan		= mysqli_query($konek, "insert into karyawan(nokartu, nama, alamat)values('$nokartu', '$nama', '$alamat')");

		if ($simpan) 
		{
			echo "
				<script>
					alert('Tersimpan');
					location.replace('datakaryawan.php');
				</script>
			";
		}
		else
		{
			echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('datakaryawan.php');
				</script>
			";
		}
	}

	mysqli_query($konek, "delete from tmprfid");
?>


<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Tambah Data Karyawan</title>

	<script type="text/javascript">
		$(document).ready(function() 
		{
			setInterval(function()
			{
				$("#norfid").load('nokartu.php')
			}, 0);
		});
	</script>
</head>
<body>

	<?php include "menu.php"; ?>

	<div class="container-fluid">
		<h3>Tambah Data Karyawan</h3>

		<form method="POST">
			<div class="form-group">
				<label>No. Kartu</label>
				<input type="text" name="nokartu" id="nokartu" placeholder="nomor kartu RFID" class="form-control" style="width: 200px">
			</div>

			<div class="form-group">
				<label>Nama Karyawan</label>
				<input type="text" name="nama" id="nama" placeholder="Nama Karyawan" class="form-control" style="width: 400px">
			</div>

			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" style="width: 400px"></textarea>
			</div>

			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>