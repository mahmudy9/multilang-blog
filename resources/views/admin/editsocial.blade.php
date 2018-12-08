@extends('admin.layout')
@section('content')

<h3>Edit Social Links</h3>

@include('errors')
@include('status')
<form action="{{url('/admin/social/update')}}" method="post">
    @csrf
    @method('put')
    <input type="hidden" name="socialid" value="{{$social->id}}">
    <div class="form-group">
        <label for="facebook">Facebook Profile</label>
    <input type="text" value="{{$social->facebook }}" name="facebook" class="form-control" />
    </div>
    <div class="form-group">
        <label for="twitter">Twitter Profile</label>
        <input type="text" value="{{$social->twitter }}" name="twitter" class="form-control" />
    </div>
    <div class="form-group">
        <label for="google">Googleplus Profile</label>
        <input type="text" value="{{$social->googleplus }}" name="googleplus" class="form-control" />
    </div>
    <div class="form-group">
        <label for="instagram">instagram Profile</label>
        <input type="text" value="{{$social->instagram }}" name="instagram" class="form-control" />
    </div>
    <div class="form-group">
        <label for="youtube">youtube Profile</label>
        <input type="text" value="{{$social->youtube }}" name="youtube" class="form-control" />
    </div>
    <div class="form-group">
        <label for="pinterest">pinterest Profile</label>
        <input type="text" value="{{$social->pinterest }}" name="pinterest" class="form-control" />
    </div>
    <div class="form-group">
        <input type="submit" value="Edit Socials" class="btn btn-primary">
    </div>
</form>



@endsection