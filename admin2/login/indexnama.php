<?php
session_start();
include '../koneksi.php';

if (isset($_POST['nama'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$nama = validate($_POST['nama']);

	if (empty($nama)) {
		header("Location: nama.php?error=nama is required");
	    exit();

    }else{
        
		$sql = "SELECT * FROM peminjam WHERE nama='$nama'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['nama'] === $nama) {
            	$_SESSION['nama'] = $row['nama'];
            	header("Location: index.php");
		        exit();
            }else{
				header("Location: nama.php?error=Incorect nama");
		        exit();
			}
		}else{
			header("Location: nama.php?error=Incorect nama");
	        exit();
		}
	}
	
}else{
	header("Location: nama.php");
	exit();
}

?>