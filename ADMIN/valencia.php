<!doctype html>
<html>

<?php
    include 'include/config.php'; //nyambungin data 
    if(isset($_POST['Simpan'])) { 
        $valenciaid = $_POST['inputid'];
        $valenciakota = $_POST['inputkota'];
        $destinasikode = $_POST['inputkodedes'];


        mysqli_query($connection, "INSERT INTO valencia VALUES ('$valenciaid', '$valenciakota', '$destinasikode')");
        
    }

    $datavalen = mysqli_query($connection, "select * from destinasi");
?>

<head>
    <title> UAS </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- stylesheet untuk memanggil file dengan tipe text/css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body>
    <div class="row"> 
    <div class="col-sm-1"> </div>
        <div class="col-sm-10">

            <form method="POST">
                <div class="mb-3 row"> 
                    <label for="inputid" class="col-sm-2 col-form-label"> ID Anda </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputid" id="inputid">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="inputkota" class="col-sm-2 col-form-label"> Kota Anda </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputkota" id="inputkota">
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="inputkodedes" class="col-sm-2 col-form-label"> Kode Destinasi </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="inputkodedes" id="inputkodedes">
                                <option> Kode Destinasi </option>
                                    <?php while($row = mysqli_fetch_array($datavalen)) {
                                        ?>
                                        <option value="<?php echo $row["destinasiKODE"] ?>" >
                                            <?php echo $row["destinasiKODE"] ?>
                                        </option>
                                    <?php
                                        }
                                    ?>
                            </select>
                        </div>
                </div>

                <div style="margin-bottom: 15px;" class="form-group row">
                    <div class="col-sm-2"> 
                    </div>
                    <div class="col-sm-10">
                        <input type="submit" value="Simpan" class="btn btn-secondary" name="Simpan">
                        <input type="reset" value="Batal" class="btn btn-success" name="baral">
                    </div>
                </div>
            </form>

<form method="POST">
    <div class="form-group row mb-2">
        <label for="search"class="col-sm-2">Kota Anda</label>
        
        <!--untuk panjang box isi nya-->
        <div class="col-sm-6">
            <input type="text" name="search" class="form-control" id="search" 
            value="<?php if(isset($_POST["search"]))
            {echo $_POST["search"];}?>"placeholder="Cari Kota Anda">
        </div>
         <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
    </div>
</form>


            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col"> No </th>
                    <th scope="col"> ID </th>
                    <th scope="col"> Kota </th>
                    <th scope="col"> Kode Destinasi </th>                     
                    </tr>
                </thead>
                
                <tbody>
                    <?php

                    if(isset($_POST["kirim"]))
                    {
                        $search = $_POST["search"];
                        $query = mysqli_query($connection, "select valencia.* 
                            from valencia
                            where valenciaKOTA like '%".$search."%'");
                    }else

                    {
                        $query = mysqli_query($connection, "select valencia.* from valencia");
                    }
                        $nomor = 1;
                        while($row = mysqli_fetch_array($query)) {
                    ?>

                            <tr>
                                <td> <?php echo $nomor; ?> </td>
                                <td> <?php echo $row['valenciaID']; ?> </td>
                                <td> <?php echo $row['valenciaKOTA']; ?> </td>
                                <td> <?php echo $row['destinasiKODE']; ?> </td>
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
            ('#valenciaID').select2( {
                closeOnSelect:true,
                allowClear:true,
                placeholder:'Pilih Kode Destinasi'
            } );
        } );
    </script>

</body>

</html>