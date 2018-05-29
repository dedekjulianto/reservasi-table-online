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

  $query = mysqli_query($koneksi, "INSERT INTO pesanan (nama_pemesan, guest_id, nomor_telepon, jumlah, alamat, tanggal_pesan)
                                               VALUES ('$nama_pemesan', '$guest_id', '$nomor_telepon', '$jumlah', '$alamat', '$waktu_saat_ini')");

  if ($query) {
    $last_pesanan_id = mysqli_insert_id($koneksi);

    $reserve = $_SESSION['reserve'];

    foreach ($reserve as $key => $value) {
      $meja_id = $key;
      $nomor = $value['nomor'];
      $kapasitas = $value['kapasitas'];
      $tipeMeja = $value['tipe'];

      mysqli_query($koneksi, "INSERT INTO invoice (reserve_id, meja_id, nomor, kapasitas, tipe)
                                          VALUES ('$last_pesanan_id', '$meja_id', '$nomor', '$kapasitas', '$tipeMeja')");
    }
    unset($_SESSION["reserve"]);
    header("location:".BASE_URL."index.php?page=myprofile&module=invoice&action=detail&reserve_id=$last_pesanan_id");
  }

?>
