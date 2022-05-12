<?php 
@session_start();
include '../config/config.php'; error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
date_default_timezone_set("Asia/Jakarta");
?>
    
    <!-- user -->
    <?php if ($_GET['tambah']=="user") { ?>
        
        <form id="form_validation" method="POST" action="?page=tambah&tambah=user">  
            <div class="row clearfix">
                <div class="col-xs-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NIK KTP</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="nik_ktp" id="nik_ktp" placeholder="Isi NIK" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor S I M</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="no_sim" id="no_sim" placeholder="Isi Nomor SIM" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Lengkap Customer</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Isi Nama Lengkap" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email Customer</label>
                            <div class="form-line">
                                <input type="email" class="form-control" name="email_user" id="email_user" placeholder="Isi Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No HP</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Isi No Hp" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Isi Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Alamat</label>
                            <div class="form-line">
                                <textarea class="form-control" name="alamat" id="alamat" placeholder="Isi Alamat" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary waves-effect" name="simpan-user" id="simpan_user" type="submit">Simpan</button>
                        <a href="?page=user&data=user" class="btn btn-danger">Tutup</a>
                    </div>
                </div>
            </div>
        </form>        

    <?php } ?>

    <?php if ($_GET['ubah']=="user") { ?>
        <?php
            if(isset($_GET['id_user'])){
                $id_user = $_GET['id_user'];
                $sql = mysqli_query($conn, "SELECT * FROM `t_user` WHERE id_user='$id_user'");
                while ($_POST = mysqli_fetch_array($sql)) {
                    $nik_ktp = $_POST['nik_ktp'];
                    $no_sim = $_POST['no_sim'];
                    $nama_user = $_POST['nama_user'];
                    $email_user = $_POST['email_user'];
                    $no_hp = $_POST['no_hp'];
                    $alamat = $_POST['alamat'];
                    $password = $_POST['password'];
                    $level_user = $_POST['level_user'];
                    $akses = $_POST['akses'];
            }
        ?> 
            <form id="form_validation" method="POST" action="?page=ubah&ubah=user">      
                <div class="row clearfix">
                    <div class="col-xs-12">
                        <input type="hidden" name="id_user" value="<?php echo "$id_user";?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIK KTP</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="nik_ktp" id="nik_ktp" value="<?php echo "$nik_ktp";?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor S I M</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="no_sim" id="no_sim" value="<?php echo "$no_sim";?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap Customer</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="nama_user" id="nama_user" value="<?php echo "$nama_user";?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Customer</label>
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email_user" id="email_user" value="<?php echo "$email_user";?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No HP</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?php echo "$no_hp";?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <div class="form-line">
                                    <textarea class="form-control" name="alamat" id="alamat"><?php echo "$alamat";?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Level User</label><br>
                                <input type="radio" name="level_user" id="customer" value="customer" <?php if ($level_user=="customer") { echo"checked"; } else { echo"nochecked"; } ?> class="with-gap">
                                <label for="customer" class="m-l-20">Customer</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Akses</label><br>
                                <input type="radio" name="akses" id="on" value="on" <?php if ($akses=="on") { echo"checked"; } else { echo"nochecked"; } ?> class="with-gap">
                                <label for="on" class="m-l-20">On</label>

                                <input type="radio" name="akses" id="off" value="off" <?php if ($akses=="off") { echo"checked"; } else { echo"nochecked"; } ?> class="with-gap">
                                <label for="off" class="m-l-20">Off</label>
                            </div>    
                        </div>                            
                        <div class="col-md-6">
                            <button class="btn btn-primary waves-effect" name="ubah-user" id="ubah-user" type="submit">Ubah Data</button>
                            <a href="?page=user&data=user" class="btn btn-danger">Tutup</a>
                        </div>
                    </div>
                </div>
            </form>
        <?php } ?>
    <?php } ?>

    <?php if ($_GET['detail']=="user") { ?>
        <?php
            if(isset($_GET['id_user'])){
                $id_user = $_GET['id_user'];
                $sql = mysqli_query($conn, "SELECT * FROM `t_user` WHERE id_user='$id_user'");
                while ($_POST = mysqli_fetch_array($sql)) {
                    $nik_ktp = $_POST['nik_ktp'];
                    $no_sim = $_POST['no_sim'];
                    $nama_user = $_POST['nama_user'];
                    $email_user = $_POST['email_user'];
                    $no_hp = $_POST['no_hp'];
                    $alamat = $_POST['alamat'];
                    $password = $_POST['password'];
                    $level_user = $_POST['level_user'];
                    $akses = $_POST['akses'];
            }
        ?> 

        <form id="form_validation" method="POST" action="#" enctype="multipart/form-data">   
            <div class="row clearfix">
                <div class="col-xs-12">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <input type="text" name="id_user" id="id_user" value="<?php echo $id_user;?>" hidden />
                            <tr>
                                <td width="30%">NIK KTP</td>
                                <td width="5%">:</td>
                                <td><b><?php echo $nik_ktp; ?></b></td>
                            </tr>
                            <tr>
                                <td width="30%">Nomor S I M</td>
                                <td width="5%">:</td>
                                <td><b><?php echo $no_sim; ?></b></td>
                            </tr>
                            <tr>
                                <td width="30%">Nama User</td>
                                <td width="5%">:</td>
                                <td><b><?php echo $nama_user; ?></b></td>
                            </tr>
                            <tr>
                                <td>Email User</td>
                                <td>:</td>
                                <td><?php echo $email_user; ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Hp</td>
                                <td>:</td>
                                <td><?php echo $no_hp; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?php echo $alamat; ?></td>
                            </tr>
                            <tr>
                                <td>Level User</td>
                                <td>:</td>
                                <td>
                                    <?php   
                                        if($level_user=='admin'){
                                            echo "<span class='badge bg-amber'>Administrator</span>";
                                        }
                                        else{
                                            echo "<span class='badge bg-light-green'>Customer</span>";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Akses User</td>
                                <td>:</td>
                                <td>
                                    <?php   
                                        if($akses=='on'){
                                            echo "<span class='badge bg-green'>On</span>";
                                        }
                                        else{
                                            echo "<span class='badge bg-red'>Off</span>";
                                        }
                                    ?>
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        </form>       

        <?php } ?>
    <?php } ?>
    <!-- user -->

    <!-- mobil -->
    <?php if ($_GET['tambah']=="mobil") { ?>
        
        <form id="form_validation" method="POST" action="?page=tambah&tambah=mobil" enctype="multipart/form-data">  
            <div class="row clearfix">
                <div class="col-xs-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor Mobil</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="no_mobil" id="no_mobil" placeholder="Nomor Mobil" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Merk Mobil</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="merk_mobil" id="merk_mobil" placeholder="Merk Mobil" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Mobil</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama_mobil" id="nama_mobil" placeholder="Nama Mobil" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Sewa</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="harga_sewa" id="harga_sewa" placeholder="Harga Sewa" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Gambar Mobil</label>
                            <div class="form-line">
                                <input type="file" id="gambar" name="link_gambar" class="form-control"> 
                            </div><p>Format yang diperbolehkan jpg, jpeg, png</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary waves-effect" name="simpan-mobil" id="simpan_produk" type="submit">Simpan</button>
                        <a href="?page=mobil&data=mobil" class="btn btn-danger">Tutup</a>
                    </div>
                </div>
            </div>
        </form>        

    <?php } ?>

    <?php if ($_GET['ubah']=="mobil") { ?>
        <?php
            if(isset($_GET['id_mobil'])){
                $id_mobil = $_GET['id_mobil'];
                $sql = mysqli_query($conn, "SELECT * FROM `t_mobil` WHERE id_mobil='$id_mobil'");
                while ($_POST = mysqli_fetch_array($sql)) {
                    $no_mobil = $_POST['no_mobil'];
                    $merk_mobil = $_POST['merk_mobil'];
                    $nama_mobil = $_POST['nama_mobil'];
                    $harga_sewa = $_POST['harga_sewa'];
                    $gambar_lama = $_POST['gambar'];
            }
        ?> 

        <form id="form_validation" method="POST" action="?page=ubah&ubah=mobil" enctype="multipart/form-data">   
            <div class="row clearfix">
                <div class="col-xs-12">
                    <input type="hidden" name="id_mobil" value="<?php echo "$id_mobil";?>">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor Mobil</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="no_mobil" id="no_mobil" value="<?php echo "$no_mobil";?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Merk Mobil</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="merk_mobil" id="merk_mobil" value="<?php echo "$merk_mobil";?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Mobil</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama_mobil" id="nama_mobil" value="<?php echo "$nama_mobil";?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Sewa</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="harga_sewa" id="harga_sewa" value="<?php echo "$harga_sewa";?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gambar Lama</label>
                            <div class="form-line">
                                <img src="images/mobil/<?php echo $gambar_lama;?>" width=50%>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gambar Mobil</label>
                            <div class="form-line">
                                <input type="file" id="gambar" name="link_gambar" class="form-control"> 
                            </div><p>Format yang diperbolehkan jpg, jpeg, png</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary waves-effect" name="ubah-mobil" id="ubah-mobil" type="submit">Ubah Data</button>
                        <a href="?page=mobil&data=mobil" class="btn btn-danger">Tutup</a>
                    </div>
                </div>
            </div>
        </form>       

        <?php } ?>
    <?php } ?>

    <?php if ($_GET['detail']=="mobil") { ?>
        <?php
            if(isset($_GET['id_mobil'])){
                $id_mobil = $_GET['id_mobil'];
                $sql = mysqli_query($conn, "SELECT * FROM `t_mobil` WHERE id_mobil='$id_mobil'");
                while ($_POST = mysqli_fetch_array($sql)) {
                    $no_mobil = $_POST['no_mobil'];
                    $merk_mobil = $_POST['merk_mobil'];
                    $nama_mobil = $_POST['nama_mobil'];
                    $harga_sewa = $_POST['harga_sewa'];
                    $gambar_lama = $_POST['gambar'];
            }
        ?> 

        <form id="form_validation" method="POST" action="#" enctype="multipart/form-data">   
            <div class="row clearfix">
                <div class="col-xs-12">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <input type="text" name="id_mobil" id="id_mobil" value="<?php echo $id_mobil;?>" hidden />
                            <tr>
                                <td width="30%">Nomor Mobil</td>
                                <td width="5%">:</td>
                                <td><b><?php echo $no_mobil; ?></b></td>
                            </tr>
                            <tr>
                                <td>Merk Mobil</td>
                                <td>:</td>
                                <td><?php echo $merk_mobil; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Mobil</td>
                                <td>:</td>
                                <td><?php echo $nama_mobil; ?></td>
                            </tr>
                            <tr>
                                <td>Harga Sewa</td>
                                <td>:</td>
                                <td>Rp. <?php echo number_format($harga_sewa); ?>,-</td>
                            </tr>
                            <tr>
                                <td>Gambar</td>
                                <td>:</td>
                                <td><img src="images/mobil/<?php echo $gambar_lama;?>" width=40%></td>
                            </tr>
                    </table>
                </div>
            </div>
        </form>       

        <?php } ?>
    <?php } ?>
    <!-- mobil -->

    <!-- pesan mobil -->
    <?php if ($_GET['pesan']=="pesanmobil") { ?>
        <?php
            if(isset($_GET['id_mobil'])){
                $id_mobil = $_GET['id_mobil'];
                $sql = mysqli_query($conn, "SELECT * FROM `t_mobil` WHERE id_mobil='$id_mobil'");
                while ($_POST = mysqli_fetch_array($sql)) {
                    $no_mobil = $_POST['no_mobil'];
                    $merk_mobil = $_POST['merk_mobil'];
                    $nama_mobil = $_POST['nama_mobil'];
                    $harga_sewa = $_POST['harga_sewa'];
                }
        ?> 

        <form id="form_validation" method="POST" action="?page=tambah&tambah=pesanmobil" enctype="multipart/form-data">   
            <div class="row clearfix">
                <div class="col-xs-12">
                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['iduser']; ?>"> 
                    <input type="hidden" name="id_mobil" value="<?php echo "$id_mobil";?>">                  
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor Mobil</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="no_mobil" value="<?php echo "$no_mobil";?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Merk Mobil</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="merk_mobil" value="<?php echo "$merk_mobil";?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Mobil</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama_mobil" value="<?php echo "$nama_mobil";?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Sewa</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="harga_sewa" value="<?php echo "$harga_sewa";?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Lama Sewa</label>
                            <div class="form-line">
                                <select name="lama" id="lama" class="form-control show-tick" required>
                                    <option value="1">1 Hari</option>
                                    <option value="2">2 Hari</option>
                                    <option value="3">3 Hari</option>
                                    <option value="4">4 Hari</option>
                                    <option value="5">5 Hari</option>
                                    <option value="6">6 Hari</option>
                                    <option value="7">7 Hari</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Ambil</label>
                            <div class="form-line">
                                <input type="date" class="form-control" name="tgl_ambil" id="tgl_ambil" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-primary waves-effect" name="simpan-pesanmobil" id="simpan_pesanmobil" type="submit">Pesan Mobil</button>
                        <a href="?page=homemobil&data=homemobil" class="btn btn-danger">Tutup</a>
                    </div>
                </div>
            </div>
        </form>       

        <?php } ?>
    <?php } ?>
    <!-- pesan mobil -->

    <!-- konfirmasi bayar -->
    <?php if ($_GET['konfirmasi']=="konfirmasibayar") { ?>
        <?php
            if(isset($_GET['id_transaksi'])){
                $id_transaksi = $_GET['id_transaksi'];
        ?> 

        <form id="form_validation" method="POST" action="?page=tambah&tambah=konfirmasibayar" enctype="multipart/form-data">   
            <div class="row clearfix">
                <div class="col-xs-12">
                    <input type="hidden" name="id_transaksi" value="<?php echo "$id_transaksi";?>">     
                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['iduser']; ?>">           
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Silahkan Upload Bukti Bayar </label>
                            <div class="form-line">
                                <input type="file" id="gambar" name="link_gambar" class="form-control"> 
                            </div><p>Format yang diperbolehkan jpg, jpeg, png</p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Terimakasih  </label>
                            <div class="form-line">
                                <p>
                                    Booking Mobil anda telah berhasil<br>
                                    Silahkan anda membayar tagihan anda dengan cara transfer via Bank di nomor Rekening : <br>
                                    <strong>(1234-12-123456-12-1 a/n RentalMobil)</strong> untuk menyelesaikan pembayaran. dan untuk uang muka minimal setengah dari harga sewa.
                                </p>
                                <p>
                                    Untuk melakukan transfer silahkan anda upload bukti pembayaran berupa foto atau gambar pada halaman ini dan klik tombol <strong>(Konfirmasi Pembayaran)</strong>.
                                </p>
                                <p>
                                    Salam - <i>admin</i>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-primary waves-effect" name="simpan-konfirmasibayar" id="simpan_konfirmasibayar" type="submit">Konfirmasi Pembayaran</button>
                        <a href="?page=transaksi&data=transaksi" class="btn btn-danger">Tutup</a>
                    </div>
                </div>
            </div>
        </form>       

        <?php } ?>
    <?php } ?>
    <!-- konfirmasi bayar -->

    <!-- detail transaksi -->
    <?php if ($_GET['detail']=="detailtransaksi") { ?>
        <?php
            if(isset($_GET['id_transaksi'])){
                $id_transaksi = $_GET['id_transaksi'];
                $sql = mysqli_query($conn, "SELECT * FROM `t_transaksi` WHERE id_transaksi='$id_transaksi'");
                while ($_POST = mysqli_fetch_array($sql)) {                    
                    $id_transaksi = $_POST['id_transaksi'];
                    $sqll = mysqli_query($conn, "SELECT * FROM t_user where id_user = '$_POST[id_user]'");
                    $data1 = mysqli_fetch_assoc($sqll);
                    $namauser = $data1['nama_user'];
                    $emailuser = $data1['email_user'];
                    $sqlll = mysqli_query($conn, "SELECT * FROM t_mobil where id_mobil = '$_POST[id_mobil]'");
                    $data1 = mysqli_fetch_assoc($sqlll);
                    $nomobil = $data1['no_mobil'];
                    $merk = $data1['merk_mobil'];
                    $namamobil = $data1['nama_mobil'];                    
                    $lama = $_POST['lama'];
                    $tglambil = date('d F Y', strtotime($_POST['tgl_ambil']));
                    $tglkembali = date('d F Y', strtotime($_POST['tgl_kembali']));                    
                    $total_harga = $_POST['total_harga'];
                    $status_sewa = $_POST['status_sewa'];
                    $status_bayar = $_POST['status_bayar'];
                    $tglsewa = date('d F Y / H:i:s', strtotime($_POST['tgl_sewa']));   
                    $tglid = date('dmY', strtotime($_POST['tgl_sewa']));     
            }
        ?> 

        <form id="form_validation" method="POST" action="#" enctype="multipart/form-data">   
            <div class="row clearfix">
                <div class="col-xs-12">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <tr>
                            <td width="30%">Id Transaksi</td>
                            <td width="5%">:</td>
                            <td><b>RM/T/<?php echo $tglid; ?>/000<?php echo $id_transaksi; ?></b></td>
                        </tr>
                        <tr>
                            <td>Nama Customer</td>
                            <td>:</td>
                            <td><?php echo $namauser; ?></td>
                        </tr>
                        <tr>
                            <td>Email Customer</td>
                            <td>:</td>
                            <td><?php echo $emailuser; ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Mobil</td>
                            <td>:</td>
                            <td><?php echo $nomobil; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Mobil</td>
                            <td>:</td>
                            <td><?php echo $merk; ?> <?php echo $namamobil; ?></td>
                        </tr>
                        <tr>
                            <td>Lama Sewa</td>
                            <td>:</td>
                            <td><?php echo $lama; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Ambil</td>
                            <td>:</td>
                            <td><?php echo $tglambil; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Kembali</td>
                            <td>:</td>
                            <td><?php echo $tglkembali; ?></td>
                        </tr>
                        <tr>
                            <td>Total Harga</td>
                            <td>:</td>
                            <td>Rp. <?php echo number_format($total_harga); ?>,-</td>
                        </tr>
                        <tr>
                            <td>Status Sewa</td>
                            <td>:</td>
                            <td>
                                <?php   
                                    if($status_sewa=='0'){
                                        echo "<span class='badge bg-amber'>Booking</span>";
                                    }elseif($status_sewa=='1'){
                                        echo "<span class='badge bg-blue'>Dalam Perjalanan</span>";
                                    }
                                    else{
                                        echo "<span class='badge bg-green'>Selesai</span>";
                                    }
                                ?>         
                            </td>
                        </tr>
                        <tr>
                            <td>Status Bayar</td>
                            <td>:</td>
                            <td>
                                <?php   
                                    if($status_bayar=='0'){
                                        echo "<span class='badge bg-red'>Belum Konfirmasi Pembayaran</span>";
                                    }else{
                                        echo "<span class='badge bg-green'>Selesai Konfirmasi Pembayaran</span>";
                                    }
                                ?>         
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Sewa</td>
                            <td>:</td>
                            <td><?php echo $tglsewa; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>       

        <?php } ?>
    <?php } ?>
    <!-- detail transaksi -->

    <!-- ubah transaksi mobil -->
    <?php if ($_GET['ubah']=="ubahtransaksimobil") { ?>
        <?php
            if(isset($_GET['id_transaksi'])){
                $id_transaksi = $_GET['id_transaksi'];
                $sql = mysqli_query($conn, "SELECT * FROM `t_transaksi` WHERE id_transaksi='$id_transaksi'");
                while ($_POST = mysqli_fetch_array($sql)) {
                    $id_user = $_POST['id_user'];
                    $id_mobil = $_POST['id_mobil'];
                    $sqll = mysqli_query($conn, "SELECT * FROM t_user where id_user = '$_POST[id_user]'");
                    $data1 = mysqli_fetch_assoc($sqll);
                    $namauser = $data1['nama_user'];
                    $emailuser = $data1['email_user'];
                    $sqlll = mysqli_query($conn, "SELECT * FROM t_mobil where id_mobil = '$_POST[id_mobil]'");
                    $data1 = mysqli_fetch_assoc($sqlll);
                    $nomobil = $data1['no_mobil'];
                    $merk = $data1['merk_mobil'];
                    $namamobil = $data1['nama_mobil'];                    
                    $lama = $_POST['lama'];
                    $tglambil = date('d F Y', strtotime($_POST['tgl_ambil']));
                    $tglkembali = date('d F Y', strtotime($_POST['tgl_kembali']));                    
                    $total_harga = $_POST['total_harga'];
                    $status_sewa = $_POST['status_sewa'];
                    $status_bayar = $_POST['status_bayar'];
                    $tglsewa = date('d F Y / H:i:s', strtotime($_POST['tgl_sewa'])); 
            }
        ?> 
            <form id="form_validation" method="POST" action="?page=ubah&ubah=transaksimobil">      
                <div class="row clearfix">
                    <div class="col-xs-12">
                        <input type="hidden" name="id_transaksi" value="<?php echo "$id_transaksi";?>">
                        <input type="hidden" name="id_mobil" value="<?php echo "$id_mobil";?>">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Customer</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" value="<?php echo "$namauser";?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" value="<?php echo "$emailuser";?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Mobil</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" value="<?php echo "$nomobil";?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Mobil</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" value="<?php echo "$merk"; echo " $namamobil";?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Ambil</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" value="<?php echo "$tglambil";?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Kembali</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" value="<?php echo "$tglkembali";?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lama Sewa</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" value="<?php echo "$lama";?> Hari" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Harga</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" value="Rp. <?php echo number_format($total_harga);?>,- " readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status Sewa</label><br>
                                <input type="radio" name="status_sewa" id="0" value="0" <?php if ($status_sewa=="0") { echo"checked"; } else { echo"nochecked"; } ?> class="with-gap">
                                <label for="0" class="m-l-20">Booking</label>

                                <input type="radio" name="status_sewa" id="1" value="1" <?php if ($status_sewa=="1") { echo"checked"; } else { echo"nochecked"; } ?> class="with-gap">
                                <label for="1" class="m-l-20">Dalam Perjalanan</label>

                                <input type="radio" name="status_sewa" id="2" value="2" <?php if ($status_sewa=="2") { echo"checked"; } else { echo"nochecked"; } ?> class="with-gap">
                                <label for="2" class="m-l-20">Selesai</label>
                            </div>    
                        </div>    

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status Bayar</label><br>
                                <input type="radio" name="status_bayar" id="1" value="1" <?php if ($status_bayar=="1") { echo"checked"; } else { echo"nochecked"; } ?> class="with-gap">
                                <label for="1" class="m-l-20">Konfrimasi Bayar</label>
                            </div>    
                        </div>               

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tanggal Sewa</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" value="<?php echo "$tglsewa";?>" readonly>
                                </div>
                            </div>
                        </div>  

                        <div class="col-md-12">
                            <button class="btn btn-primary waves-effect" name="ubah-transaksimobil" id="ubah-transaksimobil" type="submit">Ubah Data</button>
                            <a href="?page=transaksimobil&data=transaksimobil" class="btn btn-danger">Tutup</a>
                        </div>
                    </div>
                </div>
            </form>
        <?php } ?>
    <?php } ?>
    <!-- ubah transaksi mobil -->

    <!-- detail transaksi mobil -->
    <?php if ($_GET['detail']=="detailtransaksimobil") { ?>
        <?php
            if(isset($_GET['id_transaksi'])){
                $id_transaksi = $_GET['id_transaksi'];
                $sql = mysqli_query($conn, "SELECT * FROM `t_transaksi` WHERE id_transaksi='$id_transaksi'");
                while ($_POST = mysqli_fetch_array($sql)) {                    
                    $id_transaksi = $_POST['id_transaksi'];
                    $sqll = mysqli_query($conn, "SELECT * FROM t_user where id_user = '$_POST[id_user]'");
                    $data1 = mysqli_fetch_assoc($sqll);
                    $namauser = $data1['nama_user'];
                    $emailuser = $data1['email_user'];
                    $sqlll = mysqli_query($conn, "SELECT * FROM t_mobil where id_mobil = '$_POST[id_mobil]'");
                    $data2 = mysqli_fetch_assoc($sqlll);
                    $nomobil = $data2['no_mobil'];
                    $merk = $data2['merk_mobil'];
                    $namamobil = $data2['nama_mobil'];                    
                    $lama = $_POST['lama'];
                    $tglambil = date('d F Y', strtotime($_POST['tgl_ambil']));
                    $tglkembali = date('d F Y', strtotime($_POST['tgl_kembali']));                    
                    $total_harga = $_POST['total_harga'];
                    $status_sewa = $_POST['status_sewa'];
                    $status_bayar = $_POST['status_bayar'];
                    $tglsewa = date('d F Y / H:i:s', strtotime($_POST['tgl_sewa']));   
                    $sqllll = mysqli_query($conn, "SELECT * FROM t_konfirmasi where id_transaksi = '$id_transaksi'");
                    $data3 = mysqli_fetch_assoc($sqllll);
                    $buktibayar = $data3['gambar'];  
                    $tglid = date('dmY', strtotime($_POST['tgl_sewa']));   
            }
        ?> 

        <form id="form_validation" method="POST" action="#" enctype="multipart/form-data">   
            <div class="row clearfix">
                <div class="col-xs-12">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <tr>
                            <td width="30%">Id Transaksi</td>
                            <td width="5%">:</td>
                            <td><b>RM/T/<?php echo $tglid; ?>/000<?php echo $id_transaksi; ?></b></td>
                        </tr>
                        <tr>
                            <td>Nama Customer</td>
                            <td>:</td>
                            <td><?php echo $namauser; ?></td>
                        </tr>
                        <tr>
                            <td>Email Customer</td>
                            <td>:</td>
                            <td><?php echo $emailuser; ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Mobil</td>
                            <td>:</td>
                            <td><?php echo $nomobil; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Mobil</td>
                            <td>:</td>
                            <td><?php echo $merk; ?> <?php echo $namamobil; ?></td>
                        </tr>
                        <tr>
                            <td>Lama Sewa</td>
                            <td>:</td>
                            <td><?php echo $lama; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Ambil</td>
                            <td>:</td>
                            <td><?php echo $tglambil; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Kembali</td>
                            <td>:</td>
                            <td><?php echo $tglkembali; ?></td>
                        </tr>
                        <tr>
                            <td>Total Harga</td>
                            <td>:</td>
                            <td>Rp. <?php echo number_format($total_harga); ?>,-</td>
                        </tr>
                        <tr>
                            <td>Status Sewa</td>
                            <td>:</td>
                            <td>
                                <?php   
                                    if($status_sewa=='0'){
                                        echo "<span class='badge bg-amber'>Booking</span>";
                                    }elseif($status_sewa=='1'){
                                        echo "<span class='badge bg-blue'>Dalam Perjalanan</span>";
                                    }
                                    else{
                                        echo "<span class='badge bg-green'>Selesai</span>";
                                    }
                                ?>         
                            </td>
                        </tr>
                        <tr>
                            <td>Status Bayar</td>
                            <td>:</td>
                            <td>
                                <?php   
                                    if($status_bayar=='0'){
                                        echo "<span class='badge bg-red'>Belum Konfirmasi Pembayaran</span>";
                                    }else{
                                        echo "<span class='badge bg-green'>Selesai Konfirmasi Pembayaran</span>";
                                    }
                                ?>         
                            </td>
                        </tr>
                        <tr>
                            <td>Bukti Konfirmasi Pembayaran</td>
                            <td>:</td>
                            <td>
                                <?php   
                                    if($status_bayar=='0'){
                                        echo "Belum Ada Bukti Pembayaran !";
                                    }else{
                                        echo '<img src="images/konfirmasi/'.$buktibayar.'" width=100%>';
                                    }
                                ?>         
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Sewa</td>
                            <td>:</td>
                            <td><?php echo $tglsewa; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>       

        <?php } ?>
    <?php } ?>
    <!-- detail transaksi mobil -->

    <!-- detail konfirmasi -->
    <?php if ($_GET['detail']=="detailkonfirmasi") { ?>
        <?php
            if(isset($_GET['id_konfirmasi'])){
                $id_konfirmasi = $_GET['id_konfirmasi'];
                $sql = mysqli_query($conn, "SELECT * FROM `t_konfirmasi` WHERE id_konfirmasi='$id_konfirmasi'");
                while ($_POST = mysqli_fetch_array($sql)) {
                    $id_transaksi = $_POST['id_transaksi'];
                    $sqll = mysqli_query($conn, "SELECT * FROM t_transaksi where id_transaksi = '$_POST[id_transaksi]'");
                    $data1 = mysqli_fetch_assoc($sqll);
                    $tglid = date('dmY', strtotime($data1['tgl_sewa']));   
                    $sqlll = mysqli_query($conn, "SELECT * FROM t_user where id_user = '$_POST[id_user]'");
                    $data2 = mysqli_fetch_assoc($sqlll);
                    $namauser = $data2['nama_user'];
                    $tglkonfirmasi = date('d F Y / H:i:s', strtotime($_POST['tgl_konfirmasi'])); 
                    $buktibayar = $_POST['gambar'];
                    $ket = 1;

                mysqli_query($conn, "UPDATE `t_konfirmasi` SET `ket`='$ket' WHERE `id_konfirmasi`='$id_konfirmasi'");
            }
        ?> 

        <form id="form_validation" method="POST" action="#" enctype="multipart/form-data">   
            <div class="row clearfix">
                <div class="col-xs-12">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <input type="text" name="id_konfirmasi" id="id_konfirmasi" value="<?php echo $id_konfirmasi;?>" hidden />
                            <tr>
                                <td width="30%">Nomor Transaksi</td>
                                <td width="5%">:</td>
                                <td><b>RM/T/<?php echo $tglid; ?>/000<?php echo $id_transaksi; ?></b></td>
                            </tr>
                            <tr>
                                <td>Nama Customer</td>
                                <td>:</td>
                                <td><?php echo $namauser; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Konfirmasi Pembayaran</td>
                                <td>:</td>
                                <td><?php echo $tglkonfirmasi; ?></td>
                            </tr>
                            <tr>
                                <td>Gambar</td>
                                <td>:</td>
                                <td><img src="images/konfirmasi/<?php echo $buktibayar;?>" width=100%></td>
                            </tr>
                    </table>
                </div>
            </div>
        </form>       

        <?php } ?>
    <?php } ?>
    <!-- detail konfirmasi -->