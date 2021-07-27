<?php
session_start();

if(isset($_POST['print_btn'])){
      header("Content-type: application/octet-stream");
      header("Content-Disposition: attachment; filename=Laporan Pesanan Laundry Kuy.xls");//ganti nama sesuai keperluan
      header("Pragma: no-cache");
      header("Expires: 0");
    }
?>

<!DOCTYPE HTML>
<html>
    <header>
        <title> Print Laporan Pesanan </title>
    </header>

    <body>
        <h1 align = "center"> Laporan Pesanan Laundry Kuy </h1>
        <table align = "center" border = "1">
            <tr>
                <th>Kode</th>
                <th>Nama Customer</th>
                <th>Jenis Cucian</th>
                <th>Berat Cucian</th>
                <th>Status</th>
                <th>Biaya</th>
                <th>Proses</th>
                <th>Tanggal Datang</th>
                <th>Tanggal Pengantaran</th>
            </tr>
              <?php
              //connect to database

                $db = mysqli_connect("localhost", "root", "");
                mysqli_select_db($db, 'laundrykuy');
                include('rsa-func.php');

                if($db -> connect_error){
                  die("connection failed :". $db-> connect_error);
                }
                
                $sql = " select * from pesanan ORDER BY tgl_antar ASC";
                $result = $db-> query($sql);

                if($result-> num_rows > 0){
                  while($row = $result-> fetch_assoc()){
                    $kdd = decode($row["kd_pesanan"], $d, $n);
                    $nmd = decode($row["nama"], $d, $n);
                    $jnd = decode($row["jenis"], $d, $n);
                    $brd = decode($row["berat"], $d, $n);
                    $std = decode($row["status"], $d, $n);
                    $bid = decode($row["biaya"], $d, $n);
                    $prd = decode($row["proses"], $d, $n);
                    $tgpd = $row["tgl_jemput"];
                    $tgad = $row["tgl_antar"];

                    echo "<tr>
                     <td>". $kdd."</td>
                     <td>". $nmd. "</td>
                     <td>". $jnd."</td>
                     <td>". $brd."</td>
                     <td>". $std."</td>
                    <td>". $bid."</td>
                    <td>". $prd. "</td>
                    <td>". $tgpd. "</td>
                    <td>". $tgad. "</td>";
                    }
                  echo "</table>";
                }else{
                  echo "0 result";
                }
                $db -> close();
                ?>
                <br>
                <br>
                <br>
                <br>
            <p align='center'>Copyright &copy; 2020 - All Rights Reserved</p>
    </body>
</html>