@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Create New User</h2></div>

                <div class="card-body">
                    @include('layouts.alerts')
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" name="name" class="form-control"
                                    value="{{ old('name') }}" >
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('NIc') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" name="nic" class="form-control"
                                    value="{{ old('nic') }}" >
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" name="address" class="form-control"
                                    value="{{ old('address') }}" >
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" name="mobile" class="form-control"
                                    value="{{ old('mobile') }}" >
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="email" name="email" class="form-control"
                                    value="{{ old('email') }}" >
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="zone" class="col-md-4 col-form-label text-md-right">{{ __('Territory') }}</label>

                            <div class="col-md-6">
                                <select id="zone" class="form-control" name="territory">
                                    @forelse($territories as $territory)
                                        <option value="{{ $territory->id }}">{{ $territory->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="zone" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select id="zone" class="form-control" name="gender">
                                    @forelse($genders as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>







                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('UserName') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" name="user_name" class="form-control"
                                    value="{{ old('user_name') }}" >
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="password" name="password" class="form-control"
                                    value="{{ old('password') }}" >
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
