<?php 
@session_start();
include 'config/config.php';
date_default_timezone_set('Asia/Jakarta');


if(!isset($_SESSION['uid'])){
  echo"<script>alert('Anda Tidak Memiliki Akses, Dilarang Memasuki Halaman Ini !');document.location.href='login.php';</script>";
}

// ---------------------------------------- USER ----------------------------------------

if($_GET['hapus']=="user") {

	$id_user = $_GET['id_user'];
    $delete="DELETE FROM `t_user` WHERE id_user='$id_user'"; mysqli_query($conn, $delete); 
    if($delete){
		echo '<script language="javascript">alert("Berhasil Hapus Customer !"); 
			document.location="?page=user&data=user";</script>';
	}else {
		echo '<script language="javascript">alert("Gagal Hapus Customer !"); 
			document.location="?page=user&data=user";</script>';
	} 
}

// ---------------------------------------- USER ----------------------------------------

// ---------------------------------------- MOBIL ----------------------------------------

if($_GET['hapus']=="mobil") {

	$id_mobil = $_GET['id_mobil'];

	$sql = "SELECT * FROM `t_mobil` WHERE `id_mobil`='$id_mobil'";
    $query = mysql_query($sql);
    if(mysql_num_rows($query) > 0){
        while ($row = mysql_fetch_array($query)) {
            $gambar_lama = $row['gambar'];
        }

    	$sql = "DELETE FROM `t_mobil` WHERE `id_mobil`='$id_mobil'";
		$query = mysql_query($sql);
		//Delete gambar
		$namafolder="images/mobil/";
		if (file_exists($namafolder.$gambar_lama)) {
	    	unlink($namafolder.$gambar_lama);
	  	}
	  	echo '<script language="javascript">alert("Berhasil Hapus Data Mobil !"); 
			document.location="?page=mobil&data=mobil";</script>';
    }
	
	header("location: ?page=mobil&data=mobil");

}

// ---------------------------------------- MOBIL ----------------------------------------

?>