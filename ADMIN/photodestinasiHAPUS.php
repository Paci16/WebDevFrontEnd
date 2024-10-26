<?php
include "include/config.php";
if(isset($_GET['hapus']))
{
    $namawisata = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM fotodestinasi  
    WHERE namaWISATA = '$namawisata'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='d-fotowisata.php'</script>";
}

?>