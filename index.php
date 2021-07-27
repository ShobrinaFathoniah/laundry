<?php
    session_start();
    $db = mysqli_connect("localhost", "root", "");
    mysqli_select_db($db, 'laundrykuy');
    include('rsa-func.php');

    //login
    if(isset($_POST['login_btn'])){

    $uname = encode($_POST['uname'], $e, $n);
    $pass = encode($_POST['pass'], $e, $n);

    $s = "select * from anggota where uname = '$uname' && pass = '$pass'";
    $result = mysqli_query($db, $s);
    $num = mysqli_num_rows($result);
    
    $un = decode($uname, $d, $n);
    $pa = decode($pass, $d, $n);

    if($un == 'admin' && $pa == '123456'){
        $_SESSION['uname'] = $un;
        echo "<script> alert('Selamat Datang!') </script>";
        header('location: index_admin.php');
    }else if($num == 1){
        $_SESSION['uname'] = $uname;
        echo " <script> alert('Selamat Datang!') </script>";
        header('location: index_user.php');
    }else{
        echo "<script> alert('Maaf, Username dan Password anda Salah! Silahkan ulangi kembali') </script> ";
    }     
}

    //registrasi
    if(isset($_POST['regis_btn'])){
    
        $id = encode($_POST['id_anggota'], $e, $n);
        $uname = encode($_POST['uname'], $e, $n);
        $password = encode($_POST['pass'], $e, $n);
        $nama = encode($_POST['name'], $e, $n);
        $jk = encode($_POST['jk'], $e, $n);
        $alamat = encode($_POST['alamat'], $e, $n);
        $email = encode($_POST['email'], $e, $n);
        $no_tlp = encode($_POST['no_hp'], $e, $n);
        $kec = encode($_POST['kec'], $e, $n);
        $kel = encode($_POST['kel'], $e, $n);
        
    $s = "select * from anggota where id_anggota = '$id' or uname = '$uname'";

    $result = mysqli_query($db, $s);

    $num = mysqli_num_rows($result);

    if($num == 1){
        echo "<script> alert('Id Anggota atau Username telah digunakan! ') </script> ";
    }else{
        $reg = " insert into anggota(id_anggota, nama, uname, pass, alamat, jk, email, no_hp, kec, kel) 
        VALUES ('$id','$nama', '$uname', '$password', '$alamat', '$jk', '$email', '$no_tlp', '$kec', '$kel')";
        mysqli_query($db, $reg);
        echo "<script> alert('Registrasi Telah Berhasil') </script> ";
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
                        <li><a href="#tentang-kami"> Tentang Kami </a></li>
                        <li><a href="#harga"> Harga </a></li>
                        <li><a href="#cari-kode"> Cari Kode </a> </li>
                        <li><button onclick="document.getElementById('id01').style.display='block'" class="loginbtn">Login </button> </li>
                        <li><button onclick="document.getElementById('id02').style.display='block'" class="regisbtn">Registrasi </button> </li>
                    </ul>
                </nav>
        </header>

        <main>
            <div id="konten">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img src="aset/gambar/1.jpeg" style="width: 60%;">
                    </div>

                    <div class="mySlides fade">
                        <img src="aset/gambar/5.jpeg" style="width: 60%; ">
                    </div>

                    <div class="mySlides fade">
                        <img src="aset/gambar/6.jpeg" style="width: 60%;">
                    </div>

                    <div class="mySlides fade">
                        <img src="aset/gambar/7.jpeg" style="width: 60%;">
                    </div>

                    <div class="mySlides fade">
                        <img src="aset/gambar/9.jpeg" style="width: 60%;">
                    </div>

                    <div class="mySlides fade">
                        <img src="aset/gambar/12.jpeg" style="width: 60%;">
                    </div>               
                </div>
                <br>
                <div style="text-align:center">
                    <span class="dot"></span> 
                    <span class="dot"></span> 
                    <span class="dot"></span> 
                    <span class="dot"></span> 
                    <span class="dot"></span> 
                    <span class="dot"></span> 
                </div>

                <article id="tentang-kami" class="card">
                    <h2> Tentang Kami <br> <br>
                    <img id="logo" src="aset/gambar/logo.jpeg" class="logo" alt="logo"> </h2>
                    <p>
                        Laundry Kuy adalah sebuah toko yang bergerak di bidang jasa, yaitu laundry. 
                        Kami dapat mencuci baju anda dengan cepat dan bersih. Selain mencuci baju, 
                        kami juga mewawarkan jasa menyetrika baju. Kelebihan dari toko kami adalah kami menyediakan
                        jasa antar jemput baju Anda. Anda hanya tinggal duduk santai menikmati waktu Anda dan 
                        baju Anda akan bersih dan wangi seperti baru! Kami selalu memberikan yang terbaik
                        untuk semua pelanggan Kami. Sesuai slogan kami yaitu, Kita Nyuci, Kalian Santuy~!
                    </p>
                </article>

                <article id="harga" class="card">
                    <h2>Harga</h2>
                        <p align="center">
                        Berikut ini adalah list harga di Toko kami<br><br>
                        <b> Harga Laundry Kiloan </b>
                        </p>
                        <table align="center" border="1px">
                            <tr>
                                <th>No</th>
                                <th> Jenis Layanan </th>
                                <th> Tarif/kg </th>
                            </tr>

                            <tr>
                                <td>1</td>
                                <td>Cuci Reguler (2-3 hari)</td>
                                <td>Rp8000</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Cuci Kilat (1 hari)</td>
                                <td>Rp13000</td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Cuci Express (5-8 Jam)</td>
                                <td>Rp18000</td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>Setrika Reguler (2-3 hari)</td>
                                <td>Rp7000</td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>Setrika Kilat (1 Hari)</td>
                                <td>Rp13000</td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td>Cuci + Setrika Reguler (3-4 hari)</td>
                                <td>Rp14000</td>
                            </tr>

                            <tr>
                                <td>7</td>
                                <td>Cuci + Setrika Kilat (1-2 hari)</td>
                                <td>Rp25000</td>
                            </tr>
                        </table>
                        <br>
                        <p align="center"><b> Harga Laundry Satuan </b></p>
                        <table align="center" border="1px">
                            <tr>
                                <th>No</th>
                                <th> Jenis Layanan </th>
                                <th> Tarif/kg </th>
                            </tr>

                            <tr>
                                <td>1</td>
                                <td>Bahan Kain</td>
                                <td>Rp10000</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Baju Hangat/Sweater</td>
                                <td>Rp18000</td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Baju Onesie</td>
                                <td>Rp25000</td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>Blouse</td>
                                <td>Rp15000</td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>Celana Panjang/Rok Panjang</td>
                                <td>Rp13000</td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td>Dress/Gaun</td>
                                <td>Rp22000</td>
                            </tr>

                            <tr>
                                <td>7</td>
                                <td>Jas/Jaket</td>
                                <td>Rp30000</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Boneka</td>
                                <td>Rp15000</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Karpet</td>
                                <td>Rp17000</td>
                            </tr>
                            <tr>
                                <td>-</td>
                                <td>Tambahan biaya bila ingin Express</td>
                                <td>Rp5000</td>
                            </tr>
                        </table>
                        <br>
                        <p align="center"><b> Harga Antar-Jemput </b></p>
                        <table align="center" border="1px">
                            <tr>
                                <th>No</th>
                                <th> Jenis Layanan </th>
                                <th> Tarif/km </th>
                            </tr>

                            <tr>
                                <td>1</td>
                                <td>Antar</td>
                                <td>Rp10000</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Jemput</td>
                                <td>Rp10000</td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Antar-Jemput</td>
                                <td>Rp18000</td>
                            </tr>
                        </table>
                        <br>
                        <p>Antar jemput hanya dapat dilakukan bila Anda berada di Kota Bekasi</p>
                </article>

                <article id="cari-kode" class="card">
                    <h2>Pencarian</h2>
                    <section>
                        <form class="cari-kode" method="POST" action="">
                            <input type="text" placeholder="Masukan Kode" name="cari_kode">
                            <button type="submit" class="btn" name="cari">Cari</button>
                        </form>

                        <?php
                            $db = mysqli_connect("localhost", "root", "");
                            mysqli_select_db($db, 'laundrykuy');
                            
                            if($db -> connect_error){
                                die("connection failed :". $db-> connect_error);
                            }
                            if(isset($_POST['cari'])){
                                ?>
                                <table class="list-table animate" align="center">
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
                                $pencarian = encode($_POST['cari_kode'], $e, $n);
                                
                                $query = "SELECT * FROM pesanan WHERE kd_pesanan like '%".$pencarian."%' ORDER BY kd_pesanan ASC";
                                
                                $result = mysqli_query($db, $query);

                                if(!$result) {
                                    die("Query Error : ".mysqli_errno($db)." - ".mysqli_error($db));
                                }

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                    <td>". decode($row["kd_pesanan"], $d, $n)."</td>
                                    <td>". decode($row["nama"], $d, $n). "</td>
                                    <td>". decode($row["jenis"], $d, $n)."</td>
                                    <td>". decode($row["berat"], $d, $n)."</td>
                                    <td>". decode($row["status"], $d, $n)."</td>
                                    <td>". decode($row["biaya"], $d, $n)."</td>
                                    <td>". decode($row["proses"], $d, $n). "</td>
                                    <td>". $row["tgl_jemput"]. "</td>
                                    <td>". $row["tgl_antar"]. "</td> </tr>"
                                        ; 
                                }
                             $db -> close();
                            }
                            ?>
                    </section>
                </article>
            </div>

            <!-- Chat Popup -->
            <p class="open-button" onclick="openForm()" align="center">Chat </p>
                <div class="form-popup" id="myForm">
                    <div class="form-container">
                        <div class="chatlogs">
                            <div class="chat bot" id="cb"> 
                                <h4> Selamat Datang! Ucapkan "hallo"</h4>   
                            </div>
                            <div id="c"></div>
                        </div>

                    <input type="text" id="textBox" placeholder="Tanya Kami" onkeydown="if (event.keyCode == 13) {talk()}">
                        <button id="chat" onclick="talk()" align="center"> Send </button>
                        <button class="cancelbtn" onclick="closeForm()" align="center">Close</button>
                    </div>
                </div>  

            <!-- Login Popup -->
            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'"
              class="close" title="Close Modal">&times;</span>
              
                <!-- Modal Content -->
                <form class="modal-content animate" action="" method="POST">
                <div class="imgcontainer">
                    <img src="aset/gambar/logo.jpeg" alt="Avatar" class="avatar">
                </div>
                  <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <br>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="pass" required>
                    <br>
                    <button type="submit" class="loginbtn"name="login_btn" >Login</button>
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <br>
                </form>
                </div>
            </div>

            <!-- Registrasi Popup -->
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
                    <button type="submit" class="regisbtn" name="regis_btn">Registrasi</button>
                    <button type="button" onclick="document.getElementById('id02').style.display='none'" 
                    class="cancelbtn">Cancel</button>
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
        
        <script src="aset/script/slide.js"></script>
        <script src="aset/script/login-popup.js"></script>
        <script src="aset/script/chat-popup.js"></script>
        <script src="aset/script/chat.js"></script>
    </body>
</html>