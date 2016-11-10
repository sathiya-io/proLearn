<!-- Team Section -->
<section id="team-section" class="team-section section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="section-title">
                    <div class=" section-title-more">
                        get to know
                    </div>
                    <div>
                        <h2 class="section-title-heading"><span> our </span>family </h2>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-sm-6 margin-bottom-xs-40">
                <p class="section-text">“A young passionate and artistic crew who loves to exploit.  A technically strong team on and off set”</p>
            </div>
        </div>
        <!-- /.col -->
        <!-- /.row -->
        <!-- Team Items -->
        <div class="team-items">
            <!-- Team Carousel -->
            <div id="team-carousel" class="team-carousel owl-carousel carousel dots-under">
                    <?php
                        $team = simplexml_load_file("./datastore/team_members.xml");
                        #print_r($team);
                        foreach ($team as $team_memeber) {
                            # code...
                            $load_name = $team_memeber -> name;
                            $load_img = $team_memeber -> image;
                            $load_role = $team_memeber -> role;
                            $load_hh = $team_memeber -> headHighlight;
                            $load_head = $team_memeber -> head;
                            $load_info = $team_memeber -> info;
                            printf('
                                <!-- Team Item -->
                                <div class="team-item">
                                    <!-- Team Item Image -->
                                    <div class="team-item-img">
                                        <img src="%s" alt="team member" />
                                    </div>
                                    <!--/ End Team Item Imagee -->
                                    <!-- Team Item Name -->
                                    <div class="team-item-name font-second">
                                        <h4 class="">%s</h4>
                                        <span>%s</span>
                                    </div>
                                    <!--/ End Team Item Name -->
                                    <!-- Team Item Info -->
                                    <div class="team-item-info">
                                        <div class="team-item-text">
                                            <h3 class="font-second">%s <span>%s</span></h3>
                                            <p>%s</p>
                                        </div>
                                        <ul class="team-item-social clearlist">
                                            <li>
                                                <a href="#" class="fa fa-facebook-square"></a>
                                            </li>
                                            <li>
                                                <a href="#" class=" fa fa-twitter"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="fa fa-pinterest"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--/ End Team Item Info -->
                                </div>
                                <!--/ End Team Item -->',
                                    $load_img,
                                    $load_name,
                                    $load_role,
                                    $load_hh,
                                    $load_head,
                                    $load_info);
                        }
                    ?>
            </div>
            <!--/ End Team Carousel -->
        </div>
        <!--/ End Team Items -->
    </div>
    <!-- /.container -->
</section>
<!--/ End Team Section -->