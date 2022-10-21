@extends('layouts.app')
@section('content')
    @include('layouts.breadcrumb',['title'=>'Services','render'=>Breadcrumbs::render('service')])
    <div class="service-widget-area pt-50 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-before sp-after">Services</span>
                <h2 class="h2-color">We’re Flexible to <b>Provide You Best</b></h2>
            </div>
            <div class="row pt-45">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card">
                            <a href="{{route('services.show',['service'=>$service->slug])}}">
                                <img src="{{$service->getFirstMediaUrl('image')}}" alt="{{$service->title}}">
                            </a>
                            <h3>
                                <a href="{{route('services.show',['service'=>$service->slug])}}">{{$service->title}}</a>
                            </h3>
                            <p>
                                Lorem ipsum dolor sit amet, aut odiut perspiciatis unde omnis iste natus odit aut
                                fugitsed quia consequuntur alquam quaerat voluptatem
                            </p>
                            <div class="service-card-shape">
                                <img src="{{asset('assets/img/service/service-shape.png')}}" alt="Images">
                            </div>
                        </div>
                    </div>
                @endforeach
                {{$services->links()}}
            </div>
        </div>
    </div>
@endsection
