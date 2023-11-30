@extends('layouts.navigator')

@section('content')
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Product Name</th>
        <th scope="col">Product Line</th>
        <th scope="col">Product Vendor</th>
        <th scope="col">Quantity in Stock</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
        <td><a href="{{route('details', $product->productCode)}}">{{$product->productName}}</a></td>
        <td>{{$product->productLine}}</td>
        <td>{{$product->productVendor}}</td>
        <td>{{$product->quantityInStock}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection