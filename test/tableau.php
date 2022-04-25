<?php
include('db_connect.php');
$q = ("SELECT * FROM document ");

$result = mysqli_query($DB, $q);
?>



<body>
   <table class="t1">
      <tr>
         <th>
            <table>
               <h2> Liste complète des Documents </h2>
         </th>
      </tr>

      <th>Type </th>
      <th>Genre </th>
      <th>Outil </th>


      </tr>

      <?php

      while ($rows = mysqli_fetch_assoc($result)) {
      ?>
         <tr>
            <td><?php echo $rows['type']; ?></td>
            <td><?php echo $rows['genre']; ?></td>
            <td><?php echo $rows['outil']; ?></td>

         </tr>
      <?php
      }
      ?>

   </table>