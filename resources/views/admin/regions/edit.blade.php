@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Region</h2></div>

                <div class="card-body">
                    @include('layouts.alerts')
                    <form method="POST" action="{{ route('regions.update',$region->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="zone" class="col-md-4 col-form-label text-md-right">{{ __('Zone Code') }}</label>

                            <div class="col-md-6">
                                <select id="zone" class="form-control" name="zone">
                                    @forelse($zones as $zone)
                                        <option value="{{ $zone->id }}" {{ $region->zone_id==$zone->id ? 'selected' :'' }}>
                                            {{ $zone->code }}
                                        </option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Region Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" name="code" class="form-control"
                                    value="{{ $region->code }}" readonly>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                {{ __('Long Description') }}</label>

                            <div class="col-md-6">
                                <input id="name" name="name" type="text"
                                class="form-control"  value="{{ $region->name }}" >
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
