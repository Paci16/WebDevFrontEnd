<!DOCTYPE html>
<html lang="en">

<?php
  include "admin/include/config.php";
  $kategori = mysqli_query($connection, "SELECT * from kategoriwisata");
  $travel = mysqli_query($connection, "SELECT * from travel");
  $berita = mysqli_query($connection, "SELECT * from berita");

  //buat sambungin dua tabel dengan menggunakan foreign key
  $destinasi = mysqli_query($connection,
    "SELECT * from destinasi, kategoriwisata 
    WHERE destinasi.kategoriKODE = kategoriwisata.kategoriKODE");

?>

<head>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width,
 initial-scale1.0">
 <title> UAS WEBDEV </title>

</head>


<body>
    <div class="container-fluid">
    <!--membuat menu-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">PaciLand</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>

                <!--bagian dropdowm kategori-->
                <li class="nav-item dropdown">       
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori Wisata
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php

            //syarat jika kategori terdapat sesuatu
              if(mysqli_num_rows($kategori)>0){
                while ($row=mysqli_fetch_array($kategori)){
                  ?>

                  <!--ini html jadi harus diluar tag php-->
                  <li><a class="dropdown-item" href="#">
                      <?php echo $row["kategoriNAMA"]?></a></li>

                <!--membuka kembali php-->
                <?php
                }
              }
            ?>
          </ul>
        </li>

         <!--bagian dropdowm Travel-->
          <li class="nav-item dropdown">       
          <a class="nav-link dropdown-toggle" href="travelindex.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Travel
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php

            //syarat jika kategori terdapat sesuatu
              if(mysqli_num_rows($travel)>0){
                while ($row=mysqli_fetch_array($travel)){
                  ?>

                  <!--ini html jadi harus diluar tag php-->
                  <li><a class="dropdown-item" href="#">
                      <?php echo $row["NAMAtravel"]?></a></li>

                <!--membuka kembali php-->
                <?php
                }
              }
            ?>
          </ul>
        </li>

          <!--bagian dropdowm Berita-->
          <li class="nav-item dropdown">       
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Berita
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php

            //syarat jika kategori terdapat sesuatu
              if(mysqli_num_rows($berita)>0){
                while ($row=mysqli_fetch_array($berita)){
                  ?>

                  <!--ini html jadi harus diluar tag php-->
                  <li><a class="dropdown-item" href="#">
                      <?php echo $row["kategoriberitavalencia"]?></a></li>

                <!--membuka kembali php-->
                <?php
                }
              }
            ?>
          </ul>
        </li>



        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <!--membuat akhir menu-->

<!--membuat slide-->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div style="width: 100%; max-height: 50vh; filter: brightness(50%); object-fit: cover; text-align:center; color:white" class="carousel-inner">
    <div class="carousel-item active">
    <!--src buat masukin foto-->
      <img src="admin/imageslider/1.JPG" class="d-block w-100" alt="Gambar tidak ada">
      <div style="z-index: 2;" class="carousel-caption text-align-center">
        <h5>Bali</h5>
        <p>Indahnya Malam Bali dengan Musik</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="admin/imageslider/2.JPG" class="d-block w-100" alt="Gambar Tidak ada">
      <div style="z-index: 2;" class="carousel-caption text-align-center">
        <h5>SPasar Ubud Bali</h5>
        <p>Banyaknya barang tradisional disini</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="admin/imageslider/3.JPG" class="d-block w-100" alt="Gambar tidak ada">
      <div style="z-index: 2;" class="carousel-caption text-align-center">
        <h5>Pasar Ubud Bali</h5>
        <p>Semua barang antik ada disini</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!--membuat destinasi-->
                
    <div style="margin-top: 50px; margin-bottom: 50px;" class="container">
        <div class="row">

          <!--ini bagian kiri-->
            <div class="col-sm-9">
            <div style="margin-bottom: 20px;" class="judul"></div>
            <h1>DESTINASI WISATA</h1>
              <?php 
                //buat sambungin dua tabel dengan menggunakan foreign key
                  $destinasi = mysqli_query($connection,
                  "SELECT * from destinasi, kategoriwisata 
                  WHERE destinasi.kategoriKODE = kategoriwisata.kategoriKODE");
                  
                if(mysqli_num_rows($destinasi)>0)
                {
                  while($row=mysqli_fetch_array($destinasi))
                  { ?>
                    <div style="margin-top: 30px;" class="d-flex">

                      <!--shrink untuk mengecilkan, grow untuk memperbesar-->
                          <div class="flex-shrink-0">

                              <!--style untuk memodifikasi gambar-->
                              <img style="width: 130px; height: auto; margin-right: 35px;" 
                              src="admin/imageslider/<?php echo $row["destinasiFOTO"];?>" alt="kosong">
                          </div>

                          <!--buat masukin atau manggil dari ADMIN tabel destinasi dan kategori-->
                          <div class="flex-grow-1">
                              <h5><?php echo $row["destinasiNAMA"];?> <small class="text-muted"><i><?php echo $row["kategoriNAMA"];?></i></small></h5>
                              
                              <!--substr untuk mengambil berapa total kata-->
                              <p><?php echo substr($row["destinasiKET"],0,250);?></p>
                              <a href="" class="btn btn-primary">Read More</a>
                          </div>
                      </div>
                    <?php
                  }
                }
              ?>

            </div> <!--penutup kolom 9 (untuk kolom kiri) -->

            <!--ini bagian kanannya-->
            <div style="margin-top: 36px;" class="col-sm-3">
            <ol class="list-group list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Kategori Wisata</div>
              </div>
              <span class="badge bg-primary rounded-pill">4</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Destinasi Wisata</div>
              </div>
              <span class="badge bg-primary rounded-pill">3</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Foto Wisata Nusantara</div>
              </div>
              <span class="badge bg-primary rounded-pill">6</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Berita</div>
              </div>
              <span class="badge bg-primary rounded-pill">5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Hotel</div>
              </div>
              <span class="badge bg-primary rounded-pill">6</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Travel</div>
              </div>
              <span class="badge bg-primary rounded-pill">2</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Transportasi</div>
              </div>
              <span class="badge bg-primary rounded-pill">3</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Kuliner</div>
              </div>
              <span class="badge bg-primary rounded-pill">4</span>
            </li>
          </ol>
          </div>
          <!--penutup kolom 3-->

        </div> <!--penutup row-->
    </div> <!--penutup container-->

<!--Awal valencia UAS-->
<!-- Container for the grid -->
<div style="margin-top: 50px;" class="container">
    <div class="row">
    <div style="margin-bottom: 20px;" class="judul"></div>
            <h1>VALENCIA UAS</h1>
        <?php
          $valencia = mysqli_query($connection,
          "SELECT * from valencia, destinasi 
           WHERE valencia.destinasiKODE = destinasi.destinasiKODE");

        if (mysqli_num_rows($valencia) > 0) {
            while ($row = mysqli_fetch_array($valencia)) {
        ?>
                <div class="col-lg-6 mb-4">
                    <div style="box-shadow: 0 2px 5px" class="card mb-3">
                        <img src="admin/imageslider/<?php echo $row["destinasiFOTO"]; ?>" class="card-img-top img-fluid" alt="gambar" style="height: 200px; object-fit: cover; object-position: 50% 20%;">
                        <div class="card-body">
                        <h4 class="card-title"><?php echo $row["destinasiNAMA"]; ?></h4>
                            <p class="card-text">Kota : <?php echo $row["valenciaKOTA"]; ?></p>
                            <p class="card-text"><small class="text-muted"><?php echo $row["destinasiKET"]; ?></small></p>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
    </div>
</div>
<!--akhir valencia UAS-->



<!--Memulai Kategori Wisata-->
<div style="margin-top: 50px;" class="container">
    <div class="row">
    <div style="margin-bottom: 20px;" class="judul"></div>
            <h1>Kategori Wisata</h1>
        <?php
                 $kategoriwisata = mysqli_query($connection, "SELECT * FROM kategoriwisata");

                 if (mysqli_num_rows($kategoriwisata) > 0) {
                     while ($row = mysqli_fetch_array($kategoriwisata)) {
                 ?>
                         <!--ini buat bagi jadi 3 kolom-->
                         <div class="col-sm-12">
                             <div style="text-align:center; padding-bottom:20px;" class="tulisan">
                                 <div style="background-color: #2f3542; color: white;" class="shadow-lg p-3 mb-5 body rounded">
                                     <h5 class="card-title"><?php echo $row["kategoriNAMA"]; ?></h5>
                                     <p class="card-text"><?php echo $row["kategoriKET"]; ?></p>
                                     <a href="#!" class="btn btn-secondary">more</a>
                                 </div>
                             </div>
                         </div>
                         <?php
            }
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
    </div>
</div>
<!--akhir Kategori Wisata-->




<!--Awal Foto Wisata-->
<div style="margin-bottom: 75px;" id="dynamicCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        $fotowisata = mysqli_query($connection, "SELECT * FROM fotodestinasi");

        if (mysqli_num_rows($fotowisata) > 0) {
            $counter = 0;
            while ($row = mysqli_fetch_array($fotowisata)) {
                $active = ($counter == 0) ? 'active' : '';
                ?>
                <div class="carousel-item <?php echo $active; ?>">
                    <img src="admin/imageslider/<?php echo $row["fotoWISATA"]; ?>" class="d-block mx-auto" alt="gambar" style="width: 100%; max-height: 50vh;  filter: brightness(70%); object-fit: cover;"> <!--object fit untuk menyesuaikan dengan ukuran gambar-->
                    <div class="carousel-caption d-none d-md-block">
                        <h1><?php echo $row["namaWISATA"]; ?></h1>
                        <h2><?php echo $row["lokasiWISATA"]; ?></h2>
                    </div>
                </div>
                <?php
                $counter++;
            }
        }
        ?>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#dynamicCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#dynamicCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!--Akhir Foto Wisata-->


<!--Kuliner-->
<!-- Container for the grid -->
<div style="margin-top: 50px;" class="container">
    <div class="row">
    <div style="margin-bottom: 20px;" class="judul"></div>
            <h1>KULINER NUSANTARA</h1>
        <?php
        $kuliner = mysqli_query($connection, "SELECT * FROM kuliner");

        if (mysqli_num_rows($kuliner) > 0) {
            while ($row = mysqli_fetch_array($kuliner)) {
        ?>
                <!--ini buat bagi jadi 3 kolom-->
                <div class="col-lg-4 mb-4">
                    <div style="background-color:#006266; text-align:center" class="card">
                        <img src="admin/imageslider/<?php echo $row["fotoKULINER"]; ?>" class="card-img-top" alt="Kuliner Image" style="height: 200px;">
                        <div style="color: white;" class="card-body">
                            <h5 class="card-title"><?php echo $row["namaKULINER"]; ?></h5>
                            <p class="card-text"><?php echo $row["lokasiKULINER"]; ?></p>
                            <a href="#!" class="btn btn-secondary">Pelajari</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
    </div>
</div>
<!--akhir kuliner-->


<!--Awal berita-->
<div style="margin-top: 50px;" class="container">
<div style="margin-bottom: 20px;" class="judul"></div>
            <h1>BERITA</h1>
    <?php
    $berita = mysqli_query($connection, "SELECT * FROM berita");

    if (mysqli_num_rows($berita) > 0) {
        while ($row = mysqli_fetch_array($berita)) {
    ?>
            <div style="margin-bottom: 30px;" class="row">
                <div class="col-lg-6 mb-6">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $row["kategoriberitavalencia"]; ?>
                        </div>
                        <div style="text-align: center;" class="card-body">
                            <h5 class="card-title"><?php echo $row["beritaJUDUL"]; ?></h5>
                            <p class="card-text"><?php echo $row["event0108"]; ?></p>
                            <a href="#" class="btn btn-primary">More</a>
                        </div>
                    </div>
                </div>
    <?php
            if ($row = mysqli_fetch_array($berita)) { // Check if there is another row
    ?>
                <div class="col-lg-6 mb-6">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $row["kategoriberitavalencia"]; ?>
                        </div>
                        <div style="text-align: center;" class="card-body">
                            <h5 class="card-title"><?php echo $row["beritaJUDUL"]; ?></h5>
                            <p class="card-text"><?php echo $row["event0108"]; ?></p>
                            <a href="#" class="btn btn-primary">More</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
            }
        }
    } else {
        echo '<p>No data found.</p>';
    }
    ?>
</div>
<!--Akhir berita-->


<!--Awal Hotel-->
<div style="margin-top: 50px;" class="container">
    <div class="row">
    <div style="margin-bottom: 20px;" class="judul"></div>
            <h1>HOTEL</h1>
        <?php
        $hotel = mysqli_query($connection, "SELECT * FROM hotel");

        if (mysqli_num_rows($hotel) > 0) {
            while ($row = mysqli_fetch_array($hotel)) {
        ?>
                <div class="col-lg-6 mb-4">
                    <div style="box-shadow: 0 2px 5px" class="card mb-3">
                        <img src="admin/imageslider/<?php echo $row["FOTOhotel"]; ?>" class="card-img-top img-fluid" alt="gambar" style="height: 200px; object-fit: cover; object-position: 50% 20%;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["NAMAhotel"]; ?></h5>
                            <p class="card-text"><small class="text-muted"><?php echo $row["ALAMAThotel"]; ?></small></p>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
    </div>
</div>
<!--Akhir Hotel-->

<!--Awal Travel-->
<div style="margin-top: 50px;" class="container">
    <div class="row">
    <div style="margin-bottom: 20px;" class="judul"></div>
            <h1>Travel</h1>
        <?php
        $travel = mysqli_query($connection, "SELECT * FROM travel");

        if (mysqli_num_rows($travel) > 0) {
            while ($row = mysqli_fetch_array($travel)) {
        ?>
                <div class="col-lg-3 mb-4">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row["NAMAtravel"]; ?></h5>
                    <p class="card-text"><?php echo $row["LOKASItravel"]; ?></p>
                    <a href="#" class="btn btn-primary">more info</a>
                  </div>
                </div>
                </div>
        <?php
            }
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
    </div>
</div>
<!--Akhir Travel-->

<!--Awal Transportasi-->
<div style="margin-top: 50px;" class="container">
    <div class="row">
    <div style="margin-bottom: 20px;" class="judul"></div>
            <h1>Transportasi</h1>
    <?php
         $transportasi = mysqli_query($connection,
         "SELECT * from transportasi, travel 
         WHERE transportasi.KODEtravel = travel.KODEtravel");

        if (mysqli_num_rows($transportasi) > 0) {
            while ($row = mysqli_fetch_array($transportasi)) {
        ?>
                <div class="col-lg-3 mb-4">
                <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
                  <div style="font-size: 20px;" class="card-header"><?php echo $row["JENIStransport"]; ?></div>
                  <div class="card-body">
                    <h3 class="card-title"><?php echo $row["LOKASItravel"]; ?></h3>
                    <h5 class="card-title"><?php echo $row["PLATtransport"]; ?></h5>
                  </div>
                </div>
                </div>
        <?php
            }
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
    </div>
</div>

<!--Akhir Transportasi-->

</div> <!--penutup container-fluid-->

  <!-- Footer -->
  <footer
          class="text-center text-lg-start text-white"
          style="background-color: #45526e"
          >
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              WEBDEV
            </h6>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Need Help?</h6>
            <p>
              <a class="text-white">Destinasi</a>
            </p>
            <p>
              <a class="text-white">Foto Wisata</a>
            </p>
            <p>
              <a class="text-white">Berita</a>
            </p>
            <p>
              <a class="text-white">Kuliner</a>
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              Useful links
            </h6>
            <p>
              <a class="text-white">Your Account</a>
            </p>
            <p>
              <a class="text-white">Become an Affiliate</a>
            </p>
            <p>
              <a class="text-white">Shipping Rates</a>
            </p>
            <p>
              <a class="text-white">Help</a>
            </p>
          </div>

          <!-- Grid column -->
          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p><i class="fas fa-home mr-3"></i> Jakarta</p>
            <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
          </div>
          <!-- Grid column -->
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->

      <hr class="my-3">

      <!-- Section: Copyright -->
      <section class="p-3 pt-0">
        <div class="row d-flex align-items-center">
          <!-- Grid column -->
          <div class="col-md-7 col-lg-8 text-center text-md-start">
            <!-- Copyright -->
            <div style="text-align: center; margin-left:500px;" class="p-3">
              © WEBDEV 2023 Copyright:
            </div>
            <!-- Copyright -->
          </div>
        </div>
      </section>
      <!-- Section: Copyright -->
    </div>
    <!-- Grid container -->
  </footer>
  <!-- Footer -->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>