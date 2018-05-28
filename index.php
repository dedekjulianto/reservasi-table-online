<?php
  session_start();
  include_once("./function/koneksi.php");
  include_once("./function/helper.php");

  $page = isset($_GET['page']) ? $_GET['page'] : false;
  $tipe_id = isset($_GET['tipe_id']) ? $_GET['tipe_id'] : false;

  $guest_id = isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] : false;
  $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
  $reserve = isset($_SESSION['reserve']) ? $_SESSION['reserve'] : array();
  $totalReserve = count($reserve);
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Resto | Reservasi Table</title>
     <link href="<?php echo BASE_URL."css/style.css"; ?>" type="text/css" rel="stylesheet" />
   </head>
   <body>
     <div id="container">
       <div id ="header">
         <div id="menu">
           <div id="user">
             <?php
                if ($guest_id) {
                  echo "Hai <b>$nama</b>,
                        <a href='".BASE_URL."index.php?page=table'>Table</a>
                        <a href='".BASE_URL."index.php?page=myprofile'>My Profile</a>
                        <a href='".BASE_URL."logout.php'>Logout</a>";
                } else{
                  echo "<a href='".BASE_URL."index.php?page=table'>Table</a>
                        <a href='".BASE_URL."index.php?page=login'>Login</a>
                        <a href='".BASE_URL."index.php?page=register'>Register</a>";
                }
             ?>
           </div>
         </div>
       </div>

       <div id="content">
         <?php
         $filename = "$page.php";
          if (file_exists($filename)) {
            include_once($filename);
          } else {
            include_once("table.php");
          }
         ?>
       </div>
       <div id="footer">
         <p>copyright resto 2018</p>
       </div>
     </div>
   </body>
 </html>
