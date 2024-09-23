<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MITSUBISHI MOTORS</title>
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<style>
    body{
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

        .container {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            background-color: black;
        }

        .container img{
            display: block;
            margin: 0 auto 20px;
            width: 100px;
        }

        .container h2 {
            margin-bottom: 7px;
            text-align: center;
            color: #a2a2a2;
        }
        .container input {
            width: 93%;
            padding: 10px;
            margin: 30px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #edededf0;
            color: #333;
            font-size: 16px;
        }

        .container button {
            width: 100%;
            padding: 10px;
            background-color: #AD0F24;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .container button:hover {
            	opacity: .8;
        }

</style>
<body>
    <div class="wrapper">
        <div class="container">
            <img src="baground/logo.png" alt="logo">
            <form action="../../users/index.php" method="post">
            <h2>MASUKKAN NAMA ANDA</h2>
            <?php if (isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
				<?php } ?>
            <input type="text" name="nama" placeholder="Masukkan Nama Anda">
            <button type="submit">LANJUT</button>
            </form>
        </div>
    </div>
</body>
</html>