<?php
  session_start();
  unset($_SESSION['guest_id']);
  unset($_SESSION['nama']);
  header("location: index.php");
?>
