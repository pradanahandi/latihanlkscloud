<?php
@session_start(); 
include '../config/config.php';
date_default_timezone_set("Asia/Jakarta");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if(!isset($_SESSION['uid'])){
echo"<script>alert('Anda Tidak Memiliki Akses ! Silahkan Login Terlebih Dahulu');document.location.href='login.php';</script>";
}
?>

<?php if($_GET['data']=="home") {?>

   
        <div class="container-fluid">
            <div class="block-header">
                <h2>Beranda | RentalMobil.com</h2>
            </div>    

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="alert bg-green alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Selamat Datang</strong> | Halaman Admin RentalMobil.com !
                    </div>
                </div>
            </div>

            <div class="row clearfix">
            </div>

        </div>

 <?php } else { ?> 

    <div class="four-zero-four-container">
        <div class="error-code">404</div>
        <div class="error-message">This page doesn't exist</div>
        <div class="button-place">
            <a href="javascript:history.back()" class="btn btn-default btn-lg waves-effect">Kembali</a>
        </div>
    </div>

 <?php } ?>