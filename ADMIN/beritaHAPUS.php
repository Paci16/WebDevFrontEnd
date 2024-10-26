<?php
include "include/config.php";
if(isset($_GET['hapus']))
{
    $berita0108 = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM berita  
    WHERE berita0108 = '$berita0108'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='d-berita.php'</script>";
}

?>