@extends('admin.layout')


@section('content')

<h3>Update Password</h3>
<hr>
@include('status')
@include('errors')
<form action="{{url('/admin/password/update')}}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="old_password">Old Password</label>
        <input type="password" name="old_password" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">New Password</label>
        <input type="password"  name="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" value="update password" class="btn btn-primary">
    </div>
</form>


@endsection