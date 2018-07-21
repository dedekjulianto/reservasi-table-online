<?php

  if ($level == "receptionist") {
    $queryReserve = mysqli_query($koneksi, "SELECT * FROM pesanan JOIN users ON pesanan.tamu_id=users.tamu_id ORDER BY pesanan.tanggal_pesan DESC");
  } else {
    $queryReserve = mysqli_query($koneksi, "SELECT * FROM pesanan JOIN users ON pesanan.tamu_id=users.tamu_id WHERE pesanan.tamu_id='$guest_id' ORDER BY pesanan.tanggal_pesan DESC");
  }

  if (mysqli_num_rows($queryReserve) == 0) {
    echo "<h3>Saat ini belum ada data pesanan</h3>";
  } else {
    echo "<table class='table-list'>
            <tr class='baris-title'>
              <th class='kiri'>Nomor Pesanan</th>
              <th class='kiri'>Nama</th>
              <th class='kiri'>Nomor Telepon</th>
              <th class='kiri'>Action</th>
            <tr>";

          while($row=mysqli_fetch_assoc($queryReserve)) {
            echo "<tr>
                    <td class='kiri'>$row[id_pesanan]</td>
                    <td class='kiri'>$row[nama]</td>
                    <td class='kiri'>$row[nomor_telepon]</td>
                    <td class='kiri'>
                      <a class='tombol-action' href='".BASE_URL."index.php?page=myprofile&module=invoice&action=detail&reserve_id=$row[id_pesanan]'>Detail Reserve</a>
                    </td>
                  </tr>";
          }
    echo "</table>";
  }
?>
