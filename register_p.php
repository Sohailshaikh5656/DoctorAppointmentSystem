<?php

include 'config.php';
session_start();
$_SESSION['showAlert']=false;
 $_SESSION['pass'] = false;

if($_POST)
{



  $first = $_POST['first'];
  $last = $_POST['last'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $pass = $_POST['pass'];
  $gender = $_POST['gender'];
  $cpass = $_POST['cpass'];

             $sql1 = "SELECT * FROM user where email = '$email'";
              $result1 = mysqli_query($conn,$sql1);
              $num = mysqli_num_rows($result1);
              if($num>0)
              {
                $_SESSION['emailexists']=true;
                header("location:register.php");
              }

            else if($pass==$cpass)
            {
              $sql = "INSERT INTO USER (first_name, last_name,email,password,contact,gender)VALUES('$first','$last','$email','$pass','$contact','$gender')";
              $result=mysqli_query($conn,$sql);
              if($result)
              {
                $_SESSION['showAlert']=1;  
                header("location:register.php"); 
              }
            }

            else
            {
              $_SESSION['pass']='not matched';
               header("location:register.php"); 
            }
            
  }



    ?>