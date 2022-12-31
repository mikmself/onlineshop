@extends('dashboard.main.master')
@section('title','Product Data')
@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Product Data</h4>
                    <a href="{{ route('createproduct') }}" class="btn btn-secondary">Create</a>
                </div>
                <div class="card-content">
                    <div class="table-responsive p-4">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>DESC</th>
                                    <th>IMAGE</th>
                                    <th>PRICE</th>
                                    <th>STOCK</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td class="text-bold-500">{{ $product->name }}</td>
                                    <td>{{ $product->desc }}</td>
                                    <td><img src="/storage/{{ $product->img }}" alt="product {{ $product->name }} image" class="w-25 h-25"></td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        <a href="{{ route('editproduct',$product->id) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('destroyproduct',$product->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
