@extends('layouts.app')
@section('content')
    @include('layouts.breadcrumb',['title'=>'Blogs','render'=>Breadcrumbs::render('blog_detail',$blog)])

    <div class="blog-details-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-article">
                        <div class="blog-article-img">
                            <img src="assets/img/blog/blog-details.jpg" alt="Images">
                        </div>
                        <div class="article-content">
                            <h2>SEO Best Practice for Web Traffic</h2>
                            <div class="content-text">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incidunt ut
                                    labore et dolore plicabo. Nemo enim ipsam voluptatem quia voluptas sit aspertur aut
                                    odit aut
                                    quia consequuntur magni
                                </p>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore plicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
                                quia
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                            </p>

                            <blockquote class="blockquote">
                                <p>
                                    I see SEO becoming a normalized marketing tactic, the same
                                    way TV, radio, and print are traditionally
                                </p>
                                <span>HERBERT BAYARD SWOPE</span>
                            </blockquote>
                        </div>

                        <div class="another-content">
                            <h2>SEO is Cost-Effective Strategy</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore
                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum
                                dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui offi
                            </p>
                            <p>
                                cia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error
                                sit voluptatem
                                tem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores
                                eos qui ratione
                                voluptatem sequi nesciunt. Neque porro quisquam est.
                            </p>
                            <div class="content-img">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="assets/img/blog/blog-details2.jpg" alt="Images">
                                    </div>
                                    <div class="col-6">
                                        <img src="assets/img/blog/blog-details3.jpg" alt="Images">
                                    </div>
                                </div>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore
                                et dolore plicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut quia
                                consequuntur magni
                                dolores eos qui ratione voluptatem sequi nesciunt.
                            </p>
                        </div>

                        <div class="blog-article-share">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-sm-6 col-md-7">
                                    <div class="blog-tag">
                                        <ul>
                                            <li>Tags:</li>
                                            <li><a href="#">#SEO</a></li>
                                            <li><a href="#">#Business</a></li>
                                            <li><a href="#">#Internet</a></li>
                                            <li><a href="#">#Property</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-sm-6 col-md-5">
                                    <ul class="social-icon">
                                        <li>
                                            <a href="#">
                                                <i class="bx bxl-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="bx bxl-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="bx bxl-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="bx bxl-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="bx bxl-youtube"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="article-author">
                            <ul>
                                <li>
                                    <img src="assets/img/blog/blog-profile1.png" alt="Image">
                                    <h3>Devit Killer</h3>
                                    <span>Author, Writer</span>
                                    <p>I’m devit hack from an initial feasibility study, continuing through sucessl
                                        implna business you have to be But we know there</p>
                                </li>
                            </ul>
                            <div class="author-social-link">
                                <ul class="social-icon">
                                    <li>
                                        <a href="#">
                                            <i class="bx bxl-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bx bxl-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bx bxl-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bx bxl-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bx bxl-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="author-shape">
                                <div class="shape1">
                                    <img src="assets/img/blog/blog-shape.png" alt="Images">
                                </div>
                                <div class="shape2">
                                    <img src="assets/img/blog/blog-shape2.png" alt="Images">
                                </div>
                                <div class="shape-dots">
                                    <img src="assets/img/blog/blog-dots.png" alt="Images">
                                </div>
                            </div>
                        </div>

                        <div class="article-post">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="article-post-share">
                                        <span>Jun 12, 2020 / <a href="#">SEO</a></span>
                                        <a href="#">
                                            <h3>Successful digital marketer does first to ensure they get</h3>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="article-post-share">
                                        <span>April 19, 2020 / <a href="#">Web</a></span>
                                        <a href="#">
                                            <h3 class="active">Marketer who knows how to execute their campaigns</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="comments-wrap">
                            <h3 class="title">Comments (02)</h3>
                            <ul>
                                <li>
                                    <img src="assets/img/blog/blog-profile1.png" alt="Image">
                                    <h3>Devit Killer</h3>
                                    <span>Jnauary 12, 2020</span>
                                    <p>Software hack from an initial feasibility study, continuing through l implna
                                        business you have to be But we know there's a better</p>
                                    <a href="#"> Reply</a>
                                </li>

                                <li class="ml-30">
                                    <img src="assets/img/blog/blog-profile2.png" alt="Image">
                                    <h3>Morah Jein </h3>
                                    <span>July 12, 2020</span>
                                    <p>Software hack from an initial feasibility study, continuing through l implna
                                        business you have to be But we know there's a better</p>
                                    <a href="#"> Reply</a>
                                </li>
                            </ul>
                        </div>

                        <div class="comments-form">
                            <div class="contact-form">
                                <h3>Leave a Comment</h3>
                                <form id="contactForm">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <i class='bx bx-user'></i>
                                                <input type="text" name="name" class="form-control" required
                                                       data-error="Please enter name" placeholder="Name*">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <i class='bx bx-user'></i>
                                                <input type="email" name="name" class="form-control" required
                                                       data-error="Please enter email" placeholder="Email*">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <i class='bx bx-phone'></i>
                                                <input type="text" name="phone" class="form-control" required
                                                       data-error="Please enter your phone number" placeholder="Phone">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <i class='bx bx-copy-alt'></i>
                                                <input type="text" name="website" class="form-control" required
                                                       data-error="Please enter your website" placeholder="Website">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <i class='bx bx-envelope'></i>
                                                <textarea name="message" class="form-control" id="message" cols="30"
                                                          rows="8" required data-error="Write your message"
                                                          placeholder="Your Message"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <button type="submit" class="default-btn">
                                                Post A Comment
                                                <i class='bx bx-plus'></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    @include('layouts.sidebars.blog')
                </div>
            </div>
        </div>
    </div>
@endsection
