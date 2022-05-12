<?php
@session_start(); 
ob_start();
include '../config/config.php';
date_default_timezone_set("Asia/Jakarta");
// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if(!isset($_SESSION['uid'])){
echo"<script>document.location.href='../login.php';</script>";
}

  if (isset($_POST['kirim'])) {
      echo "<script>document.getElementsByName('tglawal')[0].value = '" . $_POST['tglawal'] . "';</script>";
      echo "<script>document.getElementsByName('tglakhir')[0].value = '" . $_POST['tglakhir'] . "';</script>";

      $_SESSION['tglawal'] = $_POST['tglawal'];
      $_SESSION['tglakhir'] = $_POST['tglakhir'];

      $tglawal = $_SESSION['tglawal'];
      $tglakhir = $_SESSION['tglakhir'];                                                      
    }

?>
<html> <!-- Bagian halaman HTML yang akan konvert -->
  <head>
    <title>Laporan Transaksi | RentalMobil.com</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  </head>
  <body>
    <?php 
      if (isset($_SESSION['tglawal']) AND isset($_SESSION['tglakhir'])) {    
        $hasil = mysqli_query($conn, "SELECT * FROM t_transaksi WHERE DATE(tgl_sewa) BETWEEN '$_SESSION[tglawal]' AND '$_SESSION[tglakhir]';"); 
        $total = mysqli_num_rows($hasil);
          if($total > 0){
    ?> 

      <!-- HEADER -->
    <table align="center" style="font-size: 14px; font-weight: bold;">
      <tr>
        <td>Laporan Transaksi Sewa Mobil | RentalMobil.com</td>
      </tr>
    </table>
    <hr>
    <table align="left" style="font-size: 12px; font-weight: bold; border-collapse: collapse; margin-left: 20px;">
      <tr>
        <td height="20">Tanggal</td>
        <td width="20" align="center">:</td>
        <td><?php echo date("d F Y",strtotime($_SESSION['tglawal'])); ?></td>
      </tr>
      <tr>
        <td align="right">s/d</td>
        <td align="center">:</td>
        <td><?php echo date("d F Y",strtotime($_SESSION['tglakhir'])); ?></td>
      </tr>
    </table>
    <!-- HEADER -->

    <!-- TABEL CONTENT -->
    <table border="1" align="center" style="border-collapse: collapse; font-size: 9px; table-layout: fixed; width: 100%;">
      <tr align="center" style="font-weight: bold;">
          <th height="20" width="20">No</th> 
          <th width="100">Tgl Sewa</th>
          <th width="100">ID Transaksi</th>
          <th width="100">Customer</th>
          <th width="60">No Mobil</th>
          <th width="80">Mobil</th>
          <th width="30">Lama</th>
          <th width="80">Total Harga</th>
          <th width="80">Status Sewa</th>
      </tr>
      <?php
        $no = 0;
        $totalsewa = 0;
        while ($data = mysqli_fetch_array($hasil)) {
        $no++;                 

          echo "<tr align=center>";
            echo "<td align=center>" . $no . "</td>";
            $date = date('d F Y', strtotime($data['tgl_sewa']));
            echo "<td>" . $date . "</td>";

            $tglid = date('dmY', strtotime($data['tgl_sewa']));  
            echo "<td>RM/T/" . $tglid . "/000" . $data['id_transaksi'] . "</td>";

            $sqll = mysqli_query($conn, "SELECT * FROM t_user where id_user = '$data[id_user]'");
            $data1 = mysqli_fetch_assoc($sqll);
            $namauser = $data1['nama_user'];
            echo "<td>" . $namauser . "</td>";

            $sqlll = mysqli_query($conn,"SELECT * FROM t_mobil where id_mobil = '$data[id_mobil]'");
            $data2 = mysqli_fetch_assoc($sqlll);
            $nomobil = $data2['no_mobil'];
            $merk = $data2['merk_mobil'];
            $namamobil = $data2['nama_mobil'];
            echo "<td>" . $nomobil . "</td>";
            echo "<td>" . $merk . " " . $namamobil . "</td>";

            echo "<td >" . $data['lama'] . "</td>";
            echo "<td>Rp. " . number_format($data['total_harga']) . " ,-</td>";
            if($data['status_sewa']=='0'){
                echo "<td>Booking</td>";
            }elseif($data['status_sewa']=='1'){
                echo "<td>Dalam Perjalanan</td>";
            }else{
                echo "<td>Selesai</td>";
            }
          echo "</tr>";
          $totalsewa = $totalsewa + $data['total_harga'];
        }
      ?>
      <tr align="center" style="font-weight: bold;">
            <td colspan="7" height="15">Total Keseluruhan</td> 
            <td colspan="2">Rp. <?php echo number_format($totalsewa); ?>,-</td>
        </tr>
    </table>
    <!-- TABEL CONTENT -->

    <?php
          }else{
            echo "<p align=center>";
            echo "Report Tidak di Temukan ! Silahkan Cek Data Kembali";
            echo "</p>";
          }
        }
    ?>
  </body>
</html>
<!-- Akhir halaman HTML yang akan di konvert -->

<?php
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once('html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output();
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>