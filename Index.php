<?php
require_once __DIR__ . '/includes/koneksi.php';

// 1. PROSES SIMPAN DATA (Jalan sebelum HTML dicetak)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_contact'])) {
    $nama  = trim(mysqli_real_escape_string($conn, $_POST['nama']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $pesan = trim(mysqli_real_escape_string($conn, $_POST['pesan']));

    if (!empty($nama) && !empty($email) && !empty($pesan)) {
        $sql_insert = "INSERT INTO contacts (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
        
        if (mysqli_query($conn, $sql_insert)) {
            // Redirect aman tanpa memicu error header
            header("Location: index.php?status=success#contact");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Portofolio Saya - Responsive Bootstrap 4.6</title>

    <!-- 1. Local Bootstrap CSS (Version 4.6x) -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- FontAwesome (Version 5.15.4) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <!-- integrity (chek program), crossorigin (menjaga history pencarian web kita secara anonim), referrerpolicy (menjaga alamat URL tidak bocor) -->

    <!-- 3. Local Google Fonts (Poppins) -->
    <link rel="stylesheet" href="assets/font/Poppins/poppins.css">

    <!-- 4. MyStyle Custom -->
    <link rel="stylesheet" href="assets/css/MyStyle.css">
    
</head>
<body data-spy="scroll" data-target="#navbarNav" data-offset="80">
    <!-- 1. Header / Navbar -->
    <?php include 'includes/header.php'; ?>
    
    <!-- 2. Hero Section -->
    <?php include 'includes/hero.php'; ?>

    <!-- 3. Services Section -->
    <?php include 'includes/services.php'; ?>

    <!-- 4. About Section -->
    <?php include 'includes/about.php'; ?>

    <!-- 5. Contact Section -->
    <?php include 'includes/contact.php'; ?>

    <!-- 6. Footer Section -->
    <?php include 'includes/footer.php'; ?>

    <!-- JavaScript Links -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/js/MyStyle.js"></script>
</body>
</html>

<?php
// Tutup koneksi di sini setelah seluruh halaman selesai dimuat
if (isset($conn)) {
    mysqli_close($conn);
}
?>