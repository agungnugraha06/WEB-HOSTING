<?php 
session_start();
require 'functions.php';

//cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
   $id = $_COOKIE['id'];
   $key = $_COOKIE['key'];


   //ambil username berdasarkan id
   $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
   $row = mysqli_fetch_assoc($result);

   //cek cookie dan username
   if( $key === hash('sha256', $row['username']) ) {
    $_SESSION['login'] = true;

   }

}

if( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}




 if(isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");

    //cek username
    if( mysqli_num_rows($result) === 1 ) {


      //cek password
    	$row = mysqli_fetch_assoc($result);
    	if( password_verify($password, $row["password"]) ) {
            //set session
            $_SESSION["login"] = true;

            //cek remember me
            if( isset($_POST['remember']) ) {
                //buat cookie
                setcookie('id',$row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
            }


    		header("Location: index.php");
    		exit;
    	}
     }

     $error = true;

 }





 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
  <style>
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
div.artikel div.password input[type="password"]{
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

<h1 align="center">Halaman Login</h1>


  <div class="konten">
        <div class="kepala">
            <div class="lock"></div>
            <h2 class="judul">Sign In</h2>
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

         <div class="remember">     
          <li>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me </label>
         </li>
        </div>  
       
       <br>
       <div class="login">
     	 <li>
     	 	<button type="submit" name="login">Login</button>
     	 </li>
      </div>
        <br>
        <?php  if( isset($error) ) : ?>
          <p style="color: red; font-style:italic;">username / password salah!</p>
        <?php endif; ?>
         <br>
          </ul>
          <p><a href="registrasi.php">Belum Daftar?</a></p>
          <br>

      </form>
   </div>
</div>

</body>
</html>