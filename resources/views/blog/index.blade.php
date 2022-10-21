@extends('layouts.app')
@section('content')
    @include('layouts.breadcrumb',['title'=>'Blogs','render'=>Breadcrumbs::render('blog')])

    <div class="blog-area pt-50 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-before sp-after">Our Blogs</span>
                <h2 class="h2-color2">Latest Valuable Insights</h2>
                <p class="margin-auto">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim
                </p>
            </div>
            <div class="row pt-45">
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6">

                        <div class="blog-card">
                            <a href="{{route('blogs.show',$post)}}">
                                <img src="{{$post->getFirstMediaUrl('image')}}" alt="{{$post->title}}">
                            </a>
                            <div class="content">
                                <ul>
                                    <li>
                                        <i class='bx bx-time-five'></i>
                                        {{$post->created_at->format('m/d/Y')}}
                                    </li>
                                    <li>
                                        <i class='bx bx-purchase-tag-alt'></i>
                                        <a href="{{route('categories.show',$post->category)}}">{{$post->category->name}}</a>
                                    </li>
                                </ul>
                                <h3><a href="{{route('blogs.show',$post)}}">{{$post->title}}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{$posts->links()}}
            </div>
        </div>

        <div class="blog-shape">
            <div class="shape1">
                <img src="{{asset('assets/img/shape/shape1.png')}}" alt="Images">
            </div>
            <div class="shape2">
                <img src="{{asset('assets/img/shape/shape5.png')}}" alt="Images">
            </div>
            <div class="shape3">
                <img src="{{asset('assets/img/shape/shape4.png')}}" alt="Images">
            </div>
            <div class="shape4">
                <img src="{{asset('assets/img/shape/shape6.png')}}" alt="Images">
            </div>
        </div>
    </div>
@endsection
