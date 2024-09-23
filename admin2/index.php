<?php
require 'koneksi.php';


//get data
//ambil data total
$get1 = mysqli_query( $conn,"SELECT nama_alat FROM diagnosis UNION
    SELECT nama_alat FROM electrical UNION
    SELECT nama_alat FROM mqp");
$count1 = mysqli_num_rows($get1); //menghitung seluruh kolom

//ambil data peminjam yang statusnya dipinjam
$get2 = mysqli_query($conn,"select * from peminjam where ket='dipinjam'");
$count2 = mysqli_num_rows($get2); //menghitung seluruh kolom yang statusnya dipinjam

//ambil data peminjam yang statusnya kembali
$get3 = mysqli_query($conn,"select * from peminjam where ket='dikembalikan'");
$count3 = mysqli_num_rows($get3); //menghitung seluruh kolom yang statusnya kembali
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Admin Mitsubishi</title>
         <!--Link rel untuk logo tab-->
        <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
        <link rel="stylesheet" href="css/styles.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand"><b>TOOLS</b></a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        
    </nav>
        <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Stock
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="stock/diagnosis.php">Diagnosis Tools</a>
                                <a class="nav-link" href="stock/electrical.php">Electrical Tools</a>
                                <a class="nav-link" href="stock/mqp.php">Tools MQP</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="riwayat/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                            Riwayat
                        </a>
                        <a class="nav-link" href="login/nama.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Halaman User
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer" align="center">
                        HALAMAN ADMIN
                    </div>
            </nav>
        </div>
            <div id="layoutSidenav_content">
                <main>
                        <div class="container-fluid">
                    <h1 class="mt-4">DASHBOARD</h1>
                    <!--========== TIME ==========-->
                    <div class="digital-clock">
                        <div class="time">
                            <span class="hours">00</span>
                            <span class="colon">:</span>
                            <span class="minutes">00</span>
                            <span class="colon">:</span>
                            <span class="seconds">00</span>
                            <span class="period">PM</span>
                        </div>
                        <div class="date"></div>
                        <br>
                    </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">DAFTAR ALAT YANG TERSEDIA <br> <?=$count1;?> ALAT</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#table">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">DAFTAR ALAT YANG DIPINJAM <br> <?=$count2;?> PEMINJAM</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="riwayat/index.php">View Details</a>

                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">ALAT YANG SUDAH DIKEMBALIKAN <br> <?=$count3;?> ALAT</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="riwayat/index.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">ALAT YANG BELUM DIKEMBALIKAN <br> <?=$count2;?> ALAT</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="riwayat/index.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                        <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                                Data Table Tools
                        </div>
                        <div class="container mt-3" id="table">
                        </div>  
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead align="center"> 
                                        <tr>
                                            <th>No</th>
                                            <th>Model</th>
                                            <th>Equipment & Tools</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
<?php

$sql = "
    SELECT model, nama_alat, jumlah, keterangan FROM diagnosis
    UNION
    SELECT model, nama_alat, jumlah, keterangan FROM electrical
    UNION
    SELECT model, nama_alat, jumlah, keterangan FROM mqp
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $no = 1; // nomor urut
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>"; // nomor urut
        echo "<td>" . $row['model'] . "</td>"; // model alat
        echo "<td>" . $row['nama_alat'] . "</td>"; // nama alat
        echo "<td>" . $row['jumlah'] . "</td>"; // jumlah alat
        echo "<td>" . $row['keterangan'] . "</td>"; // kode keterangan
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>Data tidak ada</td></tr>";
}
?>

</tbody>
        </table>
                </main>
                <footer class="py-2 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flexjustify-content-between small">
                        <div class="text-muted " align="center">Copyright &copy; 2024 </div>
                    </div>
                </div>
            </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>

<script>
    // TIME  
    const setClock = () => {
        const today = new Date();
        const {
            hours,
            minutes,
            seconds,
            period
        } = formatTime(today);


        document.querySelector(".hours").textContent = hours;
        document.querySelector(".minutes").textContent = minutes;
        document.querySelector(".seconds").textContent = seconds;
        document.querySelector(".period").textContent = period;

        document.querySelector(".date").textContent = formatDate(today);
    };

    const formatTime = (todayDate) => {
        let hours = todayDate.getHours();
        let minutes = todayDate.getMinutes();
        let seconds = todayDate.getSeconds();

        let period = hours >= 12 ? "PM" : "AM";

        hours = hours > 12 ? hours % 12 : hours;

        hours = hours < 10 ? `0${hours}` : hours;
        minutes = minutes < 10 ? `0${minutes}` : minutes;
        seconds = seconds < 10 ? `0${seconds}` : seconds;

        return {
            hours,
            minutes,
            seconds,
            period
        };
    };

    const formatDate = (todayDate) => {
        const date = todayDate.getDate();
        const year = todayDate.getFullYear();
        const day = todayDate.toLocaleString("default", {
            weekday: "long"
        });
        const month = todayDate.toLocaleString("default", {
            month: "long"
        });

        return `${day},  ${month}/${date}/${year}`;
    };

    setClock();
    setInterval(setClock, 1000);
</script>