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
    <h1 class="main-heading">{{$cat->name}}</h1>

        <div class="row">

            @foreach($photos as $photo)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <a class="fancybox-buttons img-holder small-img" rel="gallery" title="" data-fancybox-group="button" href="{{asset('storage/'.$photo->photo)}}">
                    <img src="{{asset('storage/'.$photo->photo)}}" alt="img">
                </a>
                    <div class="row">
                        <div class="col-sm-4">

                            <div class="fb-share-button" data-href="http://localhost:8000/storage/{{$photo->photo}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" class="fb-xfbml-parse-ignore">Share</a></div>
                        </div>
                        <div class="col-sm-4">
                              <a target="_blank" href="https://twitter.com/intent/tweet?text={{url('storage/'.$photo->photo)}}" class="btn btn-tw btn-small"><i class="fa fa-twitter right-fa"></i> Share</a>
                        </div>
                        <div class="col-sm-4">
                            <a href="#" class="btn btn-inst btn-small"><i class="fa fa-instagram right-fa"></i> Share</a>
                        </div>
                    </div>
            </div>
            @endforeach

        </div>
    </div>

@endsection

@section('script')


           <script>
    $(document).ready(function (){
        /*Button helper. Disable animations, hide close button, change title type and content*/

        $('.fancybox-buttons').fancybox({
            openEffect  : 'none',
            closeEffect : 'none',

            prevEffect : 'none',
            nextEffect : 'none',

            closeBtn  : false,

            helpers : {
                title : {
                    type : 'inside'
                },
                buttons	: {}
            },

            afterLoad : function() {
                this.title = '<a href="#" class="btn btn-fb btn-small"><i class="fa fa-facebook right-fa"></i> Share</a>' +
                        '<a href="#" class="btn btn-tw btn-small"><i class="fa fa-twitter right-fa"></i> Share</a>' +
                        '<a href="#" class="btn btn-inst btn-small"><i class="fa fa-instagram right-fa"></i> Share</a>';
            }
        });


    });
</script>

@endsection