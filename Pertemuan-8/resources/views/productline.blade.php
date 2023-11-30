<!-- resources/views/product/index.blade.php -->
@extends('layouts.navigator')

@section('content')
<h1>Products with Product Line: {{ $productLine }}</h1>

<ul>
    @foreach ($products as $product)
        <li>{{ $product->productName }}</li>
    @endforeach
</ul>
@endsection