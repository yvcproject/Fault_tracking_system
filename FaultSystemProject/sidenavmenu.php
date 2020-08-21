<?php
$Permission = isset($_COOKIE["Permission"]) ? $_COOKIE["Permission"] : 0;
echo '
<script src="nav.js"></script>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="./mainPage.php">Home Page</a>
  <a href="./faultForm.php">New Fault</a>';
      if ($Permission > 1){
      echo '<a href="./reports.php">Reports</a>';
      }
      if ($Permission > 2){
      echo '<a href="./Register.php">Add New User</a>';
      }

echo '</div> ';
  ?>



