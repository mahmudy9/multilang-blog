@extends('admin.layout')

@section('content')


<h3>Our Services</h3>
<hr>
@include('errors');
@include('status')
<form action="{{url('/admin/service/create')}}" method="post">
    @csrf
<div class="form-group">
    <label for="ar_title">Arabic Title</label>
    <input type="text" name="ar_title" class="form-control">
</div>
<div class="form-group">
    <label for="en_title">English Title</label>
    <input type="text" name="en_title" class="form-control">
</div>
<div class="form-group">
    <label for="ar_content">Arabic Content</label>
    <textarea name="ar_content" id="" cols="30" rows="10" class="form-control"></textarea>
</div>
<div class="form-group">
    <label for="en_content">English Content</label>
    <textarea name="en_content" id="" cols="30" rows="10" class="form-control"></textarea>
</div>
<div class="form-group">
    <input type="submit" value="Create Service" class="btn btn-primary">
</div>

</form>
<hr>

@foreach($services as $service)

<h3>عنوان الخدمة</h3>
<p>{{$service->translate('ar')->title}}</p>

<hr>

<h3>Service title</h3>
<p>{{$service->translate('en')->title}}</p>
<hr>
<h3>محتوى الخدمة</h3>
<p>{{$service->translate('ar')->content}}</p>
<h3>Service content</h3>
<p>{{$service->translate('en')->content}}</p>
<hr>
<a href="{{url('/admin/service/delete/'.$service->id)}}" class="btn btn-danger">Delete service</a>
<hr>
@endforeach

@endsection