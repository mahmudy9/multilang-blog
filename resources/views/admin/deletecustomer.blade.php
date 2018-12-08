@extends('admin.layout')

@section('content')

<h3>Are you sure you want to delete customer</h3>

<form action="{{url('/admin/customer/destroy')}} " method="POST">
    @csrf
    @method('delete')
    <input type="submit" class="btn btn-danger" value="Delete Customer" />
    <hr>
<input type="hidden" name="customerid" value="{{$customer->id}}" >
<a href="{{url('/admin/customer')}}" class="btn btn-info" >Dont delete</a>
</form>


@endsection