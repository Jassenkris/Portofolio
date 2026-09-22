// dummy histori 
// 1. Fungsi reusable untuk membuat & memasukkan elemen card ke HTML
function buatCardKomentar(nama, email, pesan) {
    const colDiv = document.createElement('div');
    colDiv.className = 'col-12 col-md-6 col-lg-3 mb-4';

    colDiv.innerHTML = `
        <div class="card h-100 shadow-sm comment-card">
            <div class="card-body p-3 d-flex flex-column">
                <!-- Header Nama & Email -->
                <div class="mb-2">
                    <strong class="d-block text-truncate text-dark" style="max-width: 100%;">${nama}</strong>
                    <small class="text-muted d-block text-truncate">${email}</small>
                </div>
                <hr class="my-2 border-color-custom">
                <!-- Teks pesan -->
                <p class="card-text text-secondary mb-0 text-break" style="font-size: 0.88rem;">${pesan}</p>
            </div>
        </div>
    `;

    document.getElementById('commentHistory').appendChild(colDiv);
}

// 2. Cetak 4 data dummy secara manual saat halaman pertama dimuat
buatCardKomentar("Ahmad", "ahmad@gmail.com", "Desain portofolio yang sangat menarik!");
buatCardKomentar("Gibran", "gibran@yahoo.com", "Halo, saya tertarik untuk bekerja sama dalam proyek web.");
buatCardKomentar("Citra", "citra@gmail.com", "Apakah menerima proyek pembuatan web?");
buatCardKomentar("Coco", "coco@outlook.com", "Sangat profesional, sukses terus untuk kariernya.");

// 3. Event Listener tunggal untuk menangani submit form
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Mencegah reload halaman

    // Ambil nilai dari form
    const nama = document.getElementById('inputNama').value;
    const email = document.getElementById('inputEmail').value;
    const pesan = document.getElementById('inputPesan').value;

    // Notifikasi
    // alert("terimakasih atas pesannya");

    // Panggil fungsi pembuat card
    buatCardKomentar(nama, email, pesan);

    // Reset isi form
    this.reset();
});