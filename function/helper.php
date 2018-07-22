<?php
  define("BASE_URL", "http://localhost/resto/");

  $arrayStatus[0] = "Reserve";
  $arrayStatus[1] = "Cancel";

  function rupiah($nilai = 0) {
    $string = "Rp,".number_format($nilai);
    return $string;
  }
 ?>
