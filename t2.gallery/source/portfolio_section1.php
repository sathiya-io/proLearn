<!--Start Works Section -->
<section id="portfolio-section" class="portfolio-section section text-center no-padding-bottom">
    <div class="container">
        <div class="section-title">
            <div class=" section-title-more">
                check it out
            </div>
            <div>
                <h1 class="section-title-heading">our <span>portfolio</span></h1>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <!-- Works Items -->
    <ul id="portfolio-container" class="portfolio-container masonry clearlist row portfolio-hover-effect">
        <?php 
            $xml = simplexml_load_file("./datastore/portfolio_tiles.xml");
            #print_r($pfItems);
            $gallIndex = array();
            foreach ($xml -> gallery -> galleryindex as $item) {
                $gallIndex [] = $item;
            }
            usort ($gallIndex, function($a, $b) {
                return strcmp($a['Name'], $b['Name']);
            });
            foreach ($gallIndex as $Item) {
                 $itemName = $Item ['id'];
                 $itemImage = $Item -> image;
                 $itemNote = $Item -> note;
                 $itemLink = $Item -> link;
                 printf('
                    <li class="portfolio-item photo video col-sm-6 col-md-3 col-xs-12">
                        <div class="portfolio-item-img">
                            <img src="%s" alt="portfolio" />
                        </div>
                        <div class="portfolio-item-info font-second">
                            <h3 class="portfolio-item-title">%s</h3>
                            <div class="portfolio-item-detail">
                                <p>%s</p>
                                <a href="%s" class="animsition-link icon-attachment"></a>
                            </div>
                        </div>
                    </li>
                    <!--/ End Work Item -->',
                    $itemImage,
                    $itemName,
                    $itemNote,
                    $itemLink);
            }
        ?>
    </ul>
    <!--/ End Works Items -->
</section>
<!--/ End Works Section -->
<!-- Project Order Section -->
<div class="project-order-section in-page-scroll small-section text-center">
    <a href="#contact-section" class="btn btn-animated btn-split btn-colored ripple-alone" data-text="Have a Project in Mind?"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;let's do it then&nbsp;..&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
</div>
<!--/ End Project Order Section -->