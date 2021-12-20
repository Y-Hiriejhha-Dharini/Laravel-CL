@extends('master.master')
@section('content')
<section class="container justify-content">
    <div>
        <a href="viewproduct" class="btn btn-primary m-4">VIEW PRODUCT</a>
    </div>
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <h5 class="text-center my-4"><Strong>ADD PRODUCT</Strong></h5>
    <form action="addproduct" method="POST">
        @csrf
        <div class="form-group row my-2 mx-auto">
            <label for="skuid" class="col-sm-5 col-form-label label">SKU ID<span class="text-light">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary outline-secondary" id="skuid" name="skuid" readonly placeholder="Automatically">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="skucode" class="col-sm-5 col-form-label label">SKU Code<span class="text-danger">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary outline-secondary" id="skucode" name="skucode" required>
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="skuname" class="col-sm-5 col-form-label label">SKU Name<span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control text-secondary outline-secondary" id="skuname" name="skuname" required placeholder="Main Product Name/Auto">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="mrp" class="col-sm-5 col-form-label label">MRP<span class="text-danger">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary outline-secondary" id="mrp" name="mrp" required>
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="distributorprice" class="col-sm-5 col-form-label label">Distributor Price<span class="text-danger">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary outline-secondary" id="distributorprice" name="distributorprice">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="weightvolumn" class="col-sm-5 col-form-label label">Weight/Volumn<span class="text-danger">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary outline-secondary" id="weightvolumn" name="weightvolumn">
            </div>
            <div class="col-sm-1">
                <select class="form-select drop" name="uom" aria-label="Default select example" required>
                    <option value="null"> </option>
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