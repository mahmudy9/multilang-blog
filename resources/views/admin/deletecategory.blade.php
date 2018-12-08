@extends('admin.layout')

@section('content')


<h3>Are you sure you want to delete category {{$cat->translate('en')->name}} ({{$cat->translate('ar')->name}})</h3>
<form action="{{url('/admin/category/destroy')}}" method="post" >
    @csrf
    @method('delete')
    <input type="hidden" name="categoryid" value="{{$cat->id}}" />
    <div class="form-group">
        <input type="submit" value="Delete Category" class="btn btn-danger" >
    </div>
    <div class="form-group">
        <a href="{{url('/admin/category')}}" class="btn btn-info">Dont Delete</a>
    </div>
</form>


@endsection