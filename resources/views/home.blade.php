@extends('layout')

@section('carousel')
    <div class="col-sm-12">

    
<div id="owl-demo" class="owl-carousel owl-theme">

    <div class="item"><img src="{{asset('images/1.jpg')}}" alt="..."></div>
    <div class="item"><img src="{{asset('images/2.jpg')}}" alt="..."></div>
    <div class="item"><img src="{{asset('images/3.jpg')}}" alt="..."></div>

</div>

<div class="hidden">
    <a class="btn owl-btn next"><span class="fa fa-angle-right"></span></a>
    <a class="btn owl-btn prev"><span class="fa fa-angle-left"></span></a>
</div>
</div>

@endsection