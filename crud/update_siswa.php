<?php include('config.php'); ?>
<?php include('header.php'); ?>

<div class="box1">
    <h2>EDIT SISWA</h2>
    <table class="table table-hover table-bordered table-striped">
</div>

<?php
// Ambil data siswa berdasarkan ID dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM `siswa` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die("Data siswa tidak ditemukan.");
    }
} else {
    die("ID siswa tidak diberikan.");
}

// Proses update jika form disubmit
if (isset($_POST['update_siswa'])) {
    $id = $_POST['id']; // ambil dari input hidden
    $nama = $_POST['nama'];
    $absen = $_POST['absen'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $query = "UPDATE `siswa` SET 
                `nama` = '$nama', 
                `absen` = '$absen', 
                `kelas` = '$kelas', 
                `jurusan` = '$jurusan' 
              WHERE `id` = '$id'";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    } else {
        header('Location: index.php?update=success');
        exit;
    }
}
?>

<!-- Form Edit -->
<form action="update_siswa.php?id=<?php echo $id; ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>" required>
    </div>

    <div class="form-group">
        <label for="absen">Absen</label>
        <input type="number" class="form-control" name="absen" value="<?php echo $row['absen']; ?>" required>
    </div>

    <div class="form-group">
        <label for="kelas">Kelas</label>
        <input type="text" class="form-control" name="kelas" value="<?php echo $row['kelas']; ?>" required>
    </div>

    <div class="form-group">
        <label for="jurusan">Jurusan</label>
        <input type="text" class="form-control" name="jurusan" value="<?php echo $row['jurusan']; ?>" required>
    </div>

    <input type="submit" class="btn btn-primary" name="update_siswa" value="Update">
    <a href="index.php" class="btn btn-danger">Kembali</a>
</form>

<?php include('footer.php'); ?>