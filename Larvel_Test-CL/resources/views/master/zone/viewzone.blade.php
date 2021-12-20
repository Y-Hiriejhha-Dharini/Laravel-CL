@extends('master.master')
@section('content')
<section class="container">
    <div>
        <a href="zoneform" class="btn btn-primary my-5">ADD ZONE</a>
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
    <h5 class="text-center my-4"><Strong>VIEW ZONE</Strong></h5>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <td>ZONE CODE</td>
                <td>ZONE LONG DESCRIPTION</td>
                <td>ZONE SHORT DESCRIPTION</td>
                <td>STATUS</td>
                <td>EDIT</td>
                <td>DELETE</td>
            </tr>
        </thead>
        @foreach ($data as $datas)
        <tbody>
            <td>{{$datas['zonecode']}}</td>
            <td>{{$datas['zoneldesc']}}</td>
            <td>{{$datas['zonesdesc']}}</td>
            <td>{{$datas['status']}}</td>
            <td><a class="btn btn-success" href="editzone/{{$datas['id']}}"><i class="fas fa-edit"></a></td>
            <td><a class="btn btn-danger" href="deletezone/{{$datas['id']}}"><i class="fas fa-trash-alt"></a></td>
        </tbody>
        @endforeach
    </table>
</section>

@endsection