<?php if($_GET['data']=="user") {?>

        <div class="container-fluid">
            <div class="block-header">
                <h2>Data Customer | RentalMobil.com</h2>
            </div>

            <!-- USER -->     
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Cutomer 
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#Adduser" data-toggle="modal" data-url="content/modal.php?tambah=user">Tambah Data</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                        
                        <!-- MODAL TAMBAH USER -->
                            <div class="modal fade" id="Adduser" tabindex="-1" role="dialog" data-backdrop="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Tambah Customer</h4><hr>
                                        </div>
                                        <div class="modal-body">
                                            <div class="fetch-Adduser"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- MODAL TAMBAH USER -->

                        <!-- MODAL EDIT USER -->
                            <div class="modal fade" id="Edituser" tabindex="-1" role="dialog" data-backdrop="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit Customer</h4><hr>
                                        </div>
                                        <div class="modal-body">
                                            <div class="fetch-Edituser"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- MODAL EDIT USER -->

                        <!-- MODAL DETAIL USER-->
                            <div class="modal fade" id="Detailuser" tabindex="-1" role="dialog" data-backdrop="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Detail Data Customer</h4><hr>
                                        </div>
                                        <div class="modal-body">
                                            <div class="fetch-Detailuser"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="?page=user&data=user" class="btn btn-danger btn-s waves-effect">Keluar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- MODAL DETAIL USER -->

                        <?php
                        $tot = 0;
                        include("../config/config.php");
                        $hasil = mysqli_query($conn, "SELECT * FROM `t_user` WHERE level_user = 'customer'");
                        ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Akses</th>
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
                                                echo "<td>" . $data['nama_user'] . "</td>";
                                                echo "<td>" . $data['email_user'] . "</td>";

                                                if($data['level_user']=='admin'){
                                                echo "<td><span class='badge bg-amber'>Administrator</span></td>";
                                                }
                                                else{
                                                echo "<td><span class='badge bg-light-green'>Customer</span></td>";
                                                }

                                                if($data['akses'] == 'on'){
                                                    echo "<td><span class='badge bg-green'>".($data['akses'])."</span></td>";
                                                }else{
                                                    echo "<td><span class='badge bg-red'>".($data['akses'])."</span></td>";
                                                }

                                                echo '<td>

                                                <a href="#Detailuser" class="btn btn-info btn-xs waves-effect" data-toggle="modal" data-id="'.$data['id_user'].'">
                                                <i class="material-icons">remove_red_eye</i></a>
                                               
                                                <a href="#Edituser" class="btn btn-primary btn-xs waves-effect" data-toggle="modal" data-id="'.$data['id_user'].'"><i class="material-icons">mode_edit</i></a>

                                                <a onclick="return konfirmasi()" href="?page=hapus&hapus=user&id_user='.$data['id_user'].'"" class="btn btn-danger btn-xs waves-effect">
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