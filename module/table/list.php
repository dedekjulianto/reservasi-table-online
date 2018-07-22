<?php

  if ($level == "receptionist" || $level == "admin") {
    $queryReserve = mysqli_query($koneksi, "SELECT pesan_table.*, users.nama FROM pesan_table JOIN users ON pesan_table.tamu_id=users.tamu_id ORDER BY pesan_table.tanggal_pesan DESC");
  } else {
    $queryReserve = mysqli_query($koneksi, "SELECT pesan_table.*, users.nama FROM pesan_table JOIN users ON pesan_table.tamu_id=users.tamu_id WHERE pesan_table.tamu_id='$guest_id' ORDER BY pesan_table.tanggal_pesan DESC");
  }
  if (mysqli_num_rows($queryReserve) == 0) {
    echo "<h3>Saat ini belum ada data pesanan table</h3>";
  } else {
    echo "<table class='table-list'>
            <tr class='baris-title'>
              <th class='kiri'>Nomor Pesanan</th>
              <th class='kiri'>Status</th>
              <th class='kiri'>Nama</th>
              <th class='kiri'>Action</th>
            <tr>";

          while($row=mysqli_fetch_assoc($queryReserve)) {
            $status = $row['status'];
            echo "<tr>
                    <td class='kiri'>$row[id_pesanan]</td>
                    <td class='kiri'>$arrayStatus[$status]</td>
                    <td class='kiri'>$row[nama]</td>
                    <td class='kiri'>
                      <a class='tombol-action' href='".BASE_URL."index.php?page=myprofile&module=table&action=detailTable&reserve_id=$row[id_pesanan]'>Detail Reserve</a>
                    </td>
                  </tr>";
            }
    echo "</table>";
  }
?>
