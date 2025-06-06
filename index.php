<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include 'db.php';
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa & Guru</title>
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
        .table {
            border-radius: 0.5rem;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card shadow-lg p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Data Siswa & Guru Pembimbing</h3>
                <a href="logout.php" class="btn btn-outline-dark">Logout</a>
            </div>

            <div class="mb-3 d-flex flex-wrap gap-2">
                <a href="tambah_siswa.php" class="btn btn-success">+ Tambah Siswa</a>
                <a href="tambah_guru.php" class="btn btn-secondary">+ Tambah Guru</a>
                <a href="cetak_pdf.php" class="btn btn-danger" target="_blank">Cetak PDF</a>
            </div>

            <form method="GET" class="mb-3">
                <input type="text" name="cari" placeholder="Cari nama siswa..." value="<?= htmlspecialchars($cari) ?>" class="form-control" />
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Nama Guru</th>
                            <th>Alamat Guru</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT siswa.nis, siswa.nama AS nama_siswa, guru.nama AS nama_guru, guru.alamat
                                FROM siswa
                                JOIN guru ON siswa.nip = guru.nip
                                WHERE siswa.nama LIKE '%$cari%'";
                        $query = mysqli_query($koneksi, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($row['nis']) ?></td>
                                <td><?= htmlspecialchars($row['nama_siswa']) ?></td>
                                <td><?= htmlspecialchars($row['nama_guru']) ?></td>
                                <td><?= htmlspecialchars($row['alamat']) ?></td>
                                <td>
                                    <a href="edit_siswa.php?nis=<?= $row['nis'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="hapus_siswa.php?nis=<?= $row['nis'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
