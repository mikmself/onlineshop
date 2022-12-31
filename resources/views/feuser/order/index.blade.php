@extends('feuser.main')
@section('title','Order History')
@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Order History</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive p-4">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>PRODUCT NAME</th>
                                    <th>ADDRESS</th>
                                    <th>TOTAL ORDER</th>
                                    <th>EXPEDITION</th>
                                    <th>PROOF OF PAYMENT</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td class="text-bold-500">{{ $order->product->name }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->total_orders }}</td>
                                    <td>{{ $order->expedition }}</td>
                                    <td><img src="/storage/{{ $order->proof_of_payment }}" alt="proof of payment {{ $order->product->name }}" class="w-25 h-25"></td>
                                    <td class="text-uppercase {{ $order->status == "acc" ? "text-success" : "text-danger" }}">{{ $order->status }}</td>
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
