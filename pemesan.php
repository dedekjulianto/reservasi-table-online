
<div id="frame-data-pemesan">
  <h3 class="label-data-pemesan">Detail Reserve Table</h3>
  <div id="frame-form-pengirim">
    <form action="<?php echo BASE_URL."proses_table.php"; ?>" method="post">
      <div class="element-form">
        <label>Nama Pemesan</label>
        <span><input type="text" name="nama_pemesan" /></span>
      </div>
      <div class="element-form">
        <label>Nomor Telepon</label>
        <span><input type="text" name="nomor_telepon" /></span>
      </div>
      <div class="element-form">
        <label>Tanggal Booking (format:yyyy-mm-dd)</label>
        <span><input type="text" name="tanggal" /></span>
      </div>
      <div class="element-form">
        <label>Alamat</label>
        <span><textarea name="alamat"></textarea></span>
      </div>
      <div class="element-form">
        <span><input type="submit" value="Submit" name="button" /></span>
      </div>
    </form>
  </div>
</div>



<div id="frame-data-detail">
  <h3 class="label-data-pemesan">Detail Reserve Table</h3>
  <div id="frame-detail-reserve">
    <table class="table-list">
      <tr>
        <th class="kiri">Nomor Meja</th>
        <th class="tengah">Kapasitas</th>
        <th class="kanan">Tipe Meja</th>
      </tr>
      <?php
       foreach ($reserve as $key => $value) {
         $meja_id = $key;

         $noMeja = $value['nomor'];
         $kapasitas = $value['kapasitas'];
         $tipeMeja = $value['tipe'];

         echo "<tr>
                 <td class='kiri'>$noMeja</td>
                 <td class='tengah'>$kapasitas</td>
                 <td class='kanan'>$tipeMeja</td>
               </tr>";
       }
      ?>
    </table>
  </div>
</div>

<?php
  $button = "Submit";
  if ($button) {
    $query = mysqli_query($koneksi, "UPDATE meja SET status='off' WHERE meja_id='$meja_id' ");
  }
 ?>
