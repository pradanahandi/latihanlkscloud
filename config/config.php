<?php 
  date_default_timezone_set("Asia/Jakarta");
  $host = "localhost";
  $user = "root";
  $pass = "";
  $db   = "rental";    
  $conn = mysqli_connect($host,$user,$pass,$db);
  if($conn->connect_errno)
  {
    echo "Koneksi database error". $conn->connect_error;
  }           
?>


<?php
// error_reporting(0);
// date_default_timezone_set("Asia/Jakarta");
// $con=mysql_connect("localhost","root","");
// $db=mysql_select_db("rental_mobil");
// if(!$con){
// echo"Tidak Dapat terkoneksi ke Server";
// }
// else{
// 	echo"Berhasil terkoneksi ke Server !";
// }
// if(!$db){
// echo"Tidak Dapat Memilih database/Database tidak ada";
// }
// else{
// 	echo"Berhasil terkoneksi ke Database !";
// }
// $pdo = new PDO('mysql:host='.'localhost'.';dbname='.'rental-mobil', 'root', '');
?>