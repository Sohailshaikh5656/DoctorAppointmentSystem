<?php
ob_start();

    require 'common/navbar.php';

    include 'config.php';



if($_POST)
{


  $_SESSION['clinic_name'] = $_POST['clinic_name'];
  $_SESSION['clinic_type'] = $_POST['clinic_type'];
  $_SESSION['clinic_email'] = $_POST['email'];
$Email = $_POST['email'];
  $_SESSION['clinic_contact'] = $_POST['contact'];
  $_SESSION['clinic_pass'] = $_POST['pass'];
  $_SESSION['clinic_address'] = $_POST['address'];
  $_SESSION['clinic_owner_name'] = $_POST['owner_name'];
  $_SESSION['clinic_owner_email'] = $_POST['owner_email'];
  $_SESSION['clinic_owner_contact'] = $_POST['owner_contact'];
  $_SESSION['clinic_cpass'] = $_POST['cpass'];

  $con=$_POST['country'];
  $sql = "Select * from countries where id = $con";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $_SESSION['country'] = $row['name'];

  $state=$_POST['state'];
  $sql1 = "Select name from states where id = $state";
  $result1 = mysqli_query($conn,$sql1);
  $row1 = mysqli_fetch_array($result1);
  $_SESSION['state'] = $row1['name'];
  
  $city=$_POST['city'];
  $sql2 = "Select name from cities where id = $city";
  $result2 = mysqli_query($conn,$sql2);
 $row2 = mysqli_fetch_array($result2);
  $_SESSION['city'] = $row2['name'];
  
  
  $approve = 0;
          $sql3 = "SELECT email from clinic where email = '$Email'";
          $result3 = mysqli_query($conn,$sql3);
          $num = mysqli_num_rows($result3);

            if($_SESSION['clinic_pass']==$_SESSION['clinic_cpass'])
            {
            
              if($num>0)
              {
                $_SESSION['emailexists']=true;
                header("location:clinic_register.php");
              }

              else if($_SESSION['clinic_type']!=null)
              {
                 header("location:clinic/upload_image.php");
              }

              else
              {
                $_SESSION['showAlert1'] = true;
                header('location:clinic_register.php');
                
              }
            // 

                 
            }
            else{

              $_SESSION['showAlert'] = true;
              header('location:clinic_register.php');
              ob_end_flush();
            }

        }
            

  ?>

