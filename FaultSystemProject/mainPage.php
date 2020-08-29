<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="nav.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="mainPage.css">
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

<!-- Login Check -->
<?php isset($_COOKIE["UserID"]) ? $_COOKIE["UserID"] : header("Location: ./"); ?>

<!-- Head Nav Image and text -->
<?php include 'navbar.php'; ?>

<!-- Side Nav Manu -->
<?php include 'sidenavmenu.php'; ?>

<!-- PopUp Alert Script -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<br>

<?php
    if ( isset($_GET['msg']) ){
        $msg = $_GET['msg'];
        echo '
                <script>
                    swal({
                      title: "'.$msg.'",
                      text: "Click \"ok\" to close ",
                      icon: "success",
                      button: "OK",
                    });
                </script>
        ';
    }
 ?>

<div class="mainContainer back" style="padding-left: 13.5%; padding-right: 13.5%; align-content: center">
<h1>Fault System</h1>
<br>
<!-- Filter and Button -->
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
        echo '
            <div class="table-responsive">
            <table class="table-condensed table-hover table table-striped table-bordered"
            //style="margin-left: auto; margin-right: auto;">
            <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Category</th>
            <th scope="col">Location</th>
            <th scope="col">Priority</th>
            <th scope="col">status</th>
            </tr>
            </thead>
            <tbody>
            ';

		$run = mysqli_query($conn,$query) or die(mysqli_error());
        $eid=1;
		if($run){
        
         while($row = mysqli_fetch_array($run)) 
         {
          echo '<tr class="accordion-toggle collapsed" id="accordion1" data-toggle="collapse" data-parent="#accordion1" href="#collapse'.$eid.'">';
          echo '<td class="expand-button"> </td>';
          echo "<td> $row[faultDate]</td>
                <td> $row[faultCategory]</td>
                <td> $row[faultLocation]</td>
                <td> $row[faultPriority]</td>
                <td> $row[faultStatus]</td>";

          echo '</tr>
                <tr class="hide-table-padding">
                <td></td>';
                if ($Permission >1){
                    echo '<td colspan="4">';
                    }
                else{
                    echo '<td colspan="5">';
                    }
          echo '<div id="collapse'.$eid.'" class="collapse in p-3">
                <div class="row">';

          echo "$row[faultDescription]";
          echo '</div>';
          if ($Permission >1){
          echo "<td>";
          echo '<div style="text-align:center;" id="collapse'.$eid.'" class="collapse in p-3">
                <a class="btn" href="editFaultform.php?id='.@$row[ID].'"><i class="fa fa-edit" style="font-size:24px; margin=0; padding=0;"></i></a>
                </div>';
          echo "</td>";
          }
          echo '</div></td>
                </div>
                </tr>';
 

      $eid++;
         }
        }
      echo "</tbody>
            </table>";
    ?>
	</div>


<!-- open only onc description at time - problem start -->
    <script>
      // accordion-toggle collapse
      function toggleRow(rowNum){
        $('.collapse:not(.collapse'+rowNum+')').removeClass('show');

        if ( $('.collapse'+rowNum).hasClass('show')){
           $('.collapse'+rowNum).removeClass('show');
        }
        else{
          $('.collapse'+rowNum).addClass('show');
        }
      };
    </script>
<!-- open only onc description at time - problem end -->


</div>
</div>

<!-- footer-->
<?php include 'footer.php'; ?>

</body>

</html>