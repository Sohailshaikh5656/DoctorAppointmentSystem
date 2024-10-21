<?php
session_start();

$id = $_SESSION['user_id'];

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
        background-color: #D5A0F9;
    }
    </style>
</head>
<body>

     <table class="table datatables" id="dataTable-1" cellpadding="20" cellspacing="0" border="1" align=center>
                        <thead>
                          <tr>
                            <th>Select</th>
                            <th>#</th>
                            <th>Date</th>
                            <th>Timeslote</th>
                            <th>Email</th>
                            <th>User_id</th>
                           
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                                    require 'config.php';

                                    $sql = "SELECT * FROM bookings WHERE clinic_id = $id and approved = 1";

                                    $result = mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_array($result))
                                    {
                          ?>
                          <tr>
                            <td>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label"></label>
                              </div>
                            </td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['timeslots']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['user_id']; ?></td>
                           
                            
                          </tr>

                          <?php } ?>
                          
                        </tbody>
                      </table>

</body>
</html>