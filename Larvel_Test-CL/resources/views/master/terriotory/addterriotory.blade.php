@extends('master.master')
@section('content')
<section class="container justify-content">
    <div>
        <a href="viewterritory" class="btn btn-primary m-5">VIEW TERRITORY</a>
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

    <h5 class="text-center my-4"><Strong>ADD TERRITORY</Strong></h5>
    <form action="addterritory" method="POST">
        @csrf
        <div class="dropdown form-group row my-2 mx-auto">
            <label for="zonecode" class="col-sm-5 col-form-label label">Zone</label>
            <div class="col-sm-2">
                <select class="form-select drop" name="zonecode" aria-label="Default select example">
                    <option value="null" selected>Select</option>
                    @foreach ($zone as $zones)
                    <option value="{{$zones['zonecode']}}">{{$zones['zonecode']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="dropdown form-group row my-2 mx-auto">
            <label for="regioncode" class="col-sm-5 col-form-label label">Region</label>
            <div class="col-sm-2">
                <select class="form-select drop" name="regioncode" aria-label="Default select example">
                    <option selected>Select</option>
                    @foreach ($data as $datas)
                    <option value="{{$datas['regioncode']}}">{{$datas['regioncode']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="territorycode" class="col-sm-5 col-form-label label">Territory Code</label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary outline-secondary" id="territorycode" name="territorycode" readonly placeholder="Automatically">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="territoryname" class="col-sm-5 col-form-label label">Territory Name</label>
            <div class="col-sm-3">
                <input type="text" class="form-control text-dark" id="territorycode" name="territoryname" placeholder="Ex.TERRITORY 1">
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