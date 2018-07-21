<?php
  if ($totalReserve == 0) {
    echo "<h3>Saat ini belum ada pesanan table anda</h3>";
  } else {
    echo "<table class='table-list'>
            <tr class='baris-title'>
              <th class='kiri'>No Meja</th>
              <th class='tengah'>kapasitas</th>
              <th class='tengah'>Tipe Meja</th>
            </tr>";

    foreach ($reserve as $key => $value) {
      $meja_id = $key;

      $noMeja = $value["nomor"];
      $kapasitas = $value["kapasitas"];
      $tipe = $value["tipe"];
      // $tipeMeja = $value["tipe_id"];
      echo "<tr>
              <td class='kiri'>$noMeja</td>
              <td class='tengah'>$kapasitas</td>
              <td class='tengah'>$tipe</td>
            </tr>";
    }
    echo "</table>";

    echo "<div id='frame-button'>
            <a id='pilih-table' href='".BASE_URL."index.php?page=Table'>< Change Table</a>
            <a id='reserve-table' href='".BASE_URL."index.php?page=pemesan'>Lanjut Pemesanan ></a>
          </div>";
  }
?>
