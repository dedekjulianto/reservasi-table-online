<div id="frame-data-pemesan">
  <h3 class="label-data-pemesan">Detail Reserve Table</h3>

  <div id="frame-form-pengirim">
    <form action="<?php echo BASE_URL."proses_pemesan.php"; ?>" method="post">
      <div class="element-form">
        <label>Nama Pemesan</label>
        <span><input type="text" name="nama_pemesan" /></span>
      </div>
      <div class="element-form">
        <label>Nomor Telepon</label>
        <span><input type="text" name="nomor_telepon" /></span>
      </div>
      <div class="element-form">
        <label>Alamat</label>
        <span><textarea name="alamat"></textarea></span>
      </div>
      <div class="element-form">
        <span><input type="submit" value="Submit" /></span>
      </div>
    </form>
  </div>
</div>

<div id="frame-data-detail">
  <h3 class="label-data-pemesan">Detail Reserve</h3>
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
          $tipeMeja = $value['tipe_id'];

          echo "<tr>
                  <td class='kiri'>$noMeja</td>
                  <td class='tengah'>$kapasitas</td>
                  <td class='kanan'>$tipeMeja</td>
          ";
        }
       ?>
    </table>
  </div>
</div>
