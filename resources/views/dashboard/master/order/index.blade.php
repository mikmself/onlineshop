@extends('dashboard.main.master')
@section('title','Order Data')
@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Order Data</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive p-4">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>USER</th>
                                    <th>PRODUCT</th>
                                    <th>ADDRESS</th>
                                    <th>TOTAL ORDERS</th>
                                    <th>EXPEDITION</th>
                                    <th>PROOF OF PAYMENT</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td class="text-bold-500">{{ $order->user->name }}</td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->total_orders }}</td>
                                    <td>{{ $order->expedition }}</td>
                                    <td><img src="/storage/{{ $order->proof_of_payment }}" alt="proof of payment {{ $order->user->name }}" class="w-25 h-25"></td>
                                    <td class="text-bold text-uppercase {{ $order->status == "acc" ? "text-success" : "text-danger" }}">{{ $order->status }}</td>
                                    <td>
                                        @if ($order->status == "unconfirmed")
                                        <a href="{{ route('accorder',$order->id) }}" class="btn btn-success">Acc</a>
                                        @endif
                                        <a href="{{ route('destroyorder',$order->id) }}" class="btn btn-danger">Delete</a>
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
