
<?php
ob_start();
require 'common/navbar.php';
include 'config.php'; 

  $_SESSION['error'] = false;

 $email = $_POST['email'] ?? null;
 $password = $_POST['pass'] ??null;

 if($_POST)
 {

 $sql = "SELECT * FROM clinic where email = '$email' AND password ='$password'";

 $result = mysqli_query($conn,$sql);
 $num = mysqli_num_rows($result);


 if($num==1)
 {
    $row = mysqli_fetch_array($result);
  $_SESSION['clinic_loggedin'] = true;
  $_SESSION['email'] = $email;
  $_SESSION['name'] = $row['clinic_name'];
  $_SESSION['user_id'] = $row['id'];
  header('location:clinic/index.php');
  ob_end_flush();
 }

 else
 {
     $_SESSION['error'] = 1;
 }

}

 
?>
<html lang="en">

<head>
    
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />


    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="other/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="other/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="other/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="other/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="other/css/main.css" rel="stylesheet" media="all">
    <style type="text/css">
        .gender
        {
            width: 150px;
        }
    </style>
</head>

<body>
    

    
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <?php
    if ($_SESSION['error']) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Email or Password Incorrect !</strong> Please enter valid details !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> ';
 } 

 $_SESSION['error']=false;
 ?>
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Clinic Login</h2>
                    <form method="post">
                        
                        <div class="input-group">
                            <input class="input--style-2" type="email" placeholder="Email" name="email">
                        </div>
                       
                         <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Password" name="pass">
                        </div>
                           
                        
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
                require 'common/footer.php';
    ?>

    <!-- Jquery JS-->
    <script src="other/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="other/vendor/select2/select2.min.js"></script>
    <script src="other/vendor/datepicker/moment.min.js"></script>
    <script src="other/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="other/js/global.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->