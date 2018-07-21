<?php
  session_start();

  $menu = $_SESSION["menu"];
  $id_menu = $_POST["id_menu"];
  $value = $_POST["value"];

  $menu[$id_menu]["quantity"] = $value;

  $_SESSION["menu"] = $menu;
 ?>
