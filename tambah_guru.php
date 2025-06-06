<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Guru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient( #2575fc);
            min-height: 100vh;
        }
        .card {
            border-radius: 1rem;
        }
        .btn {
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center py-5">
        <div class="col-md-6">
            <div class="card shadow-lg p-4">
                <h3 class="text-center mb-4">Form Tambah Guru</h3>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label">NIP</label>
                        <input type="number" name="nip" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Guru</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" name="simpan">Simpan</button>
                        <a href="index.php" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['simpan'])) {
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        mysqli_query($koneksi, "INSERT INTO guru (nip, nama, alamat) VALUES ('$nip', '$nama', '$alamat')");
        echo "<script>alert('Data guru disimpan!');window.location='index.php';</script>";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</body>
</html>