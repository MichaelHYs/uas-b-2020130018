@extends('layout.master')
@section('title', $order->id)
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>Order Number: {{ $order->id }}</h2>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger ml-3">Delete</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h4>
            Net Total Harga: {{ $price }}
        </h4>
        <h5>
            @if ($order->status == 'selesai')
                <span class="badge badge-success">Pembayaran Selesai</span>
            @else
                <span class="badge badge-warning">Menunggu Pembayaran</span>
            @endif
        </h5>
        <hr>
        <p>
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Order Detail</h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Menu ID</th>
                            <th>Nama Menu</th>
                            <th>Rekomendasi</th>
                            <th>Jumlah pesanan</th>
                            <th>Harga Satuan</th>
                            <th>Harga Total</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        </p>
    </div>
@endsection
