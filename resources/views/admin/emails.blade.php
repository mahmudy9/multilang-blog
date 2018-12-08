@extends('admin.layout')

@section('content')


<h3>Emails</h3>
@include('status')
<hr>

@foreach($emails as $email)

<h4>{{$email->id}} Email Body</h4>
<p>{{$email->body}}</p>
<br>
<a href="{{url('/admin/email/delete/'.$email->id)}}" class="btn btn-danger">Delete</a>
<hr>

@endforeach
@endsection