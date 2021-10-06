@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Regions</h2>
                    <a href="{{ route('regions.create') }}" class="btn btn-success" style="float: right;">Create New</a>
                </div>

                <div class="card-body">
                    @include('layouts.alerts')
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Region Code</th>
                                <th scope="col">Zone Code</th>
                                <th scope="col">Region Name</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($regions as $region)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th scope="row">{{ $region->code }}</th>
                                    <td>{{ $region->zone->code }}</td>
                                    <td>{{ $region->name }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('regions.edit',$region->id) }}" class="btn btn-sm btn-info ml-2 mr-2">Edit</a>
                                            <form action="{{ route('regions.destroy',$region->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5">There Have No Data Available</td>

                            </tr>
                            @endforelse


                        </tbody>
                    </table>
                    {{ $regions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
