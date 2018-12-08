@extends('layout')

@section('style')
<style>
    body {
        background-image:url({{asset('images/1.jpg')}})
    }
</style>
@endsection

@section('content')
    <div class="container">

        <h1 class="main-heading">{{__('main.ourservices')}} </h1>

        @foreach($services as $service)
        <div class="border-bottom">
        <h1><strong>{{$service->title}}</strong></h1>
            <p>{{$service->content}} </p>

        </div>
        @endforeach

    </div>

@endsection