@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Create New Product</h2></div>

                <div class="card-body">
                    @include('layouts.alerts')
                    <form method="POST" action="{{ route('products.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('SKU ID') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" name="sku_id" class="form-control"
                                    value="{{ $next_id }}" readonly>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                {{ __('SKU Code') }}</label>

                            <div class="col-md-6">
                                <input id="name" name="code" type="text"
                                class="form-control"  value="{{ old('code') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                {{ __('SKU Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" name="name" type="text"
                                class="form-control"  value="{{ old('name') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                {{ __('MRP') }}</label>

                            <div class="col-md-6">
                                <input id="name" name="mrp" type="text"
                                class="form-control"  value="{{ old('mrp') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                {{ __('Destribution Price') }}</label>

                            <div class="col-md-6">
                                <input id="name" name="destribution_price" type="text"
                                class="form-control"  value="{{ old('destribution_price') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                {{ __('Weight/Volume') }}</label>

                            <div class="col-md-3">
                                <input id="name" name="weight" type="text"
                                class="form-control"  value="{{ old('weight') }}" >
                            </div>
                            <div class="col-md-3">
                                <input id="name" name="volume" type="number"
                                class="form-control"  value="{{ old('volume') }}" >
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
