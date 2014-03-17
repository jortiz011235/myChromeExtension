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
    <script src="http://code.jquery.com/jquery-latest.min.js"
            type="text/javascript"></script>
    <!-- Individual module CSS files here -->
    <!-- Should we combine or not combine? -->
    <style type="text/css">
        body {
        }


        .tile-padding {
            margin-right: 1em;
            margin-bottom: 1em;
            width: 21em;
            height: 30em;
            text-align: left;
        }

        .centerDivs {
            width: 50%;
        }

        .tile-ImageBorder {          
            display: block;
        }

        .tileContent {
            width: inherit;
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

        .form-control {
            width: 15em;
            padding-left: 62px;
            padding: 2em;
            margin: auto;
        }

        input {
            margin-bottom: 1em;
        }

        #spinner{
            width: 2em;

        }

        p.italic {font-style:italic;}

    </style>
      <script type="text/javascript">
        $(document).ready(function() {
             $("#spinner").hide("slow");    
             $("#advancedSearch").hide("slow");    
            $("#advancedSearchButtonID").click(function(){
                     var type = $("#searchFormID").attr("data-searchtype");
                     if(type === "basic")
                     {
                        $("#advancedSearch").hide("slow");    
                        $("#searchFormID").attr("data-searchtype", "advanced");
                         $("#advancedSearchButtonID").text("Advanced Search");
                     }else{
                        $("#advancedSearch").show("slow");
                        $("#searchFormID").attr("data-searchtype", "basic");
                         $("#advancedSearchButtonID").text("Basic Search");
                     }
                    
            });


            
       
        });

     
    </script>
</head>
<?php include("YelpTest.php"); ?>
<body class="text-center">
<div class="main">
    <div class="mainHeader">
        <h1>Find Places</h1>
        <img src="ggcClaw.jpg" alt="fuzzy wuz he">

        <p> An app that uses the Yelp API to find businesses near by.</p>

      

        <form action="YelpView.php" method="post">
   
        <h1>Basic Search </h1><br>
        <div class="form-group" id="searchFormID" data-searchType="basic">
            City: <input class="form-control" type="text" name="city" value="Lawrenceville">            State: <input class="form-control" type="text" name="state" value="GA">
            Search: <input class="form-control" id="searchTermID" type="text" name="term" value="italian food"><br>
            <div id="advancedSearch">
                limit: <input class="form-control" type="text" name="limit" value="10"><br>
                sort: <input class="form-control" type="text" name="sort" value="2"><br>
                Radius: <input class="form-control" type="text" name="radius" value="25"><br>
            </div>
            <input id="submitID" type="submit">
             
        </div>
  
    </form>
    <button type="button" id="advancedSearchButtonID">Advanced Search</button>
      <img  id="spinner" src="ajaxSpinner.gif" >
    </div>
    <div class="container container-fluid">
        <div  id="content"class="row">
  <?php
            if (isset($response)) {

                foreach ($response->businesses as $place) {
                   
                    ?>
                    <div>
                        <figure class=" tile-padding col-md-2 " style=" margin-right: 1em;"
                                data-effeckt-type="">
                            <div class="businessName">
                                <h4> <?php echo $place->name; ?></h4>
                            </div>
                         
                            <figcaption>
                                <div class="tile-container">
                                    <div class=" tileContent">
                                        <div class="row panelContent">
                                            <div class="col-md-6">
                                                <ul>
                                                    <li>Rating:
                                                        <?php
                                                        echo $place->rating;
                                                        ?>
                                                    </li>
                                                    <li>
                                                      open/closed
                                                        <?php echo $place->is_closed ? 'closed' : 'open'; ?>
                                                    </li>
                                                    <li> phone:
                                                        <?php
                                                        echo $place->display_phone;
                                                        ?>
                                                    </li>
                                                    </li>
                                            
                                                    </li>
                                                 
                                                    Rating: 
                                                    <?php
                                                    if (isset($place->image_url)) {
                                                        echo "<img class=\"tile-ImageBorder\" src=\"";
                                                        echo $place->rating_img_url;
                                                        echo "\">";
                                                    }?>
                                                    </li>
                                                      <a class="btn btn-primary btn-large" href="<?php echo $place->url; ?>">More Info&raquo;</a>
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
                                                    } 
                                                     ?>


                                                   
                                                </div>
                                                 
                              

                                                <!-- tagEnd-->
                                            </div>
                                            <!!--sdfsdf --/>
                                        </div>
                                              <p class="italic">     <?php        
                                         echo "What they say: " ;
                                                echo $place->snippet_text;
                                                 ?>
                                                 </p>
                                    </div>
                                </div>
                                <!--effeckt wrap tileCOntent-->
                    </div>
                    </figcaption>
                    </figure>
                <?php
                }
            }
            ?>
        </div>
    </div>
    <?php
    //var_dump($zipList);
    ?>
</div>
</div><!-- .container -->
</body>
</html>