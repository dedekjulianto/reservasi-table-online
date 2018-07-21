<div id="menu">
  <div id="frame-menu">
    <ul>
      <?php
          $query = mysqli_query($koneksi, "SELECT * FROM menu");

          while ($row=mysqli_fetch_assoc($query)) {
            echo "<li>
                    <p class='price'>".rupiah($row['harga'])."</p>
                      <img src='".BASE_URL."images/menu/$row[gambar]' />
                    <div class='keterangan-gambar'>
                      <p>$row[nama_menu]</p>
                      <span>Stok : $row[stok]</span>
                    </div>
                    <div class='button-add'>
                      <a href='".BASE_URL."tambah_menu.php?id_menu=$row[id_menu]'>reserve menu</a>
                    </div>";
          }
       ?>
    </ul>
  </div>
</div>
