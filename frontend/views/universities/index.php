
<div class="jumbotron jumbotron-img" >
    <div class="img-layer" style="background-image: url('/img/banners/banner1.jpg');"></div>
</div>


<div class="search-form after-jumbotron">
    <div class="container">
        <div class="text-white">
            <h2>Are you interested in studying abroad?</h2>
            <h5>Find, Review and Apply to the best universities in the world</h5>
        </div>
        <form action="" method="" class="inline mtmd shadow-sm">
            <div class="form-group-row">
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>
            <div class="form-group-row">
                <div class="form-group">
                    <div class="select-wrapper">
                        <select class="form-control" name="">
                            <option value="">Degree Level</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="select-wrapper">
                        <select class="form-control" name="">
                            <option value="">Field</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="select-wrapper">
                        <select class="form-control" name="">
                            <option value="">Major</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="select-wrapper">
                        <select class="form-control" name="">
                            <option value="">Countries</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="button btn-block button-accent">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
if($countries){
?>
<section class="section top-destinations">
    <div class="container">
        <h1 class="title text-center">Top Destinations</h1>

        <div class="mtlg">
            <ul data-slider="slick" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "responsive": [{"breakpoint": 768, "settings": { "slidesToShow": 1 }}, {"breakpoint": 480,"settings": {"slidesToShow": 1} }]}'>
               <?php
               foreach ($countries as $country) {
                   ?>

                   <li>
                       <figure>
                           <a href="#">
                               <img src="<?= $country->flag ?>" alt="<?= $country->title ?>" />
                               <figcaption>
                                   <span class="country-name"><?= $country->title ?></span>
                               </figcaption>
                           </a>
                       </figure>
                   </li>
                   <?
               }
               ?>

            </ul>
        </div>
    </div>
</section>
<?php } ?>

