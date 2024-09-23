<?php
require '../koneksi.php';

if (isset($_POST['addnew'])) {
    $model = $_POST['model'];
    $nama_alat = $_POST['nama_alat'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];


    // Query SQL untuk menyisipkan data
    $query = "INSERT INTO diagnosis (model, nama_alat, jumlah, keterangan) VALUES ('$model', '$nama_alat', '$jumlah', '$keterangan')";

    if (mysqli_query($conn, $query)) {
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}


if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $model = $_POST['model'];
    $nama_alat = $_POST['nama_alat'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];

    // Update query
    $update_query = "UPDATE diagnosis SET model = '$model', nama_alat = '$nama_alat', jumlah = '$jumlah', keterangan = '$keterangan' WHERE id = '$id'";

    if (mysqli_query($conn, $update_query)) {
        echo "Data updated successfully.";
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }
}
    //------------------ DELETE ------------//
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM diagnosis WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
        } else {
        }
    }
    $sql = "SELECT * FROM diagnosis";
    $result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Stock Alat - Admin Mitsubishi</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!--Link rel untuk logo tab-->
    <link rel="apple-touch-icon" sizes="180x180" href="../img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png">
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
                        <a class="nav-link" href="../index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Stock
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-left"></i></div>
                        </a>
                        <div>
                            <nav class="sb-sidenav-menu-nested">
                            <a class="nav-link" href="diagnosis.php">Diagnosis Tools</a>
                            <a class="nav-link" href="electrical.php">Electrical Tools</a>
                            <a class="nav-link" href="mqp.php">Tools MQP</a> 
                            </nav>
                        </div>
                        <a class="nav-link" href="../riwayat/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                            Riwayat
                        </a>
                        <a class="nav-link" href="../login/nama.php">
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
                    <h1 class="mt-4">STOCK ALAT </h1>
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
                                Data Table Tools Diagnosis
                        </div>
                        <div class="container mt-3">  <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#myModal">Tambah Alat</button>
                            <a class="btn btn-primary" href="../laporan/diagnosis.php" role="button">CETAK</a>
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
                                            <th>keterangan</th>
                                            <th width="70px">Hapus</th>
                                            <th width="70px">Edit</th>
                                        </tr>
                                    </thead>

                                    <tbody align="center">
<?php

    if ($result->num_rows > 0) {
        $no = 1; // nomor urut
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>"; // nomor urut
            echo "<td>" . $row['model'] . "</td>"; // model alat
            echo "<td>" . $row['nama_alat'] . "</td>"; // nama alat
            echo "<td>" . $row['jumlah'] . "</td>"; // jumlah alat
            echo "<td>" . $row['keterangan'] . "</td>"; // kode keterangan
            echo "<td>
                    <form method='post' style='display:inline;'>
                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                        <input type='submit' name='delete' value='Hapus' class='btn btn-danger' />
                    </form>
                  </td>"; // Hapus
            // Menggunakan htmlspecialchars() untuk menghindari masalah XSS
            echo "<td>
                    <button type='button' class='btn btn-info' onclick=\"openEditModal('". htmlspecialchars($row['id'], ENT_QUOTES) . "', '". htmlspecialchars($row['model'], ENT_QUOTES) . "', '". htmlspecialchars($row['nama_alat'], ENT_QUOTES) . "', '". htmlspecialchars($row['jumlah'], ENT_QUOTES) . "', '". htmlspecialchars($row['keterangan'], ENT_QUOTES) . "') \">Edit</button>
                  </td>"; // Edit
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Data tidak ada</td></tr>";
    }
?>

</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Menambah Alat Diagnosis</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"> X </button>
        </div>

            <!-- Modal body -->
             <form method="post">
            <div class="modal-body">
                <label for="model"><b>Model Alat</b></label>
                <input type="text" id="model" name="model">
            <label for="nama_alat"><b>Equipment & Tools</b></label>
            <input type="text" name="nama_alat" id="nama_alat">
    <label for="jumlah"><b>Jumlah</b> </label>
    <input type="number" id="jumlah" name="jumlah">
        </select>
    <label for="keterangan"><b>Keterangan Alat</b></label>
    <input type="text" id="keterangan" name="keterangan" value="diagnosis" readonly>
        
                <br>
                <button type="submit" class="btn btn-primary" name="addnew">Submit</button>
                <button type="reset" class="btn btn-danger" name="reset">Reset</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- The Edit Modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
<div class="modal-header">
    <h4 class="modal-title">Edit Alat</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
</div>


            <!-- Modal Body -->
            <div class="modal-body">
                <form id="editForm" method="post">
                    <input type="hidden" id="edit_id" name="id">
                    <label for="edit_model"><b>Model</b></label>
                    <input type="text" id="edit_model" name="model">
                    
                    <label for="edit_nama_alat"><b>Nama Alat</b></label>
                    <input type="text" id="edit_nama_alat" name="nama_alat">
                    
                    <label for="edit_jumlah"><b>Jumlah</b></label>
                    <input type="number" id="edit_jumlah" name="jumlah">
                    
                    <label for="edit_keterangan"><b>Keterangan</b></label>
                    <input type="text" id="edit_keterangan" name="keterangan">
                    
                    <br>
                    <button type="submit" class="btn btn-primary" name="edit">Edit</button> 
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>
</body>

</html>
 <script>
// JavaScript untuk mengupdate modal dengan data alat
function openEditModal(id, model, nama_alat, jumlah, keterangan) {
    document.getElementById("edit_id").value = id;
    document.getElementById("edit_model").value = model;
    document.getElementById("edit_nama_alat").value = nama_alat;
    document.getElementById("edit_jumlah").value = jumlah;
    document.getElementById("edit_keterangan").value = keterangan;
    var editModal = new bootstrap.Modal(document.getElementById('editModal'));
    editModal.show();
}



///////////////////////////////////////// -------- TIME --------- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
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

        return `${day}, ${month}/${date}/${year}`;
    };

    setClock();
    setInterval(setClock, 1000);

    </script>
<style>
        label, input, select {
            display: block;
            margin: 5px 0;
        }
</style>