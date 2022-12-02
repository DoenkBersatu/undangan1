<?php 
$koneksi = new mysqli('localhost', 'root', '', 'undangan');
if ($koneksi->connect_errno) {
    die("gagal konek nih bos ".$koneksi->connect_error);
}
?>