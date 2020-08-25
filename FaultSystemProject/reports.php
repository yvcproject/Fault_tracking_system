<!DOCTYPE html>
<html>
<head>
	<title> Reports </title>
		<link rel="stylesheet" type="text/css" href="nav.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="general.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <h1>Reports</h1>
    <br>

    <!-- Filter and Button -->
 <div class="dropdown">
      <div class="buttons" style="padding-left: 4%; padding-right: 4%; align-content: center" >

          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" dir="ltr">
                <?php

                $orderby = isset($_GET['orderby']) ? $_GET['orderby'] : 'ID';
                echo "Ordered by $orderby";
               ?>
          </button>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <a class="dropdown-item" href="reports.php?orderby=ID">By ID</a>
            <a class="dropdown-item" href="reports.php?orderby=faultDate">By Date</a>
            <a class="dropdown-item" href="reports.php?orderby=faultPriority">By Priority</a>
          </div>



         <a class="btn float-right" onclick="window.print()"><i class=" fa fa-print" aria-hidden="true"  style="font-size:30px; margin=0; padding=0;"></i></a>

      </div>

                 <button class="btn btn-secondary dropdown-toggle" type="button" id="2"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" dir="ltr">
                       <?php

                       $filter = isset($_GET['filter']) ? $_GET['filter'] : 'open';
                       echo "Filter by $filter";
                      ?>
                 </button>

                 <div class="dropdown-menu" aria-labelledby="2">
                   <a class="dropdown-item" href="reports.php?filter=open">Open</a>
                   <a class="dropdown-item" href="reports.php?filter=closed">Closed</a>
                   <a class="dropdown-item" href="reports.php?filter=All">All</a>
                 </div>

            <div class="container my-4">

    <!-- Fault Table From DB -->

        <?php  

            $statusview = "Date";
            
            if(@$_GET['status']==true){
              $statusview=$_GET['status'];
            }

            //where faultStatus= 'open'

            $query = "select * from fault   order by $orderby";

            if($statusview== 'Priority'){
              $query = "select * from fault  order by faultPriority DESC";
            }

            echo '<div class="table-responsive">';
            echo "<table class=\"table-condensed table-hover table table-striped table-bordered\" 
                //style=\"margin-left: auto; margin-right: auto; \">";

              echo '<thead>
                    <tr>
                    <th scope="col">Fault ID</th>
                    <th scope="col">Opend Date</th>
                    <th scope="col">Opend By</th>
                    <th scope="col">Category</th>
                    <th scope="col">Location</th>
                    <th scope="col">Description</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>';



		$run = mysqli_query($conn,$query) or die(mysqli_error());
    $eid=1;
		if($run){
        
         while($row = mysqli_fetch_array($run)) 
         {
          echo '<tr >';
          echo "<td> $row[ID] </td>
                <td> $row[faultDate]</td>
                <td> $row[faultOpenBy]</td>
                <td> $row[faultCategory]</td>
                <td> $row[faultLocation]</td>
                <td>

                 $row[faultDescription]

                 </td>
                <td> $row[faultPriority]</td>
                <td> $row[faultStatus]</td>";
          echo '</tr>';

          if ( @$row[faultStatus] == 'closed') {
          echo '<tr>';
          echo '<td>Closed <br> Details</td>';
          echo '<td>Closed Date:</td>';
          echo "<td>$row[faultClosedDate]</td>";
          echo '<td>ServiceMan Comments:</td>';
          echo "<td>$row[serviceManComments]</td>";
          echo '<td>Parts Replacement:</td>';
          echo "<td >$row[partsReplaced]</td>";

          echo '<td colspan="2">';
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
        }
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