@extends('admin.layout')

@section('content')

<h3>Are you sure you want to delete email {{$email->id}}</h3>

<form action="{{url('/admin/email/destroy')}} " method="POST">
    @csrf
    @method('delete')
    <input type="submit" class="btn btn-danger" value="Delete email" />
    <hr>
<input type="hidden" name="emailid" value="{{$email->id}}" >
<a href="{{url('/admin/email')}}" class="btn btn-info" >Dont delete</a>
</form>


@endsection