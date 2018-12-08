@extends('admin.layout')

@section('content')

<h3>Are you sure you want to delete photo</h3>

<form action="{{url('/admin/aboutus/destroy')}} " method="POST">
    @csrf
    @method('delete')
    <input type="submit" class="btn btn-danger" value="delete about" />
    <hr>
<input type="hidden" name="aboutid" value="{{$about->id}}" >
<a href="{{url('/admin/aboutus')}}" class="btn btn-info" >Dont delete</a>
</form>


@endsection