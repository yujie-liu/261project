<?php
session_start();

if (!empty($_SESSION['sessData']['loggedin']) && $_SESSION['sessData']['loggedin'] == true) {
    echo "Welcome, administrator";
} else {
    session_destroy();
    $_SESSION['sessData']['loggedin'] = false;
    header("Location:../../User/login-reg.php");
}
session_write_close();
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Black Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body>


  <?php

  $conn = mysqli_connect("localhost", "dpan6", "%NNN5m-A");
  if($conn->connect_error){
    die("connection falied:". $conn-> connect_error);
  }

  $sql = "USE dpan6_3;";
  if ($conn->query($sql) === TRUE) {

  } else {
  echo "Error using database: " . $conn->error;
  }

  if (isset($_POST['delete'])) {
        $sql2="DELETE FROM FOOD WHERE FID = $_POST[fid];";
    } else {
        $sql2="UPDATE FOOD SET Fname = '$_POST[fname]', Fprice= '$_POST[fprice]' WHERE FID = $_POST[fid];";
    }






if ($conn->query($sql2) === FALSE)

  {

  die('Error: Please search first and enter the correct name and price.' . mysql_error());

  }

  if (isset($_POST['delete'])) {
        $message = '1 food deleted..';
    } else {
        $message = '1 food updated..';
    }




mysql_close($conn)

?>
<div class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <div class="alert alert-info">
                  <a href="./delivery.php">
                  <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="tim-icons icon-check-2"></i>
                  </button>
                </a>
                  <span><?php echo $message; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>

</html>
