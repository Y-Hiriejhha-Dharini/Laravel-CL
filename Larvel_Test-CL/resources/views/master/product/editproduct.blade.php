@extends('master.master')
@section('content')
<section class="container justify-content">
    <div>
        <a href="{{url('viewproduct')}}" class="btn btn-primary m-5">VIEW PRODUCT</a>
    </div>

    <h5 class="text-center my-4"><Strong>EDIT PRODUCT</Strong></h5>
    <form action="{{url('editproduct')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="form-group row my-2 mx-auto">
            <label for="skuid" class="col-sm-5 col-form-label label">SKU ID<span class="text-light">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary outline-secondary" id="skuid" name="skuid" value="{{$data->skuid}}">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="skucode" class="col-sm-5 col-form-label label">SKU Code<span class="text-danger">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary outline-secondary" id="skucode" name="skucode" value="{{$data->skucode}}">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="skuname" class="col-sm-5 col-form-label label">SKU Name<span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control text-secondary outline-secondary" id="skuname" name="skuname" value="{{$data->skuname}}">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="mrp" class="col-sm-5 col-form-label label">MRP<span class="text-danger">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary outline-secondary" id="mrp" name="mrp" value="{{$data->mrp}}">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="distributorprice" class="col-sm-5 col-form-label label">Distributor Price<span class="text-danger">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary outline-secondary" id="distributorprice" name="distributorprice" value="{{$data->distributorprice}}">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="weightvolumn" class="col-sm-5 col-form-label label">Weight/Volumn<span class="text-danger">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary outline-secondary" id="weightvolumn" name="weightvolumn" value="{{$data->weightvolumn}}">
            </div>
            <div class="col-sm-1">
                <select class="form-select drop" name="uom" aria-label="Default select example" required>
                    <option value="{{$data->uom}}">{{$data->uom}}</option>
                    <option value="Kg">Kg</option>
                    <option value="cm">cm</option>
                    <option value="m">m</option>
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <input type="hidden" class="form-control text-dark" name="status">
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