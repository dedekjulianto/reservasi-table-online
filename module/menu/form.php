<?php
  $id_menu = isset($_GET['id_menu']) ? $_GET['id_menu'] : false;

  $nama_menu = "";
  $harga = "";
  $stok = "";
  $gambar = "";
  $button = "Add";
  $keterangan_gambar = "";

  if ($id_menu) {
    $query = mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu='$id_menu'");
    $row = mysqli_fetch_assoc($query);

    $nama_menu = $row['nama_menu'];
    $harga = $row['harga'];
    $stok = $row['stok'];
    $gambar = $row['gambar'];
    $button = "Update";

    $keterangan_gambar = "(Klik pilih gambar jika ingin mengganti gambar disamping)";
    $gambar = "<img src ='".BASE_URL."images/menu/$gambar' style='width: 200px;vertical-align: middle;' />";
  }

 ?>

 <form action="<?php echo BASE_URL."module/menu/action.php?id_menu=$id_menu"; ?>" method="post" enctype="multipart/form-data">

   <div class="element-form">
     <label>Nama Menu</label>
     <span><input type="text" name="nama_menu" value="<?php echo $nama_menu; ?>" /></span>
   </div>
   <div class="element-form">
     <label>Gambar Menu <?php echo $keterangan_gambar; ?></label>
     <span>
       <input type="file" name="file" /> <?php echo $gambar; ?>
     </span>
   </div>
   <div class="element-form">
     <label>Harga</label>
     <span><input type="text" name="harga" value="<?php echo $harga; ?>" /></span>
   </div>
   <div class="element-form">
     <label>Stok</label>
     <span><input type="text" name="stok" value="<?php echo $stok; ?>" /></span>
   </div>
   <div class="element-form">
     <span><input type="submit" name="button" value="<?php echo $button; ?>" /></span>
   </div>


 </form>
