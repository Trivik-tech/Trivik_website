	<?php include 'header.php' ?>
			<!--================================banner section start ===========================  -->
            <div class="banner-about md-pt-50 tran5s wow fadeInUp" style="background: linear-gradient(90deg, #7B7B7B 0%, rgba(84, 81, 81, 0.73) 23.44%, rgba(27, 25, 25, 0.00) 100%), url('images/banner/banner-03.png') center center no-repeat;">
                <div class="container pt-286 pb-170 md-pt-150 md-pb-90">
                    <div class="row d-flex align-items-center">
                        <div class="text-center">
                            <h2 class="h2 mb-20 md-mb-10 position-relative">Careers</h2>
                            
                        </div>
                    </div>
                </div>
            </div>

			<!--================================banner section end ===========================  -->


            <!--================================contact form end ===========================  -->
            <div class="contact-form pt-120 md-pt-40 position-relative tran5s wow fadeInUp">
                <div class="contact-form-rapper">
                    <section class="about-three">
                        <div class="container">
                            <div class="row d-flex align-items-center justify-content-center">
                                <div class="text-rapper text-center">
                                    <h4 class="mb-30">We’re always on the lookout for IT talents!</h4>
                                    <p>Send us your CV, and we’ll contact you when there’s a match.If you have any question about Trivik Technologies you can also write us an email: info@triviktech.com</p>
                                </div>
                            </div>
                            <div class="my-form position-relative">
                                <form action="send_mail_upload.php" method="post" enctype="multipart/form-data">
                                    <div class="row g-lg-4 ms-auto">
                                        <div class="col-lg-6 mb-60 position-relative">
                                            <input class="input-one" type="text" name="first_name" required>
                                            <span class="input-one-text" data-placeholder="First Name*"></span>
                                        </div>
                                        <div class="col-lg-6 mb-60 position-relative">
                                            <input class="input-one" type="text" name="last_name" required>
                                            <span class="input-one-text" data-placeholder="Last Name*"></span>
                                        </div>
                                        <div class="col-lg-6 mb-60 position-relative">
                                            <input class="input-one" type="email" name="email" required>
                                            <span class="input-one-text" data-placeholder="Your Email*"></span>
                                        </div>
                                        <div class="col-lg-6 mb-60 position-relative">
                                            <input class="input-one" type="text" name="subject">
                                            <span class="input-one-text" data-placeholder="Subject"></span>
                                        </div>
                                        <div class="col-lg-12 mb-60 position-relative">
                                            <input class="input-two" type="text" name="message">
                                            <span class="input-two-text" data-placeholder="Tell us something about yourself"></span>
                                        </div>
                                        <div class="col-lg-12 mb-60 position-relative">
                                            <label for="myFile">Upload CV:</label>
                                            <input type="file" id="myFile" name="cv" required>
                                        </div>
                                    </div>
                                    <div class="sent-massage">
                                        <button type="submit" class="custom-btn-one">Apply Now</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!--================================contact form end ===========================  -->

			<!--================================ Footer start ===========================  -->
				<?php include 'footer.php' ?>