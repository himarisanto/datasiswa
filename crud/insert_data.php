<?php


include 'config.php';

// cek apakah tombol add_siswa di klik
if (isset($_POST['add_siswa'])) {
// ambil data dari form
    $nama = $_POST['nama'];
    $absen = $_POST['absen'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
// cek apakah kolom sudah di isi
    if ($nama == "" || empty($nama)) {
        header("location:index.php?massage=Anda perlu mengisi kolom nama!");
    }
// kalau sudah data yg di isi masuk ke DB tabel siswa
    else{
        $query = "insert into `siswa`(`nama`,`absen`,`kelas`,`jurusan`) values('$nama','$absen','$kelas','$jurusan')";
        $result = mysqli_query($conn,$query);
// cek query berhasil atau tdk 
        if(!$result){
            die("Query Failed: ".mysqli_error($conn));
        }
        // notif jika berhasil masuk ke DB
        else{
            header("location:index.php?insert_msg=Data berhasil ditambahkan!");
        }
    }

}
?>