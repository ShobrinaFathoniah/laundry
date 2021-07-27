<html>

<head>
        <title> Laundry Kuy </title>
        <link rel="stylesheet" href="aset/styles/styles.css">
        <link rel="stylesheet" href="aset/styles/login.css">
        <link rel="stylesheet" href="aset/styles/edit.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="modal1">
           `<?php
                //connect to database
                $db = mysqli_connect("localhost", "root", "");
                mysqli_select_db($db, 'laundrykuy');
                include('rsa-func.php');

                $kd_pesan = $_POST['edit_id'];    

                $query = "select * from pesanan where kd_pesanan = '$kd_pesan'";
                $query_run = mysqli_query($db, $query);

                foreach($query_run as $row){
            
                  $kdd = decode($row["kd_pesanan"], $d, $n);
                  $nmd = decode($row["nama"], $d, $n);
                  $jnd = decode($row["jenis"], $d, $n);
                  $brd = decode($row["berat"], $d, $n);
                  $std = decode($row["status"], $d, $n);
                  $idd = decode($row["id_anggota"], $d, $n);
                  $prd = decode($row["proses"], $d, $n);

            ?>
                <!-- Modal Content -->
                <form class="modal-contents animate" action="datapesanan_all.php" method="POST">              
                  <div class="container">
                    <label for="uname"> <b> Kode Pesanan </b> </label>
                    <input type = "text" name = "ekd" value = "<?php echo $kdd; ?>">
                    <input type = "hidden" name = "edit_id" value = "<?php echo $row["kd_pesanan"]; ?>">
                    <br>
                    <label for="uname"><b>Nama Pemesan</b></label>
                    <input type="text" value = "<?php echo $nmd; ?>" name="ename">
                    <br>
                    <label for="uname"><b>Id Pemesan</b></label>
                    <input type="text" value = "<?php echo $idd; ?>" name="eidp">
                    <br>
                    <label for="uname"><b>Jenis Layanan</b></label>
                    <input type="text" value = "<?php echo $jnd; ?>" name="ejns">
                    <br>
                    <label for="uname"><b>Berat/Jumlah Cucian</b></label>
                    <input type="text" value = "<?php echo $brd; ?>" name="ebrt">
                    <br>
                    <label for="uname"><b>Proses</b></label>
                    <input type="text" value = "<?php echo $prd; ?>" name="eproses">
                    <br>
                    <label for="uname"><b>Biaya</b></label>
                    <input type="text" value = "<?php echo decode($row["biaya"], $d, $n); ?>" name="ebiaya">
                    <br>
                    <label for="uname"><b>Tanggal Terima</b></label>
                    <input type="text" value = "<?php echo $row["tgl_jemput"]; ?>" name="etgl_t">
                    <br>
                    <label for="uname"><b>Status</b></label>
                    <input type="text" value = "<?php echo $std; ?>" name="estatus">
                    <br>
                    <label for="uname"><b>Tanggal Pengiriman</b></label>
                    <input type="text" value = "<?php echo $row["tgl_antar"]; ?>" name="etgl_k">
                    <br>
                    <button type="submit" name="update_btn" class="editbtn">Update</button>
                    <a href="datapesanan_all.php"><button type="button" class="cancelbtn"> Cancel </button></a>
                    <br>
                    <?php 
                }
            
                ?>
                </form>
                </div>
            </div>
</body>
</html>