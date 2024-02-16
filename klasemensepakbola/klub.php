<?php include('header.php'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-body">
                    <h4 class="fw-bold py-2">Input Klub</h4>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Klub</label>
                            <input type="text" required class="form-control" name="namaklub" placeholder="Nama Klub">
                        </div>
                        <div class="form-group">
                            <label>Kota Klub</label>
                            <input type="text" required class="form-control" name="kotaklub" placeholder="Kota Klub">
                        </div>
                        <div class="form-group">
                            <button type="submit" required class="btn btn-primary float-end" name="simpan">Simpan</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['simpan'])) {
                        $namaklub = $_POST["namaklub"];
                        $kotaklub = $_POST["kotaklub"];
                        $ambilcek = $koneksi->query("SELECT * FROM klub
                        WHERE namaklub='$namaklub'");
                        $cek = $ambilcek->num_rows;
                        if ($cek >= 1) {
                            echo "<script> alert('Klub ini sudah ada, harap menginput nama klub lain');</script>";
                            echo "<script> location ='klub.php';</script>";
                        } else {
                            $koneksi->query("INSERT INTO klub(namaklub,kotaklub)
		VALUES ('$namaklub','$kotaklub')");
                            echo "<script> alert('Data berhasil di simpan');</script>";
                            echo "<script> location ='klub.php';</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabel" class="table table-bordered table-hover">
                            <thead class="bg-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Klub</th>
                                    <th>Kota Klub</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php $ambil = $koneksi->query("SELECT*FROM klub"); ?>
                                <?php while ($data = $ambil->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['namaklub'] ?></td>
                                        <td><?php echo $data['kotaklub'] ?></td>
                                        <td>
                                            <a href="klubhapus.php?id=<?php echo $data['idklub']; ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>