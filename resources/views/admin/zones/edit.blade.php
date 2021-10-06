@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Zone</h2></div>

                <div class="card-body">
                    @include('layouts.alerts')
                    <form method="POST" action="{{ route('zones.update',$zone->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Zone Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" name="code" class="form-control"
                                    value="{{ $zone->code }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="s_description"
                                class="col-md-4 col-form-label text-md-right">{{ __('Short Description') }}</label>

                            <div class="col-md-6">
                                <input id="s_description"name="short_description" type="text" class="form-control"
                                      value="{{ $zone->short_description }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="l_description" class="col-md-4 col-form-label text-md-right">
                                {{ __('Long Description') }}</label>

                            <div class="col-md-6">
                                <input id="l_description" name="long_description" type="text"
                                class="form-control"  value="{{ $zone->long_description }}" >
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Update') }}
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
