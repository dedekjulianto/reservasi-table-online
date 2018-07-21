<?php
  include_once("../../function/koneksi.php");
  include_once("../../function/helper.php");

  $nama_menu = $_POST['nama_menu'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $button = $_POST['button'];
  $update_gambar = "";

  if (!empty($_FILES["file"]["name"])) {

    $nama_file = $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/menu/".$nama_file);

    $update_gambar = ", gambar='$nama_file'";
  }

  if ($button == "Add") {
    mysqli_query($koneksi, "INSERT INTO menu (nama_menu, gambar, harga, stok)
                                      VALUES ('$nama_menu', '$nama_file', '$harga', '$stok')");
  } else if ($button == "Update") {
    $id_menu = $_GET['id_menu'];

    mysqli_query($koneksi, "UPDATE menu SET nama_menu='$nama_menu',
                                            harga = '$harga',
                                            stok = '$stok'
                                            $update_gambar WHERE id_menu='$id_menu'");
  }

  header("location:".BASE_URL."index.php?page=myprofile&module=menu&action=list");
 ?>
