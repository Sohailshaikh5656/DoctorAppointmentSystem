	<!DOCTYPE html>
	
	<?php
	require 'config.php';
	require 'common/navbar.php';
	 $_SESSION['error']=false;
	//  if(!isset($_SESSION['loggedin'] || $_SESSION['loggedin']!=true))
    // {
    // 	header("location:login.php");
    // 	exit;
    // }
if ($_POST && isset($_POST['im'])) {
    $rating = $_POST['im'];
    $msg = $_POST['msg'];

    $id = $_SESSION['user_id'];


    $sql = "Select * from feedback where user_id = $id";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num==1)
    {
    	$sql1 = "UPDATE feedback SET message = '$msg',rating=$rating where user_id=$id";
    	$result1 = mysqli_query($conn,$sql1);
    	if($result)
    	{
    		 $_SESSION['error']="saved";
    		  
    	} 
    }

    else
    {


    $sql2 = "INSERT INTO feedback (message,rating, user_id) values ('$msg',$rating,$id)";
    $result2 = mysqli_query($conn,$sql2);
    if($result)
    {
    	$_SESSION['error']="saved";
    }
}

}


	?>
	<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Feedback Form</title>
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
	    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
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
	       @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&display=swap');
	body{
		background: #EEEEEE;
		font-family: 'Hind Siliguri', sans-serif;
	}
	.card{
		width: 300px;
		border: none;
		border-radius: 15px;
	}
	.adiv{
		background: #0063FF;
		border-radius: 15px;
		border-bottom-right-radius: 0;
		border-bottom-left-radius: 0;
		font-size: 12px;
		height: 46px;
	}
	img{
		margin-right: 10px;
		width: 35px;
		height: 35px;
		cursor: pointer;
	}
	.fas{
		cursor: pointer;
	}
	.fa-chevron-left{
		color: #fff;
	}
	h6{
		font-size: 12px;
		font-weight: bold;
	}
	small{
		font-size: 10px;
		color: #898989;
	}
	.form-control{
		border: none;
		background: #F6F7FB;
		font-size: 12px;
	}
	.form-control:focus{
		box-shadow: none;
		background: #F6F7FB;
	}
	.form-control::placeholder{
		font-size: 12px;
		color: #B8B9BD;
	}
	.btn-primary{
		background: #0063FF;
		padding: 4px 0 7px;
		border: none;
	}
	.btn-primary:focus{
		box-shadow: none;
	}
	.btn-primary span{
		font-size: 12px;
		color: #A6DCFF;
	}
	p.mt-3{
		font-size: 11px;
	 	color: #B8B9BD; 
	 	cursor: pointer;
	}

	 /*  .clickable-image {
	            transition: transform 0.3s ;
	        }
	*/
	       .enlarge {
	            transform: scale(1.2); /* Example: Increase size by 20% */
	        }
	        .ensml {
	            transform: scale(1.0); /* Example: Increase size by 0% */
	        }
.im 
{
	visibility: hidden;
}
.alert
{
	height: 60px;
	width: 300px;
	margin-left: auto;
	margin-right: auto;
	display: block;
}
	    </style>
	</head>
	<body>
		<div class="alert"><?php
    if ($_SESSION['error']) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Feedback saved !</strong> !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> ';
 } 

 $_SESSION['error']=false;
 ?></div>
	<div class="container d-flex justify-content-center">

	  <div class="card mt-5 pb-5">
	  	  
	    <div class="d-flex flex-row justify-content-between p-3 adiv text-white">
	      <i class="fas fa-chevron-left"></i>
	      <form method="post">
	      <span class="pb-3">feedback</span>
	      <i class="fas fa-times"></i>
	    </div>
	    <div class="mt-2 p-4 text-center">
	      <h6 class="mb-0">Your feedback help us to improve.</h6>
	      <small class="px-3">Please let us know about your chat experience.</small>
	      <div class="rating-options">
                    <label>
                        <input type="radio" id="hiddenRadioButton" name="im" value="1">
                        <img src="https://img.icons8.com/emoji/48/000000/angry-face-emoji--v2.png" onclick="handleImageClick1(this)">
                    </label>
                    <label>
                        <input type="radio" id="hiddenRadioButton2" name="im" value="2">
                        <img src="https://img.icons8.com/fluent/48/000000/sad.png" onclick="handleImageClick2(this)">
                    </label>
                    <label>
                        <input type="radio" id="hiddenRadioButton3" name="im" value="3">
                        <img src="https://img.icons8.com/color/48/000000/happy.png" onclick="handleImageClick3(this)">
                    </label>
                    <label>
                        <input type="radio" id="hiddenRadioButton4" name="im" value="4">
                        <img src="https://img.icons8.com/emoji/48/000000/smiling-face.png" onclick="handleImageClick4(this)">
                    </label>
                    <label>
                        <input type="radio" id="hiddenRadioButton5" name="im" value="5">
                        <img src="https://img.icons8.com/color/48/000000/lol.png" onclick="handleImageClick5(this)">
                    </label>
                </div>
	      <div class="form-group mt-4">
	        <textarea class="form-control" rows="4" placeholder="Message" name="msg"></textarea>
	      </div>
	      <div class="mt-2">
	        <button type="submit" class="btn btn-primary btn-block"><span>Send feedback</span></button>
	      </div>
	      <p class="mt-3">Continue without sending feedback</p>

	    </div>
	</form>
	  </div>
	</div>

	<?php
				require 'common/footer.php';
	?>
	<script>
		document.getElementById('hiddenRadioButton').style.display = 'none';
		document.getElementById('hiddenRadioButton2').style.display = 'none';
		document.getElementById('hiddenRadioButton3').style.display = 'none';
		document.getElementById('hiddenRadioButton4').style.display = 'none';
		document.getElementById('hiddenRadioButton5').style.display = 'none';

		 function handleImageClick1(element) {
	        element.classList.add("enlarge");
	        setTimeout(function() {
	            element.classList.remove("enlarge");
	        }, 3000); // Adjust the delay as needed (300 milliseconds in this example)
	    }
	     function handleImageClick2(element) {
	        element.classList.add("enlarge");
	        setTimeout(function() {
	            element.classList.remove("enlarge");
	        }, 3000); // Adjust the delay as needed (300 milliseconds in this example)
	    }
	     function handleImageClick3(element) {
	        element.classList.add("enlarge");
	        setTimeout(function() {
	            element.classList.remove("enlarge");
	        }, 3000); // Adjust the delay as needed (300 milliseconds in this example)
	    }
	     function handleImageClick4(element) {
	        element.classList.add("enlarge");
	        setTimeout(function() {
	            element.classList.remove("enlarge");
	        }, 3000); // Adjust the delay as needed (300 milliseconds in this example)
	    }
	     function handleImageClick5(element) {
	        element.classList.add("enlarge");
	        setTimeout(function() {
	            element.classList.remove("enlarge");
	        }, 3000); // Adjust the delay as needed (300 milliseconds in this example)
	    }
	    // function handleImageClick() {
	    //     // Add your logic for the click action here
	    //     alert("Image clicked! Add your action or navigation code here.");
	    // }
	</script> 

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
