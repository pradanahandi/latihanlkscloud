<?php
include("../config/config.php");
 if($_GET['data']=="mobil") {?>

        <div class="container-fluid">
            <div class="block-header">
                <h2>Data Mobil | RentalMobil.com</h2>
            </div>

            <!-- MOBIL -->     

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Mobil 
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#TambahMobil" data-toggle="modal" data-url="content/modal.php?tambah=mobil">Tambah Data</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                        
                        <!-- MODAL TAMBAH MOBIL -->
                            <div class="modal fade" id="TambahMobil" tabindex="-1" role="dialog" data-backdrop="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Tambah Mobil</h4><hr>
                                        </div>
                                        <div class="modal-body">
                                            <div class="fetch-TambahMobil"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- MODAL TAMBAH MOBIL -->

                        <!-- MODAL EDIT MOBIL -->
                            <div class="modal fade" id="EditMobil" tabindex="-1" role="dialog" data-backdrop="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit Mobil</h4><hr>
                                        </div>
                                        <div class="modal-body">
                                            <div class="fetch-EditMobil"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- MODAL EDIT MOBIL -->

                        <!-- MODAL DETAIL MOBIL-->
                            <div class="modal fade" id="DetailMobil" tabindex="-1" role="dialog" data-backdrop="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Detail Data Mobil</h4><hr>
                                        </div>
                                        <div class="modal-body">
                                            <div class="fetch-DetailMobil"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="?page=mobil&data=mobil" class="btn btn-danger btn-s waves-effect">Keluar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- MODAL DETAIL MOBIL -->

                        <?php
                        $tot = 0;
                        $hasil = mysqli_query($conn, "SELECT * FROM `t_mobil` ORDER BY 'nama_mobil' ASC");
                        ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Nomor</th>
                                            <th>Merk</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 0;
                                            while ($data = mysqli_fetch_array($hasil)) {
                                            $no++;                 

                                            echo "<tr align=center>";
                                                echo "<td>" . $no . "</td>";
                                                echo "<td>" . $data['no_mobil'] . "</td>";
                                                echo "<td>" . $data['merk_mobil'] . "</td>";
                                                echo "<td>" . $data['nama_mobil'] . "</td>";
                                                echo "<td>Rp. " . number_format($data['harga_sewa']) . " ,-</td>";
                                                echo '<td><img src="images/mobil/'.$data['gambar'].'" width=100></td>';
                                                echo '<td>
                                               
                                               <a href="#DetailMobil" class="btn btn-info btn-xs waves-effect" data-toggle="modal" data-id="'.$data['id_mobil'].'">
                                                <i class="material-icons">remove_red_eye</i></a>

                                                <a href="#EditMobil" class="btn btn-primary btn-xs waves-effect" data-toggle="modal" data-id="'.$data['id_mobil'].'"><i class="material-icons">mode_edit</i></a>

                                                <a onclick="return konfirmasi()" href="?page=hapus&hapus=mobil&id_mobil='.$data['id_mobil'].'"" class="btn btn-danger btn-xs waves-effect">
                                                <i class="material-icons">delete</i></a>

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