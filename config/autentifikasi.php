<?php             
session_start();
date_default_timezone_set("Asia/Jakarta");
include("config.php");

      if($_POST){

        $email_user = $_POST['email_user'];
        $password = $_POST['password'];
        $MD5 = MD5($password);
        $_SESSION['uid'] = $email_user;
        $sql = mysqli_query($conn, "SELECT * FROM `t_user` WHERE `email_user` LIKE '$email_user' AND `password` LIKE '$MD5'");
        $row = mysqli_fetch_array($sql);
        $_SESSION['iduser'] = $row['id_user'];
        $_SESSION['level'] = $row['level_user'];
        $_SESSION['nama'] = $row['nama_user'];

          if ($row['level_user'] == 'admin' && $row['akses'] == 'on'){
            echo"<script>alert('Login Berhasil ! Anda Masuk Sebagai Admin');document.location.href='../index.php?page=home&data=home';</script>";
          }
          elseif ($row['level_user'] == 'customer' && $row['akses'] == 'on'){
            echo"<script>alert('Login Berhasil ! Selamat Datang $_SESSION[nama]');document.location.href='../index.php?page=homemobil&data=homemobil';</script>";
          }
          else{
            echo"<script>alert('Anda Tidak Bisa Akses Halaman Admin ! Silahkan Cek Kembali Akun Anda');document.location.href='../login.php';</script>";
          }
      
      }

?>