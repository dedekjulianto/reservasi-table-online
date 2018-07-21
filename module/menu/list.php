<div id="frame-tambah">
  <a href="<?php echo BASE_URL."index.php?page=myprofile&module=menu&action=form";?>" class="tombol-action">+ Tambah Menu</a>
</div>
<?php
  $query = mysqli_query($koneksi, "SELECT * FROM menu");

  if (mysqli_num_rows($query) == 0) {
    echo "<h3>Saat ini belum ada menu tersedia</h3>";
  } else {
    echo "<table class='table-list'>";

    echo "<tr class='baris-title'>
            <th class='kolom-nomor'>No</th>
            <th class='kiri'>Nama Menu</th>
            <th class='kiri'>Harga</th>
            <th class='tengah'>Stok</th>
            <th class='tengah'>Action</th>
          </tr>";

    $no =1;
    while ($row=mysqli_fetch_assoc($query)) {
      echo "<tr>
              <td class='kolom-nomor'>$no</td>
              <td class='kiri'>$row[nama_menu]</td>
              <td class='kiri'>".rupiah($row["harga"])."</td>
              <td class='tengah'>$row[stok]</td>
              <td class='tengah'>
                <a class='tombol-action' href='".BASE_URL."index.php?page=myprofile&module=menu&action=form&id_menu=$row[id_menu]'>Edit</a>
              </td>
            </tr>";

      $no++;
    }
    echo "</table>";
  }
?>
