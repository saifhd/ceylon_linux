@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Users</h2>
                    <a href="{{ route('users.create') }}" class="btn btn-success" style="float: right;">Create New User</a>
                </div>

                <div class="card-body">
                    @include('layouts.alerts')
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Role</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th scope="row">{{ $user->name }}</th>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->gender->name }}</td>
                                    <td>
                                        {{ $user->role->name }}
                                        {{-- <div class="row">
                                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-info ml-2 mr-2">Edit</a>
                                            <form action="{{ route('users.destroy',$user->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div> --}}
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="6">There Have No Data Available</td>

                            </tr>
                            @endforelse


                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
