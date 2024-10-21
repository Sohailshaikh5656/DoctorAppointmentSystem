<?php

session_start();
require "config.php";
$email = $_SESSION['clinic_email'];
$pass = $_SESSION['clinic_pass'];
$file1 = $_SESSION['file1'];
$file2 = $_SESSION['file2'];
$file3 = $_SESSION['file3'];
		$sql = "SELECT * from clinic where email = '$email' and password = '$pass'";
                $result1=mysqli_query($conn,$sql);
                if($result1)
                {
                  $row = mysqli_fetch_array($result1);
                  $id = $row['id'];
                  $sql1 = "INSERT INTO clinic_profile (profile_image,poster_image,doctor_image,clinic_id) VALUES ('$file1','$file2','$file3',$id)";
                  $result2 = mysqli_query($conn,$sql1);
                  if($result2)
                  {
                    header("location:/myproject/clinic_login.php");
                  } 
                }  
                
?>