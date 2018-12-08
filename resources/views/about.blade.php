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

        <h1 class="main-heading">{{__('main.aboutus')}}</h1>

        <div class="text-center div-padding">
            <p>{{$about->content}} </p>

            <a href="{{asset('storage/'.$about->pdf)}}" target="_blank" class="btn btn-white margin"><span>{{__('main.downloadprofile')}}</span></a>
            <a href="{{url('/gallery')}} " class="btn btn-white margin"><span>{{__('main.showourwork')}}</span></a>
        </div>


        <div class="div-small-padding">
        <h1 class="main-heading">{{__('main.ourcustomers')}}</h1>

            <div class="row">
                <div class="col-xs-2 col-sm-1 no-padding text-center">
                    <a class="owl-btn prev-pro margin"><span class="fa fa-angle-right"></span></a>
                </div>

                <div class="col-xs-8 col-sm-10 no-padding">
                    <div id="owl-demo-products" class="owl-carousel-clients">
                        @foreach($customers as $customer)
                        <div class="item">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="images/logo-1.jpg">
                            <img src="{{asset('storage/'.$customer->photo)}}" alt="img">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-xs-2 col-sm-1 no-padding text-center">
                    <a class="owl-btn next-pro margin"><span class="fa fa-angle-left"></span></a>
                </div>

</div>
@endsection