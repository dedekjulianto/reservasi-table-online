<?php
  if ($totalReserve == 0) {
    echo "<h3>Saat ini belum ada pesanan table anda</h3>";
  } else {
    $no=1;
    echo "<table class='table-list'>
            <tr class='baris-title'>
              <th class='kolom-nomor'>No.</th>
              <th class='kiri'>No Meja</th>
              <th class='tengah'>kapasitas</th>
              <th class='tengah'>Tipe Meja</th>
            </tr>";

    foreach ($reserve as $key => $value) {
      $meja_id = $key;

      $noMeja = $value["nomor"];
      $kapasitas = $value["kapasitas"];
      $tipeMeja = $value["tipe_id"];
      echo "<tr>
              <td class='kolom-nomor'>$no."."</td>
              <td class='kiri'>$noMeja</td>
              <td class='tengah'>$kapasitas</td>
              <td class='tengah'>$tipeMeja</td>
            </tr>";
      $no++;
    }
    echo "</table>";

    echo "<div id='frame-button'>
            <a id='pilih-table' href='".BASE_URL."index.php?page=table'>< Pilih Table</a>
            <a id='reserve-table' href='".BASE_URL."index.php?page=data_pemesan'>Reserve Table ></a>
          </div>";
  }
?>
