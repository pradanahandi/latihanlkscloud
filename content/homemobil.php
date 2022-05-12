<?php
@session_start(); 
include '../config/config.php';
date_default_timezone_set("Asia/Jakarta");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if(!isset($_SESSION['uid'])){
echo"<script>alert('Anda Tidak Memiliki Akses ! Silahkan Login Terlebih Dahulu');document.location.href='login.php';</script>";
}
?>

<?php if($_GET['data']=="homemobil") {?>

   
    <div class="container-fluid">
        <div class="block-header"><h2>Beranda | RentalMobil.com | <?php echo "Local IP Address : ".getHostByName(getHostName());?></h2></div>
            <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Pilihan Mobil untuk Anda
                            <small>Silahkan Pilih Mobil yang Tersedia.</small>
                        </h2>
                    </div>
                    <div class="body">

                        <!-- MODAL PESAN MOBIL -->
                            <div class="modal fade" id="PesanMobil" tabindex="-1" role="dialog" data-backdrop="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Pesan Mobil</h4><hr>
                                        </div>
                                        <div class="modal-body">
                                            <div class="fetch-PesanMobil"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- MODAL PESAN MOBIL -->

                        <div class="row">
                            <?php
                                $hasil = mysqli_query($conn, "SELECT * FROM `t_mobil` ORDER BY merk_mobil ASC");
                                while ($data = mysqli_fetch_array($hasil)) {
                                
                                    echo '<div class="col-sm-6 col-md-4">';
                                        echo '<div class="thumbnail">';
                                            echo '<img src="images/mobil/'.$data['gambar'].'">';
                                            echo '<div class="caption">';
                                                echo '<h3>'.$data['merk_mobil'].' '.$data['nama_mobil'].'</h3>';
                                                echo '<h5>Harga Sewa : Rp. ' . number_format($data['harga_sewa']) . ' ,- / Hari</h5>';
                                                echo '<p align=center>';
                                                if($data['status_mobil']=='0'){
                                                    echo "<span class='badge bg-green'>Mobil Tersedia</span><br><br>";
                                                    echo '<a href="#PesanMobil" class="btn btn-info waves-effect" role="button" data-toggle="modal" data-id="'.$data['id_mobil'].'">Pesan Sekarang</a>';
                                                }
                                                else{
                                                     echo "<span class='badge bg-red'>Tidak Tersedia</span><br><br>";
                                                    echo '<a href="" class="btn btn-info waves-effect" disabled="disabled">Pesan Sekarang</a>';
                                                }
                                                echo '</p>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
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