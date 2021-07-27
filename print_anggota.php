<?php
session_start();

if(isset($_POST['print_btn'])){
      header("Content-type: application/octet-stream");
      header("Content-Disposition: attachment; filename=Laporan Anggota Laundry Kuy.xls");//ganti nama sesuai keperluan
      header("Pragma: no-cache");
      header("Expires: 0");
    }
?>

<!DOCTYPE HTML>
<html>
    <header>
        <title> Print Laporan Anggota </title>
    </header>

    <body>
        <h1 align = "center"> Laporan Anggota Laundry Kuy </h1>
        <table align = "center" border = "1">
            <tr>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Nomor Handphone</th>
            </tr>
              <?php
              //connect to database

                $db = mysqli_connect("localhost", "root", "");
                mysqli_select_db($db, 'laundrykuy');
                include('rsa-func.php');

                if($db -> connect_error){
                  die("connection failed :". $db-> connect_error);
                }
                
                $sql = " select * from anggota ORDER BY id_anggota ASC";
                $result = $db-> query($sql);

                if($result-> num_rows > 0){
                  while($row = $result-> fetch_assoc()){
                    echo "<tr>
                                <td>". decode($row["id_anggota"], $d, $n)."</td>
                                <td>". decode($row["nama"], $d, $n). "</td>
                                <td>". decode($row["alamat"], $d, $n)."</td>
                                <td>". decode($row["kec"], $d, $n)."</td>
                                <td>". decode($row["kel"], $d, $n)."</td>
                                <td>". decode($row["jk"], $d, $n)."</td>
                                <td>". decode($row["email"], $d, $n). "</td>
                                <td>". decode($row["no_hp"], $d, $n). "</td>";
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