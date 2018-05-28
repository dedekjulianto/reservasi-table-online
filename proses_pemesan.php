<?php
  include_once("./function/koneksi.php");
  include_once("./function/helper.php");

  session_start();

  $nama_pemesan = $_POST["nama_pemesan"];
  $nomor_telepon = $_POST["nomor_telepon"];
  $jumlah = $_POST["jumlah"];
  $alamat = $_POST["alamat"];

  $guest_id = $_SESSION['guest_id'];
  $waktu_saat_ini = date("Y-m-d H:i:s");

  $query = mysqli_query($koneksi, "INSERT INTO pesanan (nama_pemesan, nomor_telepon, jumlah, alamat, tanggal_pesan)
                                               VALUES ('$nama_pemesan', '$nomor_telepon', '$jumlah', '$alamat')" );
?>
