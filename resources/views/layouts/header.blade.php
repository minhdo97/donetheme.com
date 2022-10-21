<!-- Pre Loader -->
<div class="preloader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="spinner"></div>
        </div>
    </div>
</div>
<!-- End Pre Loader -->

<!-- Start Navbar Area -->
<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{url('/')}}" class="logo">
            <img src="{{asset('assets/img/logo/logo1.png')}}" class="logo-one" alt="Logo">
            <img src="{{asset('assets/img/logo/logo2.png')}}" class="logo-two" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav nav-bar-two">
        <div class="container-fluid">
            <nav class="container-max-2 navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('assets/img/logo/logo2.png')}}" alt="Logo">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="{{url('/')}}"
                               class="nav-link @if(Route::currentRouteName() === 'home') active @endif">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('about')}}"
                               class="nav-link  @if(Route::currentRouteName() === 'about') active @endif">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('projects.index')}}"
                               class="nav-link   @if(Route::currentRouteName() === 'projects.index') active @endif">
                                Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('services.index')}}"
                               class="nav-link   @if(Route::currentRouteName() === 'services.index') active @endif">
                                Services
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('blogs.index')}}"
                               class="nav-link   @if(Route::currentRouteName() === 'blogs.index') active @endif">
                                Blog
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('contact')}}"
                               class="nav-link   @if(Route::currentRouteName() === 'contact') active @endif">
                                Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                More
                                <i class='bx bx-plus'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{route('team')}}" class="nav-link">
                                        Team
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('pricing')}}" class="nav-link">
                                        Pricing Table
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('faq')}}" class="nav-link">
                                        FAQ
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('testimonials')}}" class="nav-link">
                                        Testimonials
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('terms-condition')}}" class="nav-link">
                                        Terms & Conditions
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('privacy-policy')}}" class="nav-link">
                                        Privacy Policy
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <div class="side-nav d-in-line align-items-center">
                        <div class="side-item">
                            <div class="search-box">
                                <i class="flaticon-loupe"></i>
                            </div>
                        </div>

                        <div class="side-item">
                            <div class="user-btn">
                                <a href="#">
                                    <i class="flaticon-contact"></i>
                                </a>
                            </div>
                        </div>

                        <div class="side-item">
                            <div class="nav-add-btn">
                                <a href="#" class="nav-menu-btn">
                                    Get started
                                    <i class='bx bx-plus'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="side-nav-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="circle-inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>

            <div class="container">
                <div class="side-nav-inner">
                    <div class="side-nav justify-content-center  align-items-center">
                        <div class="side-item">
                            <div class="search-box">
                                <i class="flaticon-loupe"></i>
                            </div>
                        </div>

                        <div class="side-item">
                            <div class="user-btn">
                                <a href="#">
                                    <i class="flaticon-contact"></i>
                                </a>
                            </div>
                        </div>

                        <div class="side-item">
                            <div class="nav-add-btn">
                                <a href="#" class="nav-menu-btn border-radius">
                                    Contact us
                                    <i class='bx bx-plus'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Navbar Area -->

<!-- Search Overlay -->
<div class="search-overlay">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="search-layer"></div>
            <div class="search-layer"></div>
            <div class="search-layer"></div>

            <div class="search-close">
                <span class="search-close-line"></span>
                <span class="search-close-line"></span>
            </div>

            <div class="search-form">
                <form>
                    <input type="text" class="input-search" placeholder="Search here...">
                    <button type="submit"><i class="flaticon-loupe"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Search Overlay -->
