@extends('admin.layout')


@section('content')

<h3>Update Password</h3>
<hr>
@include('status')
@include('errors')
<form action="{{url('/admin/profile/update')}}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{$user->name}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email"  name="email" value="{{$user->email}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" value="{{$user->phone}}" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" value="update profile" class="btn btn-primary">
    </div>
</form>


@endsection