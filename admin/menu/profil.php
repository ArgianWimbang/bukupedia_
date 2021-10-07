<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Profil Admin</h3>

		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h5>Informasi tentang Admin</h5>
					</div>
					<div class="panel-body">
						<table class="table" cellpadding="8" cellspacing="8">
							<tr>
								<th>Nama</th> <td>:</td> <td><?php echo $profil['nama']; ?></td>
							</tr>
							<tr>
								<th>Alamat</th> <td>:</td> <td><?php echo $profil['alamat']; ?></td>
							</tr>
							<tr>
								<th>Telepon</th> <td>:</td> <td><?php echo $profil['telepon']; ?></td>
							</tr>							
						</table>
						<a class="btn btn-sm btn-primary" href="?menu=edit_profil">Edit Data</a>
					</div> 
				</div> 
			</div> 
		

		<div class="col-md-6">
			<div class="panel panel-info">
					<div class="panel-heading">
						<h5>Edit Username atau Password</h5>
					</div>
					<div class="panel-body">
						<fieldset>
							<legend>Edit Username</legend>
							<form class="form" method="post">
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">Username saat Ini</span>
								  <input type="text" readonly class="form-control" value="<?php echo $profil['username']; ?>" aria-describedby="basic-addon1">
								</div>
								<br>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">Username Baru</span>
								  <input type="text" name="userbaru" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
								</div>
								<br>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">Password Anda</span>
								  <input type="text" name="pass" class="form-control" placeholder="Password Anda" aria-describedby="basic-addon1">
								</div>
								<br>
								  <input type="submit" name="edit_user" value="Save" class="btn btn-sm btn-success">

							</form>

							<!-- fungsi edit user -->
							<?php 
								if (isset($_POST['edit_user'])) {
									$userbaru = $_POST['userbaru'];
									$pass = $_POST['pass'];
									if (md5($pass)==$profil['password']) {
										mysqli_query($koneksi, "UPDATE tb_kasir set username='$userbaru' WHERE id_kasir = '$profil[id_kasir]'");
							?>

										<script type="text/javascript">
											alert('Username Berhasil Di Ubah ! Silahkan Login Kembali');
											document.location.href="../inc/keluar.php";
										</script>

										<?php	 
									}
									else {
										echo "Password anda Salah";
									}
								}
							 ?>

						</fieldset>

						<hr>
						<fieldset>
							<legend>Edit Password</legend>
							<form class="form" method="post">
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">Password Baru</span>
								  <input type="password" name="pass1" class="form-control" placeholder="Password Baru" aria-describedby="basic-addon1">
								</div>
								<br>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">Konfirmasi Password Baru</span>
								  <input type="password" name="pass2" class="form-control" placeholder="Konfirmasi Password Baru" aria-describedby="basic-addon1">
								</div>
								<br>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">Password Anda Saat Ini</span>
								  <input type="password" name="pass_awal" class="form-control" placeholder="Password Anda Saat Ini" aria-describedby="basic-addon1">
								</div>
								<br>
								  <input type="submit" name="edit_password" value="Save" class="btn btn-sm btn-success">

							</form>

							<!-- fungsi edit user -->
							<?php 
								if (isset($_POST['edit_password'])) {
									$pass1 = md5($_POST['pass1']);
									$pass2 = md5($_POST['pass2']);
									$pass = $_POST['pass_awal'];
									if ($pass1 != $pass2) {
										echo "password konfirmasi tidak cocok";
									}
									else {
										if (md5($pass)==$profil['password']) {
										mysqli_query($koneksi,"UPDATE tb_kasir SET password='$pass1' WHERE id_kasir='$profil[id_kasir]'");
										?>

										<script type="text/javascript">
											alert('Password Berhasil Di Ubah ! Silahkan Login Kembali');
											document.location.href="../inc/keluar.php";
										</script>

										<?php	 
									}
									else {
										echo "Password anda Salah";
									}
									}
								}
							 ?>

						</fieldset>

					</div>
				</div>
			</div>
		</div>
</body>
</html>