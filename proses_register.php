<?php
  include_once("./function/helper.php");
  include_once("./function/koneksi.php");

  $level = "tamu";
  $status = "on";
  $nama_lengkap = $_POST['nama_lengkap'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $alamat = $_POST['alamat'];
  $password = $_POST['password'];
  $re_password = $_POST['re_password'];

  unset($_POST['password']);
  unset($_POST['re_password']);
  $dataForm = http_build_query($_POST);

  $query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
  if (empty($nama_lengkap) || empty($email) || empty($phone) || empty($alamat) || empty($password)) {
    header("location: ".BASE_URL."index.php?page=register&notif=require&$dataForm");
  } else if($password != $re_password) {
    header("location: ".BASE_URL."index.php?page=register&notif=password&$dataForm");
  } else if(mysqli_num_rows($query) == 1) {
    header("location: ".BASE_URL."index.php?page=register&notif=email&$dataForm");
  } else {
    $password = md5($password);
    mysqli_query($koneksi, "INSERT INTO users (level, nama, email, phone, alamat, password, status)
                                        VALUES ('$level', '$nama_lengkap', '$email', '$phone', '$alamat', '$password', '$status')
                            ");
    header("location: ".BASE_URL."index.php?page=login");
  }
 ?>
