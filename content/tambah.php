<?php
@session_start();
include 'config/config.php';
date_default_timezone_set('Asia/Jakarta');
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if(!isset($_SESSION['uid'])){
  echo"<script>alert('Anda Tidak Memiliki Akses, Dilarang Memasuki Halaman Ini !');document.location.href='login.php';</script>";
}

// ---------------------------------------- USER ----------------------------------------
if($_GET['tambah']=="user") {

	if(isset ($_POST['simpan-user'])){

		$nik_ktp = $_POST['nik_ktp'];
        $no_sim = $_POST['no_sim'];
        $email_user = $_POST['email_user'];
        $sql = mysqli_query($conn, "SELECT * FROM `t_user` WHERE nik_ktp='$nik_ktp'");
        $sql2 = mysqli_query($conn, "SELECT * FROM `t_user` WHERE no_sim='$no_sim'");
        $sql3 = mysqli_query($conn, "SELECT * FROM `t_user` WHERE email_user='$email_user'");
		$rows = mysql_num_rows($sql);
        $rows2 = mysql_num_rows($sql2);
        $rows3 = mysql_num_rows($sql3);

		if($rows>0){
			echo '<script language="javascript">alert("NIK KTP Sudah di Gunakan !");
			document.location="?page=user&data=user";</script>';
		}elseif($rows2>0){
            echo '<script language="javascript">alert("Nomor SIM Sudah di Gunakan !");
            document.location="?page=user&data=user";</script>';
        }elseif($rows3>0){
            echo '<script language="javascript">alert("Email Sudah di Gunakan !");
            document.location="?page=user&data=user";</script>';
        }else{
            $nik_ktp = $_POST['nik_ktp'];
            $no_sim = $_POST['no_sim'];
			$nama_user = $_POST['nama_user'];
			$email_user = $_POST['email_user'];
            $no_hp = $_POST['no_hp'];
            $alamat = $_POST['alamat'];
			$password = $_POST['password'];
			mysqli_query($conn, "INSERT INTO `t_user`(`nik_ktp`,`no_sim`,`nama_user`,`email_user`,`no_hp`,`alamat`,`password`,`level_user`,`akses`) VALUES ('$nik_ktp','$no_sim','$nama_user','$email_user','$no_hp','$alamat',MD5('$password'),'customer','on')");
			echo '<script language="javascript">alert("Berhasil Simpan Customer !");document.location="?page=user&data=user";</script>';
		}
	}else{ 
		echo '<script language="javascript">alert("Gagal Simpan Customer !"); 
		document.location="?page=user&data=user";</script>';
	} 
}
// ---------------------------------------- USER ----------------------------------------

// ---------------------------------------- MOBIL ----------------------------------------
if($_GET['tambah']=="mobil") {
	// Upload Image
    $namafolder="images/mobil/"; //tempat menyimpan file
    if (!empty($_FILES["link_gambar"]["tmp_name"])){
        $jenis_gambar=$_FILES['link_gambar']['type'];
        if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png"){      
            $gambar = $namafolder . basename($_FILES['link_gambar']['name']);
            $link_gambar = basename($_FILES['link_gambar']['name']);    
            if (move_uploaded_file($_FILES['link_gambar']['tmp_name'], $gambar)) {
                //rename gambar
                $file_lama = $namafolder.$link_gambar;    
                if($jenis_gambar=="image/jpg"){
                  $ekstensi = '.jpg';
                }
                else if($jenis_gambar=="image/jpeg"){ 
                  $ekstensi = '.jpeg';
                }
                else if($jenis_gambar=="image/gif"){
                  $ekstensi = '.gif';
                }
                else if($jenis_gambar=="image/png"){
                  $ekstensi = '.png';
                }

                //variabel replace
                $gambar_baru = sha1(date("Y-m-d-H-i-s"));
                rename($file_lama,$namafolder.$gambar_baru.$ekstensi); 
                // Query Update
                $no_mobil = $_POST['no_mobil'];
                $merk_mobil = $_POST['merk_mobil'];
                $nama_mobil = $_POST['nama_mobil'];
                $harga_sewa = $_POST['harga_sewa'];
                $status_mobil = 0;
                $image = $gambar_baru.$ekstensi;

                $sql = "INSERT INTO `t_mobil`(`no_mobil`,`merk_mobil`,`nama_mobil`,`harga_sewa`,`status_mobil`,`gambar`) VALUES ('$no_mobil','$merk_mobil','$nama_mobil','$harga_sewa','$status_mobil','$image')";
                if (mysqli_query($conn, $sql)) {
                    echo '<script language="javascript">alert("Berhasil Simpan Data Mobil !");document.location="?page=mobil&data=mobil";</script>';
                } else {
                    $error_msg = "Error updating record: " . mysql_error($con);
                }
            } else {
                echo '<script language="javascript">alert("Gagal Simpan Data Mobil !");document.location="?page=mobil&data=mobil";</script>';
            }
        } else {
            echo"<script>alert('Jenis gambar yang anda kirim salah. Harus .jpg .jpeg .png .gif !');document.location='?page=mobil&data=mobil';</script>";
        }
    } else {
        echo"<script>alert('Anda belum memilih gambar !');document.location='?page=mobil&data=mobil';</script>";
    }

    if(empty($error_msg)){
        header("location: ?page=mobil&data=mobil");
    }else{
        echo '<script>alert("'.$error_msg.'");</script>';
    }
}
// ---------------------------------------- MOBIL ----------------------------------------


