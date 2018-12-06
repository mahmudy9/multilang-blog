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

    <h1 class="main-heading">{{__('contact.contactus')}}</h1>

        <div class="row">
            <div class="col-xs-12 col-sm-8">
                @include('errors')
                @include('status')
            <form method="post" action="{{url('/contactus')}}" >
                    @csrf
                    <input type="text" name="name" placeholder="{{__('contact.formname')}}">
            <input type="text" name="activity" placeholder="{{__('contact.formactivity')}}">
                    <input type="tel" name="phone" placeholder="{{__('contact.formphone')}}">
                    <input type="email" name="email" placeholder="{{__('contact.formemail')}}">


                    <label>{{__('contact.formtype')}}</label>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="box black-box margin-bottom">
                                <div class="main-label">
                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.photography')}}</span>
                                    </label>
                                </div>


                                <div class="check-open">

                                    <label class="checkbox-holder">
                                        <input name="photo[]" value="{{__('contact.food')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.food')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="photo[]" value="{{__('contact.furniture')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.furniture')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="photo[]" value="{{__('contact.hotels')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.hotels')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="photo[]" value="{{__('contact.estate')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.estate')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="photo[]" value="{{__('contact.electronics')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.electronics')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="photo[]" value="{{__('contact.people')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.people')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="photo[]" value="{{__('contact.party')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.party')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="photo[]" value="{{__('contact.others')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.others')}}</span>
                                    </label>

                                    <input type="text" placeholder="">

                                    <label>{{__('contact.photosnum')}}</label>
                                    <input name="photo[]" type="number" placeholder="{{__('contact.photosnum')}}">

                                    <label class="checkbox-holder">
                                        <input name="photo[]" value="{{__('contact.emptybg')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.emptybg')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="photo[]" value="{{__('contact.complexbg')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.complexbg')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="photo[]" value="{{__('contact.naturalshooting')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.naturalshooting')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="photo[]" value="{{__('contact.peopleshooting')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.peopleshooting')}}</span>
                                    </label>

                                </div>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="box black-box margin-bottom">
                                <div class="main-label">
                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.cinema')}}</span>
                                    </label>
                                </div>


                                <div class="check-open">

                                    <label class="checkbox-holder">
                                        <input name="cinema[]" value="{{__('contact.food')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.food')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="cinema[]" value="{{__('contact.furniture')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.furniture')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="cinema[]" value="{{__('contact.hotels')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.hotels')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="cinema[]" value="{{__('contact.estate')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.estate')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="cinema[]" value="{{__('contact.electronics')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.electronics')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="cinema[]" value="{{__('contact.people')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.people')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="cinema[]" value="{{__('contact.party')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.party')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="cinema[]" value="{{__('contact.others')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.others')}}</span>
                                    </label>

                                    <input type="text" placeholder="">

                                    <label>{{__('contact.photosnum')}}</label>
                                    <input name="cinema[]" type="number" placeholder="{{__('contact.photosnum')}}">

                                    <label class="checkbox-holder">
                                        <input name="cinema[]" value="{{__('contact.emptybg')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.emptybg')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="cinema[]" value="{{__('contact.complexbg')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.complexbg')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="cinema[]" value="{{__('contact.naturalshooting')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.naturalshooting')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="cinema[]" value="{{__('contact.peopleshooting')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.peopleshooting')}}</span>
                                    </label>

                                </div>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="box black-box margin-bottom">
                                <div class="main-label">
                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.graphicdesign')}}</span>
                                    </label>
                                </div>


                                <div class="check-open">

                                    <label class="checkbox-holder">
                                        <input name="gd[]" value="{{__('contact.food')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.food')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="gd[]" value="{{__('contact.furniture')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.furniture')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="gd[]" value="{{__('contact.hotels')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.hotels')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="gd[]" value="{{__('contact.estate')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.estate')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="gd[]" value="{{__('contact.electronics')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.electronics')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="gd[]" value="{{__('contact.people')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.people')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="gd[]" value="{{__('contact.party')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.party')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="gd[]" value="{{__('contact.others')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span> {{__('contact.others')}}</span>
                                    </label>

                                    <input type="text" placeholder="">

                                    <label>{{__('contact.photosnum')}}</label>
                                    <input name="gd[]" type="number" placeholder="{{__('contact.photosnum')}}">

                                    <label class="checkbox-holder">
                                        <input name="gd[]" value="{{__('contact.emptybg')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.emptybg')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="gd[]" value="{{__('contact.complexbg')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.complexbg')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="gd[]" value="{{__('contact.naturalshooting')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.naturalshooting')}}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input name="gd[]" value="{{__('contact.peopleshooting')}}" type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>{{__('contact.peopleshooting')}}</span>
                                    </label>

                                </div>
                            </div>
                        </div>
                    </div>


                    <label>{{__('contact.attachfile')}}</label>
                    <input name="file" type="file" placeholder="{{__('contact.attachfile')}}">
                    <div class="btn btn-white btn-block">
                        <span><input type="submit" value="{{__('contact.send')}}"></span>
                    </div>
                </form>
            </div>

            <div class="col-xs-12 col-sm-4">
                <div class="box black-box text-center">
                    <h3 class="main-heading">{{__('contact.contactdetails')}}</h3>

                    <p><i class="fa fa-envelope-o right-fa"></i> Info@pmstu.com</p>
                    <p><i class="fa fa-phone right-fa"></i> 0123456789</p>
                </div>
                <div class="box black-box text-center">
                    <h3 class="main-heading">{{__('contact.subscribe')}}</h3>

                    
                <form action="{{url('/subscribe')}}" method="post" >
                    @csrf
                        <input type="email" name="email" placeholder="{{__('contact.youremail')}}">
                        <div class="btn btn-white btn-block">
                            <span><input type="submit" value="{{__('contact.subscribe')}}"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

@endsection