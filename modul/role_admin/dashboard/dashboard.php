<?php
include("config/koneksi.php");
if (!isset($_SESSION['role'])) {
    header('location:index.php');
}

// fetch data dari db tabel transaksi where kolom tanggalnya = tanggal hari ini
$dateNow = date("Y-m-d");
$queryTotalToday = "SELECT SUM(total) AS total FROM transaksi WHERE tanggal = '$dateNow'";
$resultTotalToday = mysqli_query($conn, $queryTotalToday);
$rowTotalToday = mysqli_fetch_assoc($resultTotalToday);
$totalToday = $rowTotalToday['total'];


// fetch data dari db tabel transaksi where tanggalnya 1bulan sebelumnya hingga hari ini
$datePrevMonth = date('Y-m-d', strtotime('-1 month', time()));
// $queryTotalPrevMonth = "SELECT SUM(total) AS total FROM transaksi WHERE tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()";
$queryTotalPrevMonth = "SELECT SUM(total) AS total FROM transaksi WHERE tanggal >= '$datePrevMonth' AND  tanggal <= '$dateNow'";
$resultTotalPrevMonth = mysqli_query($conn, $queryTotalPrevMonth);
$rowPrevMonth = mysqli_fetch_assoc($resultTotalPrevMonth);
$totalPrevMonth = $rowPrevMonth['total'];

?>
<div id="dashboard">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <div class="container mt-5 ml-0">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                        <h3> Rp. <?php echo number_format($totalToday,2,',','.'); ?> </h3>
                        <p> Penghasilan Hari Ini </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3> Rp. <?php echo number_format($totalPrevMonth,2,',','.'); ?> </h3>
                        <p> Penghasilan Bulan Ini </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <h3>Data Adminds</h3>
    <table id="dataTable" cellspacing="0" class="table">
        <thead class="table-dark">
            <tr>
                <th>Id_admin</th>
                <th>Email</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM admin";
            $result = mysqli_query($conn, $query);

            while ($data = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td> <?php echo $data['id_admin']; ?> </td>
                    <td> <?php echo $data['email']; ?> </td>
                    <td> <?php echo $data['nama']; ?> </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table> -->
</div>
<style>
    .card-box {
        position: relative;
        color: #fff;
        padding: 20px 10px 40px;
        margin: 60px 0px;
    }

    .card-box:hover {
        text-decoration: none;
        color: #f1f1f1;
    }

    .card-box:hover .icon i {
        font-size: 100px;
        transition: 1s;
        -webkit-transition: 1s;
    }

    .card-box .inner {
        padding: 5px 10px 0 10px;
    }

    .card-box h3 {
        font-size: 27px;
        font-weight: bold;
        margin: 0 0 8px 0;
        white-space: nowrap;
        padding: 0;
        text-align: left;
    }

    .card-box p {
        font-size: 15px;
    }

    .card-box .icon {
        position: absolute;
        top: auto;
        bottom: 5px;
        right: 5px;
        z-index: 0;
        font-size: 72px;
        color: rgba(0, 0, 0, 0.15);
    }

    .card-box .card-box-footer {
        position: absolute;
        left: 0px;
        bottom: 0px;
        text-align: center;
        padding: 3px 0;
        color: rgba(255, 255, 255, 0.8);
        background: rgba(0, 0, 0, 0.1);
        width: 100%;
        text-decoration: none;
    }

    .card-box:hover .card-box-footer {
        background: rgba(0, 0, 0, 0.3);
    }

    .bg-blue {
        background-color: #00c0ef !important;
    }

    .bg-green {
        background-color: #00a65a !important;
    }

    .bg-orange {
        background-color: #f39c12 !important;
    }

    .bg-red {
        background-color: #d9534f !important;
    }
</style>