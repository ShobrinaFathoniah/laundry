<?php
    session_start();

    $db = mysqli_connect("localhost", "root", "");
    mysqli_select_db($db, 'laundrykuy');
    include('rsa-func.php');

    //update
    if(isset($_POST['update_btn'])){
        $id = $_POST['edit_id'];
        $uname = encode($_POST['euname'], $e, $n);
        $pass = encode($_POST['epass'], $e, $n);
        $nama   = encode($_POST['enama'], $e, $n);
        $alamat = encode($_POST['ealamat'], $e, $n);
        $jk = encode($_POST['ejk'], $e, $n);
        $email = encode($_POST['eemail'], $e, $n);
        $no_hp = encode($_POST['eno_hp'], $e, $n);
        $kec = encode($_POST['ekec'], $e, $n);
        $kel = encode($_POST['ekel'], $e, $n);
  
        $query = "UPDATE anggota SET uname = '$uname', pass = '$pass', nama = '$nama', alamat = '$alamat', jk = '$jk', 
        email = '$email', no_hp ='$no_hp', kec = '$kec', 
        kel = '$kel' WHERE id_anggota = '$id'";
       
       
       $query_run = mysqli_query($db, $query);
       if($query_run){
        echo "<script> alert('Data Telah di Update!') </script>";
       }else{
        echo "<script> alert('Data Gagal di Update!') </script>";
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
                    <li><a href="pesananku.php">Pesanan Ku</a></li>
                    <li><?php echo decode($_SESSION['uname'], $d, $n); ?></li>
                    <li> <a href="logout.php"> Logout </a> </li>
                </ul>
            </nav>
        </header>

        <main>
            <div id="konten">
                <h2> Data Pesanan Ku </h2>
                        <?php
                            //connect to database

                            $db = mysqli_connect("localhost", "root", "");
                            mysqli_select_db($db, 'laundrykuy');
                            
                            if($db -> connect_error){
                                die("connection failed :". $db-> connect_error);
                            }
                                $unm = $_SESSION['uname'];
                                $query = " select * from anggota where uname = '$unm'";
                                $query_run = mysqli_query($db, $query);
                                foreach($query_run as $row){

                                $did = decode($row["id_anggota"], $d, $n);
                                $dnm = decode($row["nama"], $d, $n);
                                
                            ?>
                                <!-- Modal Content -->
                                <form class="modal-content animate" action="" method="POST">              
                                  <div class="container animate">
                                    <label for="uname"> <b> Id Anggota </b> </label>
                                    <input type = "text" name = "eid_anggota" disabled value = "<?php echo $did; ?>">
                                    <input type = "hidden" name = "edit_id" value = "<?php echo $row["id_anggota"]; ?>">
                                    <br>
                                    <label for="uname"><b>Nama</b></label>
                                    <input type="text" name="enama" value="<?php echo $dnm; ?>">
                                    <br>
                                    <label for="uname"><b>User Name</b></label>
                                    <input type="text" name="euname" value="<?php echo decode($row["uname"], $d, $n); ?>">
                                    <br>
                                    <label for="uname"><b>Password</b></label>
                                    <input type="text" name="epass" value="<?php echo decode($row["pass"], $d, $n); ?>">
                                    <br>
                                    <label for="uname"><b>Email</b></label>
                                    <input type="text" value="<?php echo decode($row["email"], $d, $n); ?>" name="eemail">
                                    <br>
                                    <label for="uname"><b>Alamat</b></label>
                                    <input type="text" value="<?php echo decode($row["alamat"], $d, $n); ?>" name="ealamat" >
                                    <br>
                                    <label for="uname"><b>No HP</b></label>
                                    <input type="text" value="<?php echo decode($row["no_hp"], $d, $n); ?>" name="eno_hp" >
                                    <br>
                                    <label for="uname"><b>Jenis Kelamin</b></label>
                                    <input type="text" value="<?php echo decode($row["jk"], $d, $n); ?>" name="ejk" >
                                    <br>
                                    <label for="uname"><b>Kecamatan</b></label>
                                    <input type="text" value="<?php echo decode($row["kec"], $d, $n); ?>" name="ekec" >
                                    <br>
                                    <label for="uname"><b>Kelurahan</b></label>
                                    <input type="text" value="<?php echo decode($row["kel"], $d, $n); ?>" name="ekel">
                                    <br>
                                    <button type="submit" name="update_btn" class="editbtn">Simpan</button>
                                    <br>
                                    <?php 
                                }
                            
                                ?>
                                </form>
                                </div>
                                <?php
                                $db -> close();
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