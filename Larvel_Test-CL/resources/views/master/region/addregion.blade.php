@extends('master.master')
@section('content')
<section class="container justify-content">
    <div>
        <a href="viewregion" class="btn btn-primary m-5">VIEW REGION</a>
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

    <h5 class="text-center my-4"><Strong>ADD REGION</Strong></h5>
    <form action="addregion" method="POST">
        @csrf
        <div class="dropdown form-group row my-2 mx-auto">
            <label for="zonecode" class="col-sm-5 col-form-label label">Zone Code</label>
            <div class="col-sm-2">
                <select class="form-select drop" name="zonecode" aria-label="Default select example">
                    <option value="null" selected>Select</option>
                    @foreach ($data as $datas)
                    <option value="{{$datas['zonecode']}}">{{$datas['zonecode']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="regioncode" class="col-sm-5 col-form-label label">Region Code</label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary outline-secondary" id="regioncode" name="regioncode" readonly placeholder="Automatically">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="regionname" class="col-sm-5 col-form-label label">Region Name</label>
            <div class="col-sm-3">
                <input type="text" class="form-control text-dark" id="regionname" name="regionname" placeholder="Ex.REGION 1">
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