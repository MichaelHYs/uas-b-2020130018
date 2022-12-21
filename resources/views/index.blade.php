@extends('layout.master')
@section('title', 'Main Page')
@push('css_after')
    <style>
        td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    {{-- item Count --}}

    <div class="row">
        <div class="col-md-5 mb-3">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Number of items</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center">{{ $itemCount }}</th>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center">
                        <h4>
                            Wondering what's on the item?
                        </h4>
                        <a class="btn btn-primary" href="{{ route('items.index') }}" role="button">item List</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Horizontal Table Separator --}}

        <div class="col-md-2 mb-3">
        </div>

        {{-- Order Count --}}

        <div class="col-md-5 mb-3">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Number of Orders</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center">{{ $orderCount }}</th>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center">
                        <h4>
                            Wondering what's in there?
                        </h4>
                        <a class="btn btn-primary" href="{{ route('orders.index') }}" role="button">Order List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
