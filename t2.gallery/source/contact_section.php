<!-- Contact Section -->
<section id="contact-section" class="section contact-section">
    <div class="container">
        <div class="section-title">
            <div class=" section-title-more">
                buzz
            </div>
            <div>
                <h2 class="section-title-heading"><span>contact</span> us</h2>
            </div>
        </div>
        <div class="row padding-bottom-sm-90">
            <div class="col-sm-4">
                <div class="contact-item margin-bottom-xs-40"><i class="icon-phone"></i>
                    <p>Phone: +91 - 96 77 261658
                    <br />+91 - 75 50 190604
                        <br />+91 - 98 94 533299</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-item margin-bottom-xs-40"><i class="icon-map-pin"></i>
                    <p>#00 Vadapalani,
                        <br />Chennai - 26, TN, India</p>
                </div>
            </div>
            <div class="col-sm-4">
                <a href="mailto:contact@t2.gallery">
                    <div class="contact-item margin-bottom-xs-40"><i class="icon-envelope"></i>
                        <p>contact@t2.gallery</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <form id="ajax-contact" class="" method="post" action="mailer.php">
                    <fieldset>
                        <div class="row">
                            <div class="input col-xs-12 col-sm-12 padding-bottom-xs-50 padding-bottom-40">
                                <label class="input-label" for="name">
                                    <span class="input-label-content font-second" data-content="name">name *</span>
                                </label>
                                <input class="input-field" type="text" name="name" id="name" required />
                            </div>
                            <div class="input col-xs-12 col-sm-6 padding-bottom-xs-50 padding-bottom-50">
                                <label class="input-label" for="email">
                                    <span class="input-label-content font-second" data-content="email">email *</span>
                                </label>
                                <input class="input-field" type="email" name="email" id="email" required />
                            </div>
                            <div class="input col-xs-12 col-sm-6 padding-bottom-xs-60 padding-bottom-50">
                                <label class="input-label" for="Contact Number">
                                    <span class="input-label-content font-second" data-content="Contact Number">Contact Number*</span>
                                </label>
                                <input class="input-field" type="text" name="Contact Number" id="number" required/>
                            </div>
                            <div class="message col-xs-12 col-sm-12 padding-bottom-xs-40 padding-bottom-30">
                                <label class="textarea-label font-second" for="message">message *</label>
                                <textarea class="input-field textarea" name="message" id="message" required></textarea>
                            </div>
                        </div>
                        <div id="form-messages" class="form-message"></div>
                        <div class="col-xs-12 margin-top-30 text-center">
                            <button id="btn-submit" type="submit" class="btn btn-animated btn-contact ripple-alone" data-text="send"><span class="btn-icon"><span class="loader-parent"><span class="loader3"></span></span>
                                </span>
                            </button>
                        </div>
                    </fieldset>
                </form>
                <!--/ End form -->
            </div>
            <!--/ .col -->
        </div>
        <!--/ .row -->
    </div>
    <!--/ .container -->
</section>
<!--/ End Contact Section -->