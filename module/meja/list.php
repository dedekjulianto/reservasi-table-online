<?php
    $no=1;

    $queryAdmin = mysqli_query($koneksi, "SELECT meja.*, tipe_meja.tipe FROM meja JOIN tipe_meja ON meja.tipe_id=tipe_meja.tipe_id");

    if(mysqli_num_rows($queryAdmin) == 0)
    {
        echo "<h3>Saat ini belum ada data meja yang dimasukan</h3>";
    }
    else
    {
        echo "<table class='table-list'>";

            echo "<tr class='baris-title'>
                    <th class='kolom-nomor'>No</th>
                    <th class='kiri'>Nomor Meja</th>
                    <th class='kiri'>Kapasitas</th>
                    <th class='kiri'>Tipe Meja</th>
                    <th class='tengah'>Status</th>
                    <th class='tengah'h>Action</th>
                 </tr>";

            while($rowUser=mysqli_fetch_array($queryAdmin))
            {
                echo "<tr>
                        <td class='kolom-nomor'>$no.</td>
                        <td class='kiri'>$rowUser[nomor]</td>
                        <td class='kiri'>$rowUser[kapasitas]</td>
                        <td class='kiri'>$rowUser[tipe]</td>
                        <td class='tengah'>$rowUser[status]</td>
                        <td class='tengah'><a class='tombol-action' href='".BASE_URL."index.php?page=myprofile&module=meja&action=form&meja_id=$rowUser[meja_id]"."'>Edit</a></td>
                     </tr>";

                $no++;
            }

        //AKHIR DARI TABLE
        echo "</table>";
    }
?>
