<?php
  $queryReserve = mysqli_query($koneksi, "SELECT * FROM pesanan JOIN guests ON pesanan.guest_id=guests.guest_id WHERE pesanan.guest_id='$guest_id' ORDER BY pesanan.tanggal_pesan DESC");

  if (mysqli_num_rows($queryReserve) == 0) {
    echo "<h3>Saat ini belum ada data pesanan table</h3>";
  } else {
    echo "<table class='table-list'>
            <tr class='baris-title'>
              <th class='kiri'>Nomor Pesanan</th>
              <th class='kiri'>Nama</th>
              <th class='kiri'>Nomor Telepon</th>
              <th class='kiri'>Action</th>
            <tr>";

          $row=mysqli_fetch_assoc($queryReserve);
            echo "<tr>
                    <td class='kiri'>$row[reserve_id]</td>
                    <td class='kiri'>$row[nama]</td>
                    <td class='kiri'>$row[nomor_telepon]</td>
                    <td class='kiri'>
                      <a class='tombol-action' href='".BASE_URL."index.php?page=myprofile&module=invoice&action=detail&reserve_id=$row[reserve_id]'>Detail Reserve</a>
                    </td>
                  </tr>";

    echo "</table>";
  }
?>
