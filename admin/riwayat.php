<?php
include '../koneksi.php';
// Mengambil username dari URL
$username = isset($_GET['username']) ? $_GET['username'] : '';
// Query untuk mengambil data transaksi berdasarkan username
$sql = "SELECT * FROM transactions WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username); // Pastikan tipe parametersesuai dengan jenis data (string untuk username)
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords"
        content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Dashboard Admin </title>
    <link rel="icon" type="image/png" href="../img/logo_cinema.png" sizes="256x256">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/vendors/css/charts/chartist.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/pages/dashboard-ecommerce.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- Tambahkan CSS DataTables -->
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">


    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    <!-- fixed-top-->
    <?php
    include 'components/navbar.php'
    ?>

    <!-- Konten -->
    <div class="content">
        <h2 class="text-center mb-4">Daftar Transaksi</h2>
        <div class="table-responsive">
            <table id="transactionTable" class="table table-bordered table-hover">
                <thead class="table-dark">
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
                    include '../koneksi.php'; // Menghubungkan ke database

                    // Mengecek apakah koneksi berhasil
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Query untuk mengambil data transaksi
                    $sql = "SELECT t.id AS order_id, t.username, t.nama_film, t.seat_number, 
                            t.transaction_time, t.payment_type, t.amount, t.status 
                            FROM transactions t 
                            ORDER BY t.transaction_time DESC 
                            LIMIT 10";

                    // Mengeksekusi query
                    $result = $conn->query($sql);

                    // Mengecek apakah query berhasil
                    if (!$result) {
                        die("Query failed: " . $conn->error);
                    }

                    // Cek apakah ada hasil data
                    if ($result->num_rows > 0) {
                        $no = 1; // Nomor urut
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['order_id']}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['nama_film']}</td>
                                <td>{$row['seat_number']}</td>
                                <td>{$row['transaction_time']}</td>
                                <td>{$row['payment_type']}</td>
                                <td>Rp. " . number_format($row['amount'], 0, ',', '.') . "</td>
                                <td>";

                            // Menentukan status transaksi
                            if ($row['status'] == 'settlement') {
                                echo '<span class="badge bg-success">Selesai</span>';
                            } elseif ($row['status'] == 'pending') {
                                echo '<span class="badge bg-warning text-dark">Menunggu Pembayaran</span>';
                            } else {
                                echo '<span class="badge bg-danger">' . htmlspecialchars($row['status']) . '</span>';
                            }

                            echo "</td></tr>";
                            $no++;
                        }
                    } else {
                        // Jika tidak ada data
                        echo "<tr><td colspan='9' class='text-center text-danger'>Tidak ada transaksi ditemukan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>




    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <?php
    include 'components/footer.php'
    ?>

    <!-- BEGIN VENDOR JS-->
    <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="theme-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="theme-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- Tambahkan jQuery dan DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
    $('#transactionTable').DataTable({
        dom: 'Bfrtip', // Menampilkan tombol export
        buttons: [
            {
                extend: 'copyHtml5',
                text: 'Copy',
                className: 'btn btn-secondary',
                title: 'Riwayat_Transaksi'
            },
            {
                extend: 'csvHtml5',
                text: 'CSV',
                className: 'btn btn-primary',
                title: 'Riwayat_Transaksi'
            },
            {
                extend: 'excelHtml5',
                text: 'Excel',
                className: 'btn btn-success',
                title: 'Riwayat_Transaksi'
            },
            {
                extend: 'pdfHtml5',
                text: 'PDF',
                className: 'btn btn-danger',
                title: 'Riwayat_Transaksi'
            },
            {
                extend: 'print',
                text: 'Print',
                className: 'btn btn-info',
                title: 'Riwayat_Transaksi'
            }
        ],
        language: {
            lengthMenu: "Tampilkan _MENU_ transaksi per halaman",
            zeroRecords: "Tidak ada data transaksi ditemukan",
            info: "Menampilkan halaman _PAGE_ dari _PAGES_",
            infoEmpty: "Tidak ada transaksi tersedia",
            infoFiltered: "(difilter dari total _MAX_ transaksi)",
            search: "Cari:",
            paginate: {
                first: "Awal",
                last: "Akhir",
                next: "Selanjutnya",
                previous: "Sebelumnya"
            }
        },
        ordering: true,
        paging: true,
        searching: true
    });
});

    </script>

</body>

</html>