<?php 
include("../config/config.php");
if($_GET['data']=="konfirmasi") {?>

        <div class="container-fluid">
            <div class="block-header">
                <h2>Data Bukti Bayar | RentalMobil.com</h2>
            </div>

            <!-- MOBIL -->     

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Bukti Bayar 
                            </h2>
                        </div>
                        <div class="body">

                        <!-- MODAL DETAIL MOBIL-->
                            <div class="modal fade" id="DetailKonfirmasi" tabindex="-1" role="dialog" data-backdrop="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Detail Bukti Pembayaran</h4><hr>
                                        </div>
                                        <div class="modal-body">
                                            <div class="fetch-DetailKonfirmasi"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="?page=konfirmasi&data=konfirmasi" class="btn btn-danger btn-s waves-effect">Keluar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- MODAL DETAIL MOBIL -->

                        <?php
                        $tot = 0;
                        $hasil = mysqli_query($conn, "SELECT * FROM `t_konfirmasi` ORDER BY `t_konfirmasi`.`tgl_konfirmasi` DESC");
                        ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Transaksi</th>
                                            <th>Customer</th>
                                            <th>Tgl Konfirmasi</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 0;
                                            while ($data = mysqli_fetch_array($hasil)) {
                                            $no++;                 

                                            echo "<tr>";
                                            echo "<td>" . $no . "</td>";
                                            $sqll = mysqli_query($conn, "SELECT * FROM t_transaksi where id_transaksi = '$data[id_transaksi]'");
                                            $data1 = mysqli_fetch_assoc($sqll);
                                            $tglid = date('dmY', strtotime($data1['tgl_sewa']));  
                                            echo "<td><b>RM/T/" . $tglid . "/000" . $data['id_transaksi'] . "</td>";
                                            $sqll = mysqli_query($conn, "SELECT * FROM t_user where id_user = '$data[id_user]'");
                                            $data2 = mysqli_fetch_assoc($sqll);
                                            $namauser = $data2['nama_user'];
                                            echo "<td>" . $namauser . "</td>";
                                            $date = date('d F Y / H:i:s', strtotime($data['tgl_konfirmasi']));
                                            echo "<td>" . $date . "</td>";
                                            if($data['ket']=='0'){
                                                echo "<td><span class='badge bg-red'>Belum di Lihat</span></td>";
                                            }else{
                                                echo "<td><span class='badge bg-green'>Sudah di Lihat</span></td>";
                                            }
                                            echo '<td>
                                           
                                                <a href="#DetailKonfirmasi" class="btn btn-info btn-xs waves-effect" data-toggle="modal" data-id="'.$data['id_konfirmasi'].'">
                                                <i class="material-icons">remove_red_eye</i></a>

                                            </td>';
                                            echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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