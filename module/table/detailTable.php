<?php
  $reserve_id = $_GET["reserve_id"];
  $query = mysqli_query($koneksi, "SELECT pesan_table.id_pesanan, pesan_table.nama_pemesan, pesan_table.nomor_telepon, pesan_table.alamat, pesan_table.tanggal_pesan, users.nama FROM pesan_table JOIN users ON pesan_table.tamu_id=users.tamu_id WHERE pesan_table.id_pesanan='$reserve_id'");
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
    $queryDetail = mysqli_query($koneksi, "SELECT invoice_table.*, meja.nomor FROM invoice_table JOIN meja ON invoice_table.meja_id=meja.meja_id WHERE id_pesanan='$reserve_id'");
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
<div id="frame-tambah">
  <a href="<?php echo BASE_URL."index.php?page=cetak_table&reserve_id=$row[id_pesanan]";?>" target="_blank" class="tombol-action">Cetak</a>
</div>
