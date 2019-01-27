<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
		      alert('user baru berhasil ditambahkan!');
		      </script>";
	} else {
		echo mysqli_error($conn);
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<style>
		 label {
		 	display: block;
		 }

          *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}

body{
    background: #c0c0c0;
}

div.konten{
    background: #ffffff;
    width: 350px;
    margin: 60px auto 0;
    border-radius: 16px;
    min-height: 256px;
    overflow: hidden;
}

div.kepala{
    background: #f85252;
    padding: 10px 22px;
    height: 60px;
}

div.kepala h2.judul{
    color: #fff;
    font-weight: normal;
    line-height: 40px;
    display: inline-block;
}

div.lock{
    background-image: url("lock.png");
    background-position: center;
    background-size: 38px;
    display: inline-block;
    width: 25px;
    height: 25px;
    margin-top: 8px;
    float: left;
    margin-right: 10px;
}

div.artikel{
    padding:10px 22px 0;
    color: #808080;
}

div.artikel div.grup{
    margin: 16px 0;
}

div.artikel div.grup label,
div.artikel div.grup input{
    display: block;
}

div.artikel div.grup label{
    font-size: 13px;
    margin-bottom: 10px;
}

div.artikel div.username input[type="text"],
div.artikel div.password input[type="password"],
div.artikel div.konfirmasi input[type="password"] {
    width: 100%;
    height: 30px;
    padding: 0 10px;
    background: #eeeeee;
    border:none;
    color: #808080;
}

h1 {
  padding-top: 20px;
}
	</style>
</head>
<body>
    
	<h1 align="center">Halaman Registrasi</h1>

    <div class="konten">
      <div class="kepala">
          <div class="lock"></div>
          <h2 class="judul">Sign Up</h2>
        </div>
        <div class="artikel">
	<form action="" method="post">
		
      <ul>
        <div class="username">
      	 <li>
      		 <label for="username">Username :</label>
      		 <input type="text" name="username" id="username" placeholder="Masukan Username">
      	 </li>
         </div>

        <div class="password">
      	   <li>
      		 <label for="password">Password :</label>
      		 <input type="password" name="password" id="password" placeholder="Masukan Password">
      	 </li>
         </div>
         
         <div class="konfirmasi">
      	 <li>
      		 <label for="password2">Konfirmasi Password :</label>
      		 <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password">
      	 </li>
         </div>
      	 <li>
         <br>
      	 	<button type="submit" name="register">Sign Up!</button>
      	 </li>
      </ul>
      <br>
       <p><a href="login.php">Login</a></p>
         <br>
      <br>
	</form>
</div>
</div>

</body>
</html>