@extends('admin.layout')

@section('content')

<h3>Are you sure you want to delete follower {{$follower->email}}</h3>

<form action="{{url('/admin/follower/destroy')}} " method="POST">
    @csrf
    @method('delete')
    <input type="submit" class="btn btn-danger" value="Delete follower" />
    <hr>
<input type="hidden" name="followerid" value="{{$follower->id}}" >
<a href="{{url('/admin/follower')}}" class="btn btn-info" >Dont delete</a>
</form>


@endsection