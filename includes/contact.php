<?php
require_once __DIR__ . '/koneksi.php';

// Hanya bertugas mengambil data riwayat pesan dari database
$sql_history = "SELECT * FROM contacts ORDER BY id DESC";
$res_history = mysqli_query($conn, $sql_history);
?>

<!-- ==================== 5. CONTACT SECTION ==================== -->
<section id="contact" class="py-5">
    <div class="container">
        <div class="text-center section-title-box mb-4">
            <h2 class="h2 font-weight-bold">Kontak Saya</h2>
        </div>
        
        <div class="row align-items-stretch">
            <!-- Left Column: Informasi Kontak -->
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="contact-info-card h-100 d-flex flex-column justify-content-between p-4">
                    <div>
                        <h3 class="h4 mb-3">Mari Bekerja Bersama</h3>
                        <p class="mb-4">Anda memiliki project atau ingin membuat perubahan? Silahkan menghubungi saya.</p>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="far fa-envelope mr-3 text-white"></i>
                            <a href="mailto:krisjassen@gmail.com" class="contact-link">krisjassen@gmail.com</a>
                        </div>
                        
                        <div class="d-flex align-items-center mb-4">
                            <i class="fas fa-phone-alt mr-3 text-white"></i>
                            <a href="tel:+6281280202260" class="contact-link">+62 812-8020-2260</a>
                        </div>
                    </div>

                    <div class="social-icons pt-3">
                        <a href="https://www.linkedin.com/in/jassen-kris-815987439" target="_blank" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://www.facebook.com/share/19WGTWjues/" target="_blank" aria-label="Facebook">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/jassen167" target="_blank" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column: Form Kirim Pesan -->
            <div class="col-lg-7">
                <div class="contact-form-card h-100 d-flex flex-column justify-content-between p-4">
                    <div>
                        <h3 class="h4 mb-4">Kirim Pesan</h3>

                        <!-- Menggunakan Alert Pop-up -->
                        <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                            <script>
                                // 1. Tampilkan Alert
                                alert('Pesan Anda berhasil dikirim!');

                                // 2. Bersihkan URL dari parameter '?status=success' tanpa me-reload halaman
                                if (window.history.replaceState) {
                                    const cleanUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + "#contact";
                                    window.history.replaceState({path: cleanUrl}, '', cleanUrl);
                                }
                            </script>
                        <?php endif; ?>

                        <form id="contactForm" action="" method="POST">
                            <div class="form-group mb-3">
                                <input type="text" name="nama" id="inputNama" class="form-control form-control-custom" placeholder="Nama Anda" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" name="email" id="inputEmail" class="form-control form-control-custom" placeholder="Email Anda" required>
                            </div>
                            <div class="form-group mb-4">
                                <textarea name="pesan" id="inputPesan" class="form-control form-control-custom" rows="5" placeholder="Pesan Anda" required></textarea>
                            </div>
                            <div>
                                <button type="submit" name="submit_contact" class="btn btn-submit">Kirim Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Bottom Row: Riwayat Pesan Dinamis dari Database -->
            <div class="col-12 mt-5 p-3">
                <h4 class="h5 mb-3">Riwayat Pesan:</h4>
                
                <!-- Bungkus div row dengan class scroll khusus -->
                <div class="history-scroll-box">
                    <div class="row">
                        <?php
                        if ($res_history && mysqli_num_rows($res_history) > 0) {
                            while ($row = mysqli_fetch_assoc($res_history)) {
                                ?>
                                <div class="col-12 col-md-6 col-lg-3 mb-4">
                                    <div class="card h-100 shadow-sm comment-card">
                                        <div class="card-body p-3 d-flex flex-column">
                                            <div class="mb-2">
                                                <strong class="d-block text-truncate text-dark" style="max-width: 100%;"><?php echo htmlspecialchars($row['nama']); ?></strong>
                                                <small class="text-muted d-block text-truncate"><?php echo htmlspecialchars($row['email']); ?></small>
                                            </div>
                                            <hr class="my-2 border-color-custom">
                                            <p class="card-text text-secondary mb-0 text-break" style="font-size: 0.88rem;"><?php echo htmlspecialchars($row['pesan']); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo '<div class="col-12"><p class="text-muted">Belum ada riwayat pesan.</p></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>