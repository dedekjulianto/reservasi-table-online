<?php
  $reserve_id = $_GET["reserve_id"];

  $query = mysqli_query($koneksi, "SELECT pesanan.id_pesanan, pesanan.nama_pemesan, pesanan.nomor_telepon, pesanan.nomor_telepon, pesanan.alamat, pesanan.tanggal_pesan, users.nama FROM pesanan JOIN users ON pesanan.tamu_id=users.tamu_id WHERE pesanan.id_pesanan='$reserve_id'");

  $row = mysqli_fetch_assoc($query);

  $tanggal_pesan = $row['tanggal_pesan'];
  $nama_pemesan = $row['nama_pemesan'];
  $nomor_telepon = $row['nomor_telepon'];
  $alamat = $row['alamat'];
  $nama = $row['nama'];
  // $kapasitas = $row['kapasitas'];

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
      <td>Nama</td>
      <td>:</td>
      <td><?php echo $nama ?></td>
    </tr>
    <!-- <tr>
      <td>Kapasitas</td>
      <td>:</td>
      <td><?php echo $kapasitas ?></td>
    </tr> -->
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
      <th>Nama Barang</th>
      <th>Qty</th>
      <th class="kanan">Harga Satuan</th>
      <th class="kanan">Total</th>
    </tr>
  <?php
    $queryDetail = mysqli_query($koneksi, "SELECT * FROM invoice JOIN menu ON invoice.id_menu=menu.id_menu WHERE id_pesanan='$reserve_id'");

    $no=1;
    $subTotal = 0;
    while ($rowDetail=mysqli_fetch_assoc($queryDetail)) {
      $total = $rowDetail["harga"] * $rowDetail["quantity"];
      $subTotal = $subTotal + $total;
      echo "<tr class='tengah'>
              <td>$no</td>
              <td>$rowDetail[nama_menu]</td>
              <td>$rowDetail[quantity]</td>
              <td class='kanan'>".rupiah($rowDetail["harga"])."</td>
              <td class='kanan'>".rupiah($total)."</td>
            </tr>";
      $no++;
    }
  ?>
  <tr>
    <td class="kanan" colspan="4"><b>Jumlah Bayar</b></td>
    <td class="kanan"><?php echo rupiah($subTotal); ?></td>
  </tr>
</table>

<div id="frame-keterangan">
  <p>Silahkan datang tepat waktu<br/>
     Customer Service : 0000-9999-8888<br/>
  </p>
</div>
<div id="frame-tambah">
  <a href="<?php echo BASE_URL."index.php?page=cetak_menu&reserve_id=$row[id_pesanan]";?>" target="_blank" class="tombol-action">Cetak</a>
</div>
