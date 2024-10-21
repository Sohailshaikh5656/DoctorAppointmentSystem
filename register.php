<?php

    require 'common/navbar.php';
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
  height: 110%;
  background: url("img/hospital.jpg"), #000;
  background-position: center;
  background-size: cover;

}

.wrapper {
  margin-top: 10px;

  width: 600px;
  border-radius: 8px;
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
  font-size: 18.5px;
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
  margin-top: -12px;
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
  font-size: 18.5px;
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

.gender label
{
  font-size: 22px;
  color: #fff;
  

}
.gender
{
  font-size: 30px;
  margin-left: -350px;


}
input[type=radio] {
    border: 0px;
    width: 30px;
    height: 20px;
}
.wrapper1
{
  margin-top: 60px;
  
}
</style>
<body>
  
  
  


  <div class="main">
    <div class="wrapper1">
      <?php
    if (!isset($_SESSION['showAlert']) || $_SESSION['showAlert']) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Account Created !</strong> You should login first !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> ';}
$_SESSION['showAlert']=false;
if (isset($_SESSION['pass']) && $_SESSION['pass']) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Password does not match</strong>!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

$_SESSION['pass'] = false;

if (isset($_SESSION['emailexists']) && $_SESSION['emailexists']) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Email Already Exists</strong>!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

$_SESSION['emailexists'] = false;

?>
    </div>
  <div class="wrapper">
    <form action="register_p.php" method="post">
      <h2>Register</h2>
      <div class="input-field">
        <input type="text" required name="first">
        <label>First Name</label>

      </div>
      <div class="input-field">
        <input type="text" required name="last">
        <label>Last Name</label>
      </div>
        <div class="input-field">
        <input type="email" required name="email">
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="text" required name="contact" pattern="[0-9]{10}">
        <label>Contact</label>
      </div>
      <div class="gender">
        <input type="radio" name="gender" value="male">
        <label>Male</label>
        <input type="radio" name="gender" value="female">
        <label>Female</label>
      </div>
      <div class="input-field">
        <input type="password" required name="pass">
        <label>Enter your password</label>
      </div>
      <div class="input-field">
        <input type="password" required name="cpass">
        <label>Confirm password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="#">Forgot password?</a>
      </div>
      <button type="submit">Register</button>
      <div class="register">
        <p>have an account? <a href="login.php">Login</a></p>
      </div>
    </form>
  </div>
</div>
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