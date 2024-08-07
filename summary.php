<?php
session_start();
include("db_connect.php");
if (isset($_COOKIE['pin']) && $_COOKIE['serial']) {

  $pin = $_COOKIE['pin'];
  $serial = $_COOKIE['serial'];

  $sqluser = "SELECT * FROM Applicants2 WHERE Serial='$serial' && Pin='$pin' ";

  $retrieved = mysqli_query($db, $sqluser);
  while ($found = mysqli_fetch_array($retrieved)) {
    $firstname = $found['Othername'];
    $sirname = $found['Surname'];
    $id = $found['id'];
  }
} else {
  header('location:onlineform.php');
  exit;
}


$sqluser = "SELECT * FROM Applicants WHERE Serial='$serial' && Pin='$pin' ";
$retrieved = mysqli_query($db, $sqluser);
while ($found = mysqli_fetch_array($retrieved)) {
  $idS = $found['id'];
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>PNTC</title>
  <!-- for-mobile-apps -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
  <meta name="keywords" content="Attainment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script>
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- //for-mobile-apps -->
  <script src="js/jquery.js"></script>

  <link href="css/style1.css" rel="stylesheet" type="text/css" media="screen">

  <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
  <link href="css/font-awesome.css" rel="stylesheet">
  <!-- gallery -->
  <link rel="stylesheet" href="css/smoothbox.css" type='text/css' media="all" />
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="//fonts.googleapis.com/css?family=Oswald:400,500,600,700" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

  <script src="js/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

  <script type="text/javascript" src="js/validation.min.js"></script>
  <script type="text/javascript" src="js/login.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


  <style>
    .modal {
      padding-top: 10rem !important;
    }

    #Biodata {
      padding-top: 20rem !important;

    }

    #Olevel {
      padding-top: 55rem !important;
    }

    center,
    .close {
      color: #999999;
    }
  </style>
</head>

