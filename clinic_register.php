
<!DOCTYPE html>
<?php
        require 'common/navbar.php';
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

        .row-selectors {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .row-selectors select {
        width: 80%; /* Set the width to 100% to take the full width of the container */
        margin-right: 10px; /* Add some margin between the dropdowns */
    }
        option
        {
            width:200px;
        }
    </style>
</head>

<body>
    
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
             <?php

             
    if (isset($_SESSION['showAlert']) && $_SESSION['showAlert'] == true) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Password Not Match</strong> Check password !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> ';
 }

 $_SESSION['showAlert']=false;

 if (isset($_SESSION['showAlert1']) && $_SESSION['showAlert1'] == true) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please select clinic catagory</strong> Select Catagory !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> ';
 }

 $_SESSION['showAlert1']=false;

 if (isset($_SESSION['emailexists']) && $_SESSION['emailexists'] == true) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Email Already Exists</strong> try with another Eamil !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> ';
 }

 $_SESSION['emailexists']=false;
?>
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Clinic Registration</h2>
                    <form method="POST" action="clinic_r.php">
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Clinic Name" name="clinic_name" value="<?php if(isset($_SESSION['clinic_name'])){echo $_SESSION['clinic_name'];}?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="email" placeholder="Email" name="email" value="<?php if(isset($_SESSION['clinic_email'])){echo $_SESSION['clinic_email'];}?>">
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="clinic_type">
                                    <option disabled="disabled" selected="selected">Clinic Cataegory&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="Primary Care Clinic">Primary Care Clinic</option>
                                    <option value="Cardiology">Cardiology</option>
                                    <option value="Pulmonary">Pulmonary</option>
                                    <option value="Neurology">Neurology </option>
                                    <option value="Orthopedics">Orthopedics</option>
                                    <option value="Dental Surgery">Dental Surgery</option>
                                    <option value="Laboratory">Laboratory</option>

                                    <option>other</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row-selectors">
                        <div class="col-md-4">
                            <label for="country">Country</label>
                            <select type="text" name="country" id="country" class="form-control">
                                <option>Select Country</option>
                                </select>
                            </div>

                             <div class="col-md-4">
                            <label for="state">State</label>
                            <select type="text" id="state" name="state" class="form-control" required></select>
                        </div>

                        <div class="col-md-4">
                            <label for="city">City</label>
                            <select name="city" id="city" class="form-control" required></select>
                        </div>
                    </div>

                        
                        <div class="input-group">
                            <textarea placeholder="Address" class="form-control" name="address"><?php if(isset($_SESSION['clinic_address'])){echo $_SESSION['clinic_address'];}?></textarea>
                        </div>
                         <div class="input-group">
                            <input class="input--style-2" type="tel" placeholder="Contact" pattern="[0-9]{10}" name="contact" value="<?php if(isset($_SESSION['clinic_contact'])){echo $_SESSION['clinic_contact'];}?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Owner Name" name="owner_name"value="<?php if(isset($_SESSION['clinic_owner_name'])){echo $_SESSION['clinic_owner_name'];}?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="email" placeholder="Owner Email" name="owner_email"value="<?php if(isset($_SESSION['clinic_owner_email'])){echo $_SESSION['clinic_owner_email'];}?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="tel" pattern="[0-9]{10}" placeholder="Owner Contact" name="owner_contact" value="<?php if(isset($_SESSION['clinic_owner_contact'])){echo $_SESSION['clinic_owner_contact'];}?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Password" name="pass">
                        </div>
                         <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Confirm Password" name="cpass">
                        </div>
                       

                        <!-- <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2 js-datepicker" type="text" placeholder="Birthdate" name="birthday">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender" >
                                            <option disabled="disabled" selected="selected">Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Registration Code" name="res_code">
                                </div>
                            </div>
                        </div> -->
                        
                            <small>We Will Contact You to Verify</small>
                        
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Request to Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                $('#country').change(function() {
                    loadState($(this).find(':selected').val())
                })
                $('#state').change(function() {
                    loadCity($(this).find(':selected').val())
                })


            });

           function loadCountry() {
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: "get=country"
    }).done(function (result) {
        $("#country").html(result);

        // Trigger change event to load states for the selected country
        $("#country").change();
    });
}
            function loadState(countryId) {
                $("#state").children().remove()
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: "get=state&countryId=" + countryId
                }).done(function(result) {

                    $("#state").append($(result));

                });
            }
            function loadCity(stateId) {
                $("#city").children().remove()
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: "get=city&stateId=" + stateId
                }).done(function(result) {

                    $("#city").append($(result));

                });
            }

            // init the countries
            loadCountry();
        </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->