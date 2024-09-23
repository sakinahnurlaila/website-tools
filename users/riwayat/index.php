<?php
require '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Riwayat Peminjaman - Mitsubishi</title>
    <link href="../css/style.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!--Link rel untuk logo tab-->
    <link rel="apple-touch-icon" sizes="180x180" href="../img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand"><b>TOOLS</b></a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../login/logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </form>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">MENU</div>
                        <a class="nav-link" href="../index.php">
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
                            <a class="nav-link" href="../stock/diagnosis.php">Diagnosis Tools</a>
                            <a class="nav-link" href="../stock/electrical.php">Electrical Tools</a>
                            <a class="nav-link" href="../stock/mqp.php">Tools MQP</a>
                            </nav>
                        </div>
                       
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                            Riwayat
                        </a>
                        <a class="nav-link" href="../../admin2/login/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Admin
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer" align="center">
                        HALAMAN USER
                    </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4"> RIWAYAT PEMINJAMAN </h1>

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
                    </div>
                    <br>
                    <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                                Data Tabel Pinjaman Alat
                        </div>
                        <div class="container mt-3"> 
                        <a class="btn btn-dark" href="../stock/pinjam.php" role="button">Pinjam Alat</a>

                        </div>  
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead align="center">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Mekanik</th>
                                            <th>Nama Alat</th>
                                            <th>Jam Pinjam</th>
                                            <th>Jam Kembali</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>

                                    <tbody align="center">
<?php
// Query untuk mengambil riwayat pinjaman
$sql = "SELECT * FROM peminjam";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $no = 1; // Initialize counter
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row["tgl"] . "</td>";
        echo "<td>" . $row["nama"] . "</td>";
        echo "<td>" . $row["nama_alat"] . "</td>";
        echo "<td>" . $row["pinjam"] . "</td>";
        echo "<td>" . $row["kembali"] . "</td>";
        echo "<td>" . $row["ket"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>0 results</td></tr>";
}

$conn->close();
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>
    <script src="../js/scripts.js"></script>
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