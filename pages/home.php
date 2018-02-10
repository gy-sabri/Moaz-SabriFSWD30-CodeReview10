<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="home_main.css">

</head>
<body>
<?php

 ob_start();
 session_start();
 require 'dbconnect.php';

//  if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }

 // select logged-in users detail
 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>


<!-- #Header -->
<header class="panel--reset" role="banner">
  <form role="form">
    <input type="search" placeholder="Search">
  </form>
  <?php // require 'index.php'; echo $name; ?>
  <nav role="navigation">
  <h1>Hi' <?php session_start(); echo $_SESSION['UserNmae']; ?></h1>
    <ul class="menu__items">
      <li><a href="#">News Feed <?php // require 'index.php'; echo $name; ?></a></li>
      <li><a href="#">Messages</a></li>
      <li><a href="#">Nearby</a></li>
      <li><a href="#">Events</a></li>
      <li><a href="#">Friends</a></li>
      <li><a href="logout.php?logout">Sign Out</a></li>
    </ul>
  </nav>
</header>

<!-- #Panel -->
<div class="panel panel--reset" role="main">

  <b class="menu-trigger">menu</b>

  <div class="utility-nav">

    <div class="utility-nav__items panel--reset">
      <span><a href="#friend-requests">Friend Requests</a></span>
      <span><a href="#messages">Messages</a></span>
      <span><a href="#notifications">Notifications</a></span>
    </div>

    <div class="status-nav panel--reset">
      <span><a href="#status">Status</a></span>
      <span><a href="#photo">Photo</a></span>
      <span><a href="#check-in">Check In</a></span>
    </div>
  </div>

  <div class="fb-users l-users container">
    <div class="random-user--wrap panel--reset">
      <img src="" width="50" height="auto" alt="">
      <p class="random-user__name"><span class="fname"></span> <span class="lname"></span></p>
      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>

      <ul class="share">
        <li><a href="#like">Like</a></li>
        <li><a href="#comment">Comment</a></li>
        <li><a href="#share">Share</a></li>
      </ul> 
    </div>
    
    <div class="random-user--wrap panel--reset">
      <img src="" width="50" height="auto" alt="">
      <p class="random-user__name"><span class="fname"></span> <span class="lname"></span></p>
      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>

      <ul class="share">
        <li><a href="#like">Like</a></li>
        <li><a href="#comment">Comment</a></li>
        <li><a href="#share">Share</a></li>
      </ul>  
    </div>

    <div class="random-user--wrap panel--reset">
      <img src="" width="50" height="auto" alt="">
      <p class="random-user__name"><span class="fname"></span> <span class="lname"></span></p>
      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
      
      <ul class="share">
        <li><a href="#like">Like</a></li>
        <li><a href="#comment">Comment</a></li>
        <li><a href="#share">Share</a></li>
      </ul> 
    </div>
    
    <div class="random-user--wrap panel--reset">
      <img src="" width="50" height="auto" alt="">
      <p class="random-user__name"><span class="fname"></span> <span class="lname"></span></p>
      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
      
      <ul class="share">
        <li><a href="#like">Like</a></li>
        <li><a href="#comment">Comment</a></li>
        <li><a href="#share">Share</a></li>
      </ul>
    </div>
    
    <div class="random-user--wrap panel--reset">
      <img src="" width="50" height="auto" alt="">
      <p class="random-user__name"><span class="fname"></span> <span class="lname"></span></p>
      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
      
      <ul class="share">
        <li><a href="#like">Like</a></li>
        <li><a href="#comment">Comment</a></li>
        <li><a href="#share">Share</a></li>
      </ul>
    </div>
  </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="home_main.js"></script>
    <?php ob_end_flush(); ?>
</body>
</html>
