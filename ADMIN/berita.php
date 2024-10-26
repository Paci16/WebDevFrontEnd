<!doctype html>
<html>

<?php
    include 'include/config.php'; 
    if(isset($_POST['Simpan'])) 
    { 
        $berita0108 = $_POST['berita108'];
        $beritaJUDUL = $_POST['beritajudul'];
        $kategoriberitavalencia = $_POST['kategoriberita108'];
        $event0108 = $_POST['event108'];

        mysqli_query($connection, "insert into berita values ('$berita0108', '$beritaJUDUL', '$kategoriberitavalencia', '$event0108')");
    }
?>

<head>
    <title> berita </title>
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
                    <label for="berita108" class="col-sm-2 col-form-label"> Berita Kode </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="berita108" id="berita108">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="beritajudul" class="col-sm-2 col-form-label"> Judul Berita </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="beritajudul" id="beritajudul">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="kategoriberita108" class="col-sm-2 col-form-label"> Kategori Berita Kode </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="kategoriberita108" id="kategoriberita108">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="event108" class="col-sm-2 col-form-label"> Event Kode </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="event108" id="event108">
                    </div>
                </div>

                <div style="margin-bottom: 15px" class="form-group row">
                    <div class="col-sm-2"> <!-- membuat disebelah kiri kosong -->
                    </div>
                    <div class="col-sm-10">
                        <input type="submit" value="Simpan" class="btn btn-secondary" name="Simpan">
                        <input type="reset" value="Batal" class="btn btn-success" name="batal">
                    </div>
                </div>
            </form>

            <form method="POST">
                <div class="form-group row mb-2">
                    <label for="search"class="col-sm-2">Judul Berita</label>
                    
                    <!--untuk panjang box isi nya-->
                    <div class="col-sm-6">
                        <input type="text" name="search" class="form-control" id="search" 
                        value="<?php if(isset($_POST["search"]))
                        {echo $_POST["search"];}?>"placeholder="Cari Judul Berita">
                    </div>
                    <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
                </div>
            </form>




            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col"> No </th>
                    <th scope="col"> Berita Kode </th>
                    <th scope="col"> Judul Berita </th>
                    <th scope="col"> Kategori Berita </th>
                    <th scope="col"> Event Kode </th>

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
                        $query = mysqli_query($connection, "select berita.* 
                            from berita
                            where beritaJUDUL like '%".$search."%'");
                    }else

                    {
                        $query = mysqli_query($connection, "select berita.* from berita");
                    }
                        $nomor = 1;
                        while($row = mysqli_fetch_array($query)) { //mengambil satu per satu record dari query
                    ?>

                            <tr>
                                <td> <?php echo $nomor; ?> </td>
                                <td> <?php echo $row['berita0108']; ?> </td>
                                <td> <?php echo $row['beritaJUDUL']; ?> </td>
                                <td> <?php echo $row['kategoriberitavalencia']; ?> </td>
                                <td> <?php echo $row['event0108']; ?> </td>
                                <td width="5px">

                                <!--variabel 'ubah' untuk menunjukkan ke variabel yang ada di php yang bagian echo $row["destinasiKODE"]-->
                                <a href="d-beritaEDIT.php?ubah=<?php echo $row["berita0108"]?>" 
                                class="btn btn-success btn-sm" title="EDIT">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>

                                </td>
                                <td width="5px">
                                <a href="d-beritaHAPUS.php?hapus=<?php echo $row["berita0108"]?>" 
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