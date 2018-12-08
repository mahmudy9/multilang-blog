@extends('admin.layout')


@section('content')
    <h3>لوحة التحكم</h3>
    <hr>
    <h3>Contacts</h3>

    <table class="table">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Activity</td>
            <td>Phone</td>
            <td>Email</td>
            <td>File</td>
            <td>PDF</td>
            <td>Delete</td>
        </tr>

        @foreach($contacts as $contact)
            <tr>
                <td>
                    {{$contact->id}}
                </td>
                <td>
                    {{$contact->name}}
                </td>
                <td>
                    {{$contact->activity}}
                </td>
                <td>
                    {{$contact->phone}}
                </td>
                <td>
                    {{$contact->email}}
                </td>
                <td>
                @if($contact->file != null)
                    <a href="{{url('/admin/contact/file/'.$contact->id)}}" class="btn btn-info">File</a>
                    @endif
                </td>
                <td>
                    <a href="{{url('/admin/contact/pdf/'.$contact->id)}}" class="btn btn-info" >PDF</a>
                </td>
                <td>
                    <a href="{{url('/admin/contact/delete/'.$contact->id)}}" class="btn btn-danger" >Delete</a>
                    
                </td>
            </tr>

        @endforeach

    </table>

@endsection