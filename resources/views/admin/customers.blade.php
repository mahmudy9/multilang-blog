@extends('admin.layout')

@section('content')

<h3>Customers</h3>
<hr>
@include('errors')
@include('status')
<form action="{{url('/admin/customer/create')}} " enctype="multipart/form-data" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" />
    </div>
    <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" name="photo" class="form-control">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Add Customer" />
    </div>
</form>

<div class="card-deck row">
@foreach($customers as $customer)
  <div class="card col-sm-4">
  <img class="card-img-top" src="{{asset('storage/'.$customer->photo)}}" width="200px" height="200px" alt="Card image cap">
    <div class="card-body">
    <h5 class="card-title">{{$customer->name}}</h5>
    <a href="{{url('/admin/customer/delete/'.$customer->id)}}" class="btn btn-danger" >Delete</a>
    </div>
    </div>

@endforeach

{{$customers->links()}}

@endsection