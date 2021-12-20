@extends('master.master')
@section('content')
<section class="container justify-content">
    <div>
        <a href="{{url('viewzone')}}" class="btn btn-primary m-5">VIEW ZONE</a>
        <div class="text-end">
            <small><Strong>Welcome System Admin</Strong></small><br>
            <small>{{date("l, d F Y h:i a")}}</small>
        </div>
    </div>

    <h5 class="text-center my-4"><Strong>EDIT ZONE</Strong></h5>
    <form action="{{url('editzone')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="form-group row my-2 mx-auto">
            <label for="zonecode" class="col-sm-5 col-form-label label">Zone Code</label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary" id="zonecode" name="zonecode" value="{{$data->zonecode}}">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="zoneldesc" class="col-sm-5 col-form-label label">Zone Long Description</label>
            <div class="col-sm-3">
                <input type="text" class="form-control text-dark" id="zoneldesc" name="zoneldesc" value="{{$data->zoneldesc}}">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="zonesdesc" class="col-sm-5 col-form-label label">Short Description</label>
            <div class="col-sm-3">
                <input type="text" class="form-control text-dark" id="zonesdesc" name="zonesdesc" value="{{$data->zonesdesc}}">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label class="col-sm-5 col-form-label"></label>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-success">SAVE</button>
            </div>
        </div>
    </form>
</section>
@endsection