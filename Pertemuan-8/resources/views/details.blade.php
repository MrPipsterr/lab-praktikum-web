@extends('layouts.navigator')

@section('content')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>halo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Product Code</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Line</th>
            <th scope="col">Product Scale</th>
            <th scope="col">Product Vendor</th>
            <th scope="col">Product Description</th>
            <th scope="col">Quantity in Stock</th>
            <th scope="col">Buy Price</th>
            <th scope="col">MSRP</th>
          </tr>
        </thead>
        <tbody>
          <!-- resources/views/product/detail.blade.php -->

          @foreach ($products as $product)
          <tr>
              <td>{{ $product->productCode }}</td>
              <td>{{ $product->productName }}</td>
              <td>{{ $product->productLine }}</td>
              <td>{{ $product->productScale }}</td>
              <td>{{ $product->productVendor }}</td>
              <td>{{ $product->productDescription }}</td>
              <td>{{ $product->quantityInStock }}</td>
              <td>{{ $product->buyPrice }}</td>
              <td>{{ $product->MSRP }}</td>
          </tr>
          @endforeach

        </tbody>
      </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
@endsection