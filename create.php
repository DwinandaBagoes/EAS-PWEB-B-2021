<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // buat query
    $sql = "INSERT INTO akun (nama, username, password, email) VALUE ('$nama', '$username', '$password', '$email')";
    $query = mysqli_query($conn, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: user.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: user.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>