<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Log in</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
    <link rel="stylesheet" type="text/css" href="general.css">


    <!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form action="signin.php" method="post" id ="signin" class="form-signin">
        

  


  <img class="mb-4" src="YARLogoLogin.jpeg" alt="" width="300" height="150">     
  <h1 class="h3 mb-3 font-weight-normal">Please log in</h1>
  <label for="inputID" class="sr-only">ID</label>
  <input name="ID" type="text" id="inputID" class="form-control" placeholder="ID" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input name="pwd" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-3">

  </div>


<?php 
  if (@$_GET['msg']==true)
  {
?>

  <div class="alert-light text-danger">
  
    <?php 
    echo $_GET['msg']
     ?>

  </div>
<?php 
  }
 ?>

  <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>

  <p class="mt-5 mb-3 text-muted">&copy; YAR 2020</p>
</form>




</body>
</html>
