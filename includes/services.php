<?php
// Panggil file koneksi terpisah
include_once __DIR__ . '/koneksi.php';

// Query mengambil 3 data kartu utama
$sql_services = "SELECT * FROM services";
$res_services = mysqli_query($conn, $sql_services);
?>

<!-- ==================== 3. SERVICES SECTION ==================== -->
<section id="services" class="text-center py-5">
    <div class="container">
        <div class="section-title-box mb-4">
            <h2 class="h2 font-weight-bold">Layanan</h2>
        </div>

        <div class="row">
            <?php
            if ($res_services && mysqli_num_rows($res_services) > 0) {
                // Looping 3 Kartu Utama
                while ($service = mysqli_fetch_assoc($res_services)) {
                    $service_id = $service['id'];
                    $icon = !empty($service['icon']) ? $service['icon'] : 'fas fa-cogs';
                    $warna = !empty($service['warna']) ? $service['warna'] : 'icon-navy';

                    // Query mengambil list detail sesuai id kartu
                    $sql_details = "SELECT * FROM services_details WHERE service_id = '$service_id'";
                    $res_details = mysqli_query($conn, $sql_details);
                    ?>
                    
                    <!-- col-md-4 membagi layar menjadi 3 kolom seimbang -->
                    <div class="col-md-4 mb-4">
                        <div class="card card-service h-100 p-3">
                            <div class="card-body">
                                <!-- $icon icon yang di inginkan -->
                                <i class="<?php echo $icon; ?> fa-3x <?php echo $warna; ?> mb-3"></i> 
                                <!-- $service judul besar yang di inginkan -->
                                <h3 class="h5 font-weight-bold mb-3">
                                    <?php echo $service['judul_layanan']; ?>
                                </h3>
                                
                                <ul class="list-unstyled text-left mb-0">
                                    <?php
                                    if ($res_details && mysqli_num_rows($res_details) > 0) {
                                        while ($detail = mysqli_fetch_assoc($res_details)) {
                                            echo '<li class="mb-2">';
                                            echo '<i class="fas fa-check mr-2 text-warning"></i>';
                                            // <!-- isi detail judul kecil dan penjelasan -->
                                            echo '<strong>' . $detail["judul_layanan"] . ': </strong>' . $detail["detail_layanan"];
                                            echo '</li>';
                                        }
                                    } else {
                                        echo '<li>Belum ada detail.</li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            } else {
                echo '<div class="col-12"><p>Data layanan kosong.</p></div>';
            }
            ?>
        </div>
    </div>
</section>
