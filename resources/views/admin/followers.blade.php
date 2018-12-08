@extends('admin.layout')

@section('content')


<h3>Send Message to Followers</h3>
<hr>
@include('errors')
@include('status')
<form action="{{url('/admin/follower/sendmsg')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="body">Message Body</label>
    <textarea name="body" class="form-control" id="" cols="30" rows="10">{{old('body')}}</textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Send Message">
    </div>
</form>

<table class="table">

    <tr>
        <td>ID</td>
        <td>Email</td>
        <td>Created at</td>
        <td>Delete</td>
    </tr>
    @foreach($followers as $follower)
    <tr>
    <td>{{$follower->id}}</td>
    <td>{{$follower->email}}</td>
    <td>{{$follower->created_at}}</td>
        <td><a href="{{url('/admin/follower/delete/'.$follower->id)}}" class="btn btn-danger">Delete</a> </td>
</tr>
    @endforeach
</table>

@endsection