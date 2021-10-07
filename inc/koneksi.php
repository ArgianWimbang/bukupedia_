<?php

	$koneksi = mysqli_connect("localhost","root","","toko_buku");
	 if ($koneksi) {
	 	echo "Koneksi Berhasil !";
	}
	 else
	 {
	 	echo "Koneksi Gagal !";
	 }
?>
