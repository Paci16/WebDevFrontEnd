<!doctype html>
<html>

<?php
    include 'include/config.php'; //nyambungin data 

?>

<head>
    <title> Hotel </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- stylesheet untuk memanggil file dengan tipe text/css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    
    <!--ini buat manggil svg nya-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body>
    <div class="row"> <!-- total kolom adalah 12 -->
    
        <div class="col-sm-10">

<div class="jumbotron mt-5">
    <h2 class="display-5">Hasil entri data Hotel</h2>
</div>

<form method="POST">
    <div class="form-group row mb-2">
        <label for="search"class="col-sm-2">Nama Hotel</label>
        
        <!--untuk panjang box isi nya-->
        <div class="col-sm-6">
            <input type="text" name="search" class="form-control" id="search" 
            value="<?php if(isset($_POST["search"]))
            {echo $_POST["search"];}?>"placeholder="Cari Nama Hotel">
        </div>
         <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
    </div>
</form>


            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col"> No </th>
                    <th scope="col"> ID Hotel </th>
                    <th scope="col"> Nama Hotel </th>
                    <th scope="col"> Alamat Hotel </th>
                    <th scope="col"> Foto Hotel </th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php

                    if(isset($_POST["kirim"]))
                    {
                        //untuk menerima isi dari search yang ada di atas '$search'
                        $search = $_POST["search"];
                        $query = mysqli_query($connection, "select * 
                            from hotel
                            where NAMAhotel like '%".$search."%'"); 
                    }else

                    {
                        $query = mysqli_query($connection, "select hotel.* from 
                        hotel");
                    }
                        $nomor = 1;
                        while($row = mysqli_fetch_array($query)) { //mengambil satu per satu record dari query
                    ?>
                            <tr>
                                <td><?php echo $nomor;?></td>
                                <td><?php echo $row['IDhotel'];?></td>
                                <td><?php echo $row['NAMAhotel'];?></td>
                                <td><?php echo $row['ALAMAThotel'];?></td>
     
                                <td>
                                <?php if (isset($row['FOTOhotel']) && is_file("images/" . $row['FOTOhotel'])) 
                                            { ?>
                                                <img src="images/<?php echo $row['FOTOhotel']?>" width="80">
                                            <?php } else
                                                echo "<img src='images/noimage.png' width='80'>"
                                            ?>
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

</body>

</html>