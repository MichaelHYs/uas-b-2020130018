@extends('layout.master')
@section('title', $item->nama)
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $item->id }}</h2>
            </div>
            <div class="badge badge-primary">
                <h2>{{ $item->nama }}</h2>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary ml-3">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger ml-3">Delete</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h5>
            <span class="badge badge-primary">
                <i class="fa fa-star fa-fw"></i>
                {{ $item->harga }}
            </span>
        </h5>
        <p>
        <ul class="list-inline">
            {{-- <li class="list-inline-item">
                <i class="fa fa-th-large fa-fw"></i>
                <em>{{ $item->harga }}</em>
            </li> --}}
            <li class="list-inline-item">
                <i class="fa fa-calendar fa-fw"></i>
                {{ $item->stok }}
            </li>
        </ul>
        </p>
        <hr>
    </div>
@endsection
