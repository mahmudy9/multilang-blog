@extends('admin.layout')


@section('content')

<h2>الأقسام</h2>
@include('status')
<form action="{{url('/admin/category/create')}}" method="POST" >
    @csrf
    <div class="form-group">
        <label for="ar_name" >القسم بالعربية</label>
        <input type="text" class="form-control" name="ar_name" >
    </div>

    <div class="form-group">
        <label for="en_name" >Category in English</label>
        <input type="text" class="form-control" name="en_name" >
    </div>

    <div class="form-group">
        <input type="submit"  class="btn btn-primary" value="أضف القسم" >
    </div>
</form>
<br>
<hr>
<table class="table">
<tr>
<td>ID</td>
<td>Arabic Name</td>
<td>English Name</td>
<td>Details</td>
<td>Edit</td>
<td>Delete</td>
</tr>
    @foreach($cats as $cat)
        <td>{{$cat->id}}</td>
        <td>{{$cat->translate('ar')->name}}
        <td>{{$cat->translate('en')->name}} </td>
        <td><a href="{{url('admin/category/'.$cat->id)}}" class="btn btn-primary" >
        Details</a> </td>
        <td><a href="{{url('admin/category/edit/'.$cat->id)}}" class="btn btn-info" >Edit</a></td>
        <td><a href="{{url('admin/category/delete/'.$cat->id)}}" class="btn btn-danger" >Delete</a></td>
        
    @endforeach
</table>
@endsection