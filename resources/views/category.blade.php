@extends('layout')

@section('style')
<style>
    body {
        background-image:url({{asset('images/1.jpg')}})
    }
</style>
@endsection

@section('content')

    <div class="container-fluid" >
        <h1 class="main-heading">اسم القسم</h1>

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <a class="fancybox-buttons img-holder small-img" rel="gallery" title="" data-fancybox-group="button" href="images/1.jpg">
                    <img src="images/1.jpg" alt="img">
                </a>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <a class="fancybox-buttons img-holder small-img" rel="gallery" title="" data-fancybox-group="button" href="images/2.jpg">
                    <img src="images/2.jpg" alt="img">
                </a>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <a class="fancybox-buttons img-holder small-img" rel="gallery" title="" data-fancybox-group="button" href="images/3.jpg">
                    <img src="images/3.jpg" alt="img">
                </a>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <a class="fancybox-buttons img-holder small-img" rel="gallery" title="" data-fancybox-group="button" href="images/1.jpg">
                    <img src="images/1.jpg" alt="img">
                </a>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <a class="fancybox-buttons img-holder small-img" rel="gallery" title="" data-fancybox-group="button" href="images/2.jpg">
                    <img src="images/2.jpg" alt="img">
                </a>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <a class="fancybox-buttons img-holder small-img" rel="gallery" title="" data-fancybox-group="button" href="images/3.jpg">
                    <img src="images/3.jpg" alt="img">
                </a>
            </div>
        </div>
    </div>

@endsection