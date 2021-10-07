@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Add Purchase Order</h2>
                </div>

                <div class="card-body">
                    @include('layouts.alerts')
                <form action="{{ route('orders.store') }}" method="post" id="form">
                @csrf
                    <order-component :zones="{{ $zones }}" :users="{{ auth()->user() }}"></order-component>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-4">Date - </div>
                                <div class="col-md-8">{{ \Carbon\Carbon::now()->format('d-m-Y') }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-4">PO No - </div>
                                <div class="col-md-8">{{ $po_no }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-4">Remark - </div>
                                <div class="col-md-8">
                                    <input type="text" name="remark" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">SKU Code</th>
                                <th scope="col">SKU Name</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">AVB QTY</th>
                                <th scope="col">Enter QTY</th>
                                <th scope="col">UNIT</th>
                                <th scope="col">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <input type="text" class="form-control" value="{{ $product->destribution_price }}" id="price{{ $loop->iteration }}" readonly>
                                        </td>
                                    <td>{{ $product->volume }}</td>
                                    <td>
                                        <input id="qty{{ $loop->iteration}}" type="number" style="width:100px;"
                                        placeholder="Type" class="form-control"
                                        onchange="document.getElementById('units{{ $loop->iteration}}').value=this.value;
                                        document.getElementById('total{{ $loop->iteration}}').value=
                                            this.value*document.getElementById('price{{ $loop->iteration}}').value;">
                                    </td>
                                    <td id="">
                                        <input  id="units{{ $loop->iteration}}" type="number" style="width:100px;"
                                         class="form-control" value="" readonly>
                                    </td>
                                    <td id="">
                                        <input  type="text" id="total{{ $loop->iteration }}" class="form-control" readonly>
                                    </td>


                                </tr>
                            @empty
                            <tr>
                                <td colspan="7">There Have No Data Available</td>

                            </tr>
                            @endforelse


                        </tbody>
                    </table>
                    <input type="hidden" name="table_array" id="table_array" >
                    <button type="submit" id="submit" class="btn btn-success">ADD PO</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $("#submit").click(function(e){
            // e.preventDefault();
            var array = [];
            var headers = [];
            $('#dataTable th').each(function(index, item) {
                headers[index] = $(item).html();
            });
            $('#dataTable tr').has('td').each(function() {
                var arrayItem = {};
                $('td', $(this)).each(function(index, item) {
                    if($(item).find('input').length>0){
                        arrayItem[headers[index]] =$(item).find('input').val();
                    }
                    else{
                        arrayItem[headers[index]]=$(item).html();
                    }
                });
                // array.push(arrayItem);

                var arr=Object.keys(arrayItem).map(function (key) { return arrayItem[key]; });
                array.push(arr);
                // $("#table_array").val(arr);
                // console.log([arrayItem]);
                $("#form").submit();

            });
            $("#table_array").val(array);
            console.log(array);
        });
    })

</script>
