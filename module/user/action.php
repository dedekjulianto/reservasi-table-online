<?php
    include("../../function/koneksi.php");
    include("../../function/helper.php");

    $user_id = $_GET['tamu_id'];

  $nama = $_POST['nama'];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$alamat = $_POST["alamat"];
	$level = $_POST["level"];
	$status = $_POST["status"];

	mysqli_query($koneksi, "UPDATE users SET nama='$nama',
											   email='$email',
											   phone='$phone',
											   alamat='$alamat',
											   level='$level',
											   status='$status'
											   WHERE tamu_id='$user_id'");

    header("location: ".BASE_URL."index.php?page=myprofile&module=user&action=list");
?>
