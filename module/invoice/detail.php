<?php
  $reserve_id = $_GET["reserve_id"];

  $query = mysqli_query($koneksi, "SELECT pesanan.reserve_id, pesanan.nama_pemesan, pesanan.nomor_telepon, pesanan.alamat, pesanan.tanggal_pesan, guests.nama FROM pesanan JOIN guests ON pesanan.guest_id=guests.guest_id WHERE pesanan.reserve_id='$reserve_id'");

  $row = mysqli_fetch_assoc($query);

  $tanggal_pesan = $row['tanggal_pesan'];
  $nama_pemesan = $row['nama_pemesan'];
  $nomor_telepon = $row['nomor_telepon'];
  $alamat = $row['alamat'];
  $nama = $row['nama'];
?>
<div ="frame-faktur">
  <h3><center>Detail Order</center></h3>
  <hr/>
  <table>
    <tr>
      <td>Nomor Faktur</td>
      <td>:</td>
      <td><?php echo $reserve_id ?></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><?php echo $nama ?></td>
    </tr>
    <tr>
      <td>Nama Pemesan</td>
      <td>:</td>
      <td><?php echo $nama_pemesan ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><?php echo $alamat ?></td>
    <tr>
    </tr>
    <tr>
      <td>Nomor Telepon</td>
      <td>:</td>
      <td><?php echo $nomor_telepon ?></td>
    </tr>
    <tr>
      <td>Tanggal Order</td>
      <td>:</td>
      <td><?php echo $tanggal_pesan ?></td>
    </tr>
  </table>
</div>

  <table class="table-list">
    <tr class="baris-title">
      <th>No.</th>
      <th>Nomor Meja</th>
      <th>Kapasitas</th>
      <th>Tipe Meja</th>
    </tr>
  <?php
    $queryDetail = mysqli_query($koneksi, "SELECT invoice.*, meja.nomor FROM invoice JOIN meja ON invoice.meja_id=meja.meja_id WHERE reserve_id='$reserve_id'");

    $no=1;
    while ($rowDetail=mysqli_fetch_assoc($queryDetail)) {
      echo "<tr class='tengah'>
              <td>$no</td>
              <td>$rowDetail[nomor]</td>
              <td>$rowDetail[kapasitas]</td>
              <td>$rowDetail[tipe]</td>
            </tr>";
      $no++;
    }
  ?>
</table>

<div id="frame-keterangan">
  <p>Silahkan datang tepat waktu<br/>
     Customer Service : 0000-9999-8888<br/>
  </p>
</div>