<section class="section  mtlg">
    <div class="container">
        <h1 class="title text-center">Recommended options by our advisors</h1>

        <div class="universities universities-row">

            <div class="item">
                <header class="item-header">
                    <figure>
                        <span class="cut-off">15%</span>
                        <img src="img/destinations/1.jpg" alt="">
                    </figure>
                    <div class="item-content">
                        <div class="item-name">
                            <span>Auburn University</span>
                            <div class="rating">
                                <div class="jq_rating jq-stars" data-options='{"initialRating":4.8, "readOnly":true, "starSize":19}'></div>
                                <span class="text-muted">(628)</span>
                            </div>
                        </div>
                        <div class="item-location"><img src="img/flags/fr.png" alt=""> Auburn - Alabama - USA</div>
                        <div class="item-body">
                            Living in today’s metropolitan world of cellular phones, mobile computers and other high-tech gadgets is not just hectic but very impersonal. We make money and then invest our time and effort in making more money.
                        </div>
                    </div>
                </header>
                <footer class="item-footer">
                    <div>
                        <div class="item-label">Programm Name</div>
                        <div>Aerospace Engineering</div>
                        <div><small>Master: 2 Years</small></div>
                    </div>
                    <div>
                        <div class="item-label">Start Date</div>
                        <div>30 Jane 2018</div>
                    </div>
                    <div>
                        <div class="item-label">Annual Cost</div>
                        <div ><span class="original-price">25,700,00</span><span class="sale-on">27.00</span> <span class="currency">USD</span></div>
                        <div ><span class="converted-price">50,650,00</span> <span class="sale-on">27.00</span> <span class="currency">LE</span></div>
                    </div>
                    <div>
                        <a href="#" class="button btn-block button-primary">Additional Info</a>
                    </div>
                </footer>
            </div>

            <div class="item">
                <header class="item-header">
                    <figure>
                        <span class="cut-off">15%</span>
                        <img src="img/destinations/2.jpg" alt="">
                    </figure>
                    <div class="item-content">
                        <div class="item-name">
                            <span>Auburn University</span>
                            <div class="rating">
                                <div class="jq_rating jq-stars" data-options='{"initialRating":4, "readOnly":true, "starSize":19}'></div>
                                <span class="text-muted">(633)</span>
                            </div>
                        </div>
                        <div class="item-location"><img src="img/flags/us.png" alt=""> Auburn - Alabama - USA</div>
                        <div class="item-body">
                            Living in today’s metropolitan world of cellular phones, mobile computers and other high-tech gadgets is not just hectic but very impersonal. We make money and then invest our time and effort in making more money.
                        </div>
                    </div>
                </header>
                <footer class="item-footer">
                    <div>
                        <div class="item-label">Programm Name</div>
                        <div>Aerospace Engineering</div>
                        <div><small>Master: 2 Years</small></div>
                    </div>
                    <div>
                        <div class="item-label">Start Date</div>
                        <div>30 Jane 2018</div>
                    </div>
                    <div>
                        <div class="item-label">Annual Cost</div>
                        <div ><span class="original-price">25,700,00</span><span class="sale-on">27.00</span> <span class="currency">USD</span></div>
                        <div ><span class="converted-price">50,650,00</span> <span class="sale-on">27.00</span> <span class="currency">LE</span></div>
                    </div>
                    <div>
                        <a href="#" class="button btn-block button-primary">Additional Info</a>
                    </div>
                </footer>
            </div>

            <div class="item">
                <header class="item-header">
                    <figure>
                        <img src="img/destinations/3.jpg" alt="">
                    </figure>
                    <div class="item-content">
                        <div class="item-name">
                            <span>Auburn University</span>
                            <div class="rating">
                                <div class="jq_rating jq-stars" data-options='{"initialRating":4.3, "readOnly":true, "starSize":19}'></div>
                                <span class="text-muted">(238)</span>
                            </div>
                        </div>
                        <div class="item-location"><img src="img/flags/be.png" alt=""> Auburn - Alabama - USA</div>
                        <div class="item-body">
                            Living in today’s metropolitan world of cellular phones, mobile computers and other high-tech gadgets is not just hectic but very impersonal. We make money and then invest our time and effort in making more money.
                        </div>
                    </div>
                </header>
                <footer class="item-footer">
                    <div>
                        <div class="item-label">Programm Name</div>
                        <div>Aerospace Engineering</div>
                        <div><small>Master: 2 Years</small></div>
                    </div>
                    <div>
                        <div class="item-label">Start Date</div>
                        <div>30 Jane 2018</div>
                    </div>
                    <div>
                        <div class="item-label">Annual Cost</div>
                        <div ><span class="original-price">25,700,00</span> <span class="currency">USD</span></div>
                        <div ><span class="converted-price">50,650,00</span>  <span class="currency">LE</span></div>
                    </div>
                    <div>
                        <a href="#" class="button btn-block button-primary">Additional Info</a>
                    </div>
                </footer>
            </div>

            <div class="item">
                <header class="item-header">
                    <figure>
                        <span class="cut-off">10%</span>
                        <img src="img/destinations/4.jpg" alt="">
                    </figure>
                    <div class="item-content">
                        <div class="item-name">
                            <span>Auburn University</span>
                            <div class="rating">
                                <div class="jq_rating jq-stars" data-options='{"initialRating":4, "readOnly":true, "starSize":19}'></div>
                                <span class="text-muted">(354)</span>
                            </div>
                        </div>
                        <div class="item-location"><img src="img/flags/us.png" alt=""> Auburn - Alabama - USA</div>
                        <div class="item-body">
                            Living in today’s metropolitan world of cellular phones, mobile computers and other high-tech gadgets is not just hectic but very impersonal. We make money and then invest our time and effort in making more money.
                        </div>
                    </div>
                </header>
                <footer class="item-footer">
                    <div>
                        <div class="item-label">Programm Name</div>
                        <div>Aerospace Engineering</div>
                        <div><small>Master: 2 Years</small></div>
                    </div>
                    <div>
                        <div class="item-label">Start Date</div>
                        <div>30 Jane 2018</div>
                    </div>
                    <div>
                        <div class="item-label">Annual Cost</div>
                        <div ><span class="original-price">25,700,00</span><span class="sale-on">27.00</span> <span class="currency">USD</span></div>
                        <div ><span class="converted-price">50,650,00</span> <span class="sale-on">27.00</span> <span class="currency">LE</span></div>
                    </div>
                    <div>
                        <a href="#" class="button btn-block button-primary">Additional Info</a>
                    </div>
                </footer>
            </div>

            <div class="item">
                <header class="item-header">
                    <figure>
                        <img src="img/destinations/5.jpg" alt="">
                    </figure>
                    <div class="item-content">
                        <div class="item-name">
                            <span>Auburn University</span>
                            <div class="rating">
                                <div class="jq_rating jq-stars" data-options='{"initialRating":5, "readOnly":true, "starSize":19}'></div>
                                <span class="text-muted">(345)</span>
                            </div>
                        </div>
                        <div class="item-location"><img src="img/flags/us.png" alt=""> Auburn - Alabama - USA</div>
                        <div class="item-body">
                            Living in today’s metropolitan world of cellular phones, mobile computers and other high-tech gadgets is not just hectic but very impersonal. We make money and then invest our time and effort in making more money.
                        </div>
                    </div>
                </header>
                <footer class="item-footer">
                    <div>
                        <div class="item-label">Programm Name</div>
                        <div>Aerospace Engineering</div>
                        <div><small>Master: 2 Years</small></div>
                    </div>
                    <div>
                        <div class="item-label">Start Date</div>
                        <div>30 Jane 2018</div>
                    </div>
                    <div>
                        <div class="item-label">Annual Cost</div>
                        <div ><span class="original-price">25,700,00</span> <span class="currency">USD</span></div>
                        <div ><span class="converted-price">50,650,00</span>  <span class="currency">LE</span></div>
                    </div>
                    <div>
                        <a href="#" class="button btn-block button-primary">Additional Info</a>
                    </div>
                </footer>
            </div>

            <div class="item">
                <header class="item-header">
                    <figure>
                        <span class="cut-off">23%</span>
                        <img src="img/destinations/6.jpg" alt="">
                    </figure>
                    <div class="item-content">
                        <div class="item-name">
                            <span>Auburn University</span>
                            <div class="rating">
                                <div class="jq_rating jq-stars" data-options='{"initialRating":3.7, "readOnly":true, "starSize":19}'></div>
                                <span class="text-muted">(500)</span>
                            </div>
                        </div>
                        <div class="item-location"><img src="img/flags/us.png" alt=""> Auburn - Alabama - USA</div>
                        <div class="item-body">
                            Living in today’s metropolitan world of cellular phones, mobile computers and other high-tech gadgets is not just hectic but very impersonal. We make money and then invest our time and effort in making more money.
                        </div>
                    </div>
                </header>
                <footer class="item-footer">
                    <div>
                        <div class="item-label">Programm Name</div>
                        <div>Aerospace Engineering</div>
                        <div><small>Master: 2 Years</small></div>
                    </div>
                    <div>
                        <div class="item-label">Start Date</div>
                        <div>30 Jane 2018</div>
                    </div>
                    <div>
                        <div class="item-label">Annual Cost</div>
                        <div ><span class="original-price">25,700,00</span><span class="sale-on">27.00</span> <span class="currency">USD</span></div>
                        <div ><span class="converted-price">50,650,00</span> <span class="sale-on">27.00</span> <span class="currency">LE</span></div>
                    </div>
                    <div>
                        <a href="#" class="button btn-block button-primary">Additional Info</a>
                    </div>
                </footer>
            </div>

        </div>

    </div>
</section>