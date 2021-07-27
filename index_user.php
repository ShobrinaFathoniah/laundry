<?php
    session_start();
    include('rsa-func.php')
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
                    <li> <a href="buat_pesanan.php"> Buat Pesanan </a> </li>
                    <li><a href="pesananku.php"> Pesanan Ku </a></li>
                    <li><a href="dataku.php"> <?php echo decode($_SESSION['uname'], $d, $n); ?> </a> </li>
                    <li> <a href="logout.php"> Logout </a> </li>
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
                                    <td>". $row["tgl_antar"]. "</td>
                                    </tr>"
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

        <script src="aset/script/slide.js"> </script>
        <script src="aset/script/chat-popup.js"></script>
        <script src="aset/script/chat.js"></script>
        

    </body>
</html>