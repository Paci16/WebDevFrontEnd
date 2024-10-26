<?php
include "include/config.php";
if(isset($_GET['hapus']))
{
    $KODEtravel = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM travel  
    WHERE KODEtravel = '$KODEtravel'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='d-travel.php'</script>";
}

?>