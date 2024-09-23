<!DOCTYPE html>
<html>
<head>
	<title>MITSUBISHI PRIMA MOTORS</title>
	<!--Link rel untuk logo tab-->
	<link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">

<style>
body {
	font-family:'Times New Roman', Times, serif, sans-serif;
	background: url(baground/image.jpg) center;
    background-size: 1350px;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	margin: 0;
	}

.wrapper {
            position: relative;
            padding: 5px;
            border-radius: 10px;
            background: linear-gradient(45deg, red, yellow, green, cyan, blue, magenta, red);
            background-size: 400%;
            animation: borderAnimation 5s linear infinite;
        }
        @keyframes borderAnimation {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 400% 0;
            }
        }

form {
	width: 400px;
	padding: 20px;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color:black;
    border-radius: 16px;
}


input {
	display: block;
	border: 2px solid #ffffff;
	width: 95%;
	padding: 10px;
	margin: 10px auto;
	border-radius: 5px;
}

img{
	display: block;
    margin: 0 auto 15px;
    width: 130px;
}

label {
	color: #ffffff;
	font-size: 18px;
	padding: 10px;
}

h1{
	color: #fff;
	text-align: center;
}

button {
	width: 100%;
	padding: 10px;
	background: #AD0F24;
	color: #fff;
	border-radius: 5px;
	border: none;
	cursor: pointer;
}

button:hover {
	opacity: .7;
}

.error {
	background: #f09dab;
	color: #e92e2b;
	padding: 10px;
	width: 95%;
	border-radius: 5px;
	margin: 20px auto;
}

.success {
	background: #ffffff;
	color: #40754C;
	padding: 10px;
	width: 95%;
	border-radius: 5px;
	margin: 20px auto;
}


</style>
</head>

<body>
	<div class="wrapper">
	<form action="login.php" method="post">
		<img src="baground/logo.png" alt="logo">
		<h1>LOGIN ADMIN</h1>
			<?php if (isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
				<?php } ?>
				<label>Nama</label>
				<input type="text" name="nama" placeholder="Masukkan nama anda"><br>
				
				<label>Password</label>
				<input type="password" name="password" placeholder="Masukkann password anda"><br>
				
				<button type="submit">Login</button> <br>
			</form>
		</div>
</body>
</html>