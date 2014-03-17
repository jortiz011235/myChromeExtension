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
                                                    <br>
                                                    Rating: 
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
                                                   <a class="btn btn-primary btn-large" href="<?php echo $place->url; ?>">More Info&raquo;</a>
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
                }
            }
            ?>