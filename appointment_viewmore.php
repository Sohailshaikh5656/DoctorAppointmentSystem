<?php
        require 'config.php';
        require 'common/navbar.php';

        $id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Klinik - Clinic Website Template</title>
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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
        .table-dark
        {
            width: 350px;
        }
        td
        {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->


    <!-- Topbar Start -->
 
    <!-- Topbar End -->


  >
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Appointment</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                    
                    <li class="breadcrumb-item text-primary active" aria-current="page">Appointment</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
                    <?php
                                    $sql = "SELECT bookings.name,bookings.description,bookings.timeslots,bookings.date,bookings.approved,clinic.clinic_name,clinic.owner_contact,clinic.address FROM bookings,clinic where bookings.id = $id and bookings.clinic_id = clinic.id";
                            // $sql = "SELECT name,description,timeslots,date,approved,clinic_id FROM bookings where user_id = $id";
                            // echo "$sql";
                                    $result = mysqli_query($conn,$sql);

                                    $row = mysqli_fetch_array($result)

                                    
                          ?>

    <!-- Appointment Start -->
    <div class="container">
   
    <table class="table">
  <thead class="table-dark"><tr>
                                <td>Column</td>
                                <td>Information</td>
                                </tr>
</thead>
  <tbody>
      
        <tr>
          <td class="table-dark">Appointment No : </td>
          <td><?php echo $id ?></td>
      </tr>
      <tr>
          <td class="table-dark">Patient Name</td>
          <td><?php echo $row['name'] ?></td>
      </tr>
      <tr>
          <td class="table-dark">Description</td>
          <td><?php echo $row['description'] ?></td>
      </tr>
      <tr>
          <td class="table-dark">Timeslots</td>
          <td><?php echo $row['timeslots'] ?></td>
      </tr>
      <tr>
        <td class="table-dark">Date</td>
          <td><?php echo $row['date'] ?></td>
      </tr>
      <tr>
        <td class="table-dark">Approved</td>
        <td><?php if($row['approved']==1){echo'Approved';} else{ echo 'Not Approved';} ?></td>
      </tr>
      <tr>
        <td class="table-dark">Clinic Name</td>
          <td><?php echo $row['clinic_name'] ?></td>
      </tr>
      <tr>
        <td class="table-dark">Clinic Address</td>
          <td><?php echo $row['address'] ?></td>
      </tr>
      <tr>
        <td class="table-dark">Clinic Contact</td>
          <td><?php echo $row['owner_contact'] ?></td>
      </tr>
         

  
  </tbody>
</table>
</div>
    <!-- Appointment End -->
        

    <!-- Footer Start -->
   <?php
    require 'common/footer.php';
   ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
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
</body>

</html>