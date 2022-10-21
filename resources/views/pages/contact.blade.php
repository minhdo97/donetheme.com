@extends('layouts.app')
@section('content')
    <!-- Inner Banner Area -->
    <div class="inner-banner">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Contact Us</h3>
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <i class='bx bx-chevron-right'></i>
                    </li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>

        <div class="inner-banner-shape">
            <div class="shape-one">
                <img src="assets/img/inner-banner/banner-shape1.png" alt="Images">
            </div>

            <div class="shape-two">
                <img src="assets/img/inner-banner/banner-shape2.png" alt="Images">
            </div>

            <div class="shape-three">
                <img src="assets/img/inner-banner/banner-shape3.png" alt="Images">
            </div>

            <div class="inner-banner-dots">
                <img src="assets/img/shape/dots-shape.png" alt="Images">
            </div>
        </div>
    </div>
    <!-- Inner Banner Area End -->

    <!-- Contact Area -->
    <div class="contact-area pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-before sp-after">Contact</span>
                <h2>Get in Touch</h2>
            </div>

            <div class="row pt-45">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card">
                        <i class="flaticon-planet-earth"></i>
                        <h3>Office Location</h3>
                        <p>54 Hegmann Uninuo Apt. 890, New </p>
                        <p> York, NY 10018, United States.</p>
                        <a href="#" class="contact-card-btn">
                            Direction
                            <i class='bx bx-plus plus-btn'></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="contact-card">
                        <i class="flaticon-email"></i>
                        <h3>Contact</h3>
                        <p>Email.info@Zinka.com </p>
                        <p> Mobile: (+44) - 45789 - 5789 </p>
                        <a href="#" class="contact-card-btn">
                            Learn More
                            <i class='bx bx-plus plus-btn'></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="contact-card">
                        <i class="flaticon-clock"></i>
                        <h3>Hours of Operation</h3>
                        <p>Monday - Friday: 09:00 - 20:00</p>
                        <p>Sunday & Saturday: 10:30 - 22:00</p>
                        <a href="#" class="contact-card-btn">
                            Support
                            <i class='bx bx-plus plus-btn'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Area End -->

    <!-- Contact Section -->
    <div class="contact-section pt-100 pb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-img">
                        <img src="assets/img/contact-img.png" alt="Images">
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="contact-wrap">
                        <div class="contact-form">
                            <div class="section-title">
                                <span class="sp-before sp-after">Contact</span>
                                <h2>Contact With Us</h2>
                            </div>
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <i class='bx bx-user'></i>
                                            <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your Name*">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <i class='bx bx-user'></i>
                                            <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="E-mail*">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <i class='bx bx-phone'></i>
                                            <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <i class='bx bx-file'></i>
                                            <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Your Subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <i class='bx bx-envelope'></i>
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Your Message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn border-radius">
                                            Send Message
                                            <i class='bx bx-plus'></i>
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->

    <!-- Contact Map -->
    <div class="contact-map">
        <div class="container-fluid m-0 p-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1887.3734131639715!2d-96.95588917878352!3d18.89830951964275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c4e51eb45eacad%3A0x465ac54aa2735573!2zUmluY29uIGRlbCBCb3NxdWUsIOCmleCmsOCnjeCmoeCni-CmrOCmviwg4Kat4KeH4Kaw4Ka-4KaV4KeN4Kaw4KeB4KacLCDgpq7gp4fgppXgp43gprjgpr_gppXgp4s!5e0!3m2!1sbn!2sbd!4v1594641366896!5m2!1sbn!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <!-- Map Area End -->
@endsection