// ---------------------------------------- PESAN MOBIL ----------------------------------------
if($_GET['tambah']=="pesanmobil") {

    if(isset ($_POST['simpan-pesanmobil'])){

        $sqll = mysqli_query($conn, "SELECT nik_ktp, no_sim, nama_user, no_hp, alamat FROM `t_user` WHERE id_user = '$_SESSION[iduser]'");
        $data = mysql_fetch_assoc($sqll);

        $nik_ktp = $data['nik_ktp'];
        $no_sim = $data['no_sim'];
        $nama_user = $data['nama_user'];
        $no_hp = $data['no_hp'];
        $alamat = $data['alamat'];


        if (!$nik_ktp OR !$no_sim OR !$nama_user OR !$no_hp OR !$alamat) {
            echo '<script language="javascript">alert("Lengkapi Data Anda untuk Pesan Mobil !");
            document.location="?page=profile&data=profile";</script>';
        }else{

            $id_user = $_POST['id_user'];
            $id_mobil = $_POST['id_mobil'];

            $status_mobil = 1;

            $harga_sewa = $_POST['harga_sewa'];
            $lama = $_POST['lama'];
            $total_harga = $harga_sewa*$lama;

            $tgl_ambil = $_POST['tgl_ambil'];
            $tgl_kembali = date('Y-m-d', strtotime('+'.$lama.' days', strtotime($tgl_ambil)));

            $tgl_sewa = date("Y-m-d H:i:s");

            $sqll = "INSERT INTO `t_transaksi`(`id_user`,`id_mobil`,`lama`,`tgl_ambil`,`tgl_kembali`,`total_harga`,`tgl_sewa`,`status_sewa`,`status_bayar`,`ket`) VALUES ('$id_user','$id_mobil','$lama','$tgl_ambil','$tgl_kembali','$total_harga','$tgl_sewa','0','0','0')";

            mysqli_query("UPDATE `t_mobil` SET `status_mobil`='$status_mobil' WHERE `id_mobil`='$id_mobil'");
        
            if(mysqli_query($conn, $sqll)){
                echo '<script language="javascript">alert("Berhasil Pesan Mobil !");document.location="?page=homemobil&data=homemobil";</script>';
            }else{
                echo '<script language="javascript">alert("Gagal Pesan Mobil !");document.location="?page=homemobil&data=homemobil";</script>';
            }
        }        

    }
}
// ---------------------------------------- PESAN MOBIL ----------------------------------------

// ---------------------------------------- KONFIRMASI BAYAR ----------------------------------------
if($_GET['tambah']=="konfirmasibayar") {
    // Upload Image
    $namafolder="images/konfirmasi/"; //tempat menyimpan file
    if (!empty($_FILES["link_gambar"]["tmp_name"])){
        $jenis_gambar=$_FILES['link_gambar']['type'];
        if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png"){      
            $gambar = $namafolder . basename($_FILES['link_gambar']['name']);
            $link_gambar = basename($_FILES['link_gambar']['name']);    
            if (move_uploaded_file($_FILES['link_gambar']['tmp_name'], $gambar)) {
                //rename gambar
                $file_lama = $namafolder.$link_gambar;    
                if($jenis_gambar=="image/jpg"){
                  $ekstensi = '.jpg';
                }
                else if($jenis_gambar=="image/jpeg"){ 
                  $ekstensi = '.jpeg';
                }
                else if($jenis_gambar=="image/gif"){
                  $ekstensi = '.gif';
                }
                else if($jenis_gambar=="image/png"){
                  $ekstensi = '.png';
                }

                //variabel replace
                $gambar_baru = sha1(date("Y-m-d-H-i-s"));
                rename($file_lama,$namafolder.$gambar_baru.$ekstensi); 
                // Query Update
                $id_transaksi = $_POST['id_transaksi'];
                $status_bayar = 1;
                $id_user = $_POST['id_user'];
                $ket = 0;
                $tgl_konfirmasi = date("Y-m-d H:i:s");
                $image = $gambar_baru.$ekstensi;

                $sql = "INSERT INTO `t_konfirmasi`(`id_transaksi`,`id_user`,`ket`,`tgl_konfirmasi`,`gambar`) VALUES ('$id_transaksi','$id_user','$ket','$tgl_konfirmasi','$image')";

                mysqli_query("UPDATE `t_transaksi` SET `status_bayar`='$status_bayar' WHERE `id_transaksi`='$id_transaksi'");

                if (mysqli_query($sql)) {
                    echo '<script language="javascript">alert("Konfirmasi Anda Telah Berhasil ! Sistem Akan Memproses Konfirmasi Pembayaran Anda, Terimakasih Telah Mengunjungi RentalMobil.com");document.location="?page=transaksi&data=transaksi";</script>';
                } else {
                    $error_msg = "Error updating record: " . mysql_error($con);
                }
            } else {
                echo '<script language="javascript">alert("Konfirmasi Anda Gagal !");document.location="?page=transaksi&data=transaksi";</script>';
            }
        } else {
            echo"<script>alert('Jenis gambar yang anda kirim salah. Harus .jpg .jpeg .png .gif !');document.location='?page=transaksi&data=transaksi';</script>";
        }
    } else {
        echo"<script>alert('Anda belum memilih gambar !');document.location='?page=transaksi&data=transaksi';</script>";
    }

    if(empty($error_msg)){
        header("location: ?page=transaksi&data=transaksi");
    }else{
        echo '<script>alert("'.$error_msg.'");</script>';
    }
}
// ---------------------------------------- KONFIRMASI BAYAR ----------------------------------------

?>