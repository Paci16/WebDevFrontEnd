<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HOTEL</title>
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="
    sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

</head>

<?php
    include 'include/config.php'; //nyambungin data 
    if(isset($_POST['edit'])) { //isset yang di kirim ada isinya atau tidak
        $kodetransport = $_POST['inputkode'];
        $jenistransport = $_POST['inputjenis'];
        $plattransport = $_POST['inputplat'];
        $kodetravel = $_POST['inputkodetrav'];

        mysqli_query($connection, "UPDATE transportasi set JENIStransport = '$jenistransport',
            PLATtransport = '$plattransport', KODEtravel = '$kodetravel'
            where KODETRANSPORT = '$kodetransport'");
    }

    $datatravel = mysqli_query($connection, "select * from travel");

    //untuk menerima data dari file transport
    $kodetransport = $_GET["ubah"];
    $edittransport = mysqli_query($connection,"select * from transportasi
        where KODEtransport = '$kodetransport'");
    $rowedit = mysqli_fetch_array($edittransport);
    
    //untuk memanggil dua php yaitu destinasi dan kategoriwisata
    $editkode = mysqli_query($connection,"select * from transportasi, travel
        where KODEtransport = '$kodetransport' 
        and transportasi.KODEtransport = travel.KODEtravel");

    //mengambil data yang ada di destinasi dan kategoriwisata dimana destinasi.kategoriKODE = kategoriwisata.kategoriKODE
    $rowedit2 = mysqli_fetch_array($editkode);

?>

<head>
    <title> TRANSPORTASI </title>
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
                <div class="mb-3 row"> <!-- desainnya bisa begitu karena mb-3 row(mb=margin buttom), membuat spasi menjadi 3 spasi -->
                    <label for="inputkode" class="col-sm-2 col-form-label"> Kode Transpostasi </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputkode" id="inputkode"
                        value="<?php echo $rowedit["KODEtransport"]?>" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="inputjenis" class="col-sm-2 col-form-label"> Jenis Transpostasi </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputjenis" id="inputjenis"
                        value="<?php echo $rowedit["JENIStransport"]?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="inputplat" class="col-sm-2 col-form-label"> Plat Transpostasi </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputplat" id="inputplat"
                        value="<?php echo $rowedit["PLATtransport"]?>">
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="inputkodetrav" class="col-sm-2 col-form-label"> Kode Travel </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="inputkodetrav" id="inputkodetrav">
                                <option> Kode Wisata </option>
                                    <?php while($row = mysqli_fetch_array($datatravel)) {
                                        ?>
                                        <option value="<?php echo $row["KODEtravel"] ?>" >
                                            <?php echo $row["KODEtravel"] ?>
                                            <?php echo $row["NAMAtravel"] ?>
                                        </option>
                                    <?php
                                        }
                                    ?>
                            </select>
                        </div>
                </div>
                                    


                <div style="margin-bottom: 15px;" class="form-group row">
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
        <label for="search"class="col-sm-2">Jenis Transportasi</label>
        
        <!--untuk panjang box isi nya-->
        <div class="col-sm-6">
            <input type="text" name="search" class="form-control" id="search" 
            value="<?php if(isset($_POST["search"]))
            {echo $_POST["search"];}?>"placeholder="Cari Transportasi">
        </div>
         <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
    </div>
</form>


            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col"> No </th>
                    <th scope="col"> Kode Transportasi </th>
                    <th scope="col"> Jenis Transportasi </th>
                    <th scope="col"> Plat Transportasi </th>
                    <th scope="col"> Kode Travel </th>
                                                    
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
                        $query = mysqli_query($connection, "select transportasi.* 
                            from transportasi
                            where JENIStransport like '%".$search."%'");
                    }else

                    {
                        $query = mysqli_query($connection, "select transportasi.* from transportasi");
                    }
                        $nomor = 1;
                        while($row = mysqli_fetch_array($query)) { //mengambil satu per satu record dari query
                    ?>

                            <tr>
                                <td> <?php echo $nomor; ?> </td>
                                <td> <?php echo $row['KODEtransport']; ?> </td>
                                <td> <?php echo $row['JENIStransport']; ?> </td>
                                <td> <?php echo $row['PLATtransport']; ?> </td>
                                <td> <?php echo $row['KODEtravel']; ?> </td>
                                
                                <td width="5px">

                                <!--variabel 'ubah' untuk menunjukkan ke variabel yang ada di php yang bagian echo $row["destinasiKODE"]-->
                                <a href="d-transportasiEDIT.php?ubah=<?php echo $row["KODEtransport"]?>" 
                                class="btn btn-success btn-sm" title="EDIT">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>

                                </td>
                                <td width="5px">
                                <a href="d-transportasiHAPUS.php?hapus=<?php echo $row["KODEtransport"]?>" 
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
            ('#KODEtransport').select2( {
                closeOnSelect:true,
                allowClear:true,
                placeholder:'Pilih Kode Travel'
            } );
        } );
    </script>

</body>

</html>