<?php
@session_start(); 
include 'config/config.php';
date_default_timezone_set("Asia/Jakarta");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if(!isset($_SESSION['uid'])){
echo"<script>document.location.href='homemobil.php?page=mobilhome&data=mobilhome';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>RentalMobil</title>
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
    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <!-- Bootstrap DatePicker Css -->
    <link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />
    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="crossorigin=""></script>

</head>
<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Yakin Hapus Data ini ?");
 if (tanya == true) return true;
 else return false;
 }</script>
<body class="theme-blue">
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-light-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div> -->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php?page=home&data=home"><b>RentalMobil.com</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b><?php echo $_SESSION['nama']; ?></b></div>
                    <div class="email"><?php echo $_SESSION['uid']; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            keyboard_arrow_down
                        </i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i><?php echo $_SESSION['nama']; ?></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php"><i class="material-icons">input</i>Keluar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->

            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU</li>

                    <!-- ADMIN -->
                    <?php if ($_SESSION['level'] == 'admin') { ?>
                        <!----------------------------------------------- BERANDA ----------------------------------------------->
                        <li <?php if($_GET['data']=='home'){ echo "class=active"; } ?>>
                            <a href="?page=home&data=home">
                                <span>BERANDA</span>
                            </a>
                        </li>
                        <!----------------------------------------------- BERANDA ----------------------------------------------->
                        
                        <!----------------------------------------------- TRANSAKSI MOBIL --------------------------------------->
                        <li <?php if($_GET['data']=='transaksimobil'){ echo "class=active"; } ?>>
                            <a href="?page=transaksimobil&data=transaksimobil">
                                <span>TRANSAKSI</span>
                            </a>
                        </li>
                        <!----------------------------------------------- TRANSAKSI MOBIL --------------------------------------->

                        <!----------------------------------------------- LAPORAN TRANSAKSI --------------------------------------->
                        <li <?php if($_GET['data']=='laporantransaksi'){ echo "class=active"; } ?>>
                            <a href="?page=laporantransaksi&data=laporantransaksi">
                                <span>LAPORAN TRANSAKSI</span>
                            </a>
                        </li>
                        <!----------------------------------------------- LAPORAN TRANSAKSI --------------------------------------->

                        <!----------------------------------------------- BUKTI BAYAR ----------------------------------------------->
                        <li <?php if($_GET['data']=='konfirmasi'){ echo "class=active"; } ?>>
                            <a href="?page=konfirmasi&data=konfirmasi">
                                <span>KONFIRMASI BAYAR</span>
                            </a>
                        </li>
                        <!----------------------------------------------- BUKTI BAYAR ----------------------------------------------->

                        <!----------------------------------------------- MOBIL ----------------------------------------------->
                        <li <?php if($_GET['data']=='mobil'){ echo "class=active"; } ?>>
                            <a href="?page=mobil&data=mobil">
                                <span>MOBIL</span>
                            </a>
                        </li>
                        <!----------------------------------------------- MOBIL ----------------------------------------------->

                        <!----------------------------------------------- LACAK ----------------------------------------------->
                        <li <?php if($_GET['data']=='lacakmobil'){ echo "class=active"; } ?>>
                            <a href="?page=lacakmobil&data=lacakmobil">
                                <span>LACAK MOBIL</span>
                            </a>
                        </li>
                        <!----------------------------------------------- LACAK ----------------------------------------------->

                        <!----------------------------------------------- USER ----------------------------------------------->
                        <li <?php if($_GET['data']=='user'){ echo "class=active"; } ?>>
                            <a href="?page=user&data=user">
                                <span>CUSTOMER</span>
                            </a>
                        </li>
                        <!----------------------------------------------- USER ----------------------------------------------->
                    <?php } ?>
                    <!-- ADMIN -->

                    <!-- USER -->
                    <?php if ($_SESSION['level'] == 'customer') { ?>
                        <!----------------------------------------------- BERANDA ----------------------------------------------->
                        <li <?php if($_GET['data']=='homemobil'){ echo "class=active"; } ?>>
                            <a href="?page=homemobil&data=homemobil">
                                <span>BERANDA</span>
                            </a>
                        </li>
                        <!----------------------------------------------- BERANDA ----------------------------------------------->
                        
                        <!----------------------------------------------- TRANSAKSI ----------------------------------------------->
                        <li <?php if($_GET['data']=='transaksi'){ echo "class=active"; } ?>>
                            <a href="?page=transaksi&data=transaksi">
                                <span>RIWAYAT TRANSAKSI</span>
                            </a>
                        </li>
                        <!----------------------------------------------- TRANSAKSI ----------------------------------------------->

                        <!----------------------------------------------- LACAK ----------------------------------------------->
                        <li <?php if($_GET['data']=='lacakmobil'){ echo "class=active"; } ?>>
                            <a href="?page=lacakmobil&data=lacakmobil">
                                <span>LACAK MOBIL</span>
                            </a>
                        </li>
                        <!----------------------------------------------- LACAK ----------------------------------------------->

                        <!----------------------------------------------- PROFILE ----------------------------------------------->
                        <li <?php if($_GET['data']=='profile'){ echo "class=active"; } ?>>
                            <a href="?page=profile&data=profile">
                                <span>PROFILE ANDA</span>
                            </a>
                        </li>
                        <!----------------------------------------------- PROFILE ----------------------------------------------->
                    <?php } ?>
                    <!-- USER -->

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    Copyright &copy; <a href="javascript:void(0);">RentalMobil.com</a>
                </div>
                <div class="version">
                    Date Version: <b><?php echo '' . date('d F Y')?></b>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <!-- CONTENT HERE -->
    <section class="content"> 

    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page){
          
            case 'home':
                include "content/home.php";
                break;

            case 'transaksimobil':
                include "content/transaksimobil.php";
                break;

            case 'laporantransaksi':
                include "content/laporantransaksi.php";
                break;

            case 'konfirmasi':
                include "content/konfirmasi.php";
                break;

            case 'mobil':
                include "content/mobil.php";
                break;
                             
            case 'lacakmobil':
                include "content/lacakmobil.php";
                break;
                             
            case 'user':
                include "content/user.php";
                break;

            case 'homemobil':
                include "content/homemobil.php";
                break;

            case 'transaksi':
                include "content/transaksi.php";
                break;

            case 'profile':
                include "content/profile.php";
                break;

            case 'tambah':
                include "content/tambah.php";
                break;
            case 'ubah':
                include "content/ubah.php";
                break;
            case 'hapus':
                include "content/hapus.php";
                break;
        }
    }
    ?>    

    </section>
    <!-- CONTENT HERE -->

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Custom Js -->
    <script src="js/pages/forms/basic-form-elements.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/script.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>
    <script src="js/pages/ui/modals.js"></script>

    <script src="//cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>
    
    <!-- Demo Js -->
    <!-- <script src="js/demo.js"></script> -->
    <!-- <script src="jquery.js"></script> -->

</body>

</html>