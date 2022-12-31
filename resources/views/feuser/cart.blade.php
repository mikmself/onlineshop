@extends('feuser.main')
@section('title','Cart')
@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Cart</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive p-4">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>PRODUCT NAME</th>
                                    <th>TOTAL ORDER</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                <tr>
                                    <td class="text-bold-500">{{ $cart->product->name }}</td>
                                    <td>{{ $cart->total_orders }}</td>
                                    <td>
                                        <a href="{{ route('createOrder',$cart->product->id) }}" class="btn btn-success">Buy</a>
                                        <a href="{{ route('destroycart',$cart->id) }}" class="btn btn-danger">Delete</a>
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