<body>


  <script type="text/javascript">
    $(document).on("click", ".Decla", function() {
      if (!$('#declarationCheckbox').is(':checked')) {
        swal({
          title: "Error!",
          text: "Please agree to the declaration before submitting the form.",
          type: "error",
          confirmButtonColor: "green",
        });
        return;
      }
      var decstatus = "Nice";
      var pin = document.getElementById('pin').value;
      var serial = document.getElementById('serial').value;


      $.ajax({
        type: 'POST',
        url: "process.php",
        data: {
          dstatus: decstatus,
          userpin: pin,
          userserial: serial
        },
        success: function(result) {

          swal({
              title: 'Application Completed!',
              text: 'Your application has been submitted successfully. Check your email for further details.',
              type: "success",
              showCancelButton: false,
              confirmButtonColor: "green",
              confirmButtonText: "OK",
              closeOnConfirm: true,
              closeOnCancel: true,
              buttonsStyling: false
            },
            function(isConfirm) {
              if (isConfirm) {
                window.location = "index.php";
              }
            });
        }
      });
    });
  </script>
  <script type="text/javascript">
    $(document).on("click", ".open-Biodata", function() {
      var mydob = $(this).data('id');
      var myCou = $(this).data('ic');
      var mySta = $(this).data('is');
      var myGen = $(this).data('ig');
      var myCA = $(this).data('ia');
      var myLoca = $(this).data('il');

      var myAdd = $(this).data('ip');
      var Gcountry = $(this).data('iy');
      var Ghome = $(this).data('ih');
      var Gstate = $(this).data('ie');
      var myPlace = $(this).data('ik');
      var myName = $(this).data('in');
      var myPhone = $(this).data('it');
      var myEmail = $(this).data('iz');
      var myhometown = $(this).data('iw');
      var myglocal = $(this).data('io');
      var Gaddress = $(this).data('is');
      var Gmobile = $(this).data('im');

      var myfname = $(this).data('if');
      var msurname = $(this).data('ir');
      var pbirth = $(this).data('ib');

      $(".modal-body #dob").html(mydob);
      $(".modal-body #country").html(myCou);
      $(".modal-body #state").html(mySta);
      $(".modal-body #gender").html(myGen);
      $(".modal-body #corr").html(myCA);
      $(".modal-body #local").html(myLoca);
      $(".modal-body #Gaddress").html(Gaddress);
      $(".modal-body #gplace").html(myPlace);
      $(".modal-body #gcountry").html(Gcountry);
      $(".modal-body #gstate").html(Gstate);
      $(".modal-body #address").html(myAdd);
      $(".modal-body #gname").html(myName);
      $(".modal-body #ghome").html(Ghome);
      $(".modal-body #appphone").html(myPhone);
      $(".modal-body #appemail").html(myEmail);
      $(".modal-body #hometown").html(myhometown);
      $(".modal-body #myglocal").html(myglocal);
      $(".modal-body #Gmobile").html(Gmobile);

      $(".modal-body #myfname").html(myfname);
      $(".modal-body #msurname").html(msurname);
      $(".modal-body #pbirth").html(pbirth);

    });
  </script>


  <div id="Pic" class="modal fade" role="dialog" style="background-color:#222d32;">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;width:140%">
        <div class="modal-header" style="background:#222d32">
          <center>
            Documents
          </center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
            <center>

            </center>
          </h4>
        </div>

        <div class="modal-body">
          <?php
          function capitalizeAroundSeparator($str)
          {
            return ucwords(str_replace('-', ' ', $str));
          }

          $qued = "SELECT * FROM Profilepictures WHERE Serial='$serial'&& Pin='$pin' ";
          $resul = mysqli_query($db, $qued);
          $checks1 = mysqli_num_rows($resul);
          if ($checks1 != 0) {
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-hover">';
            echo '<thead class=""><tr><th>Label</th><th>Image</th></tr></thead><tbody>';
            while ($foundl = mysqli_fetch_array($resul)) {
              $path = $foundl['name'];
              $label = explode($serial . "_", $path);
              $label = explode(".", implode($label));
              $labelName = capitalizeAroundSeparator($label[0]);

              echo '<tr>';
              echo '<td>' . $labelName . '</td>';
              echo '<td><img src="images/applicants/' . $path . '" class="img-thumbnail img-responsive" style="max-width: 100px; cursor: pointer;" data-toggle="modal" data-target="#imageModal" data-src="images/applicants/' . $path . '" data-label="' . $labelName . '"></td>';
              echo '</tr>';
            }
            echo '</tbody></table>';
            echo '</div>';
          }
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
            <img id="imagePreview" src="" alt="Image Preview" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    <script>
      $('#imageModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var src = button.data('src'); // Extract info from data-* attributes
        var label = button.data('label'); // Extract label from data-* attributes
        var modal = $(this);
        modal.find('#imagePreview').attr('src', src);
        modal.find('.modal-title').text(label); // Set the modal title to the image label
      });
    </script>
  </div>


  <div id="School" class="modal fade" role="dialog" style="background-color:#222d32;">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
        <div class="modal-header" style="background:#222d32">
          <center>

          </center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>


        </div>

        <div class="modal-body">

          <table class='table table-striped'>
            <thead>
              <tr class="success">
                <th>School Name</th>
                <th>From</th>
                <th>To</th>
                <th>Qualification</th>
              </tr>
            </thead>
            <tbody>
              <?php


              $sql = "SELECT * FROM Previousxul  WHERE Serial='$serial'&& Pin='$pin' ";
              $rget = mysqli_query($db, $sql);
              $num12 = mysqli_num_rows($rget);
              if ($num12 != 0) {
                while ($foundk = mysqli_fetch_array($rget)) {
                  $school = $foundk['Name'];
                  $froms = $foundk['Froms'];
                  $tos = $foundk['Tos'];
                  $quaification = $foundk['Qualification'];
                  $id = $foundk['id'];

                  echo " <tr><td>$school</td>
                                                                                                              <td>$froms</td>
                                                                                                           <td>$tos</td>
                                                                                                             <td>$quaification</td>                                                                                                              
                                                                                                              </tr> ";
                }
              }



              ?>
            </tbody>
          </table>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <div id="Employment" class="modal fade" role="dialog" style="background-color:#222d32;">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
        <div class="modal-header" style="background:#222d32">
          <center>
            Referee
          </center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">

          <table class='table table-striped table-responsive'>
            <thead>
              <tr class="success">
                <th>Name</th>
                <th>Contact</th>
                <th>Date</th>
                <th>Address</th>
                <th>Class</th>
                <th>Signature</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM referees  WHERE Serial='$serial'&& Pin='$pin' ";
              $rget = mysqli_query($db, $sql);
              $nume = mysqli_num_rows($rget);

              if ($nume != 0) {


                while ($foundk = mysqli_fetch_array($rget)) {
                  $name = $foundk['name'];
                  $contact = $foundk['contact'];
                  $date = $foundk['date'];
                  $address = $foundk['address'];
                  $ref = $foundk['ref'];
                  $signature = $foundk['ref'];

                  echo "<tr>
                                                                              <td>$name</td> 
                                                                              <td>$contact</td>                                                                             
                                                                               <td>$date</td>
                                                                              <td>$address</td>                                                                                 
                                                                              <td>$ref</td>                                                                                 
                                                                              <td>$signature</td>                                                                                 
                                                                           
                                                                              </tr>";
                }
              }

              ?>
            </tbody>
          </table>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <div id="Olevel" class="modal fade" role="dialog" style="background-color:#222d32;">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
        <div class="modal-header" style="background:#222d32">
          <center>
            Educational Background
          </center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">

          <table class='table table-striped table-responsive'>
            <thead>
              <tr class="success">
                <th>Exam Type</th>
                <th>Examination Number</th>
                <th>Exam Date</th>
                <th>Subjects</th>
                <th>Sitting</th>
                <th>Grade</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM Olevel  WHERE Serial='$serial'&& Pin='$pin' ";
              $rget = mysqli_query($db, $sql);
              $num3 = mysqli_num_rows($rget);
              if ($num3 != 0) {

                while ($foundk = mysqli_fetch_array($rget)) {
                  $exam = $foundk['Exam'];
                  $type = $foundk['Exam'] == 'NA' ? 'NA' : $foundk['Examtype'];
                  $date = $foundk['Exam'] == 'NA' ? 'NA' : $foundk['Examdate'];
                  $subjects = $foundk['Exam'] == 'NA' ? 'NA' : $foundk['Subjects'];
                  $sitting = $foundk['Sitting'];
                  $grade = $foundk['Exam'] == 'NA' ? 'NA' : $foundk['Grade'];
                  echo "<tr>
                                                                              <td>$type</td>
                                                                              <td>$exam</td>
                                                                               <td>$date</td>
                                                                              <td>$subjects</td>
                                                                               <td>$sitting</td>
                                                                               <td>$grade</td>
                                                                             
                                                                              </tr>";
                }
              }
              ?>

            </tbody>
          </table>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


  <div id="Alevel" class="modal fade" role="dialog" style="background-color:#222d32;">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
        <div class="modal-header" style="background:#222d32">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">

          <table class='table table-striped'>
            <thead>
              <tr class="success">
                <th>Course</th>
                <th>Institution</th>
                <th>From</th>
                <th>To</th>
                <th>Certification</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM Alevel  WHERE Serial='$serial'&& Pin='$pin' ";
              $rget = mysqli_query($db, $sql);
              $num5 = mysqli_num_rows($rget);
              if ($num5 != 0) {

                while ($foundk = mysqli_fetch_array($rget)) {
                  $course = $foundk['Course'];
                  $froms = $foundk['Froms'];
                  $tos = $foundk['Tos'];
                  $inst = $foundk['Institution'];
                  $Degree = $foundk['Degree'];
                  $id = $foundk['id'];

                  echo "<tr>
                                                                              <td>$course</td>
                                                                              <td>$inst</td>
                                                                               <td>$froms</td>
                                                                              <td>$tos</td>
                                                                                 <td>$Degree</td>
                                                                             
                                                                              </tr>";
                }
              }
              ?>

            </tbody>
          </table>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


  <div id="Course" class="modal fade" role="dialog" style="background-color:#222d32;">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
        <div class="modal-header" style="background:#222d32">
          <center>
            Program Choices
          </center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">

          <table class='table table-striped'>
            <thead>
              <tr class="success">
                <th>Serial Number</th>
                <!-- <th>Applicant Name</th> -->
                <th>First Choice</th>
                <th>Second Choice</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $quedk = "SELECT * FROM Courseapplied WHERE Serial='$serial'&& Pin='$pin' ";
              $resulk = mysqli_query($db, $quedk);
              $checks2 = mysqli_num_rows($resulk);
              if ($checks2 != 0) {
                while ($foundl = mysqli_fetch_array($resulk)) {
                  $serial = $foundl['Serial'];
                  $firstChoice = $foundl['Choice1'];
                  $secondChoice = $foundl['Choice2'];

                  echo "<tr>
                                 <td>$serial</td>
                                 <td>$firstChoice</td>
                                 <td>$secondChoice</td>
                                </tr>";
                }
              }

              ?>
            </tbody>
          </table>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>





  <div id="Biodata" class="modal fade" role="dialog" style="background-color:#222d32;">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
        <div class="modal-header" style="background:#222d32">
          <center>
            BIODATA INFORMATION
          </center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">

          </h4>
        </div>

        <div class="modal-body">

          <table class='table table-striped table-responsive'>
            <thead>
              <tr>
                <th>Biodata</th>
                <th>Submission</th>
                <th>Biodata</th>
                <th>Submission</th>
                <th>Biodata</th>
                <th>Submission</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Othername</td>
                <td class="success"><span id="myfname"></span></td>
                <td>Surname</td>
                <td class="success"><span id="msurname"></span></td>
                <td>Date of Birth</td>
                <td class="success"><span id="dob"></span></td>
              </tr>
              <tr>
                <td>Gender</td>
                <td class="success"><span id="gender"></span></td>
                <td>Place Of Birth</td>
                <td class="success"><span id="pbirth"></span></td>
                <td>Hometown</td>
                <td class="success"><span id="hometown"></span></td>
              </tr>

              <tr>
                <td>House Number</td>
                <td class="success"><span id="corr"></span></td>
                <td>Digital Address of House Number</td>
                <td class="success"><span id="address"></span></td>
                <td>Guardian Name</td>
                <td class="success"><span id="gname"></span></td>
              </tr>
              <tr>
                <td>Guardian Place of Birth</td>
                <td class="success"><span id="gplace"></span></td>
                <td>Guardian Hometown</td>
                <td class="success"><span id="ghome"></span></td>
                <td>Guardian Country</td>
                <td class="success"><span id="gcountry"></span></td>
              </tr>
              <tr>
                <td>Guardian Phone</td>
                <td class="success"><span id="Gmobile"></span></td>
                <td>Applicant Phone</td>
                <td class="success"><span id="appphone"></span></td>
                <td>Appliant Email</td>
                <td class="success"><span id="appemail"></span></td>
              </tr>
              <tr>
                <td>Country</td>
                <td class="success"><span id="country"></span></td>
                <td>Guardian Correspondence Address</td>
                <td class="success"><span id="Gaddress"></span></td>
              </tr>
            </tbody>
          </table>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <!-- header -->
  <section class="w3layouts-header py-2">
    <div class="container">
      <!-- header -->
      <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary">
          <h>
            <a class="navbar-brand" href="index.php">
              PREMIER NURSING COLLEGE
            </a>
          </h>
          <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-lg-auto text-center">
              <li class="nav-item active  mr-3">
                <a class="nav-link" href="index.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item dropdown mr-3">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Admission
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="biodata.php">Online Form</a>
                  <a class="dropdown-item" href="#">Admission Status</a>
                  <a class="dropdown-item" href="#">Admission List</a>
                  <a class="dropdown-item" href="onlineform.php">Print Form</a>
                  <a class="dropdown-item" href="login.php"><i class="fa fa-lock"></i>&nbsp;Administrator</a>
                </div>
              </li>
              <li class="nav-item  mr-3">
                <a class="nav-link" href="#">Registration</a>
              </li>
              <li class="nav-item  mr-3">
                <a class="nav-link" href="#">Results</a>
              </li>

              <li class="nav-item mr-3">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- //header -->
    </div>
  </section>
  <!-- //header -->
  <!-- banner -->
  <section class="banner-1">

  </section>
  <!-- //banner -->
  <!-- gallery -->
  <div class="agileits-services text-center py-5">
    <div class="container py-md-4 mt-md-3">
      <h3 class="heading-agileinfo">Stage 8 (Summary)<span>You have fill all relevant information click decleration button to finish</span></h3>
      <div class="w3ls_gallery_grids mt-md-5 pt-5">
        <div class="container">
          <h2></h2>

          <div class="form-login">

            <table class='table table-striped table-responsive'>
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Information Type</th>
                  <th>Status</th>
                  <th>Preview</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sqln2 = "SELECT * FROM Applicants2 WHERE Serial='$serial' && Pin='$pin' ";
                $rgetb2 = mysqli_query($db, $sqln2);
                $numb = mysqli_num_rows($rgetb2);
                if ($numb != 0) {
                  while ($foundl = mysqli_fetch_array($rgetb2)) {
                    $dob = $foundl['DOB'];
                    $gender = $foundl['Gender'];
                    $country = $foundl['Country'];
                    $lgvt = $foundl['Localgvt'];
                    $state = $foundl['State'];
                    $crapp = $foundl['Appcoraddress'];
                    $othername = $foundl['Othername'];
                    $sname = $foundl['Surname'];
                    $pbirth = $foundl['PlaceOfbirth'];
                    $gplace = $foundl['Gplace'];
                    $gname = $foundl['Gname'];
                    $ghome = $foundl['Ghometown'];
                    $gcountry = $foundl['Gcountry'];
                    $gstate = $foundl['Gstate'];
                    $appre = $foundl['Appresaddress'];
                    $glocal = $foundl['Glocalgvt'];
                    $gaddres = $foundl['Gaddress'];
                    $gmobile = $foundl['Gmobile'];
                    $appphone = $foundl['Applicantphone'];
                    $email = $foundl['Email'];
                    $hometown = $foundl['Hometown'];
                  }
                } else {
                  $dob = "Not submited";
                  $gender = "Not submited";
                  $country = "Not submited";
                  $lgvt = "Not submited";
                  $state = "Not submited";
                  $crapp = "Not submited";
                  $othername = "Not submited";
                  $sname = "Not submited";
                  $pbirth = "Not submited";
                  $gplace = "Not submited";
                  $gname = "Not submited";
                  $ghome = "Not submited";
                  $gcountry = "Not submited";
                  $gstate = "Not submited";
                  $appre = "Not submited";
                  $glocal = "Not submited";
                  $gaddres = "Not submited";
                  $gmobile = "Not submited";
                  $appphone = "Not submited";
                  $email = "Not submited";
                  $hometown = "Not submited";
                }

                ?>

                <tr class="success">
                  <td>1</td>
                  <td>Biodata</td>
                  <td><?php if ($numb != 0) {
                        echo "Complete";
                      } else {
                        echo "Incomplete";
                      } ?></td>
                  <td><a data-toggle='modal' data-if='<?php echo $othername ?>' data-ir='<?php echo $sname ?>' data-ib='<?php echo $pbirth ?>' data-it='<?php echo $appphone ?>' data-iz='<?php echo $email ?>' data-iw='<?php echo $hometown ?>' data-io='<?php echo $glocal ?>' data-is='<?php echo $gaddres ?>' data-im='<?php echo $gmobile ?>' data-ik='<?php echo $gplace ?>' data-in='<?php echo $gname ?>' data-ih='<?php echo $ghome ?>' data-iy='<?php echo $gcountry ?>' data-ie='<?php echo $gstate ?>' data-ip='<?php echo $appre ?>' data-id='<?php echo $dob ?>' data-ig='<?php echo $gender ?>' data-ic='<?php echo $country ?>' data-il='<?php echo $lgvt ?>' data-is='<?php echo $state ?>' data-ia='<?php echo $crapp ?>' href='#Biodata' class='open-Biodata btn  btn-success' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to view'><span class='glyphicon glyphicon-eye-open' style='color: #FFFFFF;'></span></a></td>
                  <td><a href='biodata.php?ids=1' class='open-Pic btn  btn-primary' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to edit'><i class='fa fa-edit' style='color: #FFFFFF;'></i></a></td>
                </tr>
                <tr class="danger">
                  <td>2</td>
                  <td>Documents</td>
                  <td><?php if ($checks1 != 0) {
                        echo "Complete";
                      } else {
                        echo "Incomplete";
                      } ?></td>
                  <td><a data-toggle='modal' data-id='1' href='#Pic' class='open-Pic btn  btn-success' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to view'><span class='glyphicon glyphicon-eye-open' style='color: #FFFFFF;'></span></a></td>
                  <td><a href='document.php?ids=1' class='btn  btn-primary' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to edit documents'><i class='fa fa-edit' style='color: #FFFFFF;'></i></a></td>
                </tr>
                <tr class="info">
                  <td>3</td>
                  <td>Program Choices</td>
                  <td><?php if ($checks2 != 0) {
                        echo "Complete";
                      } else {
                        echo "Incomplete";
                      } ?></td>
                  <td><a data-toggle='modal' data-id='1' href='#Course' class='btn  btn-success' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to view'><span class='glyphicon glyphicon-eye-open' style='color: #FFFFFF;'></span></a></td>
                  <td><a href='program-choice.php?ids=1' class='btn  btn-primary' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to edit'><i class='fa fa-edit' style='color: #FFFFFF;'></i></a></td>

                </tr>
                <!-- <tr class="warning">
                  <td>4</td>
                  <td>School Attended</td>
                  <td><?php if ($num12 != 0) {
                        echo "Complete";
                      } else {
                        echo "Incomplete";
                      } ?></td>
                  <td><a data-toggle='modal' data-id='1' href='#School' class='btn btn-success' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to view'><span class='glyphicon glyphicon-eye-open' style='color: #FFFFFF;'></span></a></td>
                  <td><a href='previousschool.php?ids=1' class='btn  btn-primary' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to view'><i class='fa fa-edit' style='color: #FFFFFF;'></i></a></td>

                </tr> -->
                <tr class="success">
                  <td>5</td>
                  <td>O'Level</td>
                  <td><?php if ($num3 != 0) {
                        echo "Complete";
                      } else {
                        echo "Incomplete";
                      } ?></td>
                  <td><a data-toggle='modal' data-id='1' href='#Olevel' class='btn  btn-success' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to view'><span class='glyphicon glyphicon-eye-open' style='color: #FFFFFF;'></span></a></td>
                  <td><a href='olevel.php?ids=1' class='btn  btn-primary' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to view'><i class='fa fa-edit' style='color: #FFFFFF;'></i></a></td>

                </tr>
                <!-- <tr class="success">
                  <td>6</td>
                  <td>A'Level</td>
                  <td><?php if ($num5 != 0) {
                        echo "Complete";
                      } else {
                        echo "Incomplete";
                      } ?></td>
                  <td><a data-toggle='modal' data-id='1' href='#Alevel' class='btn  btn-success' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to view'><span class='glyphicon glyphicon-eye-open' style='color: #FFFFFF;'></span></a></td>
                  <td><a href='alevel.php?ids=1' class='btn  btn-primary' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to view'><i class='fa fa-edit' style='color: #FFFFFF;'></i></a></td>

                </tr> -->
                <tr class="danger">
                  <td>6</td>
                  <td>Referee</td>
                  <td><?php if ($nume != 0) {
                        echo "Complete";
                      } else {
                        echo "Incomplete";
                      } ?></td>
                  <td><a data-toggle='modal' data-id='1' href='#Employment' class='btn  btn-success' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to view'><span class='glyphicon glyphicon-eye-open' style='color: #FFFFFF;'></span></a></td>
                  <td><a href='referee.php?ids=1' class='btn btn-primary' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to view'><i class='fa fa-edit' style='color: #FFFFFF;'></i></a></td>

                </tr>
              </tbody>
            </table>

            <p>
              <input name='serial' id='serial' type='hidden' value='<?php if (isset($serial)) {
                                                                      echo $serial;
                                                                    } ?>'>
              <input name='pin' id='pin' type='hidden' value='<?php if (isset($pin)) {
                                                                echo $pin;
                                                              } ?>'>
            </p>


            <hr />
            <?php
            if ($numb != 0 && $nume != 0 && $num5 != 0 && $num3 != 0 && $num12 != 0 && $checks2 != 0 && $checks1 != 0) { ?>
              <div class="alert alert-warning">
                I&nbsp;<?php if (isset($firstname)) {
                          echo $firstname . ' ' . $sirname;
                        } ?>&nbsp; declare that the particulars submited on this form are to the best of my knowledge and correct and if admited i shall regard myself bound to the rules and regulations of the school of Health Sciences and Technology and at any time the school is reasonably conviced that the information given is false or incorrect i will be required to withdrawal from the course or be liable to or both
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="declarationCheckbox" required style="margin-top: 0.3em; margin-left: 0.1em;">
                <label class="form-check-label" for="declarationCheckbox" style="margin-left: 1.5em; font-weight: 500;">
                  I agree to the above declaration
                </label>
              </div>

              <hr />
              <div class="form-group">
                <button type="submit" class="Decla btn btn-default" name="Change" value="changes">
                  <span class="glyphicon glyphicon-check"></span> &nbsp;Submit Application
                </button>
              </div>
            <?php
            } else {
              echo "<div class='alert alert-warning'>
          Please complete other required sections above for you to submit this application.           
        </div>";
            }
            ?>


          </div>

        </div>


      </div>
    </div>
  </div>
  <!-- //gallery -->

  <!-- Footer -->
  <footer class="footer-section py-5">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 footer-grids">
          <h3>Get in touch</h3>
          <p>Unima Head Office,Chilunga builing,John chilembwe Road </p>
          <p class="my-2">Zomba,Malawi</p>
          <p class="phone">phone: +265 293 4539</p>
          <p class="phone my-2">Fax: +265 818 293 4539</p>
          <p class="phone">Mail:
            <a href="mailto:mvumapatrick@gmail.coom">Namibra</a>
          </p>
        </div>
        <div class="col-lg-4 footer-grids">
          <h2>Latest News</h2>
          <div class="d-flex justify-content-around">
            <a href="#" class="col-4">
              <img src="images/s1.jpg" class="img-fluid" alt="Responsive image">
            </a>
            <a href="#" class="col-4">
              <img src="images/s2.jpg" class="img-fluid" alt="Responsive image">
            </a>
            <a href="#" class="col-4">
              <img src="images/s3.jpg" class="img-fluid" alt="Responsive image">
            </a>
          </div>
          <div class="d-flex justify-content-around">
            <a href="#" class="col-4">
              <img src="images/s4.jpg" class="img-fluid" alt="Responsive image">
            </a>
            <a href="#" class="col-4">
              <img src="images/hendry.jpg" class="img-fluid" alt="Responsive image">
            </a>
            <a href="#" class="col-4">
              <img src="images/2.jpg" class="img-fluid" alt="Responsive image">
            </a>
          </div>
        </div>
        <div class="col-lg-4 footer-grids">
          <h3>Twitter feed</h3>
          <ul class="w3agile_footer_grid_list">
            <li>Am failing t use the login system
              <a href="#">www.pntc.com</a> @James.
              <span>
                <i class="fab fa-twitter"></i> 02 days ago</span>
            </li>
            <li>This is nice and i like this portal
              <a href="#">www.pntc.com</a> @Peter.
              <span>
                <i class="fab fa-twitter"></i> 03 days ago</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- //Footer -->
  <!-- copyright -->
  <section class="copyright-w3layouts py-xl-4 py-3">
    <div class="container">
      <p>© 2024 PNTC . All Rights Reserved | Design & Developed by namibra.io
      </p>
      <ul class="social-nav footer-social social two text-center mt-2">
        <li>
          <a href="#">
            <i class="fab fa-facebook-f" aria-hidden="true"></i>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fab fa-twitter" aria-hidden="true"></i>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fab fa-instagram" aria-hidden="true"></i>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fab fa-pinterest" aria-hidden="true"></i>
          </a>
        </li>
      </ul>
    </div>
  </section>
  <!-- //copyright -->

  <!-- js -->
  <!-- <script src="js/jquery-2.2.3.min.js"></script> --> <!-- //js-->
  <script src="js/smoothbox.jquery2.js"></script>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/bootstrap.js"></script>
</body>

</html>