<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Random Restaurant</title>

    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/effeckt.css">
    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link href="css/yelpView.css?<?php echo date('his'); ?>" rel="stylesheet">


    <!-- Individual module CSS files here -->
    <!-- Should we combine or not combine? -->


    <style type="text/css">
        body {

        }

        .tile-container {

        }

        .tile-padding {
            margin-right: 1em;
            margin-bottom: 1em;
            width: 21em;
            height: 20em;
            text-align: left;
            border: 15px solid;

        }

        .centerDivs {

            width: 50%;

        }

        .tile-ImageBorder {

            height: 100%;
            display: block;
            margin: auto;
margin-right: 6em;
        }

        .tileContent {
            width: inherit;
            padding-top: 4em;

        }

        ul {
            list-style: none;
        }

        #tagsinput_tagsinput {

            height: inherit;
            text-align: center;
            margin-right: 1em;
        }

        .businessName {
            text-align: center;

        }

        .main {
            background-color: #B5CDDC;
            padding-top: 1px;

        }

        .mainHeader {
            background-color: #2DAE91;

        }

        .myTile {

            background-color: #eff0f2;
            border-radius: 6px;

            position: relative;
            text-align: center;

        }

        .container-fluid {
            padding: 0;
        }

        .row {
            padding: 0;
        }
.form-control{
    width: 15em;
padding-left: 62px;
padding: 2em;
margin: auto;

}




    </style>

</head>
<?php include("YelpTest.php"); ?>
<body class="text-center">


    <div class="main">

        <div class="mainHeader">




    

            <h1>Find Places</h1>
            <img src="ggcClaw.jpg" alt="fuzzy wuz he">

            <p> If you are looking for something to eat check out this:</p>


<form action="YelpView.php" method="post">
<div class="form-group">
City: <input class="form-control" type="text" name="city" value="Lawrenceville"><br>
State: <input class="form-control" type="text" name="state" value="GA"><br>
<input type="submit">
</div>
</form>

        </div>
        <!-- .hero-unit -->


        <div class="container container-fluid">
            <div class="row">
                <?php 
                if(isset($response)){
                foreach ($response->businesses as $place) { ?>


                    <div>
                        <figure class="effeckt-caption  tile-padding col-md-2 " style=" margin-right: 1em;"
                                data-effeckt-type="cover-push-right">
                            <div class="businessName">
                                <h4> <?php echo $place->name; ?></h4>
                            </div>

                            <?php
                            if (isset($place->image_url)) {
                                echo "<img class=\"tile-ImageBorder\" src=\"";
                                echo $place->image_url;
                                echo "\">";

                            }?>



                            <figcaption>
                                <div class="tile-container">
                                    <div class="effeckt-figcaption-wrap tileContent">
                                        <div class="row panelContent">
                                            <div class="col-md-6">
                                                <ul>

                                                    <li>Rating:
                                                        <?php
                                                        echo $place->rating;
                                                        ?>
                                                    </li>
                                                    <li>
                                                        is_closed:
                                                        <?php echo $place->is_closed ? 'false' : 'true'; ?>
                                                    </li>
                                                    <li> phone:
                                                        <?php
                                                        echo $place->display_phone;
                                                        ?>
                                                    </li>

                                                    </li>
                                                    <a class="btn btn-primary btn-large" href="<?php
                                                    echo $place->url;
                                                    ?>         ">Info...&raquo;</a>
                                                    </li>
                                                    <br>
                                                Rating: <br>   
                                                           <?php
                            if (isset($place->image_url)) {
                                echo "<img class=\"tile-ImageBorder\" src=\"";
                                echo $place->rating_img_url;
                                echo "\">";

                            }?> 
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="tagsinput_tagsinput" class="tagsinput">
                                                    <h4>Tags</h4>
                                                    <?php foreach ($place->categories as $cat) {
                                                        foreach ($cat as $value) {
                                                            echo " <span class=\"tag\"><span>";
                                                            echo $value;
                                                            echo "&nbsp;&nbsp;</span></span>";
                                                        }
                                                    } ?>
                                                </div>
                                                <!-- tagEnd-->
                                            </div>
                                            <!!--sdfsdf --/>

                                        </div>


                                    </div>
                                </div>
                                <!--effeckt wrap tileCOntent-->
                    </div>
                    </figcaption>
                    </figure>


                <?php
              }  }
                ?>

            </div>
        </div>



        <?php
        var_dump($response);

        //foreach ($response->businesses as $place) {
        //     var_dump($place->categories);
        // }
        ?>


    </div>
    <!-- .row -->

<!-- .container -->
</div><!-- .container -->
</body>
</html>