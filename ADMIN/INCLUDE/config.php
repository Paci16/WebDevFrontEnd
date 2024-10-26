<?php

//file ini akan sering dipake buat disambungin ke basis data
//koneksi ke basis data
$servername = "localhost";
$username = "root";
$password = "";
$dbaname = "pesonajawa";

//variabel koneksi untuk melakukan koneksi ke basis data (connection bisa diubah namanya)
$connection = mysqli_connect($servername, $username, $password, $dbaname);
if (!$connection)
{
    //jika tidak berhasil ter koneksi akan memuncullkan tulisan error
    die("connection failed: ".mysqli_connect_error());
}

?>