@extends('master.master')
@section('content')
<section class="container justify-content">
    <div>
        <a href="home" class="btn btn-warning m-4">Home</a>
    </div>
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <h5 class="text-center my-4 pb-2"><Strong>PURCHASE ORDER VIEW</Strong></h5>
    <form action="addpo" method="POST">
        @csrf
        <div class="input-group">
            <label for="region" class="col col-form-label label pe-3">Region</label>
            <select class="form-select drop" name="region" aria-label="Default select example" required>
                <option value="null">Select</option>
                @foreach($region as $regions)
                <option value="{{$regions->regioncode}}">{{$regions->regioncode}}</option>
                @endforeach
            </select>
            <label for="territory" class="col col-form-label label pe-3">Territory</label>
            <select class="form-select drop" name="territory" aria-label="Default select example" required>
                <option value="null">Select</option>
                @foreach($territory as $territories)
                <option value="{{$regions->regioncode}}">{{$territories->territorycode}}</option>
                @endforeach
            </select>

            <label for="pono" class="col col-form-label label pe-3">PO NO</label>
            <input type="text" class="form-control text-secondary outline-secondary" id="pono" name="pono" placeholder="Search"><a href="search" class="btn btn-succes"><i class="fas fa-search"></i></a>
            <label for="from" class="col col-form-label label pe-3">From</label>
            <input type="text" class="form-control text-secondary outline-secondary" id="from" name="from" placeholder="DD/MM/YY">
            <label for="to" class="col col-form-label label pe-3">To</label>
            <input type="text" class="form-control text-secondary outline-secondary" id="to" name="to" placeholder="DD/MM/YY">

        </div>

        <div class="row pt-5">
            <table class="table tbborder" id="table_btn">
                <thead class="table table-bordered bg-success">
                    <tr>
                        <th>REGION</th>
                        <th>TERRITORY</th>
                        <th>DISTRIBUTOR</th>
                        <th>PO NUMBER</th>
                        <th>DATE</th>
                        <th>TIME</th>
                        <th>TOTAL AMOUNT</th>
                        <th>VIEW PO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($po as $pos)
                    <tr>
                        <td><input class="form-control" type="text" name="region" value="{{$pos->region}}"></td>
                        <td><input class="form-control" type="text" name="territory" value="{{$pos->territory}}"></td>
                        <td><input class="form-control" type="text" name="ponumber" value="{{$pos->distributor}}"></td>
                        <td><input class="form-control" type="text" name="date" value="{{$pos->ponumber}}"></td>
                        <td><input class="form-control" type="text" name="time" value="{{$pos->date}}"></td>
                        <td><input class="form-control" type="text" name="distributor" value="{{$pos->time}}"></td>
                        <td><input class="form-control" type="text" name="totalamount" value="{{$pos->totalamount}}"></td>
                        <td><span data-href="toexcel" id="export" class="form-control btn btn-success" onclick="exportTasks(event.target);">VIEW PO</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script>
            function exportTasks(_this) {
                let _url = $(_this).data('href');
                window.location.href = _url;
            }
        </script>
    </form>
</section>
@endsection