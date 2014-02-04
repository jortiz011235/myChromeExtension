<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>Random Restaurant</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 </head>
  <?php include("YelpTest.php"); ?>
 <body class="text-center">
     <div class="container">
        
         <div class="hero-unit">
         <h1>Random Place nearby @GGC</h1>
         <img src="ggcClaw.jpg" alt="fuzzy wuz he">
         <p> If you are looking for something to eat check out this:</p>
         <p>
         </p>
         </div><!-- .hero-unit -->
       
 <div class="row ">
         <div class="span4  ">
         <h2 class = ""> 
         <?php echo $response->businesses[$randomRestNum]->name;?>         
         </h2>
         <p>Rating: 
         <?php 
         echo $response->businesses[$randomRestNum]->rating;
         ?>         
         </p>
         <p><img src="<?php 
         echo $response->businesses[$randomRestNum]->image_url;
         ?>" alt=""> 
                  
         </p>
         <p>is_closed: 
         <?php 
         echo $response->businesses[$randomRestNum]->is_closed;
         ?>         
         </p>
         <p>phone: 
         <?php 
         echo $response->businesses[$randomRestNum]->display_phone;
         ?>         
         </p>
         
         <p>
         <a class="btn btn-primary btn-large" href="<?php 
         echo $response->businesses[$randomRestNum]->url;
         ?>         ">Click meeee &raquo;</a></p>
         </div><!-- .span4 -->
  
         <?php var_dump($response); ?>
  
 </div><!-- .row -->
 </div><!-- .container -->
 </body>
</html>