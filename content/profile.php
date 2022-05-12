<?php if($_GET['data']=="profile") {?>

    
<div class="container-fluid">
    <div class="block-header">
        <h2>Profile Anda | RentalMobil.com</h2>
    </div>
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Ganti Password</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">

                            <?php
                                $sql = mysqli_query($conn, "SELECT * FROM `t_user` WHERE id_user = '$_SESSION[iduser]'");
                                while ($_POST = $sql->fetch_array()) {
                                    $id_user = $_POST['id_user'];
                                    $nik_ktp = $_POST['nik_ktp'];
                                    $no_sim = $_POST['no_sim'];
                                    $nama_user = $_POST['nama_user'];
                                    $email_user = $_POST['email_user'];
                                    $no_hp = $_POST['no_hp'];
                                    $alamat = $_POST['alamat'];
                                    $password = $_POST['password'];
                                }

                            ?>  

                                <form id="form_validation" class="form-horizontal" method="POST" action="?page=ubah&ubah=datauser">
                                <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $id_user; ?>">
                                    <div class="form-group">
                                        <label for="nik_ktp" class="col-sm-2 control-label">NIK KTP</label>
                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="nik_ktp" name="nik_ktp" value="<?php echo $nik_ktp; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_sim" class="col-sm-2 control-label">Nomor SIM</label>
                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="no_sim" name="no_sim" value="<?php echo $no_sim; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_user" class="col-sm-2 control-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?php echo $nama_user; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_user" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input type="Email" class="form-control" id="email_user" name="email_user" value="<?php echo $email_user; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp" class="col-sm-2 control-label">Nomor HP</label>
                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat" class="col-sm-2 control-label">Alamat Lengkap</label>
                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-10 col-sm-10">
                                            <button class="btn btn-primary" name="ubah-datauser" id="ubah-datauser" type="submit">Perbarui Data Anda
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">

                                <form id="form_validation" class="form-horizontal" method="POST" action="?page=ubah&ubah=passuser">
                                <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $id_user; ?>">
                                    <div class="form-group">
                                        <label for="password" class="col-sm-3 control-label">Password Baru Anda</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-9 col-sm-9">
                                            <button class="btn btn-primary" name="ubah-passuser" id="ubah-passuser" type="submit">Perbarui Password Anda</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
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