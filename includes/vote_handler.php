<?php
header('Content-Type: application/json');
require_once __DIR__ . '/koneksi.php';

$action = $_REQUEST['action'] ?? '';

if ($action === 'get_data') {
    // 1. Ambil angka Total Respon dari baris 'respon'
    $queryTotal = mysqli_query($conn, "SELECT total_vote FROM votes WHERE skill_name = 'respon'");
    $rowTotal   = mysqli_fetch_assoc($queryTotal);
    $totalRespon = (int)($rowTotal['total_vote'] ?? 0);

    // 2. Hitung Grand Total seluruh centang (untuk pembagi persentase grafik)
    $querySumVotes = mysqli_query($conn, "SELECT SUM(total_vote) AS grand_total FROM votes WHERE skill_name != 'respon'");
    $rowSum = mysqli_fetch_assoc($querySumVotes);
    $grandTotalVotes = (int)($rowSum['grand_total'] ?? 0);

    // 3. Ambil Data Skill (Kecualikan baris 'respon' agar tidak masuk ke diagram)
    $queryData = mysqli_query($conn, "SELECT skill_name, total_vote FROM votes WHERE skill_name != 'respon' ORDER BY id ASC");
    $labels = [];
    $percentages = [];

    while ($row = mysqli_fetch_assoc($queryData)) {
        $labels[]  = $row['skill_name'];
        $voteCount = (int)$row['total_vote'];

        // Hitung persentase dinamis
        $percent = ($grandTotalVotes > 0) ? round(($voteCount / $grandTotalVotes) * 100, 1) : 0;
        $percentages[] = $percent;
    }

    echo json_encode([
        'status'       => 'success',
        'total_respon' => $totalRespon,
        'labels'       => $labels,
        'percentages'  => $percentages
    ]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'submit_vote') {
    $skills = $_POST['skills'] ?? [];

    if (!empty($skills) && is_array($skills)) {
        // A. Tambahkan vote pada setiap skill yang dipilih oleh user
        foreach ($skills as $skill) {
            $cleanSkill = mysqli_real_escape_string($conn, $skill);
            mysqli_query($conn, "UPDATE votes SET total_vote = total_vote + 1 WHERE skill_name = '$cleanSkill'");
        }

        // B. Tambahkan +1 pada baris 'respon' (1 kali kirim vote = 1 respon)
        mysqli_query($conn, "UPDATE votes SET total_vote = total_vote + 1 WHERE skill_name = 'respon'");

        echo json_encode(['status' => 'success']);
        exit();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Pilihan skill kosong']);
        exit();
    }
}

echo json_encode(['status' => 'error', 'message' => 'Aksi tidak valid']);
exit();
?>