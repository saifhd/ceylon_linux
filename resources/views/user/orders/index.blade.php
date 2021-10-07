@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Orders</h2>
                    @if(auth()->user()->role_id==2)
                    <a href="{{ route('orders.create') }}" class="btn btn-success" style="float: right;">Create New</a>
                    @endif
                </div>

                <div class="card-body">
                    @include('layouts.alerts')
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Region</th>
                                <th scope="col">Terriry</th>
                                <th scope="col">Destributor</th>
                                <th scope="col">PO Number</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th>Total Amount</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th scope="row">{{ $order->region->code }}</th>
                                    <td>{{ $order->territory->code }}</td>
                                    <td>{{ $order->destributor->name }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $order->created_at->format('H:m A') }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm">View</a>
                                    </td>


                                </tr>
                            @empty
                            <tr>
                                <td colspan="7">There Have No Data Available</td>

                            </tr>
                            @endforelse


                        </tbody>
                    </table>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
