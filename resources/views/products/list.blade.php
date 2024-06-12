<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel_11_CURD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="bg-black py-3">
      <h1 class="text-center text-white">Laravel_11 CURD</h1>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-md-12 d-flex justify-content-end">
            <a href="{{route('products.create')}}" class="text-white bg-black nav-link btn btn-dark"><h6 class="p-2">Product Create</h6></a>
            </div>
        </div>
    </div>
    <div class="container">
      <div class="row d-flex justify-center">
        @if (Session::has('success'))
        <div class="col-md-12 mt-3">
            <div class="alert alert-danger">
                {{Session::get('success')}}
            </div>
        </div>
        @endif
        <div class="col-md-12">
          <div class="card border-0 shadow-lg my-3">
            <div class="card-header bg-black">
              <h3 class="text-white">Products List</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Serial</th>
                        <th>Price</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    @if ($products->isNotEmpty())
                    @foreach ( $products as $product) 
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                        @if ($product->image != "")
                            <img width="50" src="{{ asset('uploads/products/'.$product->image)}}" alt="">
                        @endif  
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->serial }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d,M,Y') }}</td>
                        <td>
                            <a href="{{ route('products.edit',$product->id) }}" class="btn btn-outline-success">Edit</a>
                            <a href="" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>