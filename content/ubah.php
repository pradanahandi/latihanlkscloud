<?php 
@session_start();
include 'config/config.php';
date_default_timezone_set('Asia/Jakarta');
if(!isset($_SESSION['uid'])){
  echo"<script>alert('Anda Tidak Memiliki Akses, Dilarang Memasuki Halaman Ini !');document.location.href='login.php';</script>";
}
 
// ---------------------------------------- USER ----------------------------------------

if($_GET['ubah']=="user") {

	if(isset($_POST['ubah-user'])){
        
			$id_user = $_POST['id_user'];
            $nik_ktp = $_POST['nik_ktp'];
            $no_sim = $_POST['no_sim']; 	
			$nama_user = $_POST['nama_user'];
			$email_user = $_POST['email_user'];			
			$no_hp = $_POST['no_hp'];
            $alamat = $_POST['alamat'];
			$akses = $_POST['akses'];			
		mysqli_query($conn, "UPDATE `t_user` SET nik_ktp='$nik_ktp', no_sim='$no_sim', nama_user='$nama_user', email_user='$email_user', no_hp='$no_hp', alamat='$alamat', akses='$akses' WHERE id_user='$id_user'");
		echo '<script language="javascript">alert("Berhasil Ubah Customer !"); 
		document.location="?page=user&data=user";</script>';
        
	}else{ 
		echo '<script language="javascript">alert("Gagal Ubah Customer !"); 
		document.location="?page=user&data=user";</script>';
	} 
}

// ---------------------------------------- USER ----------------------------------------

// ---------------------------------------- MOBIL ----------------------------------------

if($_GET['ubah']=="mobil") {

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
                // echo "Gambar Berhasil di Upload"; 
                // Query Update
                $id_mobil = $_POST['id_mobil'];   
                $no_mobil = $_POST['no_mobil'];
                $merk_mobil = $_POST['merk_mobil'];
                $nama_mobil = $_POST['nama_mobil'];
                $harga_sewa = $_POST['harga_sewa'];
                $image = $gambar_baru.$ekstensi;

                $sql = "UPDATE `t_mobil` SET `no_mobil`='$no_mobil', `merk_mobil`='$merk_mobil' ,`nama_mobil`='$nama_mobil', `harga_sewa`='$harga_sewa', `gambar`='$image' WHERE `id_mobil`='$id_mobil'";
                if (mysqli_query($conn, $sql)) {
                     echo '<script language="javascript">alert("Berhasil Ubah Data Mobil !");document.location="?page=mobil&data=mobil";</script>';
                    if (file_exists($namafolder.$gambar_lama)) {
                        unlink($namafolder.$gambar_lama);
                      }
                } else {
                    $error_msg = "Error updating record: " . mysql_error($con);
                }
            } else {
                echo '<script language="javascript">alert("Gagal Ubah Data Mobil !");document.location="?page=mobil&data=mobil";</script>';
            }
        } else {
            echo'<script language="javascript">alert("Jenis gambar yang anda kirim salah. Harus .jpg .jpeg .png .gif");document.location="?page=mobil&data=mobil";</script>';
        }
    } else {
        $id_mobil = $_POST['id_mobil'];   
    	$no_mobil = $_POST['no_mobil'];
        $merk_mobil = $_POST['merk_mobil'];
        $nama_mobil = $_POST['nama_mobil'];
        $harga_sewa = $_POST['harga_sewa'];

        $sql = "UPDATE `t_mobil` SET `no_mobil`='$no_mobil',`merk_mobil`='$merk_mobil',`nama_mobil`='$nama_mobil',`harga_sewa`='$harga_sewa' WHERE `id_mobil`='$id_mobil'";
        if (mysqli_query($conn, $sql)) {
            echo '<script language="javascript">alert("Berhasil Ubah Data Mobil !");document.location="?page=mobil&data=mobil";</script>';
        } else {
            $error_msg = "Error updating record: " . mysql_error($con);
        }
    }

    if(empty($error_msg)){
        header("location: ?page=mobil&data=mobil");
    }else{
        echo '<script>alert("'.$error_msg.'");</script>';
    }
}

// ---------------------------------------- MOBIL ----------------------------------------

// ---------------------------------------- DATA USER ----------------------------------------

if($_GET['ubah']=="datauser") {

    if(isset($_POST['ubah-datauser'])){

            $id_user = $_POST['id_user'];
            $nik_ktp = $_POST['nik_ktp'];
            $no_sim = $_POST['no_sim'];     
            $nama_user = $_POST['nama_user'];
            $email_user = $_POST['email_user'];         
            $no_hp = $_POST['no_hp'];
            $alamat = $_POST['alamat'];     
        mysqli_query($conn, "UPDATE `t_user` SET nik_ktp='$nik_ktp', no_sim='$no_sim', nama_user='$nama_user', email_user='$email_user', no_hp='$no_hp', alamat='$alamat' WHERE id_user='$id_user'");
        echo '<script language="javascript">alert("Berhasil Ubah Data Anda !"); 
        document.location="?page=profile&data=profile";</script>';
        
    }else{ 
        echo '<script language="javascript">alert("Gagal Ubah Data Anda !"); 
        document.location="?page=profile&data=profile";</script>';
    } 
}

// ---------------------------------------- DATA USER ----------------------------------------
// ---------------------------------------- PASSWORD USER ----------------------------------------

if($_GET['ubah']=="passuser") {

    if(isset($_POST['ubah-passuser'])){
        
            $id_user = $_POST['id_user'];
            $password = $_POST['password'];    
        mysqli_query($conn, "UPDATE `t_user` SET password=MD5('$password') WHERE id_user='$id_user'");
        echo '<script language="javascript">alert("Berhasil Ubah Password Anda !"); 
        document.location="?page=profile&data=profile";</script>';
        
    }else{ 
        echo '<script language="javascript">alert("Gagal Ubah Password Anda !"); 
        document.location="?page=profile&data=profile";</script>';
    } 
}

// ---------------------------------------- PASSWORD USER ----------------------------------------

// ---------------------------------------- TRANSAKSI MOBIL ----------------------------------------

if($_GET['ubah']=="transaksimobil") {

    if(isset($_POST['ubah-transaksimobil'])){
        
        $id_transaksi = $_POST['id_transaksi'];
        $id_mobil = $_POST['id_mobil'];
        $status_sewa = $_POST['status_sewa'];  
        $ket = 1;   
        $status_mobil = 0;
        
        if ($_POST['status_sewa'] == '2') {
            mysqli_query($conn, "UPDATE `t_transaksi` SET status_sewa='$status_sewa', ket='$ket' WHERE id_transaksi='$id_transaksi'");
            echo '<script language="javascript">alert("Berhasil Proses Transaksi !"); 
            document.location="?page=transaksimobil&data=transaksimobil";</script>';
            mysqli_query($conn, "UPDATE `t_mobil` SET `status_mobil`='$status_mobil' WHERE `id_mobil`='$id_mobil'");
        }else{
            mysqli_query($conn, "UPDATE `t_transaksi` SET status_sewa='$status_sewa', ket='$ket' WHERE id_transaksi='$id_transaksi'");
            echo '<script language="javascript">alert("Berhasil Proses Transaksi !"); 
            document.location="?page=transaksimobil&data=transaksimobil";</script>';
        }
        
    }else{ 
        echo '<script language="javascript">alert("Gagal Proses Transaksi !"); 
        document.location="?page=transaksimobil&data=transaksimobil";</script>';
    } 
}

// ---------------------------------------- TRANSAKSI MOBIL ----------------------------------------