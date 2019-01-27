<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}


require 'functions.php';

//ambil data di url
$id = $_GET["id"];

//query data siswa berdasarkan id
$sw = query("SELECT * FROM siswa WHERE id = $id")[0];

//koneksi ke DBMS
$conn = mysqli_connect("sql107.epizy.com","epiz_23012186","dFYcfpZwon","epiz_23012186_phpagung");


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
      // cek apakah data berhasil ditambahkan atau tidak
       if( ubah ($_POST) >  0 ) {
         echo "
             <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
             </script>
         ";

       } else {
       	  echo "
       	      <script>
                alert('data gagal diubah!');
                document.location.href = 'index.php';
             </script>
         ";
       }
     
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Ubah data siswa</title>
    <style>
         label {
            display: block;
         }

        body {
            background: #c0c0c0;
        }
    </style>
</head>
<body>
     <hr>
     <h1>Ubah data siswa</h1>
     <hr>
     <form action="" method="post" enctype="multipart/form-data">
     <input type="hidden" name="id" value="<?= $sw["id"]; ?>">
     <input type="hidden" name="gambarlama" value="<?= $sw["gambar"]; ?>">
        <ul>
        	<li>
        	    <label for="nrp">NRP : </label>
        		<input type="text" name="nrp" id="nrp" required value="<?= $sw["nrp"]; ?>">
        	</li>
        	<li>
        	    <label for="nama">Nama : </label>
        		<input type="text" name="nama" id="nama" required value="<?= $sw["nama"]; ?>">
        	</li>
        	<li>
        	    <label for="email">Email : </label>
        		<input type="text" name="email" id="email" value="<?= $sw["email"]; ?>">
        	</li>
        	<li>
        	    <label for="jurusan">Jurusan : </label>
        		<input type="text" name="jurusan" id="jurusan" value="<?= $sw["jurusan"]; ?>">
        	</li>
        	<li>
        	    <label for="gambar">Gambar : </label><br>
                <img src="img/<?= $sw['gambar']; ?>" width="60"><br>
        		<input type="file" name="gambar" id="gambar">
        	</li>
        	<li>
        		<button type="submit" name="submit">Ubah Data!</button>
        	</li>

        </ul>     	


     </form>

</body>
</html>