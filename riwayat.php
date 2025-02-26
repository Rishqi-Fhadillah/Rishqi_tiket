<?php
include 'koneksi.php';
// Mengambil username dari URL
$username = isset($_GET['username']) ? $_GET['username'] : '';
// Query untuk mengambil data transaksi berdasarkan username
$sql = "SELECT * FROM transactions WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username); // Pastikan tipe parameter sesuai dengan jenis data (string untuk username)
$stmt->execute();
$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cinema</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="icon" type="image/png" href="img/logo_cinema.png" sizes="256x256">

</head>


<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap"
    rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/animate/animate.min.css" rel="stylesheet">
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->

    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php
    include 'components/navbar.php'
    ?>

    <!-- Navbar End -->


    <!-- Service Start -->

    <div class="container mt-4">
        <div class="card">
            <div class="card-header" style="background-color: #D32F2F;">
                <h4 class="mb-0" style="color: white;">Riwayat Transaksi</h4>
            </div>

            <div class="card-body">
                <div class="table table-responsive">
                    <table id="transactionTable" class="table table-bordered display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Transaksi</th>
                                <th>Email</th>
                                <th>Nama Film</th>
                                <th>Nomor Kursi</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Jenis Pembayaran</th>
                                <th>Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['order_id']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['nama_film']}</td>
                            <td>{$row['seat_number']}</td>
                            <td>{$row['transaction_time']}</td>
                            <td>{$row['payment_type']}</td>
                            <td>Rp " . number_format($row['amount'], 0, ',', '.') . "</td>
                            <td>";
                                // Cek status transaksi
                                if ($row['status'] == 'settlement') {
                                    echo '<span class="badge bg-success">Selesai</span>';
                                } elseif ($row['status'] == 'pending') {
                                    echo '<span class="badge bg-warning">Menunggu Pembayaran</span>';
                                } else {
                                    echo '<span class="badge bg-danger">' . $row['status'] . '</span>';
                                }
                                echo "</td></tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTables dan Bootstrap -->
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#transactionTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true
            });
        });
    </script>


    <!-- Service End -->

    <!-- Footer Start -->
    <?php
    include 'components/footer.php'
    ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-square rounded-circle back-to-top" style="background-color: #D32F2F; border-color: #D32F2F;">
        <i class="bi bi-arrow-up" style="color: white;"></i>
    </a>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>