@extends('master.master')
@section('content')
<section class="container justify-content">
    <div>
        <a href="{{url('viewterritory')}}" class="btn btn-primary m-5">VIEW TERRITORY</a>
        <div class="text-end">
            <small><Strong>Welcome System Admin</Strong></small><br>
            <small>{{date("l, d F Y h:i a")}}</small>
        </div>
    </div>

    <h5 class="text-center my-4"><Strong>EDIT TERRITORY</Strong></h5>
    <form action="{{url('editterritory')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="dropdown form-group row my-2 mx-auto">
            <label for="zonecode" class="col-sm-5 col-form-label label">Zone</label>
            <div class="col-sm-2">
                <select class="form-select drop" name="zonecode" aria-label="Default select example">
                    <option value="{{$data->zonecode}}" selected>{{$data->zonecode}}</option>
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
                    <option value="{{$data->regioncode}}" selected>{{$data->regioncode}}</option>
                    @foreach ($region as $regions)
                    <option value="{{$regions['regioncode']}}">{{$regions['regioncode']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="territorycode" class="col-sm-5 col-form-label label">Territory Code</label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary outline-secondary" id="territorycode" name="territorycode" value="{{$data->territorycode}}">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="territoryname" class="col-sm-5 col-form-label label">Territory Name</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="territorycode" name="territoryname" value="{{$data->territoryname}}">
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