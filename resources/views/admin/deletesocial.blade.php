@extends('admin.layout')

@section('content')

<h3>Are you sure you want to delete Social links</h3>

<form action="{{url('/admin/social/destroy')}} " method="POST">
    @csrf
    @method('delete')
    <input type="submit" class="btn btn-danger" value="delete Social links" />
    <hr>
<input type="hidden" name="socialid" value="{{$social->id}}" >
<a href="{{url('/admin/social')}}" class="btn btn-info" >Dont delete</a>
</form>


@endsection