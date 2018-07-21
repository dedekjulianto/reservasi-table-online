<?php
  include_once("./function/helper.php");
  include_once("./function/koneksi.php");

  session_start();

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $query = mysqli_query($koneksi, "SELECT * FROM users
                  WHERE email='$email'
                  AND password='$password'
                  AND status='on'");

  if (mysqli_num_rows($query) == 0) {
    header("location:".BASE_URL."index.php?page=login&notif=true");
  } else {
    $row = mysqli_fetch_assoc($query);
    session_start();
    $_SESSION['tamu_id'] = $row['tamu_id'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['level'] = $row['level'];
    if (isset($_SESSION["proses_pemesan"])) {
      unset($_SESSION["proses_pemesan"]);
      header("location:".BASE_URL."index.php?page=data_pemesan");
    } else {
      header("location:".BASE_URL."index.php?page=myprofile");
    }
  }
?>
