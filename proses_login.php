<?php
  include_once("./function/helper.php");
  include_once("./function/koneksi.php");

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $query = mysqli_query($koneksi, "SELECT * FROM guests WHERE email='$email' AND password='$password'");

  if (mysqli_num_rows($query) == 0) {
    header("location:".BASE_URL."index.php?page=login&notif=true");
  } else {
    $row = mysqli_fetch_assoc($query);
    session_start();
    $_SESSION['guest_id'] = $row['guest_id'];
    $_SESSION['nama'] = $row['nama'];
    if (isset($_SESSION["proses_pemesan"])) {
      header("location:".BASE_URL."index.php?page=myprofile&module=reserve&action=list");
    } else {
      header("location:".BASE_URL."index.php?page=myprofile");
    }
  }
?>
