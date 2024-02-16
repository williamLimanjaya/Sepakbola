<?php include('koneksi.php'); ?>
<?php
$koneksi->query("DELETE FROM skor WHERE kode='$_GET[id]'");
echo "<script>alert('Data berhasil di hapus');</script>";
echo "<script>location='skor.php';</script>";
