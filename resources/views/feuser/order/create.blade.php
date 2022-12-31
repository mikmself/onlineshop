@extends('feuser.main')
@section('title','Create Order')
@section('content')
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Create Product</h4>
                    <a href="{{ route('indexProductList') }}" class="btn btn-secondary">Back</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('storeOrder') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" class="form-control"
                                                name="name" placeholder="Name" value="{{ auth()->user()->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="product">Perduct</label>
                                            <input type="text" id="product" class="form-control"
                                                name="product" placeholder="Perduct" value="{{ $product->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" id="address" class="form-control"
                                                name="address" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="total_orders">Total Order</label>
                                            <input type="number" min="0" id="total_orders" class="form-control"
                                                name="total_orders" placeholder="Total Orders">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="expedition">Address</label>
                                            <select name="expedition" id="expedition" class="form-control">
                                                <option value="JNT">JNT</option>
                                                <option value="JNE">JNE</option>
                                                <option value="NINJA EXPRESS">NINJA EXPRESS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="proof_of_payment">Proof Of Payment</label>
                                            <input type="file" name="proof_of_payment" id="proof_of_payment" class="form-control">
                                        </div>
                                    </div>
                                    <p>Total Harga : Rp.<span id="totalPrice">0</span>,00</p>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    let totalPrice = document.getElementById('totalPrice');
    let price = {{ $product->price }} ;
    let totalOrders = document.getElementById('total_orders');

    totalOrders.addEventListener('keyup',function(e){
        let priceNow = price * e.target.value;
        totalPrice.textContent = priceNow;
    });
</script>
@endsection
