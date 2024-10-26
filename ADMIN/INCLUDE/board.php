<?php
    include "config.php";
    $sql = mysqli_query($connection,"SELECT * FROM destinasi");
    //untuk menghitung total jumlah rows nya
    $jumlah = mysqli_num_rows($sql);
?>                        

                        <div class="row">

                        <!--ini untuk membuat tampilannya sehingga memunculkan total rows-->
                        <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Destinasi Wisata: 
                                        <?php echo $jumlah; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftardestinasi.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

<?php
    include "config.php";
    $sql2 = mysqli_query($connection,"SELECT * FROM kategoriwisata");
    //untuk menghitung total jumlah rows nya
    $jumlah2 = mysqli_num_rows($sql2);
?>    

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Jumlah Kategori Wisata : 
                                    <?php echo $jumlah2; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftarkategoriwisata.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

<?php
    include "config.php";
    $sql3 = mysqli_query($connection,"SELECT * FROM fotodestinasi");
    //untuk menghitung total jumlah rows nya
    $jumlah3 = mysqli_num_rows($sql3);
?>  

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"> Jumlah Foto Wisata : 
                                    <?php echo $jumlah3; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftarfotowisata.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

<?php
    include "config.php";
    $sql4 = mysqli_query($connection,"SELECT * FROM berita");
    //untuk menghitung total jumlah rows nya
    $jumlah4 = mysqli_num_rows($sql4);
?> 

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Jumlah Berita :
                                    <?php echo $jumlah4; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftarberita.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
<?php
    include "config.php";
    $sql5 = mysqli_query($connection,"SELECT * FROM hotel");
    //untuk menghitung total jumlah rows nya
    $jumlah5 = mysqli_num_rows($sql5);
?> 

                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white bg-dark mb-4">
                                    <div class="card-body">Jumlah Hotel :
                                    <?php echo $jumlah5; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftarhotel.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        

<?php
    include "config.php";
    $sql6 = mysqli_query($connection,"SELECT * FROM travel");
    //untuk menghitung total jumlah rows nya
    $jumlah6 = mysqli_num_rows($sql6);
?> 

                            <div class="col-xl-3 col-md-6">
                                <div class="card text-dark bg-light mb-4">
                                    <div class="card-body">Jumlah Travel :
                                    <?php echo $jumlah6; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-black stretched-link" href="d-daftartravel.php">View Details</a>
                                        <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        

<?php
    include "config.php";
    $sql7 = mysqli_query($connection,"SELECT * FROM transportasi");
    //untuk menghitung total jumlah rows nya
    $jumlah7 = mysqli_num_rows($sql7);
?> 

                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white bg-secondary mb-4">
                                    <div class="card-body">Jumlah Transportasi :
                                    <?php echo $jumlah7; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftartransportasi.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        


<?php
    include "config.php";
    $sql8 = mysqli_query($connection,"SELECT * FROM kuliner");
    //untuk menghitung total jumlah rows nya
    $jumlah8 = mysqli_num_rows($sql8);
?> 

                            <div class="col-xl-3 col-md-6">
                                <div class="card text-dark bg-info mb-4">
                                    <div class="card-body">Jumlah Kuliner :
                                    <?php echo $jumlah8; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftarkuliner.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>