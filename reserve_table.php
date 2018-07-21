<?php
  include_once("./function/koneksi.php");
  include_once("./function/helper.php");

  session_start();
  $meja_id = $_GET['meja_id'];
  // $reserve = isset($_SESSION['reserve']) ? $_SESSION['reserve'] : false;

  $query = mysqli_query($koneksi, "SELECT meja.*, tipe_meja.tipe  FROM meja JOIN tipe_meja ON meja.tipe_id=tipe_meja.tipe_id WHERE meja.meja_id='$meja_id'");
  $row = mysqli_fetch_assoc($query);

  $reserve[$meja_id] = array("nomor" => $row["nomor"],
                             "kapasitas" => $row["kapasitas"],
                             "tipe" => $row["tipe"]);
                             // "meja_id" => $row["meja_id"]);
  $_SESSION["reserve"] = $reserve;
  header("location:".BASE_URL."index.php?page=myprofile&module=reserveTable&action=list");
?>
