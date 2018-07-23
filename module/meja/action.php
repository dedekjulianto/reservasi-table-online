<?php
    include("../../function/koneksi.php");
    include("../../function/helper.php");

    $meja_id = $_GET['meja_id'];

  $nomor = $_POST['nomor'];
	$kapasitas = $_POST["kapasitas"];
	$status = $_POST["status"];

	mysqli_query($koneksi, "UPDATE meja SET
											   status='$status'
											   WHERE meja_id='$meja_id'");

    header("location: ".BASE_URL."index.php?page=myprofile&module=meja&action=list");
?>
