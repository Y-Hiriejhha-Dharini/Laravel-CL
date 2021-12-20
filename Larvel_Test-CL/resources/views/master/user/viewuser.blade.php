@extends('master.master')
@section('content')
<section class="container">
    <div>
        <a href="userform" class="btn btn-primary my-5">ADD USER</a>
        <a href="home" class="btn btn-warning ">BACK HOME</a>
        <div class="text-end">
            <small><Strong>Welcome System Admin</Strong></small><br>
            <small>{{date("l, d F Y h:i a")}}</small>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <h5 class="text-center my-4"><Strong>VIEW USER</Strong></h5>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <td>Name</td>
                <td>NIC</td>
                <td>ADDRESS</td>
                <td>MOBILE</td>
                <td>E-MAIL</td>
                <td>GENDER</td>
                <td>TERRITORY</td>
                <td>USERNAME</td>
                <td>STATUS</td>
                <td>EDIT</td>
                <td>DELETE</td>
            </tr>
        </thead>
        @foreach ($data as $datas)
        <tbody>
            <td>{{$datas['name']}}</td>
            <td>{{$datas['nic']}}</td>
            <td>{{$datas['address']}}</td>
            <td>{{$datas['mobile']}}</td>
            <td>{{$datas['email']}}</td>
            <td>{{$datas['gender']}}</td>
            <td>{{$datas['territorycode']}}</td>
            <td>{{$datas['username']}}</td>
            <td>{{$datas['status']}}</td>
            <td><a class="btn btn-success" href="edituser/{{$datas['id']}}"><i class="fas fa-edit"></a></td>
            <td><a class="btn btn-danger" href="deleteuser/{{$datas['id']}}"><i class="fas fa-trash-alt"></a></td>
        </tbody>
        @endforeach
    </table>
</section>

@endsection