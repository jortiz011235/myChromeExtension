<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <title>fullPage.js plugin by Alvaro Trigo</title>
    <meta name="author" content="Alvaro Trigo Lopez" />
    <meta name="description" content="fullPage plugin by Alvaro Trigo. Create full screen pages fast and simple" />
    <meta name="keywords"  content="fullpage,jquery,alvaro,trigo,plugin,fullscren,screen,full" />
    <meta name="Resource-type" content="Document" />

    <?php include("YelpTest.php"); ?>
    <link rel="stylesheet" type="text/css" href="jquery.fullPage.css" />
    <link rel="stylesheet" type="text/css" href="example.css" />

    <!--[if IE]>
        <script type="text/javascript">
             var console = { log: function() {} };
        </script>
    <![endif]-->
        
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>    
    
    <script type="text/javascript" src="jquery.fullPage.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.fn.fullpage({
                slidesColor: ['#f2f2f2', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
                anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage']
            });
            $("#advancedSearchButtonID").click(function(){
                     var type = $("#searchFormID").attr("data-searchtype");
                     if(type === "basic")
                     {
                        $("#advancedSearch").hide("slow");    
                        $("#searchFormID").attr("data-searchtype", "advanced");
                         $("#advancedSearchButtonID").text("Basic Search");
                     }else{
                        $("#advancedSearch").show("slow");
                        $("#searchFormID").attr("data-searchtype", "basic");
                         $("#advancedSearchButtonID").text("Advanced Search");
                     }
                    
            });
            

        });
    </script>
  <style type="text/css">
        div {
            text-align: center;
        }

         ul {
            list-style: none;
        }

        #intro{
            
        }
    </style>
</head>
<body>
    
<div class="section active" id="intro">
  <h1>Find Places</h1>
      <h1>GGC</h1>
        <p> An app that uses the Yelp API to find businesses near by.</p>

        <p> Ui styling using Twitter Bootstrap, FlatUI, and Effeckts.css</p>
</div>

<div class="section" id="section1">
 <form action="YelpView.php" method="post">
   
        <h1>Basic Search </h1><br>
        <div class="form-group" id="searchFormID" data-searchType="basic">
            City: <input class="form-control" type="text" name="city" value="Lawrenceville"><br>
            State: <input class="form-control" type="text" name="state" value="GA"><br>
            Search: <input class="form-control" type="text" name="term" value="italian food"><br>
            <div id="advancedSearch">
                limit: <input class="form-control" type="text" name="limit" value="10"><br>
                sort: <input class="form-control" type="text" name="sort" value="2"><br>
                Radius: <input class="form-control" type="text" name="radius" value="25"><br>
            </div>
            <input type="submit">
        </div>
  
    </form>
    <button type="button" id="advancedSearchButtonID">Advanced Search</button>
</div>
  


<div class="section" id="section2">
<h1>Results</h1>
        <?php
        if (isset($response)) 
        {
            foreach ($response->businesses as $place) 
            {
            ?>
                    <div class="restaurantContainer">
                    <h4> <?php echo $place->name; ?></h4>
                        <?php
                        if (isset($place->image_url)) 
                        {
                            echo "<img class=\"tile-ImageBorder\" src=\"";
                            echo $place->image_url;
                            echo "\">";
                        }?>
                        <div class="restaurantDetailsID">                         
                            Rating:<?php   echo $place->rating; ?>
                            is_closed: <?php echo $place->is_closed ? 'false' : 'true'; ?>
                            phone: <?php echo $place->display_phone; ?>
                            <a class="btn btn-primary btn-large" href="<?php echo $place->url;?>">More info&raquo;</a>
                            Rating: 
                            <?php if (isset($place->image_url)) {
                                echo "<img class=\"tile-ImageBorder\" src=\"";
                                echo $place->rating_img_url;
                                echo "\">";
                            }?>
                        </div>
                         </div>
                        <?php 
            }
        }?>

               
</div>
<div class="section" id="section3"><h1>Looks good</h1></div>


</body>
</html>