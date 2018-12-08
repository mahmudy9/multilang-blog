@extends('admin.layout')

@section('content')

<h3>About Us</h3>

<form action="{{url('/admin/aboutus/create')}} " enctype="multipart/form-data" method="POST">
    @csrf
    <div class="form-group">
        <label for="ar_content">Arabic Content</label>
        <textarea name="ar_content" class="form-control"></textarea>

    </div>
    <div class="form-group">
        <label for="en_content">English Content</label>
        <textarea name="en_content" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="pdf">PDF</label>
        <input type="file" name="pdf" class="for-control">
    </div>
    <div class="form-group">
        <input type="submit" value="add about" class="btn btn-primary">
    </div>
    
</form>

@foreach($abouts as $about)

<h3>المحتوى بالعربية</h3>
<p> {{$about->translate('ar')->content}}</p>

<hr>

<h3>Content in English</h3>
<p> {{$about->translate('en')->content}}</p>
<hr>
<a href="{{url('/admin/aboutus/pdf/'.$about->id)}} " target="_blank" class="btn btn-info">PDF</a>
<hr>
<h3>status</h3>
<p>@if($about->active == 0) 
    Deactivated 
    @elseif($about->active == 1)
     Activated 
     @endif
    </p>
<hr>
<div class="row">
    <div class="col-sm-6">

        <a href="{{url('/admin/aboutus/activate/'.$about->id)}}" 
            class="btn btn-primary 
            @if($about->active == 1)
            disabled
            @endif
            " >Activate</a>
        </div>
        <div class="col-sm-6">
            <a href="{{url('/admin/aboutus/delete/'.$about->id)}}" class="btn btn-danger" >Delete About</a>
        </div>
    </div>
@endforeach

{{$abouts->links()}}
@endsection