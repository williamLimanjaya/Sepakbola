<?php include('koneksi.php'); ?>
<?php
$koneksi->query("DELETE FROM klub WHERE idklub='$_GET[id]'");
echo "<script>alert('Data berhasil di hapus');</script>";
echo "<script>location='klub.php';</script>";
