@extends('layout.master')
@section('title', 'Order List')
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
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title bg-warning">
                <div class="row">
                    <div class="col-sm-6 text-dark">
                        <h2><b>Orders List</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('orders.create') }}" class="btn btn-success">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            <span>Add New Order</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>id</th>
                        <th>status</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href="{{ route('orders.show', $order->id) }}">{{ $order->id }}</a></td>
                            @if (strcasecmp($order->status, "selesai") == 0)
                                <td>Selesai</td>
                            @else
                                <td>Menunggu Pembayaran</td>
                            @endif
                            <td>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                    <button type="submit" class="btn btn-danger ml-3">Delete</button>
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="6">No data yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
