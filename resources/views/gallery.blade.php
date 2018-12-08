@extends('layout')

@section('style')
<style>
    body {
        background-image:url({{asset('images/1.jpg')}})
    }
</style>
@endsection

@section('content')
    <div class="container-fluid">

        <h1 class="main-heading">{{__('main.ourwork')}} </h1>

        <div class="row">
            @foreach($datas as $data)
            <div class="col-xs-12 col-sm-6 col-md-4 no-padding">
                <a href="{{url('category/'.$data['id'])}} " class="img-holder">
                    <img src="{{asset('storage/'.$data['photo'])}} " alt="...">

                    <div class="hover-content">
                        <h1>{{$data['name']}} </h1>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
</div>


@endsection