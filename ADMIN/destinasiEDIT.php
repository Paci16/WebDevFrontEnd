<!doctype html>
<html>

<?php
    include 'include/config.php'; //nyambungin data 
    if(isset($_POST['edit'])) { //isset yang di kirim ada isinya atau tidak
        $destinasiKODE = $_POST['kodedestinasi'];
        $destinasiNAMA = $_POST['namadestinasi'];
        $kategoriKODE = $_POST['kodekategori'];
        $destinasiKET = $_POST['destinasiket'];

		if ($_FILES['file']['size'] > 0) {
            $namafile = $_FILES['file']['name'];
            $file_tmp = $_FILES["file"]["tmp_name"];
	        
			$ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);
            if(($ekstensifile == "jpg") or ($ekstensifile == "JPG") or ($ekstensifile == "png") or ($ekstensifile == "PNG"))
		    {
                move_uploaded_file($file_tmp, 'images/'.$namafile); //unggah file ke folder images
                //buat update data destinasi nama sama kategori Kode
                mysqli_query($connection, "UPDATE destinasi SET destinasiNAMA = '$destinasiNAMA', kategoriKODE = '$kategoriKODE', 
                destinasiKET = '$destinasiKET', destinasiFOTO = '$namafile' WHERE destinasiKODE = '$destinasiKODE'");
            }else {
                mysqli_query($connection, "UPDATE destinasi SET 
                destinasiNAMA = '$destinasiNAMA' WHERE destinasiKODE = '$destinasiKODE'");
            } 
        }  else {
            mysqli_query($connection, "UPDATE destinasi SET destinasiNAMA = '$destinasiNAMA', kategoriKODE = '$kategoriKODE', destinasiKET = '$destinasiKET' WHERE destinasiKODE = '$destinasiKODE'");
        }
    }

    $datakategori = mysqli_query($connection, "select * from kategoriwisata");

    //untuk menerima data dari file destinasi yang akan diedit 
    $kodedestinasi = $_GET["ubah"];
    $editdestinasi = mysqli_query($connection,"select * from destinasi
        where destinasiKODE = '$kodedestinasi'");
    $rowedit = mysqli_fetch_array($editdestinasi);
    
    //untuk memanggil dua php yaitu destinasi dan kategoriwisata
    $editkategori = mysqli_query($connection,"select * from destinasi, kategoriwisata
        where destinasiKODE = '$kodedestinasi' 
        and destinasi.kategoriKODE = kategoriwisata.kategoriKODE");

    //mengambil data yang ada di destinasi dan kategoriwisata dimana destinasi.kategoriKODE = kategoriwisata.kategoriKODE
    $rowedit2 = mysqli_fetch_array($editkategori);

?>

<head>
    <title> DESTINASI 1 </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- stylesheet untuk memanggil file dengan tipe text/css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    
    <!--ini buat manggil svg nya-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body>
    <div class="row"> <!-- total kolom adalah 12 -->
        <div class="col-sm-1"> </div>
        <div class="col-sm-10">

            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3 row"> <!-- desainnya bisa begitu karena mb-3 row(mb=margin buttom), membuat spasi menjadi 3 spasi -->
                    <label for="kodedestinasi" class="col-sm-2 col-form-label"> Kode Destinasi </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="kodedestinasi" id="kodedestinasi"
                        value="<?php echo $rowedit["destinasiKODE"]?>" readonly>
                        <!--readonly akan membuat dia tidak bisa diedit-->
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="namadestinasi" class="col-sm-2 col-form-label"> Nama Destinasi </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="namadestinasi" id="namadestinasi"
                        value="<?php echo $rowedit["destinasiNAMA"]?>">
                    </div>
                </div>
<!--
                <div class="mb-3 row">
                    <label for="kodekategori" class="col-sm-2 col-form-label"> Nama Destinasi </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="kodekategori" id="kodekategori">
                    </div>
                </div>
-->
                
                <div class="mb-3 row">
                    <label for="kodekategori" class="col-sm-2 col-form-label"> Kategori Wisata </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kodekategori" id="kodekategori">
                                <option value="<?php echo $rowedit["kategoriKODE"]?>"> 
                                    <?php echo $rowedit["kategoriKODE"]?>

                                </option>
                                    <?php while($row = mysqli_fetch_array($datakategori)) {
                                        ?>
                                        <option value="<?php echo $row["kategoriKODE"] ?>" >
                                            <?php echo $row["kategoriKODE"] ?>
                                            <?php echo $row["kategoriNAMA"] ?>
                                        </option>
                                    <?php
                                        }
                                    ?>
                            </select>
                        </div>
                </div>

                <div class="mb-3 row">
                    <label for="destinasiket" class="col-sm-2 col-form-label"> Keterangan Destinasi </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="destinasiket" id="destinasiket"
                        value="<?php echo $rowedit["destinasiKET"]?>">
                    </div>
                </div>
                                    
                <div style="margin-top: 10px;" class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">Foto Destinasi</label>
                        <div class="col-sm-10">
                            <td>
                    <?php if (!empty($row['destinasiFOTO']) && is_file("images/".$row['destinasiFOTO'])): ?>
                        <img src="images/<?php echo $row['destinasiFOTO']?>" width="80" alt="Current Image">
                    <?php endif; ?>
                </td>

                            <input type="file" id="file" name="file">
                            <p class="help-block">unggah file</p>
                        </div>
                    </div>

                
                <div class="form-group row">
                    <div class="col-sm-2"> <!-- membuat disebelah kiri kosong -->
                    </div>
                    <div class="col-sm-10">
                        <input type="submit" name="edit" value="EDIT" class="btn btn-secondary">
                        <input type="reset" value="Batal" class="btn btn-success" name="batal">
                    </div>
                </div>
            </form>

<form method="POST">
    <div class="form-group row mb-2">
        <label for="search"class="col-sm-2">Nama Destinasi</label>
        
        <!--untuk panjang box isi nya-->
        <div class="col-sm-6">
            <input type="text" name="search" class="form-control" id="search" 
            value="<?php if(isset($_POST["search"]))
            {echo $_POST["search"];}?>"placeholder="Cari nama destinasi">
        </div>
         <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
    </div>
</form>


            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col"> No </th>
                    <th scope="col"> Kode Destinasi </th>
                    <th scope="col"> Nama Destinasi </th>
                    <th scope="col"> Kode Kategori </th>
                    <th scope="col"> Keterangan Destinasi </th>
                    <th scope="col"> Foto Destinasi </th>
                                                    
                    <!--untuk membagi kolom menjadi dua dengan colspan-->
                    <th colspan="2" style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php

                    if(isset($_POST["kirim"]))
                    {
                        //untuk menerima isi dari search yang ada di atas '$search'
                        $search = $_POST["search"];
                        $query = mysqli_query($connection, "select destinasi.* 
                            from destinasi
                            where destinasiNAMA like '%".$search."%'");
                    }else

                    {
                        $query = mysqli_query($connection, "select destinasi.* from destinasi");
                    }
                    
                    //      $query = mysqli_query($connection, "select destinasi.* from destinasi");
                    
                        //untuk menampilkan tampilan isi database
                        //$query = mysqli_query($connection, "select destinasi.* from destinasi"); //destinasi. itu kalo misalnya ada atribut yang sama biar tidak bentrok
                        $nomor = 1;
                        while($row = mysqli_fetch_array($query)) { //mengambil satu per satu record dari query
                    ?>

                            <tr>
                                <td> <?php echo $nomor; ?> </td>
                                <td> <?php echo $row['destinasiKODE']; ?> </td>
                                <td> <?php echo $row['destinasiNAMA']; ?> </td>
                                <td> <?php echo $row['kategoriKODE']; ?> </td>
                                <td> <?php echo $row['destinasiKET']; ?> </td>
                                
                                <td>
                                    <?php if (isset($row['destinasiFOTO']) && is_file("images/" . $row['destinasiFOTO'])) 
                                    { ?>
                                        <img src="images/<?php echo $row['destinasiFOTO']?>" width="80">
                                    <?php } else
                                        echo "<img src='images/noimage.png' width='80'>"
                                    ?>
                                </td>

                                <td width="5px">

                                <!--variabel 'ubah' untuk menunjukkan ke variabel yang ada di php yang bagian echo $row["destinasiKODE"]-->
                                <a href="d-destinasiedit.php?ubah=<?php echo $row["destinasiKODE"]?>" 
                                class="btn btn-success btn-sm" title="EDIT">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>

                                </td>
                                <td width="5px">
                                <a href="d-destinasihapus.php?hapus=<?php echo $row["destinasiKODE"]?>" 
                                class="btn btn-danger btn-sm" title="HAPUS">
                                    <i class="bi bi-trash"></i>
                                </td>
                            </tr>
                    
                    <?php $nomor = $nomor + 1; ?>

                    <?php    
                        }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"> </script>

    <script>
        $(document).ready(function() {
            ('#kodekategori').select2( {
                closeOnSelect:true,
                allowClear:true,
                placeholder:'Pilih Kategori Wisata'
            } );
        } );
    </script>

</body>

</html>