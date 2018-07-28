<?php
  include_once("./function/koneksi.php");
  include_once("./function/helper.php");

  session_start();

  // mysqli_query($koneksi, "UPDATE meja SET status='off' WHERE meja_id='$meja_id' ");


  $nama_pemesan = $_POST["nama_pemesan"];
  $nomor_telepon = $_POST["nomor_telepon"];
  $tanggal = $_POST["tanggal"];
  $alamat = $_POST["alamat"];
  // $meja_id = $_GET["meja_id"];

  $guest_id = $_SESSION['tamu_id'];
  $waktu_saat_ini = date("Y-m-d H:i:s");

  $query = mysqli_query($koneksi, "INSERT INTO pesanan (nama_pemesan, tamu_id, nomor_telepon, tanggal, alamat, tanggal_pesan)
                                               VALUES ('$nama_pemesan', '$guest_id', '$nomor_telepon', '$tanggal', '$alamat', '$waktu_saat_ini')");

  if ($query) {
    $last_pesanan_id = mysqli_insert_id($koneksi);

    // $meja_id = $_SESSION['meja_id'];
    $menu = $_SESSION['menu'];

    foreach ($menu as $key => $value) {
      $id_menu = $key;
      $quantity = $value['quantity'];
      $harga = $value['harga'];

      mysqli_query($koneksi, "INSERT INTO invoice (id_pesanan, id_menu, quantity, harga)
                                          VALUES ('$last_pesanan_id', '$id_menu', '$quantity', '$harga')");

    }

    $reserve = $_SESSION['reserve'];

      foreach ($reserve as $key => $value) {
        $meja_id = $key;
        $nomor = $value['nomor'];
        $kapasitas = $value['kapasitas'];
        $tipeMeja = $value['tipe'];

          mysqli_query($koneksi, "INSERT INTO invoice_table (id_pesanan, meja_id, nomor, kapasitas, tipe)
                                              VALUES ('$last_pesanan_id', '$meja_id', '$nomor', '$kapasitas', '$tipeMeja')");
      }
    unset($_SESSION["menu"]);
    unset($_SESSION["reserve"]);

    header("location:".BASE_URL."index.php?page=myprofile&module=invoice&action=detail&reserve_id=$last_pesanan_id");
  }

?>
