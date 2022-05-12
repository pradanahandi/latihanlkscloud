<?php

@session_start();
include '../admin/data/koneksi.php';
include '../admin/data/fungsi.php';
date_default_timezone_set("Asia/Jakarta");

if($_SESSION["Captcha"]!=$_POST["nilaiCaptcha"]){

	header("location:../bukutamu.php?pesan=salah");

}else{		

	$id_tamu = $_POST['id_tamu'];
  	$nik = $_POST['nik'];
  	$nama = $_POST['nama'];
  	$jenis_kelamin = $_POST['jenis_kelamin'];
  	$no_telp = $_POST['no_telp'];
  	$alamat = $_POST['alamat'];
  	$id_keperluan = $_POST['id_keperluan'];
  	$waktu = date("Y-m-d H:i:s");
   
    $sql = "INSERT INTO `daftar_tamu`(`id_tamu`,`nik`,`nama`,`jenis_kelamin`,`no_telp`,`alamat`,`id_keperluan`,`waktu`) VALUES ('$id_tamu','$nik','$nama','$jenis_kelamin','$no_telp','$alamat','$id_keperluan','$waktu')";
    if(mysql_query($sql)){
        echo '<script language="javascript">alert("Data Berhasil disimpan !"); 
      document.location="../berhasil.php";</script>';
    }else{
        echo '<script language="javascript">alert("Data Error !"); 
      document.location="../bukutamu.php";</script>';
    }

}

?>