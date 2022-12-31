@extends('feuser.main')
@section('title','Product List')
@section('style')
<style>
    *{
        padding: 0;
        margin: 0;
    }
    body{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        overflow-x: hidden;
    }
    .container{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .card{
        border-radius: 8px;
        border: 1px solid #cccccc;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px;
        box-sizing: border-box;
        width: 350px;
        height: 350px;
        transition: all linear 200ms;
    }
    .card:hover{
        transform: scale(1.1);
        transition: all linear 200ms;
        z-index: 1;
        box-shadow: 1px 1px 10px rgba(0,0,0,.3);
        cursor: pointer;
    }
</style>
@endsection

@section('content')
    <h1 class="p-5">Online Shop</h1>
    <div class="container d-flex flex-wrap align-items-center">
        @foreach ($products as $product)
        <div class="m-2 card">
            <h2>{{ $product->name }}</h2>
            <img src="/storage/{{ $product->img }}" alt="foto product {{ $product->name }}" class="w-50 h-50">
            <p class="text-success text-bold pt-2">RP.{{ $product->price }},00 <span class="text-dark">-</span><span class="text-warning"> Stock : {{ $product->stock }}</span></p>
            <div>
                <a href="{{ route('createOrder',$product->id) }}" class="btn btn-success">Buy</a>
                <a href="{{ route('addToCart',$product->id) }}" class="btn btn-primary">Add To Cart</a>
            </div>
        </div>
        @endforeach
      </div>
@endsection
