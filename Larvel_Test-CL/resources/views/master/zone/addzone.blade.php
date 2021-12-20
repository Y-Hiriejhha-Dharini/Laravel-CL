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
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <h5 class="text-center my-4"><Strong>ADD ZONE</Strong></h5>
    <form action="addzone" method="POST">
        @csrf
        <div class="form-group row my-2 mx-auto">
            <label for="zonecode" class="col-sm-5 col-form-label label">Zone Code</label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary" id="zonecode" name="zonecode" readonly placeholder="Automatically">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="zoneldesc" class="col-sm-5 col-form-label label">Zone Long Description</label>
            <div class="col-sm-3">
                <input type="text" class="form-control text-dark" id="zoneldesc" name="zoneldesc" placeholder="Ex.ZONE1">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="zonesdesc" class="col-sm-5 col-form-label label">Short Description</label>
            <div class="col-sm-3">
                <input type="text" class="form-control text-dark" id="zonesdesc" name="zonesdesc" placeholder="Ex.Z01">
            </div>
            <div class="col-sm-3">
                <input type="hidden" class="form-control text-dark" name="status">
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