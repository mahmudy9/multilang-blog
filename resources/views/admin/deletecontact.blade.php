@extends('admin.layout')

@section('content')

<h3>Are you sure you want to delete contact</h3>

<form action="{{url('/admin/contact/destroy')}} " method="POST">
    @csrf
    @method('delete')
    <input type="submit" class="btn btn-danger" value="delete Contact" />
    <hr>
<input type="hidden" name="contactid" value="{{$contact->id}}" >
<a href="{{url('/admin')}}" class="btn btn-info" >Dont delete</a>
</form>


@endsection