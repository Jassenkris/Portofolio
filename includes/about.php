<!-- includes/about.php -->
<section id="about" class="py-5">
    <div class="container">
        <!-- WADAH UTAMA BERLATAR PUTIH -->
        <div class="about-image-layout shadow-sm border-0 rounded-lg p-4 p-md-5" style="background-color: #ffffff;">

            <!-- Judul Section -->
            <div class="text-center section-title-box mb-4">
                <h2 class="h2 font-weight-bold">Tentang Saya</h2>
            </div>

            <!-- Baris 1: Paragraf Deskripsi Utama -->
            <div class="row mb-4">
                <div class="col-12 text-left pb-3">
                    <p class="lead font-weight-normal text-dark m-0">
                        Saya Adalah mahasiswa yang belajar di Politeknik ATMI Surakarta, saat ini saya fokus untuk mengembangkan project saya untuk mengembangkan web portofolio demi mendukung kuliah saya. Memanfaatkan HTML dan CSS sebagai programnya saya memiliki impian untuk terus menyempurnakan web buatan saya.
                    </p>
                </div>
            </div>

            <!-- Baris 2: Visi & Performa (Chart) -->
            <div class="row align-items-start text-left">
                <!-- Kolom Kiri: Visi -->
                <div class="col-md-5 mb-4 mb-md-0 text-center">
                    <h3 class="h3 font-weight-bold text-dark mb-3">Visi</h3>
                    <p class="text-dark leading-relaxed m-0">
                        "Mengoptimalkan potensi diri dalam pemrograman web dasar untuk membangun platform digital yang responsif, ramah pengguna, dan mampu menyelesaikan berbagai permasalahan di dunia industri."
                    </p>
                </div>

                <!-- Kolom Kanan: Rendering Chart + Total Respon & Tombol Vote -->
                <div class="col-md-7">
                    <div class="card border-0 p-2" style="background-color: transparent;">
                        <h3 class="h3 font-weight-bold text-dark mb-3 text-center">Performa</h3>
                        
                        <!-- Container Canvas Chart -->
                        <div style="position: relative; height: 320px; width: 100%;">
                            <canvas id="myChart"></canvas>
                        </div>

                        <!-- di bawah Diagram Chart -->
                        <div class="mt-4 d-flex align-items-center flex-wrap gap-3">
                            <!-- Badge Total Respon -->
                            <div class="mb-3 pr-5">
                                <span class="badge badge-warning p-2 text-dark fs-6">
                                    Total Respon: <strong id="totalResponBadge">0</strong>
                                </span>
                            </div>
                            <!-- Tombol Pemicu Pop-up Vote Modal -->
                            <button type="button" class="btn text-white font-weight-bold shadow-sm" style="background-color: #D9822B; border: none; padding: 10px 24px; border-radius: 25px;" data-toggle="modal" data-target="#voteModal">
                                <i class="fas fa-vote-yea mr-2"></i> Berikan Vote Keahlian
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Voting -->
<div class="modal fade" id="voteModal" tabindex="-1" role="dialog" aria-labelledby="voteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content style-modal">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="voteModalLabel">Pilih Keahlian Utama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p class="text-muted small mb-3">Anda dapat memilih lebih dari satu keahlian.</p>
                <div class="d-flex flex-wrap justify-content-center">
                    <button type="button" class="btn btn-vote-option" data-value="Mekanika">Mekanika</button>
                    <button type="button" class="btn btn-vote-option" data-value="Elektronika">Elektronika</button>
                    <button type="button" class="btn btn-vote-option" data-value="Mikrokontroler">Mikrokontroler</button>
                    <button type="button" class="btn btn-vote-option" data-value="C/C++">C/C++</button>
                    <button type="button" class="btn btn-vote-option" data-value="PLC">PLC</button>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-submit rounded-pill px-4" id="btnSubmitVote">Kirim Vote</button>
            </div>
        </div>
    </div>
</div>