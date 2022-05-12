<?php if($_GET['data']=="transaksimobil") {?>

        <div class="container-fluid">
            <div class="block-header">
                <h2>Transaksi Sewa Mobil | RentalMobil.com</h2>
            </div>

            <!-- USER -->     
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Transaksi Sewa Mobil 
                            </h2>
                        </div>
                        <div class="body">

                        <!-- MODAL UbahTransaksiMobil -->
                            <div class="modal fade" id="UbahTransaksiMobil" tabindex="-1" role="dialog" data-backdrop="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Transaksi Mobil</h4><hr>
                                        </div>
                                        <div class="modal-body">
                                            <div class="fetch-UbahTransaksiMobil"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- MODAL UbahTransaksiMobil -->

                        <!-- MODAL DetailTransaksiMobil -->
                            <div class="modal fade" id="DetailTransaksiMobil" tabindex="-1" role="dialog" data-backdrop="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Detail Transaksi Mobil</h4><hr>
                                        </div>
                                        <div class="modal-body">
                                            <div class="fetch-DetailTransaksiMobil"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="?page=transaksimobil&data=transaksimobil" class="btn btn-danger btn-s waves-effect">Keluar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- MODAL DetailTransaksiMobil -->

                        <?php
                        $tot = 0;
                        $hasil = mysqli_query($conn, "SELECT * FROM `t_transaksi` ORDER BY tgl_sewa DESC");
                        ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Mobil</th>
                                            <th>Tanggal </th>
                                            <th>Customer</th>
                                            <th>Harga</th>
                                            <th>Status</th>
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
                                                $sqlll = mysqli_query($conn, "SELECT * FROM t_mobil where id_mobil = '$data[id_mobil]'");
                                                $data2 = mysqli_fetch_assoc($sqlll);
                                                $merk = $data2['merk_mobil'];
                                                $namamobil = $data2['nama_mobil'];
                                                echo "<td>" . $merk . " " . $namamobil . "</td>";
                                                $date = date('d F Y / H:i:s', strtotime($data['tgl_sewa']));
                                                echo "<td>" . $date . "</td>";
                                                $sqll = mysqli_query($conn, "SELECT * FROM t_user where id_user = '$data[id_user]'");
                                                $data1 = mysqli_fetch_assoc($sqll);
                                                $namauser = $data1['nama_user'];
                                                echo "<td>" . $namauser . "</td>";
                                                echo "<td>Rp. " . number_format($data['total_harga']) . " ,-</td>";
                                                    
                                                    if($data['status_sewa']=='0'){
                                                        echo "<td><span class='badge bg-amber'>Booking</span></td>";
                                                    }elseif($data['status_sewa']=='1'){
                                                        echo "<td><span class='badge bg-blue'>Dalam Perjalanan</span></td>";
                                                    }else{
                                                        echo "<td><span class='badge bg-green'>Selesai</span></td>";
                                                    }

                                                    if($data['ket']=='0'){
                                                        echo "<td><span class='badge bg-red'>Belum di Proses</span></td>";
                                                    }else{
                                                        echo "<td><span class='badge bg-green'>Sudah di Proses</span></td>";
                                                    }

                                                echo '<td>';

                                                if($data['status_sewa']=='0'){
                                                    echo '<a href="#UbahTransaksiMobil" class="btn btn-primary btn-xs waves-effect" data-toggle="modal" data-id="'.$data['id_transaksi'].'"><i class="material-icons">mode_edit</i></a>';
                                                }elseif($data['status_sewa']=='1'){
                                                    echo '<a href="#UbahTransaksiMobil" class="btn btn-primary btn-xs waves-effect" data-toggle="modal" data-id="'.$data['id_transaksi'].'"><i class="material-icons">mode_edit</i></a> ';
                                                }else{ }

                                                echo '<a href="#DetailTransaksiMobil" class="btn btn-info btn-xs waves-effect" data-toggle="modal" data-id="'.$data['id_transaksi'].'">
                                                    <i class="material-icons">remove_red_eye</i></a>';

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