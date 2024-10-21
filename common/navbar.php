
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$a = 0; // Default value for $a

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $a = 1;
}
?>

<style type="text/css">
    .nav-item {
        text-transform: uppercase;
    }
</style>

<!-- Rest of the code remains unchanged -->

<div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>123 Street, New York, USA</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Service Time : Mon - Fri : 09.00 AM - 5.00 PM&nbsp;&nbsp;    </small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Book Any Time</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+91 63546 21866</small>
                </div>
                
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i>Klinik</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link "><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</a>
                <a href="about.php" class="nav-item nav-link"><i class="fa-solid fa-eject"></i>&nbsp;&nbsp;About</a>

                <?php
                if($a==0){
            echo '
           
                    <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-file"></i>&nbsp;&nbsp;Pages</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                        <a href="clinic_register.php" class="dropdown-item">Clinic Register</a>
                        <a href="clinic_login.php" class="dropdown-item">Clinic Login</a>
                        <a href="admin_login.php" class="dropdown-item">Admin Login</a>
                        <a href="appointment.html" class="dropdown-item">Appointment</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">Term & Conditions</a>
                    </div>

                </div>
                <a href="register.php" class="nav-item nav-link"><i class="fa-solid fa-registered"></i>&nbsp;&nbsp;Register</a>
                <a href="login.php" class="nav-item nav-link"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;&nbsp;Login</a>
                ';
                 }

                ?>

                <?php
                if($a==1){
            echo '<a href="contact.php" class="nav-item nav-link"><i class="fa-solid fa-comment"></i>&nbsp;&nbsp;Contact</a>

            <a href="user_profile.php?id='.$_SESSION['user_id'].'" class="nav-item nav-link"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Profile</a>
            <a href="feedback.php" class="nav-item nav-link"><i class="fa-solid fa-comments"></i>&nbsp;&nbsp;Feedback</a>

                <a href="logout.php" class="nav-item nav-link"><i class="fa-solid fa-right-from-bracket"></i>&nbsplogout</a>
                </div>
            <a href="appointment.php?id='.$_SESSION['user_id'].'" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Appointment<i class="fa fa-arrow-right ms-3"></i></a>
        </div>';
            } ?>
        
    </nav>
