<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .container {
            max-width: 800px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                Data Desa
            </div>
            <div class="card-body">
                <form action="" method="get">
                    <div class="input-group mb-3">

                        <input type="text" class="form-control" name="Keyword" placeholder="Masukkan Keyword" aria-label="Masukkan Keyword" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Serach</button>

                    </div>
                </form>

                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    + Tambah Data
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Data Desa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- menampilkan Eror -->
                                <div class="alert alert-danger error" role="alert" style="display : none;"></div>
                                <!-- menampilkan Sukses -->
                                <div class="alert alert-primary sukses" role="alert" style="display : none;"></div>
                                <!-- input data -->
                                <input type="hidden" id="inputId">
                                <div class="mb-3 row">
                                    <label for="inputNomorSurat" class="col-sm-2 col-form-label">Nomor Surat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputNomorSurat">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="inputJenisSurat" class="col-sm-2 col-form-label">Jenis Surat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputJenisSurat">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="inputTglSurat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputTglSurat">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" id="tombolSimpan">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nomor Surat</th>
                            <th>Jenis Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nomor Surat</td>
                            <td>Jenis Surat</td>
                            <td>Tanggal Surat</td>
                            <td>Created</td>
                            <td>Updated</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    </tbody>







                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

                    <script>
                        $('#tombolSimpan').on('click', function() {
                            var $nomorSurat = $('#inputNomorSurat').val();
                            var $jenisSurat = $('#inputJenisSurat').val();
                            var $tglSurat = $('#inputTglSurat').val();
                            $.ajax({
                                url: "<?php echo site_url("desa/simpan") ?>",
                                type: "POST",
                                data: {
                                    nomorSurat: $nomorSurat,
                                    jenisSurat: $jenisSurat,
                                    tglSurat: $tglSurat



                                },
                                success: function(hasil) {
                                    var $obj = $.parseJSON(hasil);
                                    if ($obj.sukses == false) {
                                        $('.sukses').hide();
                                        $('.error').show();
                                        $('.error').html($obj.error);

                                    } else {
                                        $('.error').hide();
                                        $('.sukses').show();
                                        $('.sukses').html($obj.sukses);
                                    }

                                }
                            });

                        });
                    </script>

</body>

</html>