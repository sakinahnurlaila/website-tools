<?php
session_start();
include '../koneksi.php';

if (isset($_POST['nama']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$nama = validate($_POST['nama']);
	$password = validate($_POST['password']);

	if (empty($nama)) {
		header("Location: index.php?error=nama is required");
	    exit();
	}else if(empty($password)){
        header("Location: index.php?error=Password is required");
	    exit();

    }else{
        
		$sql = "SELECT * FROM login WHERE nama='$nama' AND password='$password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['nama'] === $nama && $row['password'] === $password) {
            	$_SESSION['nama'] = $row['nama'];
            	header("Location: ../index.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect nama or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect nama or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}

?>