<?php
    session_start();
    $db = mysqli_connect("localhost", "root", "");
    mysqli_select_db($db, 'laundrykuy');
    include('rsa-func.php');

//delete
  if(isset($_POST['delete_btn'])){

    $id_anggota = $_POST['delete_id'];    

    $query = "DELETE FROM anggota WHERE id_anggota = '$id_anggota'";
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
      $id_anggota = encode($_POST['eid_anggota'], $e, $n);
      $nama   = encode($_POST['enama'], $e, $n);
      $alamat = encode($_POST['ealamat'], $e, $n);
      $jk = encode($_POST['ejk'], $e, $n);
      $email = encode($_POST['eemail'], $e, $n);
      $no_hp = encode($_POST['eno_hp'], $e, $n);
      $kec = encode($_POST['ekec'], $e, $n);
      $kel = encode($_POST['ekel'], $e, $n);

      $query = "UPDATE anggota SET id_anggota = '$id_anggota', nama = '$nama', alamat = '$alamat', jk = '$jk', 
      email = '$email', no_hp ='$no_hp', kec = '$kec', 
      kel = '$kel' WHERE id_anggota = '$id'";
     
     $query_run = mysqli_query($db, $query);

     if($query_run){
      echo "<script> alert('Data Telah di Update!') </script>";
     }else{
      echo "<script> alert('Data Gagal di Update!') </script>";
     }
    }

    //tambah
    if(isset($_POST['tmbhBT'])){
        $username = encode($_POST['uname'], $e, $n);
        $password = encode($_POST['pass'], $e, $n);
        $nama = encode($_POST['name'], $e, $n);
        $jk = encode($_POST['jk'], $e, $n);
        $alamat = encode($_POST['alamat'], $e, $n);
        $email = encode($_POST['email'], $e, $n);
        $no_tlp = encode($_POST['no_hp'], $e, $n);
        $kec = encode($_POST['kec'], $e, $n);
        $kel = encode($_POST['kel'], $e, $n);
        
        $query = "INSERT into anggota(nama, uname, pass, alamat, jk, email, no_hp, kec, kel) VALUES 
        ('$nama', '$username', '$password', '$alamat', '$jk', '$email', '$no_tlp', '$kec', '$kel')";
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
                    <li><a href="datapesanan_all.php"> Data Pesanan </a></li>
                    <li> Data Anggota </a></li>
                    <li> <?php echo $_SESSION['uname']; ?> </li>
                    <li> <a href="logout.php"> Logout </a> </li>
                </ul>
            </nav>
        </header>

        <main>
            <div id="konten">
            <article id="dataAnggota" class="card">
                    <h2> Data Anggota </h2>
                    <form action = "print_anggota.php" method="POST" align="right">
                        <button type = "submit" name="print_btn" class="print_btn"> Print </button>
                    </form>

                    <form action="" method="POST" class="cari-kode">
                        <input type="text" name="cari_anggota" placeholder="Pencarian" style="color: black;">
                        <button type = "submit" name="cari" class="cari"> Cari </button>
                    </form>
                    <br>
                    <table class="list-table animate" align="center">
                        <tr>
                            <th>ID Anggota</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Nomor Handphone</th>
                            <th colspan ='2'> Aksi </th>
                        </tr>

                        <tr border="0">
                        <?php
                            //connect to database

                            $db = mysqli_connect("localhost", "root", "");
                            mysqli_select_db($db, 'laundrykuy');
                            
                            if($db -> connect_error){
                                die("connection failed :". $db-> connect_error);
                            }

                            if(isset($_POST['cari'])){
                                
                                $pencarian = encode($_POST['cari_anggota'], $e, $n);
                                
                                $query = "SELECT * FROM anggota WHERE id_anggota like '%".$pencarian."%' OR nama like '%".$pencarian."%' 
                                OR alamat like '%".$pencarian."%' OR kec like '%".$pencarian."%' OR kel like '%".$pencarian."%'
                                OR email like '%".$pencarian."%' OR jk like '%".$pencarian."%' OR no_hp like '%".$pencarian."%' ORDER BY id_anggota ASC";
                                
                                $result = mysqli_query($db, $query);

                                if(!$result) {
                                    die("Query Error : ".mysqli_errno($db)." - ".mysqli_error($db));
                                }

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                    <td>". decode($row["id_anggota"], $d, $n)."</td>
                                    <td>". decode($row["nama"], $d, $n). "</td>
                                    <td>". decode($row["alamat"], $d, $n)."</td>
                                    <td>". decode($row["kec"], $d, $n)."</td>
                                    <td>". decode($row["kel"], $d, $n)."</td>
                                    <td>". decode($row["jk"], $d, $n)."</td>
                                    <td>". decode($row["email"], $d, $n). "</td>
                                    <td>". decode($row["no_hp"], $d, $n). "</td>"
                            ?>
                                        <td> 
                                            <form action = "edita.php" method="POST">
                                                <input type="hidden" name="edit_id" value = "<?php echo $row['id_anggota']; ?>">
                                                <button type = "submit" name="edit_btn" class="editbtn"> Update </button>
                                            </form>
                                        </td>

                                        <td> <form action = "" method="POST">
                                        <input type="hidden" name="delete_id" value = "<?php echo $row['id_anggota']; ?>">
                                            <button type = "submit" name="delete_btn" class="deletebtn"> Delete </button>
                                        </form>
                                        </td>
                                        </tr>
                                        <?php
                                        ; 
                                }
                             $db -> close();
                
                
                            }else{
                                $sql = " select id_anggota, nama, alamat, jk, email, no_hp, kec, kel from anggota order by id_anggota DESC";
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
                                    <td>". decode($row["no_hp"], $d, $n). "</td>"
                                ?>
                                <td>
                                    <form action = "edita.php" method="POST">
                                        <input type="hidden" name="edit_id" value = "<?php echo $row['id_anggota']; ?>">
                                        <button class="editbtn" onclick="document.getElementById('id03').style.display='block'"> Update </button>
                                    </form>
                                </td>

                                <td> <form action = "" method="POST">
                                <input type="hidden" name="delete_id" value = "<?php echo $row['id_anggota']; ?>">
                                    <button type = "submit" name="delete_btn" class="deletebtn"> Delete </button>
                                </form>
                                </td>
                                </tr>
                                <?php
                                ; 
                                } ?>                   
                                <tr>
                                <td colspan = '10'> <button class='tambahbtn'
                                onclick="document.getElementById('id02').style.display='block'"> Tambah Anggota </button> </td>
                                </tr>
                                </table>
                                <br>
                                <?php
                                }else{
                                ?>
                                <tr>
                                    <td> 0 Result </td>
                                </tr>
                                <tr>
                                    <td colspan = '10'> <button class='tambahbtn'
                                        onclick="document.getElementById('id02').style.display='block'"> Tambah Anggota </button> </td>
                                </tr>
                                </table>
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
                    <label for="uname"> <b> Id Anggota </b> </label>
                    <input type = "text" name = "id_anggota" placeholder="Enter Id Anggota" required>
                    <br>
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <br>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="pass" required>
                    <br>
                    <label for="uname"><b>Nama</b></label>
                    <input type="text" placeholder="Enter your Name" name="name" required>
                    <br>
                    <label for="uname"><b>Email</b></label>
                    <input type="text" placeholder="Enter your Email" name="email" required>
                    <br>
                    <label for="uname"><b>Alamat</b></label>
                    <input type="text" placeholder="Enter your Address" name="alamat" required>
                    <br>
                    <label for="uname"><b>No HP</b></label>
                    <input type="text" placeholder="Enter your Phone Number" name="no_hp" required>
                    <br>
                    <label for="uname"><b>Jenis Kelamin</b></label>
                    <input type="text" placeholder="Enter your Gender" name="jk" required>
                    <br>
                    <label for="uname"><b>Kecamatan</b></label>
                    <input type="text" placeholder="Enter your Kecamatan" name="kec" required>
                    <br>
                    <label for="uname"><b>Kelurahan</b></label>
                    <input type="text" placeholder="Enter your Kelurahan" name="kel" required>
                    <br>
                    <button type="submit" class="regisbtn" name="tmbhBT">Registrasi</button>
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