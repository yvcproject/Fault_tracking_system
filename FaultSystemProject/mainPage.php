<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="nav.css">
  <link rel="stylesheet" type="text/css" href="mainPage.css">
  <link rel="stylesheet" type="text/css" href="general.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- infromation from DB  --> 
<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "faultsystem";
$conn = mysqli_connect($server,$username,$password,$dbname);
?>

</head>


<body>


<!-- Head Nav Image and text -->
<?php include 'navbar.php'; ?>

<!-- Side Nav Manu -->
<?php include 'sidenavmenu.php'; ?>


  <div><br><br></div>

<!-- Filter and Button -->
<div style="padding-left: 10%; padding-right: 10%; align-content: center">

      <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php 
          $filter = 'Open';
          if(@$_GET['status']==true){
            $filter=$_GET['status'];
            }
        echo $filter.' Faults';

         ?>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="mainPage.php?status=Open">Open Faults</a>
        <a class="dropdown-item" href="mainPage.php?status=Closed">Closed Faults</a>
        <a class="dropdown-item" href="mainPage.php?status=All">All Faults</a>
      </div>
                   <a 
     href="faultForm.php" class="btn btn-success float-right"  >Open New Fault
    </a>
    </div>
</div>


<div style="padding-left: 10%; padding-right: 10%; align-content: center">
 
<!-- Fault Table From DB -->
<!--<body style="padding-left: 10%; padding-right: 10%; align-content: center"> --> 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
        <div class="container my-4">


    



    <?php  

        $userid = isset($_COOKIE["UserID"]) ? $_COOKIE["UserID"] : '';
        $Permission = isset($_COOKIE["Permission"]) ? $_COOKIE["Permission"] : 0;
        $statusview = isset($_GET['status']) ? $_GET['status'] : "Open";


        if($statusview== 'All'){
            if ($Permission >1){
            $query = "select * from fault";
            }
            else{
             $query = "select * from fault where faultOpenBy='$userid'";
            }
        }
        else{
             if ($Permission >1){
             $query = "select * from fault where faultStatus= '$statusview'";
             }
             else{
             $query = "select * from fault where faultStatus= '$statusview' and faultOpenBy='$userid'";
             }
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

       
		//$query = "select * from fault";

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


<!-- footer-->
<?php include 'footer.php'; ?>




  <br>


</body>



</html>