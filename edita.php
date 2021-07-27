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
           <?php
                //connect to database
                $db = mysqli_connect("localhost", "root", "");
                mysqli_select_db($db, 'laundrykuy');
                include('rsa-func.php');

                $id_anggota = $_POST['edit_id'];    

                $query = "select * from anggota where id_anggota = '$id_anggota'";
                $query_run = mysqli_query($db, $query);

                foreach($query_run as $row){
            ?>
                <!-- Modal Content -->
                <form class="modal-contents animate" action="dt_anggota.php" method="POST">              
                  <div class="container">
                    <label for="uname"> <b> Id Anggota </b> </label>
                    <input type = "text" name = "eid_anggota" value = "<?php echo decode($row["id_anggota"], $d, $n); ?>">
                    <input type = "hidden" name = "edit_id" value = "<?php echo $row["id_anggota"]; ?>">
                    <br>
                    <label for="uname"><b>Nama</b></label>
                    <input type="text" name="enama" value="<?php echo decode($row["nama"], $d, $n); ?>">
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
                    <button type="submit" name="update_btn" class="editbtn">Update</button>
                    <a href="dt_anggota.php"><button type="button" class="cancelbtn">Cancel</button></a>
                    <br>
                    <?php 
                }
            
                ?>
                </form>
                </div>
            </div>
</body>
</html>