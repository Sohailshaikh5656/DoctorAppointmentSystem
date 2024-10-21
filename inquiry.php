<?php
session_start();
include 'config.php';

$_SESSION['showAlert1']=0;

if($_POST)
{
    $showAlert = 0;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO inquiry(NAME,EMAIL,SUBJECT,MESSAGE,USER_ID) VALUES ('$name','$email','$subject','$message',$user_id)";
    //echo $user_id;

    $result = mysqli_query($conn,$sql);

    if($result)
    {
        $_SESSION['showAlert1']=1;
        header("location:contact.php");
    }
}

?>