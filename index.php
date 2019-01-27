<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}



require 'functions.php';
$siswa = query("SELECT * FROM siswa");

//tombol cari ditekan
if ( isset($_POST["cari"]) ) {
	$siswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<style>
		.loader {
			width: 80px;
			position: absolute;
			top: 153px;
			left: 280px;
			z-index: -1;
			display: none;
		}

	

	</style>
 <script src="js/jquery-3.3.1.min.js"></script> 
 <script src="js/script.js"></script>
</head>
<body>

 <a href="logout.php">Logout</a>	

 <hr>
 <h1>Daftar Siswa</h1>
 <hr>

 <a href="tambah.php">Tambah data siswa</a>
 <br><br>


 <form action="" method="post" enctype="multipart/form-data">
 	
<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian.." autocomplete="off" id="keyword">
<button type="submit" name="cari" id="tombol-cari">Cari!!</button>
<img src="img/loader.gif" class="loader">

 </form>
 <br>
 <div id="container">

 <table border="1" cellpadding="10" cellspacing="0">

	 <tr>
	 	<th>No.</th>
	 	<th>Aksi</th>
	 	<th>Gambar</th>
	 	<th>NRP</th>
	 	<th>Nama</th>
	 	<th>Email</th>
	 	<th>Jurusan</th>
	 </tr>

     <?php $i = 1; ?>
	 <?php foreach( $siswa as $row) : ?>
	 <tr>
	 	<td><?= $i; ?></td>
	 	<td>
	 		<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a>
	 		<a href="hapus.php?id=<?= $row["id"]; ?>" onclick=" return confirm('yakin?');">hapus</a>
	 	</td>
	 	
	 	<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
	    <td><?= $row["nrp"]; ?></td>
	    <td><?= $row["nama"]; ?></td>
	    <td><?= $row["email"]; ?></td>
	    <td><?= $row["jurusan"]; ?></td>
	 </tr>
	 
	 <?php $i++; ?>	
     <?php endforeach; ?>
	

 </table>
</div>


</body>
</html>


