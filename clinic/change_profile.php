   <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="stylesheet" href="css/uppy.min.css">
    <link rel="stylesheet" href="css/jquery.steps.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme">
  </head>
  <body class="vertical  dark  ">
    <div class="wrapper">

     
<?php
ob_start();
require "config.php";
//session_start();
require 'nav.php';
if(!isset($_SESSION['clinic_loggedin']) || ($_SESSION['clinic_loggedin']!=true))
{
    header("location:login.php");
    exit;
}require 'side_nav.php';

//session_start();
// if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true))
// {
//     header("location:login.php");
//     exit;
// }

$id = $_SESSION['user_id'];

$sql = "SELECT * from clinic where id = $id";
$sql1 = "SELECT * from clinic_profile where clinic_id = $id";

$result = mysqli_query($conn,$sql);
$result1 = mysqli_query($conn,$sql1);

$row = mysqli_fetch_array($result);
$row1 = mysqli_fetch_array($result1);

if($_POST)
{
  $name = $_POST['clinic_name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $owner_name = $_POST['owner_name'];
  $owner_email = $_POST['owner_email'];
  $owner_contact = $_POST['owner_contact'];


  $sql2 = "UPDATE clinic SET clinic_name = '$name',email = '$email', contact = '$contact',address = '$address',owner_name = '$owner_name',owner_email='$owner_email',owner_contact='$owner_contact' where id = $id";
  $result2 = mysqli_query($conn,$sql2);

   if (isset($_FILES['profile_image']) && isset($_FILES['poster_image']) && isset($_FILES['doctor_image'])) {
    $filename1 = $_FILES['profile_image']['name'];
    $temp1 = $_FILES['profile_image']['tmp_name'];
    $filename2 = $_FILES['poster_image']['name'];
    $temp2 = $_FILES['poster_image']['tmp_name'];
    $filename3 = $_FILES['doctor_image']['name'];
    $temp3 = $_FILES['doctor_image']['tmp_name'];

    $loc1 = "uploads/".$filename1;
    $loc2 = "uploads/".$filename2;
    $loc3 = "uploads/".$filename3;

    move_uploaded_file($temp1, $loc1);
    move_uploaded_file($temp2, $loc2);
    move_uploaded_file($temp3, $loc3);
    error_reporting(E_ALL);
    $sql3 = "UPDATE clinic_profile SET profile_image = '$filename1',poster_image='$filename2',doctor_image='$filename3' where clinic_id = $id";
    $result3 = mysqli_query($conn,$sql3);
    header("location:index.php");
    ob_end_flush();
  } 
}

?>
        <!-- main -->

         <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Clinic Profile</h2>
              <p class="text-muted">Demo for form control styles, layout options, and custom components for creating a wide variety of forms.</p>
              <div class="card-deck">
                <div class="card shadow mb-4">
                  <div class="card-header">
                    <strong class="card-title">Profile Edit</strong>
                  </div>
                  <div class="card-body">
                    <form action="#" method="post" enctype="multipart/form-data">
                      <div class="form-row">
                      <div class="form-group col-12">
                        <label for="inputAddress">Clinic Name</label>
                        <input type="text" class="form-control" id="" name="clinic_name" value = "<?php echo $row['clinic_name']; ?>">
                      </div>
                      <div class="form-group col-6">
                        <label for="inputAddress2">Email</label>
                        <input type="text" class="form-control" id="" name="email" value = "<?php echo $row['email']; ?>" >
                      </div>
                      <div class="form-group col-6">
                        <label for="inputAddress2">Contact</label>
                        <input type="tel" class="form-control" id="" name="contact" value="<?php echo $row['contact'] ?>">
                      </div>
                      <div class="form-group col-12">
                        <label for="inputAddress2">Address</label>
                        <textarea name="address" class="form-control"><?php echo $row['address'] ?></textarea>
                      </div>
                      <div class="form-group col-6">
                        <label for="inputAddress2">Owner Name</label>
                        <input type="text" class="form-control" id="" name="owner_name" value="<?php echo $row['owner_name'] ?>">
                      </div>
                       <div class="form-group col-6">
                        <label for="inputAddress2">Owner Email</label>
                        <input type="text" class="form-control" id="" name="owner_email" value="<?php echo $row['owner_email'] ?>">
                      </div>
                       <div class="form-group col-6">
                        <label for="inputAddress2">Owner Contact</label>
                        <input type="text" class="form-control" id="" name="owner_contact" value="<?php echo $row['owner_contact'] ?>">
                      </div>
                       <div class="form-group col-6">
                        <label for="inputAddress2">Date</label>
                        <input type="text" class="form-control" id="" name="doctor_image" value="date" readonly>
                        <br>
                      </div>
                    
                       <div class="form-group col-12 text-center"><br><br>
                        <label for="inputAddress2">Poster Image</label>
                         <input type="file" class="form-control" id="" name="profile_image" value = "uploads/<?php echo $row1['profile_image']?>"  required>
                      </div>
                      <div class="form-group col-12 text-center">
                        
                        <label for="inputAddress2">Poster Image</label><br>
                       <input type="file" class="form-control" id="" name="poster_image" value = "uploads/<?php echo $row1['poster_image']?>"  required>
                      </div>
                      <div class="form-group col-12 text-center">
                        
                        <label for="inputAddress2">Doctor Image</label>
                        <input type="file" class="form-control" id="" name="doctor_image" value = "uploads/<?php echo $row1['doctor_image']?>"  required>
                      </div>

                       <div class="form-group col-12 text-center">
                        
                        <a href="change_profile.php?id=<?php echo $id;?>"><button class="btn btn-danger">Change Profile</button></a>
                      </div>
                    </div>

                    </form>
                  </div>
                </div>
                
              
            </div>
          </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div> <!-- .wrapper -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/d3.min.js"></script>
    <script src="js/topojson.min.js"></script>
    <script src="js/datamaps.all.min.js"></script>
    <script src="js/datamaps-zoomto.js"></script>
    <script src="js/datamaps.custom.js"></script>
    <script src="js/Chart.min.js"></script>
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="js/gauge.min.js"></script>
    <script src="js/jquery.sparkline.min.js"></script>
    <script src="js/apexcharts.min.js"></script>
    <script src="js/apexcharts.custom.js"></script>
    <script src='js/jquery.mask.min.js'></script>
    <script src='js/select2.min.js'></script>
    <script src='js/jquery.steps.min.js'></script>
    <script src='js/jquery.validate.min.js'></script>
    <script src='js/jquery.timepicker.js'></script>
    <script src='js/dropzone.min.js'></script>
    <script src='js/uppy.min.js'></script>
    <script src='js/quill.min.js'></script>
    <script>
      $('.select2').select2(
      {
        theme: 'bootstrap4',
      });
      $('.select2-multi').select2(
      {
        multiple: true,
        theme: 'bootstrap4',
      });
      $('.drgpicker').daterangepicker(
      {
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale:
        {
          format: 'MM/DD/YYYY'
        }
      });
      $('.time-input').timepicker(
      {
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
      });
      /** date range picker */
      if ($('.datetimes').length)
      {
        $('.datetimes').daterangepicker(
        {
          timePicker: true,
          startDate: moment().startOf('hour'),
          endDate: moment().startOf('hour').add(32, 'hour'),
          locale:
          {
            format: 'M/DD hh:mm A'
          }
        });
      }
      var start = moment().subtract(29, 'days');
      var end = moment();

      function cb(start, end)
      {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
      $('#reportrange').daterangepicker(
      {
        startDate: start,
        endDate: end,
        ranges:
        {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
      cb(start, end);
      $('.input-placeholder').mask("00/00/0000",
      {
        placeholder: "__/__/____"
      });
      $('.input-zip').mask('00000-000',
      {
        placeholder: "____-___"
      });
      $('.input-money').mask("#.##0,00",
      {
        reverse: true
      });
      $('.input-phoneus').mask('(000) 000-0000');
      $('.input-mixed').mask('AAA 000-S0S');
      $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
      {
        translation:
        {
          'Z':
          {
            pattern: /[0-9]/,
            optional: true
          }
        },
        placeholder: "___.___.___.___"
      });
      // editor
      var editor = document.getElementById('editor');
      if (editor)
      {
        var toolbarOptions = [
          [
          {
            'font': []
          }],
          [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [
          {
            'header': 1
          },
          {
            'header': 2
          }],
          [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
          [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
          [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
          [
          {
            'direction': 'rtl'
          }], // text direction
          [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
          [
          {
            'align': []
          }],
          ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
      }
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function()
      {
        'use strict';
        window.addEventListener('load', function()
        {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form)
          {
            form.addEventListener('submit', function(event)
            {
              if (form.checkValidity() === false)
              {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <script>
      var uptarg = document.getElementById('drag-drop-area');
      if (uptarg)
      {
        var uppy = Uppy.Core().use(Uppy.Dashboard,
        {
          inline: true,
          target: uptarg,
          proudlyDisplayPoweredByUppy: false,
          theme: 'dark',
          width: 770,
          height: 210,
          plugins: ['Webcam']
        }).use(Uppy.Tus,
        {
          endpoint: 'https://master.tus.io/files/'
        });
        uppy.on('complete', (result) =>
        {
          console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
      }
    </script>
    <script src="js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
</html>





