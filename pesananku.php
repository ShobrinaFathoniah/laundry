<?php
    session_start();
    include('rsa-func.php');
    
    $db = mysqli_connect("localhost", "root", "");
    mysqli_select_db($db, 'laundrykuy');

    //tambah
    if(isset($_POST['tmbhBT'])){

        $kd = encode($_POST['kd'], $e, $n);
        $nama = encode($_POST['name'], $e, $n);
        $idp = encode($_POST['idp'], $e, $n);
        $jns = encode($_POST['jns'], $e, $n);
        $brt = encode($_POST['brt'], $e, $n);
        

        $query = "INSERT into pesanan(kd_pesanan, nama, jenis, berat, id_anggota) VALUES 
        ('$kd','$nama', '$jns', '$brt',  '$idp')";
        
        $query_run = mysqli_query($db, $query);

        if($query_run){
        echo "<script> alert('Data Telah di Tambahkan!') </script>";
        }else{
        echo "<script> alert('Data Gagal di Tambahkan!') </script>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Laundry Kuy </title>
        <link rel="stylesheet" href="aset/styles/styles.css">
        <link rel="stylesheet" href="aset/styles/chat.css">
        <link rel="stylesheet" href="aset/styles/login.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <header>
            <div class="awalan">
            </div>
            
            <nav class="navigasi">
                <ul>
                    <li><a href="index_user.php#tentang-kami"> Tentang Kami </a></li>
                    <li><a href="index_user.php#harga"> Harga </a></li>
                    <li><a href="index_user.php#cari-kode"> Cari Kode </a> </li>
                    <li><a href="chat-bot.php"> Chat </a> </li>
                    <li> <a href="buat_pesanan.php"> Buat Pesanan </a> </li>
                    <li>Pesanan Ku</li>
                    <li><a href="dataku.php"> <?php echo decode($_SESSION['uname'], $d, $n); ?> </a> </li>
                    <li> <a href="logout.php"> Logout </a> </li>
                </ul>
            </nav>
        </header>

        <main>
            <div id="konten">
                <h2> Data Pesanan Ku </h2>

                <table class="list-table animate" align="center" style="overflow-x:auto;">
                    <tr>
                        <th>Kode</th>
                        <th>ID Anggota</th>
                        <th>Nama Customer</th>
                        <th>Jenis Layanan</th>
                        <th>Berat/Jumlah Cucian</th>
                        <th>Status</th>
                        <th>Biaya</th>
                        <th>Proses</th>
                        <th>Tanggal Datang</th>
                        <th>Tanggal Pengantaran</th>
                    </tr>

                        <tr>
                        <?php
                            //connect to database

                            $db = mysqli_connect("localhost", "root", "");
                            mysqli_select_db($db, 'laundrykuy');
                            
                            if($db -> connect_error){
                                die("connection failed :". $db-> connect_error);
                            }

                            $unm = $_SESSION['uname'];
                            $qi = "select id_anggota from anggota where uname = '$unm'";

                            $query_run = mysqli_query($db, $qi);
                            foreach($query_run as $as){
                                $ida = $as["id_anggota"];
                            
                            $query = " select * from pesanan where id_anggota = '$ida' ORDER BY tgl_jemput ASC";
                            
                            $result = mysqli_query($db, $query);

                            if(!$result) {
                                die("Query Error : ".mysqli_errno($db)." - ".mysqli_error($db));
                            }
                                while($row = mysqli_fetch_assoc($result)){

                                    echo "<tr>
                                    <td>".decode($row["kd_pesanan"], $d, $n)."</td>
                                    <td>".decode($row["id_anggota"], $d, $n)."</td>
                                    <td>".decode($row["nama"], $d, $n). "</td>
                                    <td>".decode($row["jenis"], $d, $n)."</td>
                                    <td>".decode($row["berat"], $d, $n)."</td>
                                    <td>".decode($row["status"], $d, $n)."</td>
                                    <td>".decode($row["biaya"], $d, $n)."</td>
                                    <td>".decode($row["proses"], $d, $n). "</td>
                                    <td>". $row["tgl_jemput"]. "</td>
                                    <td>". $row["tgl_antar"]. "</td>"
                                ; 
                                }
                                $db -> close();
                            }
                    ?>
                            
            </div>

            <!-- Chat Popup -->
            <p class="open-button" onclick="openForm()">Chat </p>
                <div class="form-popup" id="myForm">
                    <div class="form-container">
                        <div class="chatlogs">
                            <div class="chat bot" id="cb"> 
                                <p> Selamat Datang! Ucapkan "hallo"</p>   
                            </div>
                            <div id="c"></div>
                        </div>

                    <input type="text" id="textBox" placeholder="Tanya Kami" onkeydown="if (event.keyCode == 13) {talk()}">
                        <button id="chat" onclick="talk()"> Send </button>
                        <button class="cancelbtn" onclick="closeForm()">Close</button>
                    </div>
                </div>  

        </main>

        <footer> 
            <p></p> 
        </footer>

        <!-- Script -->

        <script src="aset/script/chat-popup.js"></script>
        <script src="aset/script/chat.js"></script>
    </body>
</html>