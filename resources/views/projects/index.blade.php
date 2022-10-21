@extends('layouts.app')
@section('content')
    @include('layouts.breadcrumb',['title'=>'Projects','render'=>Breadcrumbs::render('project')])

    <div class="case-study-area pt-50 pb-70">
        <div class="container">
            <div class="section-title text-center ">
                <span class="sp-after">Our Courses</span>
                <h2 class="h2-color2">Online Data Science Courses</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
            </div>
            <div class="">
                <div class="list-cat">
                    <a class="active" href="{{route('projects.index')}}">All</a>
                    @foreach($categories as $category)
                        <a href="{{route('project-categories.show',$category)}}">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>

            <div class="row pt-45">
                @foreach($projects as $project)
                    <div class="col-lg-4 col-md-6">
                        <div class="case-study-card">
                            <a href="{{route('projects.show',$project)}}">
                                <img src="{{$project->getFirstMediaUrl('image')}}" alt="{{$project->title}}">
                            </a>
                            <div class="content">
                                <h3><a href="{{route('projects.show',$project)}}">{{$project->title}}</a></h3>
                                <span>{{$project->projectCategory->name}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{$projects->links()}}
            </div>
        </div>
    </div>
@endsection
