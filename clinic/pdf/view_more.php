<?php
session_start();

$id1 = $_SESSION['user_id'];

require 'config.php';
                                    $_SESSION['id'] = $_GET['id'];
                                    $id = $_SESSION['id'];

                                    $sql = "SELECT bookings.id,bookings.name,bookings.email,bookings.contact,bookings.timeslots,bookings.description,user.first_name,user.last_name,user.email accountemail,bookings.date,bookings.approved,bookings.user_id,bookings.clinic_id FROM bookings,user WHERE bookings.id = $id and bookings.user_id=user.id";

                                    $result = mysqli_query($conn,$sql);
                                    $row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="./css/app-dark.css" id="darkTheme">

<style>
    th
    {
        background-color: #252525;
        color: white;
        border:1px solid white;
    }
    td
    {
        background-color: #E9CFFA;
    }
    table {
        text-transform: uppercase;
    }
    </style>
</head>
<body>

     <table class="table datatables" id="dataTable-1" cellpadding="20" cellspacing="0" border="1" align=center>
                       <thead>
                          <tr>
                            
                            <th>#</th>
                            <th><?php echo $row['id']; ?></th>
                          </tr>
                          <tr>
                            <th>Name</th>
                             <td><?php echo $row['name']; ?></td>
                           </tr>
                           <tr>
                            <th>Email</th>
                            <td><?php echo $row['email']; ?></td>
                          </tr> 
                          <tr>
                            <th>Contact</th>
                            <td><?php echo $row['contact']; ?></td>
                          </tr>
                          <tr>
                           <th>Time Slote</th>
                             <td><?php echo $row['timeslots']; ?></td>
                           </tr>
                            <tr>
                            <th>date</th>
                            <td><?php echo $row['date']; ?></td>
                          </tr>
                          <tr>
                            <th>Description</th>
                            <td><?php echo $row['description']; ?></td>
                          </tr>
                          <tr>
                            <th>Accountant Name</th>
                            <td><?php echo $row['first_name']; ?></td>
                          </tr>
                          
                         
                          <tr>
                            <th>User id</th>
                            <td><?php echo $row['user_id'];  ?></td>
                          </tr>
                        </thead>
                          
                          
                        </tbody>
                      </table>
</body>
</html>