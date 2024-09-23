<?php
require '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Data Alat MQP</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!--Link rel untuk logo tab-->
    <link rel="apple-touch-icon" sizes="180x180" href="../img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

</head>
<body>
<div id="layoutSidenav_content">
    <main>
        <center>
    <div class="container-fluid">
    <h1 class="mt-4">Cetak Laporan</h1>
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
    </center>
    <!-- =======  Data-Table  = Start  ========================== -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table table-striped table-bordered">
                    <a class="btn btn-primary" href="../stock/mqp.php" role="button" aria-disabled="true">MQP Tools</a>
                        <thead>
                            <tr class="table-dark" align="center">
                                <th colspan="4">DATA ALAT </th>
                            </tr>
                            <tr align="center">
                                <th>No</th>
                                <th>Model</th>
                                <th>Equipment & Tools</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            <?php
                        $sql = "SELECT * FROM mqp";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $no = 1; // nomor urut
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>"; // nomor urut
            echo "<td>" . $row['model'] . "</td>"; // model alat
            echo "<td>" . $row['nama_alat'] . "</td>"; // nama alat
            echo "<td>" . $row['jumlah'] . "</td>"; // jumlah alat
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
    <!-- =======  Data-Table  = End  ===================== -->
    <!-- ============ Java Script Files  ================== -->
</div>
</main>
</div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/pdfmake.min.js"></script>
    <script src="assets/js/vfs_fonts.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>

<script>
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

        return `${day}, ${month} ${date} ${year}`;
    };

    setClock();
    setInterval(setClock, 1000);


</script>