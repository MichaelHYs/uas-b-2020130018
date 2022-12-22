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
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark text-right">
                        <tr>
                            <th>
                                <div class="row">
                                    <div class="col-md-2 text-left">
                                        <h5>Number of Items</h5>
                                    </div>
                                    <div class="col-md-2 text-left">{{ $itemCount }}</div>
                                    <div class="col-md-8"><a class="btn btn-primary" href="{{ route('items.index') }}"
                                            role="button">Show List</a></div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    {{-- Order Count --}}
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark text-right">
                        <tr>
                            <th>
                                <div class="row">
                                    <div class="col-md-2 text-left">
                                        <h5>Number of Orders</h5>
                                    </div>
                                    <div class="col-md-2 text-left">{{ $orderCount }}</div>
                                    <div class="col-md-8"><a class="btn btn-primary" href="{{ route('orders.index') }}"
                                            role="button">Show List</a></div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
