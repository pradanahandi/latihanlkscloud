<?php
include("config/config.php");
 if($_GET['data']=="mobilhome") {?>
    <div class="row">
        <?php
            $hasil = mysqli_query($conn, "SELECT * FROM `t_mobil` ORDER BY merk_mobil ASC");
            while ($data = mysqli_fetch_array($hasil)) {
            
                echo '<div class="col-sm-6 col-md-4">';
                    echo '<div class="thumbnail">';
                        echo '<img src="images/mobil/'.$data['gambar'].'" width=70%>';
                        echo '<div class="caption">';
                            echo '<h3>'.$data['merk_mobil'].' '.$data['nama_mobil'].'</h3>';
                            echo '<h5>Harga Sewa : Rp. ' . number_format($data['harga_sewa']) . ' ,- / Hari</h5>';
                            echo '<p align=center>';
                            if($data['status_mobil']=='0'){
                                echo "<span class='badge bg-green'>Mobil Tersedia</span><br><br>";
                                echo '<a onclick="return konfirmasi()" href="login.php" class="btn btn-info btn-xs waves-effect">Pesan Sekarang</a>';
                            }
                            else{
                                 echo "<span class='badge bg-red'>Tidak Tersedia</span><br><br>";
                                echo '<a href="" class="btn btn-info btn-xs waves-effect" disabled="disabled">Pesan Sekarang</a>';
                            }
                            echo '</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
<?php } elseif($_GET['data']=="mobillacak") { ?>
    <div class="row">
        <div id="mapid" style="width: 95%; height: 500px; margin: 0 auto;"></div>
        <?php
            $run = mysqli_query($conn, "SELECT * FROM `t_lacak`");
        ?>
        <script>
            var mymap = L.map('mapid').setView([-6.5129526,106.8601936], 14);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(mymap);

            var bluemarker = L.icon({
              iconUrl: "images/carpoint.png",
              iconSize: [55, 55],
              iconAnchor: [20, 5],
            });

            <?php 
                while ($data = mysqli_fetch_assoc($run)) : 
                    $sqll = mysqli_query($conn, "SELECT * FROM t_mobil where id_mobil = '$data[id_mobil]'");
                    $data1 = mysqli_fetch_assoc($sqll);
                    $nomobil = $data1['no_mobil'];
                    $merk = $data1['merk_mobil'];
                    $namamobil = $data1['nama_mobil'];
            ?>
            L.marker([<?php echo $data['x']; ?>, <?php echo $data['y']; ?>],{icon: bluemarker}).addTo(mymap)
                .bindPopup("<b>Mobil</b> : <br><?php echo $nomobil; ?><br><?php echo $merk; ?> <?php echo $namamobil; ?>
                    <br><br><b>Lokasi</b> :<br><?php echo $data['x']; ?><br><?php echo $data['y']; ?>");
            <?php endwhile; ?>

        </script>
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
