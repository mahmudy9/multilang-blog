@extends('admin.layout')
@section('content')
@include('errors')
<form action="{{url('/admin/category/update')}}" method="POST" >
    @method('put')
    @csrf
    <input type="hidden" name="categoryid" value="{{$cat->id}}" />
    <div class="form-group">
        <label for="ar_name" >القسم بالعربية</label>
        <input type="text" class="form-control" name="ar_name" value="{{$cat->translate('ar')->name}}" >
    </div>

    <div class="form-group">
        <label for="en_name" >Category in English</label>
        <input type="text" class="form-control" name="en_name" value="{{$cat->translate('en')->name}}" >
    </div>

    <div class="form-group">
        <input type="submit"  class="btn btn-primary" value="تعديل القسم" >
    </div>
</form>
@endsection