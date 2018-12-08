@extends('admin.layout')

@section('content')

<h3>Are you sure you want to delete photo</h3>

<form action="{{url('/admin/photo/destroy')}} " method="POST">
    @csrf
    @method('delete')
    <input type="submit" class="btn btn-danger" value="delete photo" />
    <hr>
<input type="hidden" name="photoid" value="{{$photo->id}}" >
<a href="{{url('/admin/photo/'.$photo->category->id)}}" class="btn btn-info" >Dont delete</a>
</form>


@endsection