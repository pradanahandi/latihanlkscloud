<?php if($_GET['data']=="transaksi") {?>

        <div class="container-fluid">
            <div class="block-header">
                <h2>Riwayat Sewa Mobil | RentalMobil.com</h2>
            </div>

            <!-- USER -->     
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Riwayat Sewa Mobil 
                            </h2>
                        </div>
                        <div class="body">

                        <!-- MODAL EDIT USER -->
                            <div class="modal fade" id="KonfirmasiBayar" tabindex="-1" role="dialog" data-backdrop="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Konfirmasi Pembayaran</h4><hr>
                                        </div>
                                        <div class="modal-body">
                                            <div class="fetch-KonfirmasiBayar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- MODAL EDIT USER -->

                        <!-- MODAL DETAIL USER-->
                            <div class="modal fade" id="DetailTransaksi" tabindex="-1" role="dialog" data-backdrop="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Detail Transaksi Anda</h4><hr>
                                        </div>
                                        <div class="modal-body">
                                            <div class="fetch-DetailTransaksi"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="?page=transaksi&data=transaksi" class="btn btn-danger btn-s waves-effect">Keluar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- MODAL DETAIL USER -->

                        <?php
                        $tot = 0;
                        $hasil = mysqli_query($conn, "SELECT * FROM `t_transaksi` WHERE id_user = '$_SESSION[iduser]' ORDER BY tgl_sewa DESC");
                        ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Foto</th>
                                            <th>Mobil</th>
                                            <th>Total Harga</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
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
                                                $sqll = mysqli_query($conn, "SELECT * FROM t_mobil where id_mobil = '$data[id_mobil]'");
                                                $data1 = mysqli_fetch_assoc($sqll);
                                                $nomobil = $data1['no_mobil'];
                                                $merk = $data1['merk_mobil'];
                                                $namamobil = $data1['nama_mobil'];
                                                $gambar = $data1['gambar'];
                                                echo '<td><img src="images/mobil/'.$gambar.'" width=150></td>';
                                                echo "<td>" . $nomobil . " / " . $merk . " " . $namamobil . "</td>";
                                                echo "<td>Rp. " . number_format($data['total_harga']) . " ,-</td>";
                                                $date = date('d F Y / H:i:s', strtotime($data['tgl_sewa']));
                                                echo "<td>" . $date . "</td>";
                                                if($data['status_sewa']=='0'){
                                                    echo "<td><span class='badge bg-amber'>Booking</span></td>";
                                                }elseif($data['status_sewa']=='1'){
                                                    echo "<td><span class='badge bg-blue'>Dalam Perjalanan</span></td>";
                                                }else{
                                                    echo "<td><span class='badge bg-green'>Selesai</span></td>";
                                                }

                                                echo '<td>';

                                                if($data['status_bayar']=='0'){
                                                    echo '<a href="#KonfirmasiBayar" class="btn btn-success btn-xs waves-effect" data-toggle="modal" data-id="'.$data['id_transaksi'].'">Konfirmasi Bayar</a>';
                                                }else{ }

                                                echo '<a href="#DetailTransaksi" class="btn btn-primary btn-xs waves-effect" data-toggle="modal" data-id="'.$data['id_transaksi'].'">Detail Transaksi</a>';

                                                echo '</td>';
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
            <!-- USER -->     
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