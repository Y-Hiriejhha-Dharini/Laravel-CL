@extends('master.master')
@section('content')
<section class="container justify-content">
    <div>
        <a href="{{url('viewuser')}}" class="btn btn-primary m-5">VIEW USER</a>
    </div>

    <h5 class="text-center my-4"><Strong>EDIT USER</Strong></h5>
    <form action="{{url('edituser')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="form-group row my-2 mx-auto">
            <label for="name" class="col-sm-5 col-form-label label">Name<span class="text-danger">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary outline-secondary" id="name" name="name" value="{{$data->name}}">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="nic" class="col-sm-5 col-form-label label">NIC<span class="text-danger">*</span></label>
            <div class="col-sm-3">
                <input type="text" class="form-control text-secondary outline-secondary" id="nic" name="nic" value="{{$data->nic}}">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="address" class="col-sm-5 col-form-label label">Address<span class="text-danger">*</span></label>
            <div class="col-sm-5">
                <input type="text" class="form-control text-secondary outline-secondary" id="address" name="address" value="{{$data->address}}">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="mobile" class="col-sm-5 col-form-label label">Mobile<span class="text-danger">*</span></label>
            <div class="col-sm-3">
                <input type="text" class="form-control text-secondary outline-secondary" id="mobile" name="mobile" value="{{$data->mobile}}">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="email" class="col-sm-5 col-form-label label">E-Mail<span class="text-light">*</span></label>
            <div class="col-sm-3">
                <input type="text" class="form-control text-secondary outline-secondary" id="email" name="email" value="{{$data->email}}">
            </div>
        </div>
        <div class="dropdown form-group row my-2 mx-auto">
            <label for="gender" class="col-sm-5 col-form-label label">Gender<span class="text-light">*</span></label>
            <div class="col-sm-2">
                <select class="form-select drop" name="gender" aria-label="Default select example">
                    <option selected>{{$data->gender}}</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>
        <div class="dropdown form-group row my-2 mx-auto">
            <label for="territorycode" class="col-sm-5 col-form-label label">Territory<span class="text-danger">*</span></label>
            <div class="col-sm-2">
                <select class="form-select drop" name="territorycode" aria-label="Default select example" required>
                    <option value="{{$data->territorycode}}" selected>{{$data->territorycode}}</option>
                    @foreach ($territory as $territories)
                    <option value="{{$territories['territorycode']}}">{{$territories['territorycode']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="username" class="col-sm-5 col-form-label label">User Name<span class="text-danger">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-secondary outline-secondary" id="username" name="username" value="{{$data->username}}">
            </div>
        </div>
        <div class="form-group row my-2 mx-auto">
            <label for="password" class="col-sm-5 col-form-label label">Password<span class="text-danger">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-dark" id="password" name="password">
            </div>
            <div class="col-sm-3">
                <input type="hidden" class="form-control text-dark" name="status" value="{{$data->status}}">
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