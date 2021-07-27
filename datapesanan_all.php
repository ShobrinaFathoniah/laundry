<?php

session_start();
$db = mysqli_connect("localhost", "root", "");
mysqli_select_db($db, 'laundrykuy');
include('rsa-func.php');

		
//delete
  if(isset($_POST['delete_btn'])){

    $kd_pesanan = $_POST['delete_id'];    

    $query = "DELETE FROM pesanan WHERE kd_pesanan = '$kd_pesanan'";
    $query_run = mysqli_query($db, $query);

       if($query_run){
        echo "<script> alert('Data Telah di Hapus!') </script>";
       }else{
        echo "<script> alert('Data Gagal di Hapus!') </script>";
       }
  }

  //update
    if(isset($_POST['update_btn'])){
        $id = $_POST['edit_id'];
        $kd = encode($_POST['ekd'], $e, $n);
        $nama = encode($_POST['ename'], $e, $n);
        $idp = encode($_POST['eidp'], $e, $n);
        $jns = encode($_POST['ejns'], $e, $n);
        $brt = encode($_POST['ebrt'], $e, $n);
        $proses = encode($_POST['eproses'], $e, $n);
        $biaya = encode($_POST['ebiaya'], $e, $n);
        $tgl_k = $_POST['etgl_k'];
        $status = encode($_POST['estatus'], $e, $n);
        $tgl_t = $_POST['etgl_t'];

        
      $query = "UPDATE pesanan SET kd_pesanan = '$kd', tgl_jemput = '$tgl_t', nama = '$nama', jenis = '$jns', 
      berat = '$brt', proses ='$proses', tgl_antar = '$tgl_k', biaya = '$biaya', status = '$status', 
      id_anggota = '$idp' WHERE kd_pesanan = '$id'";
     
     $query_run = mysqli_query($db, $query);

     if($query_run){
      echo "<script> alert('Data Telah di Update!') </script>";
     }else{
      echo "<script> alert('Data Gagal di Update!') </script>";
     }
    }

    //tambah
    if(isset($_POST['tmbhBT'])){

        $kd = encode($_POST['kd'], $e, $n);
        $nama = encode($_POST['name'], $e, $n);
        $idp = encode($_POST['idp'], $e, $n);
        $jns = encode($_POST['jns'], $e, $n);
        $brt = encode($_POST['brt'], $e, $n);
        $proses = encode($_POST['proses'], $e, $n);
        $biaya = encode($_POST['biaya'], $e, $n);
        $tgl_k = $_POST['tgl_k'];
        $status = encode($_POST['status'], $e, $n);
        $tgl_t = $_POST['tgl_t'];
        

        $query = "INSERT into pesanan(kd_pesanan, tgl_jemput, nama, jenis, berat, proses, tgl_antar, biaya, status, id_anggota) VALUES 
        ('$kd', '$tgl_t', '$nama', '$jns', '$brt', '$proses', '$tgl_k', '$biaya', '$status', '$idp')";
        
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
                <li><a href="index_admin.php#tentang-kami"> Tentang Kami </a></li>
                    <li><a href="index_admin.php#harga"> Harga </a></li>
                    <li><a href="index_admin.php#cari-kode"> Cari Kode </a> </li>
                    <li>Data Pesanan</li>
                    <li><a href="dt_anggota.php"> Data Anggota </a></li>
                    <li> <?php echo $_SESSION['uname']; ?> </li>
                    <li> <a href="logout.php"> Logout </a> </li>
                </ul>
            </nav>
        </header>

        <main>
            <div id="konten">
            <article id="dataPesanan" class="card">
                    <h2> Data Pesanan </h2>
                    <form action = "print_pesanan.php" method="POST" align="right">
                        <button type = "submit" name="print_btn" class="print_btn"> Print </button>
                    </form>

                    <form action="" method="POST" class="cari-kode">
                        <input type="text" name="cari_pesanan" placeholder="Pencarian" style="color: black;">
                        <button type = "submit" name="cari" class="cari"> Cari </button>
                    </form>
                    <br>
                    <table class="list-table animate" align = "center">
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
                        <th colspan ='2'>Aksi</th>
                    </tr>

                        <tr>
                        <?php
                            //connect to database

                            $db = mysqli_connect("localhost", "root", "");
                            mysqli_select_db($db, 'laundrykuy');
                            
                            if($db -> connect_error){
                                die("connection failed :". $db-> connect_error);
                            }

                            if(isset($_POST['cari'])){
                                $pencarian = encode($_POST['cari_pesanan'], $e, $n);
                                
                                $query = "SELECT * FROM pesanan WHERE kd_pesanan like '%".$pencarian."%' OR nama like '%".$pencarian."%' 
                                OR jenis like '%".$pencarian."%' OR berat like '%".$pencarian."%' OR proses like '%".$pencarian."%'
                                OR biaya like '%".$pencarian."%' OR tgl_jemput like '%".$pencarian."%' OR tgl_antar like '%".$pencarian."%' 
                                OR status like '%".$pencarian."%' ORDER BY tgl_jemput ASC";
                                
                                $result = mysqli_query($db, $query);

                                if(!$result) {
                                    die("Query Error : ".mysqli_errno($db)." - ".mysqli_error($db));
                                }

                                while ($row = mysqli_fetch_assoc($result)) {
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
                                    <td>". $tgad. "</td>"
                                     
                                        ?>
                                        <td> 
                                            <form action = "editp.php" method="POST">
                                                <input type="hidden" name="edit_id" value = "<?php echo $row['kd_pesanan']; ?>">
                                                <button type = "submit" name="edit_btn" class="editbtn"> Update </button>
                                            </form>
                                        </td>

                                        <td> <form action = "" method="POST">
                                        <input type="hidden" name="delete_id" value = "<?php echo $row['kd_pesanan']; ?>">
                                            <button type = "submit" name="delete_btn" class="deletebtn"> Delete </button>
                                        </form>
                                        </td>
                                        </tr>
                                        <?php
                                        ; 
                                }
                             $db -> close();
                
                
                            }else{
                                $sql = " select * from pesanan ORDER BY tgl_jemput ASC";
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
                                    <td>". $tgad. "</td>"
                                ?>
                                <td>
                                    <form action = "editp.php" method="POST">
                                        <input type="hidden" name="edit_id" value = "<?php echo $row['kd_pesanan']; ?>">
                                        <button class="editbtn" onclick="document.getElementById('id03').style.display='block'"> Update </button>
                                    </form>
                                </td>

                                <td> <form action = "" method="POST">
                                <input type="hidden" name="delete_id" value = "<?php echo $row['kd_pesanan']; ?>">
                                    <button type = "submit" name="delete_btn" class="deletebtn"> Delete </button>
                                </form>
                                </td>
                                </tr>
                                <?php
                                ; 
                                } ?>                   
                                <tr>
                                <td colspan = '11'> <button class='tambahbtn'
                                onclick="document.getElementById('id02').style.display='block'"> Tambah Pesanan </button> </td>
                                </tr>
                                </table>
                                <br>
                                <?php
                                }else{
                                ?>
                                <tr>
                                    <td colspan = '11'> 0 Result </td>
                                </tr>
                                <tr>
                                    <td colspan = '11'> <button class='tambahbtn'
                                        onclick="document.getElementById('id02').style.display='block'"> Tambah Pesanan </button> 
                                    </td>
                                </tr>
                                </table>
                                <br>
                                <?php
                                }

                                $db -> close();
                                
                            }
                            ?>
                                
                </article>

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

            <!-- Penambahan Popup -->
            <div id="id02" class="modal">
                <span onclick="document.getElementById('id02').style.display='none'"
              class="close" title="Close Modal">&times;</span>
              
                <!-- Modal Content -->
                <form class="modal-content animate" action="" method="POST">
                <div class="imgcontainer">
                    <img src="aset/gambar/logo.jpeg" alt="Avatar" class="avatar">
                </div>
              
                  <div class="container">
                    <label for="uname"><b>Kode Pesanan</b></label>
                    <input type="text" placeholder="Enter Kode Pesanan" name="kd" required>
                    <br>
                    <label for="uname"><b>Nama Pemesan</b></label>
                    <input type="text" placeholder="Enter Nama Pemesan" name="name" required>
                    <br>
                    <label for="uname"><b>Id Pemesan</b></label>
                    <input type="text" placeholder="Enter Id Pemesan" name="idp" required>
                    <br>
                    <label for="uname"><b>Jenis Layanan</b></label>
                    <input type="text" placeholder="Enter Jenis Layanan Cucian Anda" name="jns" required>
                    <br>
                    <label for="uname"><b>Berat/Jumlah Cucian</b></label>
                    <input type="text" placeholder="Enter Berat Cucian" name="brt" required>
                    <br>
                    <label for="uname"><b>Proses</b></label>
                    <input type="text" placeholder="Enter Proses Cucian" name="proses" required>
                    <br>
                    <label for="uname"><b>Biaya</b></label>
                    <input type="text" placeholder="Enter Total Biaya" name="biaya" required>
                    <br>
                    <label for="uname"><b>Tanggal Terima</b></label>
                    <input type="text" placeholder="Enter Tanggal Terima" name="tgl_t" required>
                    <br>
                    <label for="uname"><b>Status</b></label>
                    <input type="text" placeholder="Enter Status Barang" name="status" required>
                    <br>
                    <label for="uname"><b>Tanggal Pengiriman</b></label>
                    <input type="text" placeholder="Enter Tanggal Pengiriman" name="tgl_k">
                    <br>
                    <button type="submit" class="regisbtn" name="tmbhBT">Tambah Pesanan</button>
                    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                    <br>
                </form>
                </div>
            </div>
              

        </main>

        <footer> 
            
            <p> Temukan Kami di <br> 
                <img src="aset/gambar/addres.png" width="3%"> Perumahan Jatimulya 20 nomor 11, Bekasi, Jawa Barat</img><br>
                <img src="aset/gambar/ig.png" width="3%"> @laundry.kuyy </img>
                <img src="aset/gambar/wa.png" width="3%"> +62 878 8898 5397 </img>
                <img src="aset/gambar/email.png" width="3%"> admin.laundrykuy@outlook.com </img> <br><br>
                 Copyright 2020 &copy; Laundry Kuy
            </p> 
        </footer>

        <!-- Script -->
        
        <script src="aset/script/chat-popup.js"></script>
        <script src="aset/script/chat.js"></script>

    </body>
</html>