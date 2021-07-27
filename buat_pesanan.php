<?php
    session_start();

    include('rsa-func.php')
?>

<html>

<head>
        <title> Laundry Kuy </title>
        <link rel="stylesheet" href="aset/styles/styles.css">
        <link rel="stylesheet" href="aset/styles/login.css">
        <link rel="stylesheet" href="aset/styles/edit.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<header>             
    <nav class="navigasi">
        <ul>
            <li><a href="index_user.php#tentang-kami"> Tentang Kami </a></li>
            <li><a href="index_user.php#harga"> Harga </a></li>
            <li><a href="index_user.php#cari-kode"> Cari Kode </a> </li>
            <li>Buat Pesanan</li>
            <li><a href="pesananku.php">Pesanan Ku</a></li>
            <li> <a href="dataku.php">  <?php echo decode($_SESSION['uname'], $d, $n); ?> </a> </li>
            <li> <a href="logout.php"> Logout </a> </li>
        </ul>
    </nav>
</header>    
    <!-- Modal Content -->
    <form class="modal-contents animate" action="pesananku.php" method="POST">              
    <div class="container">
        <label for="uname"><b>Kode Pesanan</b></label>
        <input type="text" placeholder="Enter Kode Pesanan" name="kd" required>
        <br>
        <label>Masukan Kode dengan 3 huruf username Anda</label>
        <br>
        <label for="uname"><b>Nama Pemesan</b></label>
        <input type="text" placeholder="Enter Nama Pemesan" name="name" required>
        <br>
        <label for="uname"><b>Id Anggota</b></label>
        <input type="text" placeholder="Enter Id Pemesan" name="idp" required>
        <br>
        <label for="uname"><b>Jenis Layanan</b></label>
        <input type="text" placeholder="Enter Jenis Layanan Cucian Anda" name="jns" required>
        <br>
        <label for="uname"><b>Berat/Jumlah Cucian</b></label>
        <input type="text" placeholder="Enter Berat Cucian" name="brt" required>
        <br>
        <button type="submit" class="regisbtn" name="tmbhBT">Tambah Pesanan</button>
    </form>
    </div>
</body>
</html>