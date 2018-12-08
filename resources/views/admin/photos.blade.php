@extends('admin.layout')

@section('content')

<h3>Photos for category {{$cat->translate('en')->name}} ({{$cat->translate('ar')->name}})</h3>
@include('errors')
@include('status')
<form enctype="multipart/form-data" action="{{url('/admin/photo/create')}}" method="post" >
    @csrf

    <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" class="form-control" name="photo">
    </div>
    <input type="hidden" name="categoryid" value="{{$cat->id}}" />
    <div class="form-group">
        <input type="submit" value="Add photo to category" class="btn btn-primary">    
    </div>    
</form>

<div class="card-deck row">
  @foreach($photos as $photo)
  <div class="card col-sm-4">
    <a href="{{url('/admin/photo/'.$photo->id)}} " target="_blank"><img class="card-img-top" width="200px" height="200px" src="{{asset('/storage/'.$photo->photo)}} " alt="Card image cap" /></a>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{url('/admin/photo/delete/'.$photo->id)}}" class="btn btn-danger" >Delete Photo</a>
            </div>
        </div>
    </div>
  </div>
  @endforeach
</div>

@endsection