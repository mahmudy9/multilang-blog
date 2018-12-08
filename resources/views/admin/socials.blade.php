@extends('admin.layout')

@section('content')
<h3>Social Links</h3>
@include('errors')
@include('status')
<form action="{{url('/admin/social/create')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="facebook">Facebook Profile</label>
        <input type="text" name="facebook" class="form-control" />
    </div>
    <div class="form-group">
        <label for="twitter">Twitter Profile</label>
        <input type="text" name="twitter" class="form-control" />
    </div>
    <div class="form-group">
        <label for="google">Googleplus Profile</label>
        <input type="text" name="googleplus" class="form-control" />
    </div>
    <div class="form-group">
        <label for="instagram">instagram Profile</label>
        <input type="text" name="instagram" class="form-control" />
    </div>
    <div class="form-group">
        <label for="youtube">youtube Profile</label>
        <input type="text" name="youtube" class="form-control" />
    </div>
    <div class="form-group">
        <label for="pinterest">pinterest Profile</label>
        <input type="text" name="pinterest" class="form-control" />
    </div>
    <div class="form-group">
        <input type="submit" value="Create Socials" class="btn btn-primary">
    </div>
</form>

<table class="table">
    <tr>
        <td>
            <small>Facebook</small>
        </td>
        <td>
            <small>Twitter</small>
        </td>
        <td>
            <small>Google plus</small>
        </td>
        <td>
            <small>Instagram</small>
        </td>
        <td>
            <small>Youtube</small>
        </td>
        <td>
            <small>Pinterest</small>
        </td>
        <td>
            <small>Edit</small>
        </td>
        <td>
            <small>Delete</small>
        </td>
        <td>
            <small>Activate</small>
        </td>
    </tr>

    @foreach($socials as $social)

        <tr>
        <td>
           <small> <a href="{{$social->facebook}}">Facebook</a> </small>
        </td>
        <td>
           <small><a href="{{$social->twitter}}">Twitter</a></small>
        </td>
        <td>
           <small> <a href="{{$social->googleplus}}">Google+</a></small>
        </td>
        <td>
           <small> <a href="{{$social->instagram}}">Instagram</a></small>
        </td>
        <td>
           <small> <a href="{{$social->youtube}}">Youtube</a></small>
        </td>
        <td>
        <small><a href="{{$social->pinterest}}">Pinterest</a></small>
        </td>
        <td>
            <small><a href="{{url('/admin/social/edit/'.$social->id)}}" class="btn btn-info">Edit</a></small>
        </td>
        <td>
           <small><a href="{{url('/admin/social/delete/'.$social->id)}}" class="btn btn-danger">Delete</a></small>
        </td>
        <td>
            <small><a href="{{url('/admin/social/activate/'.$social->id)}}" class="btn btn-primary 
                @if($social->active == 1)
                disabled
                @endif
                "> Activate</a></small>
        </td>
    </tr>

    @endforeach

</table>
{{$socials->links()}}
@endsection