<?php
include "include/config.php";
if(isset($_GET['hapus']))
{
    $kodetransport = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM transportasi  
    WHERE KODEtransport = '$kodetransport'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='d-transportasi.php'</script>";
}

?>