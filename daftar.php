<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <title>Daftar | RentalMobil.com</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<?php
include 'config/config.php';
date_default_timezone_set('Asia/Jakarta');
if(isset ($_POST['daftar-user'])){

        $email_user = $_POST['email_user'];
        $sql = mysqli_query($conn, "SELECT * FROM `t_user` WHERE email_user='$email_user'");
        $rows = $sql->num_rows;
        //$rows = mysql_num_rows($sql);

        if($rows>0){
            echo '<script language="javascript">alert("Email Sudah di Gunakan !");
            document.location="daftar.php";</script>';
        }else{
            $nik_ktp = $_POST['nik_ktp'];
            $no_sim = $_POST['no_sim'];
            $nama_user = $_POST['nama_user'];
            $email_user = $_POST['email_user'];
            $no_hp = $_POST['no_hp'];
            $alamat = $_POST['alamat'];
            $password = $_POST['password'];
            
            $sqll = "INSERT INTO `t_user`(`nik_ktp`,`no_sim`,`nama_user`,`email_user`,`no_hp`,`alamat`,`password`,`level_user`,`akses`) VALUES ('$nik_ktp','$no_sim','$nama_user','$email_user','$no_hp','$alamat',MD5('$password'),'customer','on')";
            
            if(mysqli_query($conn, $sqll)){
                echo"<script>alert('Daftar Berhasil !');document.location.href='login.php';</script>";
            }else{
                echo"<script>alert('Daftar Gagal !');document.location.href='daftar.php';</script>";
            }

        }

    }
?>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Rental<b>Mobil.com</b></a>
            <small>https://www.rentalmobil.com</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="">
                    <div class="msg">Silahkan Isi untuk Mendaftar<br/><?php echo "Local IP Address : ".getHostByName(getHostName());?></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email_user" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>

                    <!-- <div class="input-group">
                        <img src="captcha/captcha.php" alt="gambar" width="100%" /><br><br>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nilaiCaptcha" id="nilaiCaptcha" placeholder="Konfirmasi Nomor Captcha" required>
                        </div>
                    </div> -->

                    <button class="btn btn-block btn-lg bg-pink waves-effect" name="daftar-user" id="daftar_user" type="submit" value="Submit">Daftar Sekarang
                    </button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="login.php">Sudah Punya Akun ?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
    <script>
        jQuery(function(){
            
            jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
                height: '600',
                loader: 'false',
                pagination: true,
                thumbnails: false,
                hover: false,
                playPause: false,
                navigation: false,
                opacityOnGrid: false,
                imagePath: 'assets/images/'
            });

        });
      
    </script>
</body>

</html>