<?php
require 'config.php';
require 'common/navbar.php';


$clinic_appointment = $_SESSION['clinic_appointment_id'];
$user_id = $_SESSION['user_id'];

$mysqli = new mysqli('localhost', 'root', '', 'project1');
if(isset($_GET['date'])){
    $date = $_GET['date'];
    $stmt = $mysqli->prepare("select * from bookings where date = ? AND clinic_id = ?");
$stmt->bind_param('ss', $date,$clinic_appointment);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['timeslots'];
            }
            
            $stmt->close();
        }
    }
    
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $timeslots =$_POST['timeslot'];
    $contact =$_POST['contact'];
    $problem =$_POST['problem'];


    $stmt = $mysqli->prepare("select * from bookings where date = ? AND timeslots = ?");
    $stmt->bind_param('ss', $date,$timeslots);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
                    $msg = "<div class='alert alert-danger'>Already booked</div>";
    
        }
        else
        {
            $mysqli = new mysqli('localhost', 'root', '', 'project1');
        $stmt = $mysqli->prepare("INSERT INTO bookings (name,timeslots,email, date, contact,description,user_id,clinic_id) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param('ssssssss', $name,$timeslots, $email, $date,$contact,$problem,$user_id,$clinic_appointment);
        $stmt->execute();
        $msg = "<div class='alert alert-success'>Booking Successfull</div>";
        $bookings[]=$timeslots;

        $stmt->close();
        $mysqli->close();
        }
    }
    

    
}

$duration=10;
$cleanup=0;
$start="09:00";
$end="15:00";

function timeslots($duration,$cleanup,$start,$end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval= new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();
    for($intStart=$start;$intStart<$end;$intStart->add($interval)->add($cleanupInterval))
    {
        $endPeriod=clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }

        $slots[]=$intStart->format("H:iA")."-".$endPeriod->format("H:iA");
    }
    return $slots;
}

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    <style>
        .eel
        {
                height: 60px;            
        }
        .middle
        {
            
            position: absolute;
            top: 40%;
            left: 50%; /* Move the left edge to the horizontal center of the parent container */
            transform: translateX(-50%); /* Move the div back by 50% of its own width to center it */
            z-index: 4;
            animation-name: example;
            animation-duration: 18s;
             animation-fill-mode: forwards;
        }
        @keyframes example {
  0%   { top:40%; opacity: 1}
  100% {top: 20%; opacity: 0}
}
    </style>
    <link rel="stylesheet" href="/css/main.css">
  </head>

  <body>
    <div class="container">
        <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1><hr>
        <div class="row">
            <div class="col-md-12">
                <?php echo isset($msg)?$msg:"";?>
            </div>
           <?php $timeslots=timeslots($duration,$cleanup,$start,$end);
                foreach($timeslots as $ts){
            ?>

            <div class="col-md-2">
                <div class="form-group">
                    <?php if(in_array($ts, $bookings)) { ?>
    <button class="btn btn-danger"><?php echo $ts;?></button>
<?php } else { ?>
    <button class="btn btn-success book" data-toggle="modal" data-target="#myModal" data-timeslot="<?php echo $ts;?>"><?php echo $ts;?></button>
<?php } ?>

                </div>
            </div>

       <?php } ?>
        </div>
    </div>



    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header col-10">
        <br>
        <h4 class="modal-title">Booking:<span id="slot"></span></h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
    <form id="bookingForm" method="post">
        <div class="form-group">
            <label for="">Timeslot</label>
            <input type="text" readonly name="timeslot" id="timeslot" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Contact</label>
            <input type="tel" name="contact" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <textarea name="problem" placeholder="Describe Problem" class="form-control"></textarea>
        </div>

        <div class="form-group pull-right">
            <input type="submit" name="submit" id="email" class="form-control btn btn-primary">
        </div>
        
    </form>
</div>

        </div>
      </div>
      
    </div>

  </div>
</div>
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        $(".book").click(function(){
            var timeslot=$(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot)
            $("#myModal").modal("show");
        })
    </script>

    
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

     <?php

    require 'common/footer.php';
    ?>
  </body>

</html>

