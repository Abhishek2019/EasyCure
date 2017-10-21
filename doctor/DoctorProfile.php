<?php
  session_start();
  if(empty($_SESSION["d_userName"])){
    header('Location: login.php');
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  <!--  <link rel="stylesheet" href="/css/bootstrap.css">   -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>PHP Demo</title>
    <style>
    </style>
  </head>
  <body>

    <nav class="navbar navbar-inverse bg-inverse">
      <span>
        <img class="img-circle" src="../images/doc.jpeg" width="60px" height="60px">
        </span>

    </nav>

<div class="container">
     <ul class="nav nav-tabs nav-justified">
       <li class="nav-item">
         <a href="#Appointment" class="nav-link active" role="tab" data-toggle="tab">Appointments</a>
       </li>

       <li class="nav-item">
         <a href="#Profile_edit" class="nav-link" role="tab" data-toggle="tab">Edit Profile</a>
       </li>

       <li class="nav-item">
         <a href="#Req_blood" class="nav-link" role="tab" data-toggle="tab">Request Blood</a>
       </li>

       <li class="nav-item">
         <a href="#Profile" class="nav-link " role="tab" data-toggle="tab">Profile</a>
       </li>
     </ul>

     <div class="tab-content">

       <div role="tabpanel" class="tab-pane active" id="Appointment">
         <div class="container">
                <?php
                  require 'appointment_list.php';
                ?>
         </div>
       </div>

       <div role="tabpanel" class="tab-pane fade" id="Profile_edit">2</div>
       <div role="tabpanel" class="tab-pane fade" id="Req_blood">3</div>
       <div class="tab-pane fade" role="tabpanel" id="Profile">4</div>
     </div>
   </div>
  </div>
  </div>

  </body>
  <script src="../js/jquery.slim.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</html>
