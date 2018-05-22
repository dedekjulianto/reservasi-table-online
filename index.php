<?php
  include_once("./function/helper.php");

  $page = isset($_GET['page']) ? $_GET['page'] : false;

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
             <a href="<?php echo BASE_URL."index.php?page=login"; ?>">Login</a>
             <a href="<?php echo BASE_URL."index.php?page=register"; ?>">Register</a>
           </div>
         </div>
       </div>

       <div id="content">
         <?php
         $filename = "$page.php";
          if (file_exists($filename)) {
            include_once($filename);
          } else {
            echo "Maaf file tersebut tidak ada didalam sistem";
          }
         ?>
       </div>
       <div id="footer">
         <p>copyright resto 2018</p>
       </div>
     </div>

   </body>
 </html>
