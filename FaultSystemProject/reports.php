<!DOCTYPE html>
<html>
<head>
	<title> Reports </title>
		<link rel="stylesheet" type="text/css" href="nav.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="general.css">


    <?php
      $server = "localhost";
      $username = "root";
      $password = "";
      $dbname = "faultsystem";
      $conn = mysqli_connect($server,$username,$password,$dbname);
   ?>



</head>
<body >

<!-- Head Nav Image and text -->
<?php include 'navbar.php'; ?>

<!-- Side Nav Manu -->
<?php include 'sidenavmenu.php'; ?>




<div style="padding-left: 10%; padding-right: 10%; align-content: center">

      <h1>Reports</h1>
      <br>


    <div class="dropdown">

      <div class="buttons" style="padding-left: 4%; padding-right: 4%; align-content: center" >

          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" dir="ltr">


                <?php 
                $filter = 'Date';
                if(@$_GET['status']==true){
                  $filter=$_GET['status'];
                  }
                echo 'Open Faults Ordered by '.$filter;
 
              ?>

          </button>


          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="reports.php?status=Date">By Date</a>
            <a class="dropdown-item" href="reports.php?status=Priority">By Priority</a>
          </div>
         



          <img class="float-right" src="printer.png" alt="print" width="70" height="70" onclick = "window.print()" aria-haspopup="true" aria-expanded="false">
 
      </div>

    
    <!-- Fault Table From DB -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        


            <div class="container my-4">



        <?php  

            $statusview = "Date";
            
            if(@$_GET['status']==true){
              $statusview=$_GET['status'];
            }
            
            $query = "select * from fault where faultStatus= 'open'  order by faultDate DESC";

            if($statusview== 'Priority'){
              $query = "select * from fault where faultStatus= 'open' order by faultPriority DESC";
            }

              echo '<div class="table-responsive">';
            echo "<table class=\"table-condensed table-hover table table-striped table-bordered\" 
                //style=\"margin-left: auto; margin-right: auto; \">";

              
              //echo '<table class="table">';
              echo '<thead>';
              echo '<tr>';
              echo '<th scope="col">#</th>';
              echo '<th scope="col">Date</th>';
              echo '<th scope="col">Category</th>';
              echo '<th scope="col">Location</th>';
              echo '<th scope="col">Priority</th>';
              echo '<th scope="col">status</th>';
              echo '</tr>';
              echo '</thead>';
              echo '<tbody>';



		$run = mysqli_query($conn,$query) or die(mysqli_error());
    $eid=1;
		if($run){
        
         while($row = mysqli_fetch_array($run)) 
         {
          echo '<tr class="accordion-toggle collapsed" id="accordion1" data-toggle="collapse" data-parent="#accordion1" href="#collapse'.$eid.'">';
          echo '<td class="expand-button"> </td>';
            echo "<td> $row[faultDate]</td>";
            echo "<td> $row[faultCategory]</td>";
            echo "<td> $row[faultLocation]</td>";
            echo "<td> $row[faultPriority]</td>";
            echo "<td> $row[faultStatus]</td>";
          echo '</tr>';
          echo '<tr class="hide-table-padding">';
          echo '<td></td>';
          echo '<td colspan="4">';
          echo '<div id="collapse'.$eid.'" class="collapse in p-3">';
          echo '<div class="row">';
          echo "$row[faultDescription]";
          echo '</div>';
          echo "<td>";
          echo '<div style="text-align:center;" id="collapse'.$eid.'" class="collapse in p-3">';
         echo '<a class="btn" href="editFaultform.php?id='.@$row[ID].'"><i class="fa fa-edit" style="font-size:24px; margin=0; padding=0;"></i></a>';

          echo '</div>';
          echo "</td>";
          echo '</div></td>';
          echo '</div>';
          echo '</tr>';
 

      $eid++;
         }
        }
        echo "</tbody>";
       echo "</table>";
                

    ?>
      </div>






  </div>









  <br>
<!-- footer-->
<?php include 'footer.php'; ?>

</body>
</html>