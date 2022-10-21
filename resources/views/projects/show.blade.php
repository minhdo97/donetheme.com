@extends('layouts.app')
@section('content')
    @include('layouts.breadcrumb',['title'=>$project->title,'render'=>Breadcrumbs::render('project_detail',$project)])

    <!-- Case Studies Widget -->
    <div class="case-studies-widget pt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="case-studies-content">
                        <div class="images-top">
                            <img src="assets/img/case-studies/case-studies-details1.jpg" alt="Images">
                        </div>

                        <span>SEO & Internet</span>
                        <h2>Our Web Solutions Help Your Business Grow Online In SEO</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore plicabo. Nemo enim ipsam voluptatem
                            quia voluptas sit aspernatur aut quia consequuntur magni dolores eos qui
                            ratione voluptatem sequi nesciunt.
                        </p>
                        <div class="content-widget-area">
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <div class="content-widget-img">
                                        <img src="assets/img/case-studies/case-studies-details2.png" alt="Images">
                                    </div>
                                </div>

                                <div class="col-lg-5">
                                    <div class="content-widget-text">
                                        <h2>The Entire Solution For Content Marketer</h2>
                                        <p>Lorem ipsum dolor sit ametaut odiut perspiciatis unde omnis iste quuntur alquam quaerat rsit amet</p>
                                        <ul>
                                            <li>
                                                <i class='bx bx-check'></i>
                                                The Field of Data Science
                                            </li>
                                            <li>
                                                <i class='bx bx-check'></i>
                                                SEO is Uniquely Built Around
                                            </li>
                                            <li>
                                                <i class='bx bx-check'></i>
                                                Google’s search algorithm
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2>The Details Of The project </h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum
                        </p>
                        <h2>Result Timelime</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore plicabo emo enim ipsam voluptatem quia voluptas sit aspernatur
                        </p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="contact-widget">
                        <h2>Contact Info</h2>
                        <ul>
                            <li>
                                <i class="flaticon-telephone"></i>
                                <div class="content">
                                    <h3>Project Owner: </h3>
                                    <span>ThenCary</span>
                                </div>
                            </li>
                            <li>
                                <i class="flaticon-tick"></i>
                                <div class="content">
                                    <h3>Completed</h3>
                                    <span>26 April 2020</span>
                                </div>
                            </li>
                            <li>
                                <i class="flaticon-planet-earth"></i>
                                <div class="content">
                                    <h3>Location:</h3>
                                    <span>112/7 New York, USA</span>
                                </div>
                            </li>
                            <li>
                                <i class="flaticon-price-tag"></i>
                                <div class="content">
                                    <h3>Technologies:</h3>
                                    <span>Data Science, SEO</span>
                                </div>
                            </li>
                            <li>
                                <i class="flaticon-planet-earth"></i>
                                <div class="content">
                                    <h3>Website:</h3>
                                    <span><a href="#">Thencary.com</a></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Case Studies Widget End -->

    <!-- Blog Area -->
    <div class="blog-area-widget pb-70">
        <div class="container">
            <div class="title">
                <h2>Related Projects You May Like</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <a href="#">
                            <img src="assets/img/blog/blog1.png" alt="Images">
                        </a>
                        <div class="content">
                            <h3>
                                <a href="#" class="color-title">
                                    The Home of Technology is in Front of You
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <a href="#">
                            <img src="assets/img/blog/blog2.png" alt="Images">
                        </a>

                        <div class="content">
                            <h3>
                                <a href="#" class="color-title">
                                    SEO Best Practices Mobile Friendliness
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="blog-card">
                        <a href="#">
                            <img src="assets/img/blog/blog3.png" alt="Images">
                        </a>
                        <div class="content">
                            <h3>
                                <a href="#" class="color-title">
                                    15 SEO Practices Website Architecture
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->

    <!-- Brand Logo Area -->
    <div class="brand-logo-area  pt-100">
        <div class="container-fluid">
            <div class="container-max">
                <div class="brand-logo-slider owl-carousel owl-theme">
                    <div class="brand-logo-item">
                        <img src="assets/img/brand/brand-logo1.png" class="brand-logo1" alt="Images">
                        <img src="assets/img/brand/brand-style1.png" class="brand-logo2" alt="Images">
                    </div>
                    <div class="brand-logo-item">
                        <img src="assets/img/brand/brand-logo2.png" class="brand-logo1" alt="Images">
                        <img src="assets/img/brand/brand-style2.png" class="brand-logo2" alt="Images">
                    </div>
                    <div class="brand-logo-item">
                        <img src="assets/img/brand/brand-logo3.png" class="brand-logo1" alt="Images">
                        <img src="assets/img/brand/brand-style3.png" class="brand-logo2" alt="Images">
                    </div>
                    <div class="brand-logo-item">
                        <img src="assets/img/brand/brand-logo4.png" class="brand-logo1" alt="Images">
                        <img src="assets/img/brand/brand-style4.png" class="brand-logo2" alt="Images">
                    </div>
                    <div class="brand-logo-item">
                        <img src="assets/img/brand/brand-logo5.png" class="brand-logo1" alt="Images">
                        <img src="assets/img/brand/brand-style5.png" class="brand-logo2" alt="Images">
                    </div>
                    <div class="brand-logo-item">
                        <img src="assets/img/brand/brand-logo6.png" class="brand-logo1" alt="Images">
                        <img src="assets/img/brand/brand-style6.png" class="brand-logo2" alt="Images">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Logo Area End -->
@endsection
