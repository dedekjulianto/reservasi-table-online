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
        <label>Jumlah Orang</label>
        <span><input type="text" name="jumlah" /></span>
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

              if ($button == "Submit") {
                  mysqli_query($koneksi, "UPDATE menu SET stok=stok-$quantity WHERE id_menu='$id_menu'");
              }
       ?>
    </table>
  </div>
</div>

<?php
