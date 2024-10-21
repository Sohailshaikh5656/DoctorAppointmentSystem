<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTML Logout Page</title>
</head>
<body>
    <h1>Logout</h1>

 <?php

    session_start();
    session_unset();
    session_destroy();

    header("location:login.php");
    exit;

 ?>

</body>
</html>
