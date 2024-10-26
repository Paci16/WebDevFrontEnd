<!doctype html>
<html>

<?php
    include 'include/config.php'; 
    if(isset($_POST['edit'])) 
    { 
        $KODEtravel = $_POST['inputkode'];
        $NAMAtravel = $_POST['inputnama'];
        $LOKASItravel = $_POST['inputlokasi'];

        mysqli_query($connection, "update travel set NAMAtravel = '$NAMAtravel', LOKASItravel = '$LOKASItravel'
            where KODEtravel = '$KODEtravel'");
    }

        //untuk menerima data dari file berita
        $kodetravel = $_GET["ubah"];
        $edittravel = mysqli_query($connection,"select * from travel
            where KODEtravel = '$kodetravel'");
        $rowedit = mysqli_fetch_array($edittravel);
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--ini buat manggil svg nya-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <title>Travel</title>
  </head>

<body>
    <div class="row"> <!-- total kolom adalah 12 -->
        <div class="col-sm-1"> </div>
        <div class="col-sm-10">

            <form method="POST">
                <div class="mb-3 row"> 
                    <label for="inputkode" class="col-sm-2 col-form-label"> Kode Travel </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputkode" id="inputkode"
                        value="<?php echo $rowedit["KODEtravel"]?>" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="inputnama" class="col-sm-2 col-form-label"> Nama Travel </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputnama" id="inputnama"
                        value="<?php echo $rowedit["NAMAtravel"]?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="inputlokasi" class="col-sm-2 col-form-label">Lokasi Destinasi Perjalanan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputlokasi" id="inputlokasi"
                        value="<?php echo $rowedit["LOKASItravel"]?>">
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
                    <label for="search"class="col-sm-2">Nama Travel</label>
                    
                    <!--untuk panjang box isi nya-->
                    <div class="col-sm-6">
                        <input type="text" name="search" class="form-control" id="search" 
                        value="<?php if(isset($_POST["search"]))
                        {echo $_POST["search"];}?>"placeholder="Cari Nama Travel">
                    </div>
                    <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
                </div>
            </form>
            
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col"> No </th>
                    <th scope="col"> Kode Travel </th>
                    <th scope="col"> Nama Travel </th>
                    <th scope="col"> Lokasi Travel </th>

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
                        $query = mysqli_query($connection, "select travel.* 
                            from travel
                            where NAMAtravel like '%".$search."%'");
                    }else

                    {
                        $query = mysqli_query($connection, "select travel.* from travel");
                    }
                        $nomor = 1;
                        while($row = mysqli_fetch_array($query)) { //mengambil satu per satu record dari query
                    ?>

                            <tr>
                                <td> <?php echo $nomor; ?> </td>
                                <td> <?php echo $row['KODEtravel']; ?> </td>
                                <td> <?php echo $row['NAMAtravel']; ?> </td>
                                <td> <?php echo $row['LOKASItravel']; ?> </td>

                                <td width="5px">

                                <!--variabel 'ubah' untuk menunjukkan ke variabel yang ada di php yang bagian echo $row["destinasiKODE"]-->
                                <a href="d-travelEDIT.php?ubah=<?php echo $row["KODEtravel"]?>" 
                                class="btn btn-success btn-sm" title="EDIT">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>

                                </td>
                                <td width="5px">
                                <a href="d-travelHAPUS.php?hapus=<?php echo $row["KODEtravel"]?>" 
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"> </script>

</body>

</html>