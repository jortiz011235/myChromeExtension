<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Random Restaurant</title>

    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link href="css/yelpView.css?<?php echo date('his'); ?>" rel="stylesheet">


    <!-- Individual module CSS files here -->
    <!-- Should we combine or not combine? -->
    <link rel="stylesheet" href="assets/css/effeckt.css">

    <style type="text/css">
        body {

        }

        .tile-container {

        }

        .tile-padding {
            margin-right: 1em;
            margin-bottom: 1em;
            width: 13em;
            height: 13em;
            text-align: left;

        }

        .centerDivs {

            width: 50%;

        }

        .tile-ImageBorder {

            border-radius: 1em;
            height: 100%;

        }

        .tileContent {
            width: inherit;

        }

        ul {
            list-style: none;
        }
    </style>

</head>
<?php include("YelpTest.php"); ?>
<body class="text-center">
<div class="container container-fluid centerDivs">

    <div class="">
        <h1>Random Place nearby @GGC</h1>
        <img src="ggcClaw.jpg" alt="fuzzy wuz he">

        <p> If you are looking for something to eat check out this:</p>

    </div>
    <!-- .hero-unit -->


    <div class="row demo-tiles container">


    </div>
    <!-- .row -->
</div>
<!-- .container -->
</body>
</html>