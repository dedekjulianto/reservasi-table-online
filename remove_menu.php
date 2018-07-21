<?php
  include_once("function/helper.php");

  session_start();

  $id_menu = $_GET['id_menu'];
  $menu = $_SESSION['menu'];

  unset($menu[$id_menu]);

  $_SESSION['menu'] = $menu;

  header("location:".BASE_URL."index.php?page=myprofile&module=order&action=list");

 ?>
