@extends('master.master')
@section('content')

<section class="container justify-content">
    <div>
        <a href="{{url('poviewform')}}" class="btn btn-primary m-4">VIEW PURCHAE ORDERS</a>
    </div>
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <h5 class="text-center my-4 pb-2"><Strong>ADD INDIVIDUAL PURCHASE ORDERS</Strong></h5>
    <form action="addpo" method="POST">
        @csrf

        <div class="input-group">
            <label for="zone" class="col col-form-label label pe-3">Zone</label>
            <select class="form-select drop" name="zone" aria-label="Default select example" required>
                <option value="null">Select</option>
                @if(!empty($zone))
                @foreach($zone as $zones)
                <option value="{{$zones['zonecode']}}">{{$zones['zonecode']}}</option>
                @endforeach
                @endif
            </select>
            <label for="region" class="col col-form-label label pe-3">Region</label>
            <select class="form-select drop" name="region" aria-label="Default select example" required>
                <option value="null">Select</option>
                @if(!empty($region))
                @foreach($region as $regions)
                <option value="{{$regions['regioncode']}}">{{$regions['regioncode']}}</option>
                @endforeach
                @endif
            </select>
            <label for="territory" class="col col-form-label label pe-3">Territory</label>
            <select class="form-select drop" name="territory" aria-label="Default select example" required>
                <option value="null">Select</option>
                @if(!empty($territory))
                @foreach($territory as $territories)
                <option value="{{$territories['territorycode']}}">{{$territories['territorycode']}}</option>
                @endforeach
                @endif
            </select>
            <label for="distributor" class="col col-form-label label pe-3">Distributors</label>
            <select class="form-select drop" name="distributor" aria-label="Default select example" required>
                <option value="null">Select</option>
                @if(!empty($distributor))
                @foreach($distributor as $distributors)
                <option value="{{$territories['territorycode']}}">{{$distributors['name']}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="input-group py-2">
            <label for="date" class="col col-form-label label pe-3">Date</label>
            <input type="text" class="form-control text-secondary outline-secondary" id="date" name="date" readonly placeholder="Automatically" required>
            <label for="ponumber" class="col col-form-label label pe-3">PO Number</label>
            <input type="text" class="form-control text-secondary outline-secondary" id="ponumber" name="ponumber" readonly placeholder="Automatically" required>
            <label for="remark" class="col col-form-label label pe-3">Remark</label>
            <input type="text" class="form-control text-secondary outline-secondary" id="remark" name="remark" placeholder="Type" required>
        </div>
        <div class="row pt-5">
            <table class="table tbborder" id="table_btn">
                <thead class="table table-bordered border-secondary">
                    <tr>
                        <th>SKU CODE</th>
                        <th>SKU NAME</th>
                        <th>UNIT PRICE</th>
                        <th>AVB QTY</th>
                        <th>ENTER QTY <small class="xsmall">(CASE)</small></th>
                        <th>UNITS</th>
                        <th>TOTAL PRICE</th>
                        <th class="small">ADD/ REMOVE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input class="form-control" type="text" name="skucode"></td>
                        <td><input class="form-control" type="text" name="skuname"></td>
                        <td><input class="form-control" type="text" name="unitprice"></td>
                        <td><input class="form-control" type="text" name="avbqty"></td>
                        <td><input class="form-control" type="text" name="enterqty" placeholder="Type"></td>
                        <td><input class="form-control" type="text" name="units" size="10" readonly></td>
                        <td><input class="form-control" type="text" name="totalprice" readonly></td>
                        <td><button class="form-control btn btn-warning" type="button" name="add" id="add">ADD</button></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center"><input type="submit" class="btn btn-success" value="ADD PO"></div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script type="text/javascript">
                let lineNo = 1;
                $(document).ready(function() {
                    $("#add").click(function() {
                        markup = '<tr><td><input class="form-control" type="text" name="skucode" required></td><td><input class="form-control" type="text" name="skuname" required></td><td><input class="form-control" type="text" name="unitprice" required><td><input class="form-control" type="text" name="avbqty" required></td></td><td><input class="form-control" type="text" name="enterqty" placeholder="Type" required></td><td><input class="form-control" type="text" name="units" readonly></td><td><input class="form-control" type="text" name="totalprice" readonly></td><td><input class="form-control btn btn-danger" type="button" name="remove" id="remove" value="REMOVE"></td></tr>';
                        tableBody = $("table tbody");
                        tableBody.append(markup);
                        lineNo++;
                    });
                    $("#table_btn").on('click', '#remove', function() {
                        $(this).closest('tr').remove();
                    })
                });
            </script>
        </div>
    </form>
</section>
@endsection