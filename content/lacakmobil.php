<?php 
include("../config/config.php");
if($_GET['data']=="lacakmobil") {?>

        <div class="container-fluid">
            <div class="block-header">
                <h2>Lacak Mobil | RentalMobil.com</h2>
            </div>

            <!-- USER -->     
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Lacak Mobil
                            </h2>
                        </div>

                        <div class="body">
                            <div id="mapid" style="width: 100%; height: 500px;"></div>
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