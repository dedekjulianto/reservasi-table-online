<?php
  if ($guest_id == false ) {
    $_SESSION["proses_pemesan"] = true;
    header("location: ".BASE_URL."index.php?page=myprofile");
    exit;
  }

  $menu = isset($_SESSION['menu']) ? $_SESSION['menu'] : array();
  $button = "Submit";
?>
<div id="frame-data-pemesan">
  <h3 class="label-data-pemesan">Detail Reserve</h3>
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
        <label>Tanggal Booking (format:yyyy-mm-dd)</label>
        <span><input type="text" name="tanggal" /></span>
      </div>
      <div class="element-form">
        <label>Alamat</label>
        <span><textarea name="alamat"></textarea></span>
      </div>
      <div class="element-form">
        <span><input type="submit" value="<?php echo $button; ?>" /></span>
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
  // $button = "Submit";
  if ($button) {
    $query = mysqli_query($koneksi, "UPDATE meja SET status='off' WHERE meja_id='$meja_id' ");
  }
 ?>

<div id="frame-data-detail">
  <h3 class="label-data-pemesan">Detail Reserve Menu</h3>
  <div id="frame-detail-reserve">
    <table class="table-list">
      <tr>
        <th class="kiri">Nama Menu</th>
        <th class="tengah">Qty</th>
        <th class="kanan">Total</th>
      </tr>

      <?php
      $subTotal = 0;
        foreach ($menu AS $key1 => $value1) {
          $id_menu = $key1;

          $nama_menu = $value1['nama_menu'];
          $harga = $value1['harga'];
          $quantity = $value1['quantity'];

          $total = $quantity * $harga;
          $subTotal = $subTotal + $total;
          echo "<tr>
                  <td class='kiri'>$nama_menu</td>
                  <td class='tengah'>$quantity</td>
                  <td class='kanan'>".rupiah($total)."</td>
                </tr>";
        }
        echo "<tr>
                <td colspan='2' class='kanan'><b>Sub Total</b></td>
                <td class='kanan'><b>".rupiah($subTotal)."</b></td>
              </tr>";
              // $quantity=0;
              // $id_menu = 0;
              if ($button == "Submit") {
                  mysqli_query($koneksi, "UPDATE menu SET stok=stok-$quantity WHERE id_menu='$id_menu'");
              }
       ?>
    </table>
  </div>

<div class="element-form">
  <span class="atas"><a class="tombol-action" href="<?php echo BASE_URL."index.php?page=myprofile&module=reserveMenu&action=list"; ?>">Menu</a></span>
</div>

</div>
