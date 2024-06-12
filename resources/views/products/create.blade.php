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
      <div class="row d-flex justify-center">
        <div class="col-md-12">
          <div class="card border-0 shadow-lg my-5">
            <div class="card-header bg-black d-flex justify-content-between">
              <h3 class="text-white">Create Product</h3> <a href="{{route('product.index')}}" class="text-white bg-black nav-link"><h3>Product List</h3></a>
            </div>
            <form enctype="multipart/form-data" action="{{ route('products.store') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="m-3">
                  <label for="" class="form-label h5">Name</label>
                  <input value="{{ old('name') }}" type="text" class="@error('name') is-invalid @enderror form-control form-control-lg" placeholder="Enter Name" name="name">
                  @error('name')
                    <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>
                <div class="m-3">
                  <label for="" class="form-label h5">Serial</label>
                  <input value="{{ old('serial') }}" type="text" class="@error('serial') is-invalid @enderror form-control form-control-lg" placeholder="Enter serial" name="serial">
                  @error('serial')
                    <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>
                <div class="m-3">
                  <label for="" class="form-label h5">Price</label>
                  <input value="{{ old('price') }}" type="text" class="@error('price') is-invalid @enderror form-control form-control-lg" placeholder="Enter price" name="price">
                  @error('price')
                    <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>
                <div class="m-3">
                  <label for="" class="form-label h5">Description</label>
                  <textarea class="form-control" cols="30" rows="5" name="description" placeholder="Enter description" value="{{ old('Description') }}"></textarea>
                </div>
                <div class="m-3">
                  <label for="" class="form-label h5">Image</label>
                  <input type="file" class="form-control form-control-lg" name="image" placeholder="Upload image">
                </div>
                <div class="d-grid mt-5">
                  <button type="submit" class="btn btn-lg btn-dark">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>












    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>