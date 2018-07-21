<?php
  if ($totalMenu == 0) {
    echo "<h3>Saat ini belum ada pesanan anda</h3>";
  } else {
    $no = 1;
    $subTotal = 0;

    echo "<table class='table-list'>
            <tr class='baris-title'>
              <th class='tengah'>No</th>
              <th class='kiri'>Image</th>
              <th class='kiri'>Nama Menu</th>
              <th class='tengah'>Qty</th>
              <th class='kanan'>Harga Satuan</th>
              <th class='kanan'>Total</th>
            </tr>";

    foreach ($menu as $key => $value) {
      $id_menu = $key;
      $nama_menu = $value["nama_menu"];
      $gambar = $value["gambar"];
      $harga = $value["harga"];
      $quantity = $value["quantity"];

      $total = $quantity * $harga;
      $subTotal = $subTotal + $total;
      echo "<tr>
              <td class='tengah'>$no</td>
              <td class='kiri'><img src='".BASE_URL."images/menu/$gambar' height='100px'</td>
              <td class='kiri'>$nama_menu</td>
              <td class='tengah'><input type='text' name='$id_menu' value='$quantity' class='update-quantity' /></td>
              <td class='kanan'>".rupiah($harga)."</td>
              <td class='kanan hapus'>".rupiah($total)." <a href='".BASE_URL."remove_menu.php?id_menu=$id_menu'>X</a></td>
            </tr>";
      $no++;
    }

    echo "<tr>
            <td colspan='5' class='kanan'><b>Sub Total</b></td>
            <td class='kanan'><b>".rupiah($subTotal)."</b></td>
          </tr>";

    echo "</table>";

    echo "<div id='frame-button'>
            <a id='pilih-table' href='".BASE_URL."index.php?page=myprofile&module=reserveMenu&action=list'>< Pesan Lagi</a>
            <a id='reserve-table' href='".BASE_URL."index.php?page=data_pemesan'>Lanjut Pemesanan ></a>
          </div>";
  }
 ?>

 <script>
    $(".update-quantity").on("input", function(e){
      var id_menu = $(this).attr("name");
      var value = $(this).val();

      $.ajax({
        method: "POST",
        url: "update_menu.php",
        data: "id_menu="+id_menu+"&value="+value
      })
      .done(function(data){
        location.reload();
      });

    });
 </script>
