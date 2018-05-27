<div id="kiri">
  <div id="tipe-table">
    <ul>
      <?php
      $query = mysqli_query($koneksi, "SELECT * FROM tipe_meja");
        echo "<li><a href='".BASE_URL."index.php?page=table'>All Table</a></li>";
        while ($row=mysqli_fetch_assoc($query)) {
          if ($tipe_id == $row['tipe_id']) {
            echo "<li><a href='".BASE_URL."index.php?tipe_id=$row[tipe_id]' class='active'>Room $row[tipe]</a></li>";
          } else {
            echo "<li><a href='".BASE_URL."index.php?tipe_id=$row[tipe_id]'>Room $row[tipe]</a></li>";
          }

        }
       ?>
    </ul>
  </div>
</div>

<div id="kanan">
  <div id="frame-table">
    <ul>
      <?php
        if ($tipe_id) {
          $query = mysqli_query($koneksi, "SELECT meja.*, tipe_meja.tipe FROM meja JOIN tipe_meja ON meja.tipe_id=tipe_meja.tipe_id AND meja.tipe_id='$tipe_id'");
        } else {
          $query = mysqli_query($koneksi, "SELECT meja.*, tipe_meja.tipe FROM meja JOIN tipe_meja ON meja.tipe_id=tipe_meja.tipe_id");
        }

        $no=1;
        while ($row=mysqli_fetch_assoc($query)) {
          $style=false;
          if ($no == 3) {
            $style = "style='margin-right:0px'";
            $no=0;
          }
          echo "<li $style>
                  <p class='no'>$row[nomor]<p>
                  <a href='".BASE_URL."index.php?page=detail&meja_id=$row[meja_id]'>
                    $row[meja_id]
                  </a>
                  <div class='keterangan'>
                    <p>Kapasitas $row[kapasitas]</p>
                    <p>Tipe : $row[tipe]</p>
                    <span>Status : $row[status]</span>
                  </div>
                  <div class='reserve'>
                    <a href='".BASE_URL."reserve_table.php?meja_id=$row[meja_id]'>RESERVE</a>
                  </div>
                </li>";

          $no++;
        }
       ?>
    </ul>
  </div>
</div>
