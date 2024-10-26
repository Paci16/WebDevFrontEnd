<?php
include "include/config.php";
if(isset($_GET['hapus']))
{
    $idhotel = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM hotel
        WHERE IDhotel = '$idhotel'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='d-hotel.php'</script>";
}

?>