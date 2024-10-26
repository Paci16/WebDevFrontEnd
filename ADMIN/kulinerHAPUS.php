<?php
include "include/config.php";
if(isset($_GET['hapus']))
{
    $namakuliner = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM kuliner  
    WHERE namaKULINER = '$namakuliner'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='d-kuliner.php'</script>";
}

?>