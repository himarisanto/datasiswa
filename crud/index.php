<?php include 'header.php'; ?>
<?php include 'config.php'; ?>

<div class="box1">
    <h2>DATA SISWA</h2>
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
    
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Absen</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM siswa";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Query Failed: " . mysqli_error($conn));
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['absen']; ?></td>
                        <td><?php echo $row['kelas']; ?></td>
                        <td><?php echo $row['jurusan']; ?></td>
                        <td>
                            <a href="update_siswa.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                            <a href="hapus_siswa.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php
// Optional pesan sukses/error
if (isset($_GET['massage'])) {
    echo "<h6>" . $_GET['massage'] . "</h6>";
}
if (isset($_GET['insert_msg'])) {
    echo "<h6>" . $_GET['insert_msg'] . "</h6>";
}
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="insert_data.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="absen">Absen</label>
                        <input type="number" class="form-control" id="absen" name="absen" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" required>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-primary" name="add_siswa" value="Tambah">
                </div>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
