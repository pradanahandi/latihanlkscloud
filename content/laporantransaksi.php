<?php 
    if($_GET['data']=="laporantransaksi") {

        unset($_SESSION['tglawal']);
        unset($_SESSION['tglakhir']);
?>

        <div class="container-fluid">
            <div class="block-header">
                <h2>Laporan Transaksi Sewa | RentalMobil.com</h2>
            </div>

            <!-- MOBIL -->     

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Laporan Transaksi Sewa
                            </h2>
                        </div>                        
                        <div class="body">
                            <form action="laporan/transaksi.php" target="_blank" method="POST">
                                <h2 class="card-inside-title">Pilih Tanggal</h2>
                                <div class="input-daterange input-group">
                                    <div class="form-line">
                                        <input type="date" name="tglawal" class="form-control" required>
                                    </div>
                                    <span class="input-group-addon">Sampai</span>
                                    <div class="form-line">
                                        <input type="date" name="tglakhir" class="form-control" required>
                                    </div>
                                </div>
                                <button name="kirim" type="submit" class="btn btn-primary">Report</button>
                                <button type="reset" value="Reset" class="btn btn-danger" onClick="window.location='?page=laporantransaksi&data=laporantransaksi';">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PRODUK -->     
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