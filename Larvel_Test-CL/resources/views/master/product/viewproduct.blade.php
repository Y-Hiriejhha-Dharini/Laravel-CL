@extends('master.master')
@section('content')
<section class="container">
    <div>
        <a href="productform" class="btn btn-primary my-5">ADD PRODUCT</a>
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
    <h5 class="text-center my-4"><Strong>VIEW PRODUCT</Strong></h5>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>SKU ID</th>
                <th>SKU CODE</th>
                <th>SKU NAME</th>
                <th>MRP</th>
                <th>DISTRIBUTOR PRICE</th>
                <th>WEIGHT/ VOLUME</th>
                <th>UOM</th>
                <th>STATUS</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        @foreach ($data as $datas)
        <tbody>
            <td>{{$datas['skuid']}}</td>
            <td>{{$datas['skucode']}}</td>
            <td>{{$datas['skuname']}}</td>
            <td>{{$datas['mrp']}}</td>
            <td>{{$datas['distributorprice']}}</td>
            <td>{{$datas['weightvolumn']}}</td>
            <td>{{$datas['uom']}}</td>
            <td>{{$datas['status']}}</td>
            <td><a class="btn btn-success" href="editproduct/{{$datas['id']}}"><i class="fas fa-edit"></a></td>
            <td><a class="btn btn-danger" href="deleteproduct/{{$datas['id']}}"><i class="fas fa-trash-alt"></a></td>
        </tbody>
        @endforeach
    </table>
</section>

@endsection