<?php
ob_start();
require 'common/navbar.php'; 

  
 include 'config.php'; 
  $_SESSION['error'] = false;

 if($_POST)
 {



 $email = $_POST['email'] ?? null;
 $password = $_POST['pass'] ??null;


 $sql = "SELECT * FROM user where email = '$email' AND password ='$password'";

 $result = mysqli_query($conn,$sql);
 $num = mysqli_num_rows($result);


 if($num==1)
 {
 
  $row = mysqli_fetch_array($result);
  $_SESSION['loggedin'] = true;
  $_SESSION['email'] = $email;
  $_SESSION['name'] = $row['first_name'];
  $_SESSION['user_id'] = $row['id'];

  
  header("location:index.php");
  ob_end_flush();
 }

 else
 {
     $_SESSION['error'] = 1;
 }

}
 
    ?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Glassmorphism Login Form | CodingNepal</title>
  
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
    
</head>
<style type="text/css">
  @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Open Sans", sans-serif;
}

.main {
 margin-left:auto;
  margin-right: auto;
  display: inline-grid;
  align-items: center;
  justify-content: center;

  min-height: 100vh;
  width: 100%;
  padding: 0 10px;
}

.main::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: url("img/hospital.jpg"), #000;
  background-position: center;
  background-size: cover;

}

.wrapper {
  width: 400px;
  border-radius: 8px;
  margin-top: -150px;
  padding: 30px;
  text-align: center;
  border: 1px solid rgba(255, 255, 255, 0.5);
  backdrop-filter: blur(9px);
  -webkit-backdrop-filter: blur(9px);
}

form {
  display: flex;
  flex-direction: column;
}

h2 {
  font-size: 2rem;
  margin-bottom: 20px;
  color: #fff;
}

.input-field {
  position: relative;
  border-bottom: 2px solid #ccc;
  margin: 15px 0;
}

.input-field label {
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  color: #fff;
  font-size: 16px;
  pointer-events: none;
  transition: 0.15s ease;
}

.input-field input {
  width: 100%;
  height: 40px;
  background: transparent;
  border: none;
  outline: none;
  font-size: 16px;
  color: #fff;
}

.input-field input:focus~label,
.input-field input:valid~label {
  font-size: 0.8rem;
  top: 10px;
  transform: translateY(-120%);
}

.forget {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 25px 0 35px 0;
  color: #fff;
}

#remember {
  accent-color: #fff;
}

.forget label {
  display: flex;
  align-items: center;
}

.forget label p {
  margin-left: 8px;
}

.wrapper a {
  color: #efefef;
  text-decoration: none;
}

.wrapper a:hover {
  text-decoration: underline;
}

button {
  background: #fff;
  color: #000;
  font-weight: 600;
  border: none;
  padding: 12px 20px;
  cursor: pointer;
  border-radius: 3px;
  font-size: 16px;
  border: 2px solid transparent;
  transition: 0.3s ease;
}

button:hover {
  color: #fff;
  border-color: #fff;
  background: rgba(255, 255, 255, 0.15);
}

.register {
  text-align: center;
  margin-top: 30px;
  color: #fff;
}
.wrapper1
{
  margin-top: -30px;
  margin-left: -40px;
}
</style>
<body>



    <!-- Topbar End -->


    <!-- Navbar Start -->
  

  
  <div class="main" action="login_p.php">
    <div class="wrapper1">
      <?php
    if ($_SESSION['error']) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Email or Password Incorrect !</strong> Please enter valid details !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> ';
 } 

  if ($_SESSION['success']) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Password Changed !</strong> Please Login !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> ';
 } 
 $_SESSION['success']=false;
?>
    </div>
  <div class="wrapper">
    <form method="post">
      <h2>Login</h2>
        <div class="input-field">
        <input type="text" required name="email">
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" required name="pass">
        <label>Enter your password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="forgetpass.php">Forgot password?</a>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="#">Register</a></p>
      </div>
    </form>
  </div>
</div>

<?php
        require 'common/footer.php';
?>
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