@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Zones</h2>
                    <a href="{{ route('zones.create') }}" class="btn btn-success" style="float: right;">Create New</a>
                </div>

                <div class="card-body">
                    @include('layouts.alerts')
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Zone Code</th>
                                <th scope="col">Short Description</th>
                                <th scope="col">Long Description</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($zones as $zone)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th scope="row">{{ $zone->code }}</th>
                                    <td>{{ $zone->short_description }}</td>
                                    <td>{{ $zone->long_description }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('zones.edit',$zone->id) }}" class="btn btn-sm btn-info ml-2 mr-2">Edit</a>
                                            <form action="{{ route('zones.destroy',$zone->id) }}" method="post">
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
                    {{ $zones->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
