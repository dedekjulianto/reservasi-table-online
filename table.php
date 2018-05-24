<div id="table">
  <div id="frame-table">
    <ul>
      <?php
        $query = mysqli_query($koneksi, "SELECT * FROM meja");
        while ($row=mysqli_fetch_assoc($query)) {
          echo "<li>
                  <p class='no'>$row[nomor]<p>
                  <a href='".BASE_URL."index.php?page=detail&meja_id=$row[meja_id]'>
                    $row[meja_id]
                  </a>
                  <div class='keterangan'>
                    <p>Kapasitas $row[kapasitas]</p>
                    <span>Status : $row[status]</span>
                  </div>
                  <div class='reserve'>
                    <a href='".BASE_URL."reserve_table.php?meja_id=$row[meja_id]'>RESERVE</a>
                  </div>
                </li>";
        }
       ?>
    </ul>
  </div>
</div>
