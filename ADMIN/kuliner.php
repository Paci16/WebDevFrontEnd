<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KULINER</title>
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="
    sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

	<style>

	</style>

</head>

<?php 
	include "include/config.php";
	if(isset($_POST['Simpan']))
	{
		$namakuliner = $_POST['inputnama'];
		$lokasikuliner = $_POST['inputlokasi'];

		$namafile = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];

		$ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

		// PERIKSA EKSTEN FILE HARUS JPG/jpg/PNG/png
		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG") or ($ekstensifile == "png") or ($ekstensifile == "PNG"))
		{
			move_uploaded_file($file_tmp, 'images/'.$namafile); //unggah file ke folder images
			mysqli_query($connection, "INSERT INTO kuliner (namaKULINER, lokasiKULINER, fotoKULINER) VALUES ('$namakuliner', '$lokasikuliner', '$namafile')");
		}

	}

?>


<body>

<div style="margin-top: 30px;" class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
	</div>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="inputnama" class="col-sm-2 col-form-label">Nama Kuliner</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputnama" name="inputnama" placeholder="Nama Kuliner" >
			</div>
		</div>

		<div class="form-group row">
			<label for="inputlokasi" class="col-sm-2 col-form-label">Asal Kuliner</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputlokasi" name="inputlokasi" placeholder="Asal Kuliner">
			</div>
		</div>


		<div style="margin-top: 10px;" class="form-group row">
			<label for="file" class="col-sm-2 col-form-label">Foto Kuliner</label>
			<div class="col-sm-10">
				<input type="file" id="file" name="file">
				<p class="help-block">unggah file</p>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<input type="submit" name="Simpan" class="btn btn-primary" value="Simpan">
				<input type="reset" name="Batal" class="btn btn-secondary" value="Batal">

			</div>
			
		</div>

		
	</form>

	<form style="margin-bottom: 15px;" method="post">
    	<div class="form-group row mb-2 mt-3">
     		 <label for="search" class="col-sm-2">Asal Kuliner</label>
     		 <div class="col-sm-6">
        <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST["search"]))
        {echo $_POST["search"];}?>" placeholder="Cari Lokasi Asal Kuliner">
      </div>
      <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
   	 </div>
	</form>

</div>

	<div class="col-sm-1"></div>
	</div>

	<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="jumbotron jumbotron-fluid">
		</div>


	<table class="table table-success table-striped">
		<thead class="thead-dark">
			<tr>

				<th scope="col"> No </th>
                    <th scope="col"> Nama Kuliner </th>
                    <th scope="col"> Asal Kuliner </th>
                    <th scope="col"> Foto Kuliner </th>
                    <!--untuk membagi kolom menjadi dua dengan colspan-->
                    <th colspan="3" style="text-align: center">Aksi</th>
			</tr>			
		</thead>

		<tbody>
		<?php 

	if (isset($_POST["kirim"]))
	{
 		$search = $_POST["search"];
  		$query = mysqli_query($connection, " select kuliner.*from kuliner
      		where lokasiKULINER like '%".$search."%'");}
    else{
      	$query = mysqli_query($connection, "select kuliner.* from kuliner");}
     	$nomor = 1;
      	while($row = mysqli_fetch_array($query))
    {    
      ?>

		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $row['namaKULINER'];?></td>
			<td><?php echo $row['lokasiKULINER'];?></td>
			<!--<td><?// echo $row['fotodestinasiFILE'];?></td>  -->
			
			<td>
			<?php if (isset($row['fotoKULINER']) && is_file("images/" . $row['fotoKULINER'])) 
						{ ?>
							<img src="images/<?php echo $row['fotoKULINER']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?>
					</td>

				
				<td width="5px">
           		<a href="d-kulinerEDIT.php?ubah=<?php echo $row["namaKULINER"] ?>" class="btn btn-success btn-sm" title="EDIT">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  				<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  				<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
				</svg></a>
                </td>

           		<td width="5px">
                <a href="d-kulinerHAPUS.php?hapus=<?php echo $row["namaKULINER"] ?>" class="btn btn-danger btn-sm" title="HAPUS">
                <i class="bi bi-trash"></i>
                </a>
                </td>
			</td>

		</tr>
			<?php $nomor = $nomor + 1;?>
			<?php }	?>
		</tbody>
		
	</table>
	</div>

	<div class="col-sm-1"></div>

	
</div>


</body>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</html>