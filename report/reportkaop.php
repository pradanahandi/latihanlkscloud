<?php

@session_start();
ob_start();
include '../config/config.php';
date_default_timezone_set("Asia/Jakarta");

// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$hasil = sqlsrv_query($con,"SELECT TANGGAL FROM A001");
$versi = sqlsrv_fetch_array($hasil,SQLSRV_FETCH_ASSOC);  
$tanggal = $versi['TANGGAL'];
$_SESSION['tanggal'] = $tanggal->format('Y-m-d');

if(!isset($_SESSION['uid'])){
echo"<script>alert('Selamat Datang, Silahkan Login Terlebih Dahulu !');document.location.href='login.php';</script>";
}      

  if (isset($_POST['kirim'])) {
    echo "<script>document.getElementsByName('tglpengajuanbopda')[0].value = '" . $_POST['tglpengajuanbopda'] . "';</script>";
      $_SESSION['tglpengajuanbopda'] = $_POST['tglpengajuanbopda'];
      $tglbopda = $_SESSION['tglpengajuanbopda'];                                                        
    }

  if (isset($_SESSION['tglpengajuanbopda'])) {    
  $hasil = sqlsrv_query($con,"SELECT * FROM BOPDA001 WHERE codecab = '$_SESSION[cabang]' AND tglbopda = '$_SESSION[tglpengajuanbopda]' ORDER BY 'tgl_update' DESC");
      
?>
<html> <!-- Bagian halaman HTML yang akan konvert -->
  <head>
    <title>BOPDA | Koperasi Artha Mandiri Abadi Indonesia</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  </head>
  <body>

    <!-- HEADER -->
    <table align="center" style="font-size: 12px; font-weight: bold;">
      <tr>
        <td>PENGAJUAN BOPDA KOPERASI JASA ARTHA MANDIRI ABADI INDONESIA</td>
      </tr>
    </table>
    
    <table align="left" style="font-size: 10px; font-weight: bold; border-collapse: collapse; margin-left: 20px;">
      <tr>
        <td height="20">Tanggal</td>
        <td width="20" align="center">:</td>
        <td><?php echo date("d F Y",strtotime($_SESSION['tglpengajuanbopda'])); ?></td>
      </tr>
      <tr>
        <td height="20">TPK</td>
        <td align="center">:</td>
        <td><?php if($_SESSION['cabang']=='001001'){
                  echo "KOP. JASA ARTHA MANDIRI ABADI INDONESIA";
                  }
                  elseif($_SESSION['cabang']=='002001'){
                  echo "SURABAYA";
                  }
                  elseif($_SESSION['cabang']=='003001'){
                  echo "DEWI SARTIKA";
                  }
                  elseif($_SESSION['cabang']=='004001'){
                  echo "BANDUNG KEMBAR";
                  }
                  elseif($_SESSION['cabang']=='005001'){
                  echo "BANDUNG CIKAWAO";
                  }
                  elseif($_SESSION['cabang']=='006001'){
                  echo "BANDUNG ABDUL RACHMAN SALEH";
                  }
                  elseif($_SESSION['cabang']=='007001'){
                  echo "CIREBON";
                  }
                  elseif($_SESSION['cabang']=='008001'){
                  echo "KEDIRI";
                  }
                  elseif($_SESSION['cabang']=='009001'){
                  echo "SEMARANG";
                  }
                  elseif($_SESSION['cabang']=='010001'){
                  echo "VIVO BOGOR";
                  }
                  elseif($_SESSION['cabang']=='011001'){
                  echo "YOGYAKARTA";
                  }
                  elseif($_SESSION['cabang']=='012001'){
                  echo "SIDOARJO";
                  } 
            ?></td>
      </tr>
    </table>
    <!-- HEADER -->

    <!-- TABEL CONTENT -->
      <table border="1" align="center" style="border-collapse: collapse; font-size: 9px;">
        <tr align="center" style="font-weight: bold;">
            <th height="20" width="20">NO</th> 
            <th width="60">NOBILYET</th>
            <th width="125">NAMANAS</th>
            <th width="75">NOMINAL</th>
            <th width="90">TGLMULAI</th>
            <th width="30">TYPE</th>
            <th width="125">NAMAAPL</th>
            <th width="75">BOPDA</th>
            <th width="75">BYADM</th>
            <th width="75">TOTAL</th>
            <th width="80">BANK</th>
            <th width="80">NOREK</th>
            <th width="80">ANREK</th>
        </tr>
        <?php
            $no = 0;
            $totalnominal = 0;
            $totalbopda = 0;
            $totalbyadmin = 0;
            $totaltotalbopda = 0;
            while ($data = sqlsrv_fetch_array($hasil,SQLSRV_FETCH_ASSOC)) {
            $no++;                    

            echo "<tr align='center'>";
                echo "<td height='20'>" . $no . "</td>";
                echo "<td>" . $data['nobilyet'] . "</td>";
                echo "<td>" . $data['namanas'] . "</td>";
                echo "<td>Rp. " . number_format($data['nominal']) . "</td>";
                $tglmulai = $data['tglmulai']->format('d F Y');
                echo "<td>" . $tglmulai . "</td>";
                echo "<td>" . $data['type'] . "</td>";
                echo "<td>" . $data['namaapl'] . "</td>";
                echo "<td>Rp." . number_format($data['bopda']) . "</td>";
                $by_adm = $data['byadmin'] + $data['bysertifikat'] + $data['byspsw'];
                echo "<td>Rp. " . number_format($by_adm) . "</td>";
                echo "<td>Rp. " . number_format($data['totalbopda']) . "</td>";
                echo "<td>" . $data['bank'] . "</td>";
                echo "<td>" . $data['norek'] . "</td>";
                echo "<td>" . $data['anrek'] . "</td>";
                $tglbopda = $data['tglbopda']->format('d-F-Y');
                $userinput = $data['user_input'];
            echo "</tr>";
            $totalnominal = $totalnominal + $data['nominal'];
            $totalbopda = $totalbopda + $data['bopda'];
            $totalbyadmin = $totalbyadmin + $by_adm;
            $totaltotalbopda = $totaltotalbopda + $data['totalbopda'];
            }
        ?>
        <tr align="center" style="font-weight: bold;">
            <th colspan="3" height="15"></th> 
            <th>Rp. <?php echo number_format($totalnominal); ?></th>
            <th colspan="3"></th>
            <th>Rp. <?php echo number_format($totalbopda); ?></th>
            <th>Rp. <?php echo number_format($totalbyadmin); ?></th>
            <th>Rp. <?php echo number_format($totaltotalbopda); ?></th>
            <th colspan="3"></th>
        </tr>
    </table>
    <!-- TABEL CONTENT -->


    <!-- FOOTER -->
    <table align="left" style="font-size: 10px; font-weight: bold; border-collapse: collapse; margin-left: 20px; margin-top: -45px;">
      <tr>
        <td width="120" height="15">Bogor, <?php $strDate = $tanggal->format('d F Y'); echo $strDate; ?></td>
        <td width="50"></td>
        <td width="120"></td>
      </tr>
      <tr align="center">
        <td height="10" >Dibuat Oleh,</td>
        <td></td>
        <td>Di Periksa Oleh,</td>
      </tr>
      <tr align="center">
        <td height="60"></td>
        <td></td>
        <td></td>
      </tr>
      <tr align="center">
        <td height="10"><?php echo $userinput; ?></td>
        <td></td>
        <td><?php echo $_SESSION['user'];  ?></td>
      </tr>
      <tr align="center">
        <td height="10">Marketing Support</td>
        <td></td>
        <td>Kepala Operasional</td>
      </tr>
    </table>
    <!-- FOOTER -->

  </body>
</html>
<?php 
    }
    echo 'Report Tidak di Temukan ! Silahkan Coba Lagi';
?>
<!-- Akhir halaman HTML yang akan di konvert -->

<?php
// $filename="mhs-".$kode.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once('html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output();
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>