<?php include('header.php'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="klasemen" class="table table-bordered table-hover">
                            <thead class="bg-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Klub</th>
                                    <th>Ma</th>
                                    <th>Me</th>
                                    <th>S</th>
                                    <th>K</th>
                                    <th>GM</th>
                                    <th>GK</th>
                                    <th>Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $ambil = $koneksi->query("SELECT * FROM klub");
                                while ($data = $ambil->fetch_assoc()) {
                                    $point = 0;
                                    $idklub = $data['idklub'];
                                ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $data['namaklub'] ?>
                                        <td>
                                            <center>
                                                <?php
                                                $ambilmain = $koneksi->query("SELECT * FROM skor where idklub_a = '$idklub' or idklub_b = '$idklub'") or die(mysqli_error($koneksi));
                                                $main = $ambilmain->num_rows;
                                                echo $main
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php
                                                $ambilmenang_a = $koneksi->query("SELECT * FROM skor where idklub_a = '$idklub' and (score_a > score_b)") or die(mysqli_error($koneksi));
                                                $menang_a = $ambilmenang_a->num_rows;

                                                $ambilmenang_b = $koneksi->query("SELECT * FROM skor where idklub_b = '$idklub' and (score_b > score_a)") or die(mysqli_error($koneksi));
                                                $menang_b = $ambilmenang_b->num_rows;

                                                $menang = $menang_a + $menang_b;
                                                echo $menang;
                                                $point += $menang * 3;
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php
                                                $ambilseri = $koneksi->query("SELECT * FROM skor WHERE (idklub_a = '$idklub' OR idklub_b = '$idklub') AND (score_a = score_b)") or die(mysqli_error($koneksi));
                                                $seri = $ambilseri->num_rows;

                                                echo $seri;
                                                $point += $seri * 1;
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php
                                                $ambilkalah_a = $koneksi->query("SELECT * FROM skor where idklub_a = '$idklub' and (score_a < score_b)") or die(mysqli_error($koneksi));
                                                $kalah_a = $ambilkalah_a->num_rows;

                                                $ambilkalah_b = $koneksi->query("SELECT * FROM skor where idklub_b = '$idklub' and (score_b < score_a)") or die(mysqli_error($koneksi));
                                                $kalah_b = $ambilkalah_b->num_rows;

                                                $kalah = $kalah_a + $kalah_b;
                                                echo $kalah;
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php
                                                $skor = 0;
                                                $ambilmenang_a = $koneksi->query("SELECT * FROM skor where idklub_a = '$idklub' and (score_a > score_b)") or die(mysqli_error($koneksi));
                                                while ($datamenang_a = $ambilmenang_a->fetch_assoc()) {
                                                    $skor += $datamenang_a['score_a'];
                                                }

                                                $ambilmenang_b = $koneksi->query("SELECT * FROM skor where idklub_b = '$idklub' and (score_b > score_a)") or die(mysqli_error($koneksi));
                                                while ($datamenang_b = $ambilmenang_b->fetch_assoc()) {
                                                    $skor += $datamenang_b['score_b'];
                                                }
                                                echo $skor;
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php
                                                $skor = 0;
                                                $ambilkalah_a = $koneksi->query("SELECT * FROM skor where idklub_a = '$idklub' and (score_a < score_b)") or die(mysqli_error($koneksi));
                                                while ($datakalah_a = $ambilkalah_a->fetch_assoc()) {
                                                    $skor += $datakalah_a['score_a'];
                                                }

                                                $ambilkalah_b = $koneksi->query("SELECT * FROM skor where idklub_b = '$idklub' and (score_b < score_a)") or die(mysqli_error($koneksi));
                                                while ($datakalah_b = $ambilkalah_b->fetch_assoc()) {
                                                    $skor += $datakalah_b['score_b'];
                                                }
                                                echo $skor;
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <?= $point ?>
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