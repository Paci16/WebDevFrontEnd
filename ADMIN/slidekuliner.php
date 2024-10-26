<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width,
 initial-scale1.0">
 <title>  </title>
 
 <style>
        /* Gaya untuk slide pada carousel */
        .carousel-item img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%; /* Sesuaikan lebar gambar sesuai kebutuhan */
        }
    </style>

</head>
<body>

    <!-- Container Fluid untuk Memenuhi Lebar Layar -->
    <div class="container">

<!--container memiliki lebar maksimum tertentu
<div class="container">
-->

<!--membuat slide-->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">

  <!--item 1-->
    <div class="carousel-item active">
    <!--src buat masukin foto-->
      <img src="imageslider/lapa-lapa2.jpg" class="d-block w-60" alt="Gambar tidak ada">
      <div class="carousel-caption d-none d-md-block">
        <h5>Lapa-lapa</h5>
        <p>Sulawesi Tenggara</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="imageslider/ilustrasi-rendang-1_169.jpg" class="d-block w-60" alt="Gambar Tidak ada">
      <div class="carousel-caption d-none d-md-block">
        <h5>Rendang</h5>
        <p>Sumatra Barat</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="imageslider/Soto Banjar.jpg" class="d-block w-60" alt="Gambar tidak ada">
      <div class="carousel-caption d-none d-md-block">
        <h5>Soto Banjar</h5>
        <p>Kalimantan Selatan</p>
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
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>