/*// dummy histori 
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
*/

document.addEventListener("DOMContentLoaded", function () {
  console.log("MyStyle.js siap digunakan untuk fitur selanjutnya.");
});

// ===================== PROGRAM UNTUK MODAL VOTE =====================
document.addEventListener("DOMContentLoaded", function () {
  let myChart = null;
  const ctx = document.getElementById("myChart");

  // 1. Inisialisasi Chart.js
  if (ctx && typeof Chart !== "undefined") {
    const chartContext = ctx.getContext("2d");
    myChart = new Chart(chartContext, {
      type: "bar",
      data: {
        labels: ["Mekanika", "Elektronika", "Mikrokontroler", "C/C++", "PLC"],
        datasets: [
          {
            label: "Persentase Keahlian (%)",
            backgroundColor: [
              "#dd8c3b",
              "#BF6D1A",
              "#3B332C",
              "#7A7267",
              "#F2E8DC",
            ],
            borderColor: "#E8E1D7",
            borderWidth: 1,
            data: [0, 0, 0, 0, 0],
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false },
          title: {
            display: true,
            text: "Persentase Keahlian Berdasarkan Hasil Vote (%)",
            color: "#3B332C",
            font: { size: 15, family: "'Poppins', sans-serif" },
          },
          tooltip: {
            callbacks: {
              label: function (context) {
                return context.parsed.y + "%";
              },
            },
          },
        },
        scales: {
          x: { ticks: { color: "#7A7267" }, grid: { color: "#E8E1D7" } },
          y: {
            ticks: {
              color: "#7A7267",
              callback: function (value) {
                return value + "%";
              },
            },
            grid: { color: "#E8E1D7" },
            beginAtZero: true,
            max: 100,
          },
        },
      },
    });
  }

  // 2. Fungsi Fetch Data Real-time
  function updateChartData() {
    fetch("includes/vote_handler.php?action=get_data")
      .then((response) => response.json())
      .then((data) => {
        if (data.status === "success") {
          // Update Grafik
          if (myChart) {
            myChart.data.labels = data.labels;
            myChart.data.datasets[0].data = data.percentages;
            myChart.update();
          }

          // Update Badge Total Respon
          const totalBadge = document.getElementById("totalResponBadge");
          if (totalBadge) {
            totalBadge.innerText = data.total_respon;
          }
        }
      })
      .catch((err) => console.error("Error fetching chart data:", err));
  }

  // Jalankan polling jika canvas chart tersedia di halaman
  if (ctx) {
    updateChartData();
    setInterval(updateChartData, 3000); // Polling real-time tiap 3 detik
  }

  // 3. Logika Toggle Tombol Option Vote Modal
  const voteButtons = document.querySelectorAll(".btn-vote-option");
  voteButtons.forEach((btn) => {
    btn.addEventListener("click", function () {
      this.classList.toggle("active");
    });
  });

  // 4. Submit Vote via AJAX
  const btnSubmit = document.getElementById("btnSubmitVote");
  if (btnSubmit) {
    btnSubmit.addEventListener("click", function () {
      const selectedSkills = [];
      document.querySelectorAll(".btn-vote-option.active").forEach((btn) => {
        selectedSkills.push(btn.getAttribute("data-value"));
      });

      if (selectedSkills.length === 0) {
        alert("Silakan pilih minimal 1 keahlian terlebih dahulu!");
        return;
      }

      const formData = new FormData();
      formData.append("action", "submit_vote");
      selectedSkills.forEach((skill) => formData.append("skills[]", skill));

      fetch("includes/vote_handler.php", {
        method: "POST",
        body: formData,
      })
        .then((res) => res.json())
        .then((res) => {
          if (res.status === "success") {
            alert("Terima kasih! Respon Anda berhasil disimpan.");

            // Reset Pilihan Tombol
            voteButtons.forEach((btn) => btn.classList.remove("active"));

            // Tutup Modal
            if (typeof $ !== "undefined") {
              $("#voteModal").modal("hide");
            }

            // Refresh Chart & Respon secara instan
            updateChartData();
          }
        })
        .catch((err) => console.error("Error submitting vote:", err));
    });
  }
});
