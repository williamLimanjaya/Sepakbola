<?php include('header.php'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-body">
                    <h4 class="fw-bold py-2">Input Skor Pertandingan (Satu per satu)</h4>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Klub I</label>
                                    <select class="form-control" name="idklub_a" required>
                                        <option value="">Pilih</option>
                                        <?php
                                        $ambilklub = $koneksi->query("SELECT*FROM klub");
                                        while ($klub = $ambilklub->fetch_assoc()) { ?>
                                            <option value="<?= $klub['idklub'] ?>"><?= $klub['namaklub'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Klub II</label>
                                    <select class="form-control" name="idklub_b" required>
                                        <option value="">Pilih</option>
                                        <?php
                                        $ambilklub = $koneksi->query("SELECT*FROM klub");
                                        while ($klub = $ambilklub->fetch_assoc()) { ?>
                                            <option value="<?= $klub['idklub'] ?>"><?= $klub['namaklub'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Score Klub I</label>
                                    <input type="number" required class="form-control" name="score_a" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Score Klub II</label>
                                    <input type="label" required class="form-control" name="score_b" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" required class="btn btn-primary float-end" name="simpan">Simpan</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['simpan'])) {
                        $kode = date("Ymdhis");
                        $idklub_a = $_POST["idklub_a"];
                        $idklub_b = $_POST["idklub_b"];
                        $score_a = $_POST["score_a"];
                        $score_b = $_POST["score_b"];
                        $ambilcek = $koneksi->query("SELECT * FROM skor
                        WHERE idklub_a='$idklub_a' and idklub_b='$idklub_b'");
                        $cek = $ambilcek->num_rows;
                        if ($cek >= 1) {
                            echo "<script> alert('Data pertandingan ini sudah ada, harap menginput data pertandingan lain');</script>";
                            echo "<script> location ='skor.php';</script>";
                        } else {
                            $koneksi->query("INSERT INTO skor(kode,idklub_a,score_a,idklub_b,score_b)
		VALUES ('$kode','$idklub_a','$score_a','$idklub_b','$score_b')");
                            echo "<script> alert('Data berhasil di simpan');</script>";
                            echo "<script> location ='skor.php';</script>";
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
                    <h4 class="fw-bold py-2">Input Skor Pertandingan (Multiple)</h4>
                    <form method="post" enctype="multipart/form-data">
                        <table class="table table-bordered table-striped" id="tabelform">
                            <tr>
                                <td width="30%">
                                    <div class="form-group">
                                        <label class="mb-2">Klub I</label>
                                        <select class="form-control" name="idklub_a[]" required>
                                            <option value="">Pilih</option>
                                            <?php
                                            $ambilklub = $koneksi->query("SELECT*FROM klub");
                                            while ($klub = $ambilklub->fetch_assoc()) { ?>
                                                <option value="<?= $klub['idklub'] ?>"><?= $klub['namaklub'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                                <td width="30%">
                                    <div class="form-group">
                                        <label class="mb-2">Klub II</label>
                                        <select class="form-control" name="idklub_b[]" required>
                                            <option value="">Pilih</option>
                                            <?php
                                            $ambilklub = $koneksi->query("SELECT*FROM klub");
                                            while ($klub = $ambilklub->fetch_assoc()) { ?>
                                                <option value="<?= $klub['idklub'] ?>"><?= $klub['namaklub'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-3">
                                        <label>Score Klub I</label>
                                        <input type="number" required class="form-control" name="score_a[]" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-3">
                                        <label>Score Klub II</label>
                                        <input type="number" required class="form-control" name="score_b[]" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-3">
                                        <button type="button" name="add" id="addklub" class="btn btn-success" style="margin-top:30px">+</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <div class="form-group">
                            <button type="submit" required class="btn btn-primary float-end" name="simpanmultiple" value="simpanmultiple">Simpan</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['simpanmultiple'])) {
                        $kode = date("Ymdhis");
                        $i = 0;
                        foreach ($_POST['idklub_a'] as $val) {
                            $idklub_a = $_POST['idklub_a'][$i];
                            $idklub_b = $_POST['idklub_b'][$i];
                            $score_a = $_POST['score_a'][$i];
                            $score_b = $_POST['score_b'][$i];
                            $ambilcek = $koneksi->query("SELECT * FROM skor
                            WHERE idklub_a='$idklub_a' and idklub_b='$idklub_b'");
                            $cek = $ambilcek->num_rows;
                            if ($cek >= 1) {
                                echo "<script> alert('Data pertandingan ini sudah ada, harap menginput data pertandingan lain');</script>";
                                echo "<script> location ='skor.php';</script>";
                            } else {
                                $koneksi->query("INSERT INTO skor(kode,idklub_a,score_a,idklub_b,score_b)
		                        VALUES ('$kode','$idklub_a','$score_a','$idklub_b','$score_b')");
                            }
                            $i++;
                        }
                        echo "<script> alert('Data berhasil di simpan');</script>";
                        echo "<script> location ='skor.php';</script>";
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
                                    <th>Klub I</th>
                                    <th>Klub II</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php $ambil = $koneksi->query("SELECT * FROM skor"); ?>
                                <?php while ($data = $ambil->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td>
                                            <center>
                                                <?php
                                                $ambilklub_a = $koneksi->query("SELECT * FROM klub WHERE idklub='$data[idklub_a]'");
                                                $klub_a = $ambilklub_a->fetch_assoc();
                                                echo $klub_a['namaklub'];
                                                echo '<br><b>' . $data['score_a'] . '</b>';
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php
                                                $ambilklub_b = $koneksi->query("SELECT * FROM klub WHERE idklub='$data[idklub_b]'");
                                                $klub_b = $ambilklub_b->fetch_assoc();
                                                echo $klub_b['namaklub'];
                                                echo '<br><b>' . $data['score_b'] . '</b>';
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <a href="skorhapus.php?id=<?php echo $data['kode']; ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Hapus</a>
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
<script>
    var $submit = $('#btn_simpan');

    $(document).ready(function() {
        var i = 1;
        $('#addklub').click(function() {

            i++;
            html = "";
            html += '<tr id="row' + i + '">' +
                '<td width="30%">' +
                '<div class="form-group">' +
                '<label class="mb-2">Klub I</label>' +
                '<select class="form-control" name="idklub_a[]" required>' +
                '<option value="">Pilih</option>' +
                <?php
                $ambilklub = $koneksi->query("SELECT*FROM klub");
                while ($klub = $ambilklub->fetch_assoc()) { ?> '<option value="<?= $klub['idklub'] ?>"><?= $klub['namaklub'] ?></option>' +
                <?php
                }
                ?> '</select>' +
                '</div>' +
                '</td>' +
                '<td width="30%">' +
                '<div class="form-group">' +
                '<label class="mb-2">Klub II</label>' +
                '<select class="form-control" name="idklub_b[]" required>' +
                '<option value="">Pilih</option>' +
                <?php
                $ambilklub = $koneksi->query("SELECT*FROM klub");
                while ($klub = $ambilklub->fetch_assoc()) { ?> '<option value="<?= $klub['idklub'] ?>"><?= $klub['namaklub'] ?></option>' +
                <?php
                }
                ?> '</select>' +
                '</div>' +
                '</td>' +
                '<td>' +
                '<div class="form-group mb-3">' +
                '<label>Score Klub I</label>' +
                '<input type="number" required class="form-control" name="score_a[]" required>' +
                '</div>' +
                '</td>' +
                '<td>' +
                '<div class="form-group mb-3">' +
                '<label>Score Klub II</label>' +
                '<input type="number" required class="form-control" name="score_b[]" required>' +
                '</div>' +
                '</td>' +

                '<td>' +
                '<div class="form-group mb-3">' +
                '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove" style="margin-top:30px">X</button>' +
                '</div>' +
                '</td>' +


                '</tr>';

            $('#tabelform').append(html);
        });

    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
    $('#tabelform').on('change', '.namaklub', function() {
        var $select = $(this);
        var namaklub = $select.val();
        var $row = $(this).closest('tr');
        $row.find('.idklub')
            .val(
                $(this).find(':selected').data('idklub')
            );
        $row.find('.jenisklub')
            .val(
                $(this).find(':selected').data('jenisklub')
            );
        $row.find('.satuan')
            .val(
                $(this).find(':selected').data('satuan')
            );
    });
</script>