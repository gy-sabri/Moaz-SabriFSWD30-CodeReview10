<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme The Band</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="home.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .bg-1 .row img {width: 300px; height: 400px;}
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<?php
  ob_start();
  session_start();
  require_once 'dbconnect.php';

     // if session is not set this will redirect to login page
    if( !isset($_SESSION['user']) ) {
      header("Location: index.php");
      exit;
    }

    // select logged-in users detail
    $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
    $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!-- Start Page -->

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="btn btn-secondary mt-4" href="logout.php?logout">Sign Out</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#band">BAND</a></li>
        <li><a href="#tour">TOUR</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Merchandise</a></li>
            <li><a href="#">Extras</a></li>
            <li><a href="#">Media</a></li> 
          </ul>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/se.jpg" alt="New York">
        <div class="carousel-caption">
          <h1>Hi' <?php session_start(); echo $_SESSION['UserNmae']; ?></h1>
          <p>The atmosphere in New York is lorem ipsum.</p>
        </div>      
      </div>

      <div class="item">
        <img src="img/first.jpg" alt="Chicago">
        <div class="carousel-caption">
        <h1>Hi' <?php session_start(); echo $_SESSION['UserNmae']; ?></h1>
          <p>Thank you, Chicago - A night we won't forget.</p>
        </div>      
      </div>
    
      <div class="item">
        <img src="img/last.jpg" alt="Los Angeles">
        <div class="carousel-caption">
          <h1>Hi' <?php session_start(); echo $_SESSION['UserNmae']; ?></h1>
          <p>Even though the traffic was a mess, we had the best time playing at Venice Beach!</p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!-- Container (The Band Section) -->
<div id="band" class="container text-center">
  <h3>THE BAND</h3>
  <p><em>We love music!</em></p>
  <p>We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<!-- Container (TOUR Section) -->
<div id="tour" class="bg-1">

  <div class="container">
    <div class='row text-center'> 
  <h3 class="text-center">From The Blog</h3>  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">All</a></li>
    <li><a data-toggle="tab" href="#menu1">DVD</a></li>
    <li><a data-toggle="tab" href="#menu2">CD</a></li>
    <li><a data-toggle="tab" href="#menu3">Book</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <?php  $media = "SELECT title, short_description, ISBN, media_status, midea_type, url_img FROM media";
        $media_result = mysqli_query($conn, $media);
        // fetch a next row (as long as there are some) into $row
        while($row = mysqli_fetch_assoc($media_result)) {
            printf("<div class='col-sm-4'>
            <div class='thumbnail'>
            <img src='%s' alt='San Francisco' width='400px' height='300px'>
                <p><strong>%s</strong></p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <a href='#' class='btn' data-toggle='modal' data-target='#myModal'>read more</a>
                </div> 
                </div>",
                    $row["url_img"],$row["midea_type"],$row["title"],$row["short_description"],$row["media_status"],$row["ISBN"]);
            }
      ?>
    </div>
    <div id="menu1" class="tab-pane fade">
      <?php
        $media = "SELECT title, short_description, url_img FROM media WHERE midea_type = 'DVD'";
        $media_result = mysqli_query($conn, $media);
        while($row = mysqli_fetch_assoc($media_result)) {
            printf("<div class='col-sm-4'>
            <div class='thumbnail'>
                <img src='%s' alt='San Francisco' width='400px' height='300px'>
                <p><strong>%s</strong></p>
                <p>%s</p>
                <a href='#' class='btn' data-toggle='modal' data-target='#myModal'>read more</a>
            </div> 
            </div>",
                    $row["url_img"],$row["title"],$row["short_description"]);
         }
      ?>
    </div>
    <div id="menu2" class="tab-pane fade">
      <?php
      $media = "SELECT title, short_description, url_img FROM media WHERE midea_type = 'CD'";
      $media_result = mysqli_query($conn, $media);
      while($row = mysqli_fetch_assoc($media_result)) {
          printf("<div class='col-sm-4'>
          <div class='thumbnail'>
              <img src='%s' alt='San Francisco' width='400px' height='300px'>
              <p><strong>%s</strong></p>
              <p>%s</p>
              <a href='#' class='btn' data-toggle='modal' data-target='#myModal'>read more</a>
          </div> 
          </div>",
                  $row["url_img"],$row["title"],$row["short_description"]);
      }
    ?>
    </div>
    <div id="menu3" class="tab-pane fade">
      <?php
          $media = "SELECT title, short_description, url_img FROM media WHERE midea_type = 'Book'";
          $media_result = mysqli_query($conn, $media);
          while($row = mysqli_fetch_assoc($media_result)) {
              printf("<div class='col-sm-4'>
              <div class='thumbnail'>
                  <img src='%s' alt='San Francisco' width='400px' height='300px'>
                  <p><strong>%s</strong></p>
                  <p>%s</p>
                  <a href='#' class='btn' data-toggle='modal' data-target='#myModal'>read more</a>
              </div> 
              </div>",
                      $row["url_img"],$row["title"],$row["short_description"]);
          }
        ?>
    </div>
  </div>
</div>
</div>
  </div>





  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Tickets</h4>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span> Tickets, $23 per person</label>
              <input type="number" class="form-control" id="psw" placeholder="How many?">
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Send To</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
              <button type="submit" class="btn btn-block">Pay 
                <span class="glyphicon glyphicon-ok"></span>
              </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
          <p>Need <a href="#">help?</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em>We love our fans!</em></p>

  <div class="row">
    <div class="col-md-4">
      <p>Fan? Drop a note.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Chicago, US</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: mail@mail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Moaz-Sabri-FSWD30-CodeReview10</p> 
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

<?php ob_end_flush(); ?>

</body>
</html>