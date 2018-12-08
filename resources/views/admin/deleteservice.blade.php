@extends('admin.layout')

@section('content')

<h3>Are you sure you want to delete service</h3>

<form action="{{url('/admin/service/destroy')}} " method="POST">
    @csrf
    @method('delete')
    <input type="submit" class="btn btn-danger" value="delete service" />
    <hr>
<input type="hidden" name="serviceid" value="{{$service->id}}" >
<a href="{{url('/admin/service')}}" class="btn btn-info" >Dont delete</a>
</form>


@endsection