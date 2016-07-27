<?php
//Authetication
session_start();

if(!isset($_SESSION['id'])) {
  header("Location: login");
}
?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="description" content="SINTACS 2k16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/dashboard.css">
    <script src="../js/dashboard.js"></script>
    
    <link href='https://fonts.googleapis.com/css?family=Oswald|Raleway|Droid+Sans' rel='stylesheet' type='text/css'>
    
    <title>SINTACS '16 - DashBoard</title>
  </head>

  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SINTACS '16</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <button type="button" class="btn btn-default btn-md" id="print"><span class="glyphicon glyphicon-file"></span> Print Ticket</button>
              <button type="button" class="btn btn-info btn-md" onClick="window.location.href='../img/poster.jpg';">Event Poster</button>
              <button type="button" class="btn btn-info btn-md" id="logout">Logout</button>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="projects" class="container text-center">
      <div class="page-header">
        <h2 class="text-center">Online Events</h2>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-5">
          <a data-toggle="modal" data-target="#myModal">
            <div class="thumbnail tilt">
              <img src="../img/Linkr.jpg" alt="Linkr">
              <p><strong>Linkr</strong></p>
              <p>Aug 5th 7:00pm</p>
            </div>
          </a>
        </div>
        <div class="col-sm-5">
          <a data-toggle="modal" data-target="#myModal">
            <div class="thumbnail tilt">
              <img src="../img/debugging.jpg" alt="Debugging">
              <p><strong>Baygon</strong></p>
              <p>Aug 6th 7:00pm</p>
            </div>
            <div class="col-sm-1"></div>
          </a>
        </div>
      </div>
    </div>
    
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:black;">EVENT DETAILS</h4>
      </div>
      <div class="modal-body">
       <br>
        <p style="color:black;">Complete Details about the Event will be update on August 1st. Selected Participants can directly attend the second round held on-spot.</p>
        <br>
      </div>
    </div>

  </div>
</div>
  </body>

  </html>