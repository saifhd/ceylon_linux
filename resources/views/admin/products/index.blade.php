@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Products</h2>
                    <a href="{{ route('products.create') }}" class="btn btn-success" style="float: right;">Create New</a>
                </div>

                <div class="card-body">
                    @include('layouts.alerts')
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">SKU ID</th>
                                <th scope="col">SKU Code</th>
                                <th scope="col">SKU Name</th>
                                <th scope="col">MRP</th>
                                <th scope="col">Destribution Price</th>
                                <th scope="col">Weight/Volume</th>
                                {{-- <th scope="col">Action</th> --}}

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->mrp }}</td>
                                    <td>{{ $product->destribution_price }}</td>
                                    <td>{{ $product->weight }} / {{ $product->volume }}</td>

                                    {{-- <td>
                                        <div class="row">
                                            <a href="{{ route('regions.edit',$region->id) }}" class="btn btn-sm btn-info ml-2 mr-2">Edit</a>
                                            <form action="{{ route('regions.destroy',$region->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td> --}}
                                </tr>
                            @empty
                            <tr>
                                <td colspan="7">There Have No Data Available</td>

                            </tr>
                            @endforelse


                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
