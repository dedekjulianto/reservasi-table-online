<?php
  include_once("function/koneksi.php");
  include_once("function/helper.php");

  session_start();

  $id_menu = $_GET['id_menu'];
  $menu = isset($_SESSION['menu']) ? $_SESSION['menu'] : false;

  $query = mysqli_query($koneksi, "SELECT nama_menu, gambar, harga FROM menu WHERE id_menu='$id_menu'");

  $row = mysqli_fetch_assoc($query);

  $menu[$id_menu] = array("nama_menu" => $row["nama_menu"],
                          "gambar" => $row["gambar"],
                          "harga" => $row["harga"],
                          "quantity" => 1);
  $_SESSION["menu"] = $menu;

  header("location:".BASE_URL."index.php?page=myprofile&module=reserveMenu&action=list");

 ?>
