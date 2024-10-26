<!doctype html>
<html>

<?php
    include 'include/config.php'; 
    if(isset($_POST['edit'])) 
    { 
        $kategoriKODE = $_POST['inputkode'];
        $kategoriNAMA = $_POST['inputnama'];
        $kategoriKET = $_POST['inputket'];
        $kategoriREFERENCE = $_POST['inputreferensi'];

        mysqli_query($connection, "UPDATE kategoriwisata set kategoriNAMA = '$kategoriNAMA',
            kategoriKET = '$kategoriKET', kategoriREFERENCE = '$kategoriREFERENCE'
            where kategoriKODE = '$kategoriKODE'");
    }

        //untuk menerima data dari file berita
        $kodewisata= $_GET["ubah"];
        $editwisata = mysqli_query($connection,"SELECT * from kategoriwisata
            where kategoriKODE = '$kodewisata'");
        $rowedit = mysqli_fetch_array($editwisata);
?>

<head>
    <title> kategori wisata </title>
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

            <form method="POST">
                <div class="mb-3 row"> 
                    <label for="inputkode" class="col-sm-2 col-form-label"> Kode Kategori Wisata </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputkode" id="inputkode"
                        value="<?php echo $rowedit["kategoriKODE"]?>" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="inputnama" class="col-sm-2 col-form-label"> Nama Kategori Wisata </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputnama" id="inputnama"
                        value="<?php echo $rowedit["kategoriNAMA"]?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="inputket" class="col-sm-2 col-form-label"> Keterangan Kategori Wisata </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputket" id="inputket"
                        value="<?php echo $rowedit["kategoriKET"]?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="inputreferensi" class="col-sm-2 col-form-label"> Referensi Kategori </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputreferensi" id="inputreferensi"
                        value="<?php echo $rowedit["kategoriREFERENCE"]?>">
                    </div>
                </div>

                <div style="margin-bottom: 15px" class="form-group row">
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
                    <label for="search"class="col-sm-2">Nama Kategori Wisata<</label>
                    
                    <!--untuk panjang box isi nya-->
                    <div class="col-sm-6">
                        <input type="text" name="search" class="form-control" id="search" 
                        value="<?php if(isset($_POST["search"]))
                        {echo $_POST["search"];}?>"placeholder="Cari Kategori Wisata">
                    </div>
                    <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
                </div>
            </form>




            <table class="table table-hover table-dark">
                            <thead>
                                <tr>
                                <th scope="col"> No </th>
                                <th scope="col"> Kode Kategori Wisata </th>
                                <th scope="col"> Nama Kategori Wisata </th>
                                <th scope="col"> Keterangan Kategori Wisata </th>
                                <th scope="col"> Referensi Kategori Wisata </th>

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
                                    $query = mysqli_query($connection, "select kategoriwisata.* 
                                        from kategoriwisata
                                        where kategoriNAMA like '%".$search."%'");
                                }else

                                {
                                    $query = mysqli_query($connection, "select kategoriwisata.* from kategoriwisata");
                                }
                                    $nomor = 1;
                                    while($row = mysqli_fetch_array($query)) { //mengambil satu per satu record dari query
                                ?>

                                        <tr>
                                            <td> <?php echo $nomor; ?> </td>
                                            <td> <?php echo $row['kategoriKODE']; ?> </td>
                                            <td> <?php echo $row['kategoriNAMA']; ?> </td>
                                            <td> <?php echo $row['kategoriKET']; ?> </td>
                                            <td> <?php echo $row['kategoriREFERENCE']; ?> </td>
                                            <td width="5px">

                                            <!--variabel 'ubah' untuk menunjukkan ke variabel yang ada di php yang bagian echo $row["destinasiKODE"]-->
                                            <a href="d-kategoriwisataEDIT.php?ubah=<?php echo $row["kategoriKODE"]?>" 
                                            class="btn btn-success btn-sm" title="EDIT">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>

                                            </td>
                                            <td width="5px">
                                            <a href="d-kategoriwisataHAPUS.php?hapus=<?php echo $row["kategoriKODE"]?>" 
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



 <!--akhir saya kerja -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>