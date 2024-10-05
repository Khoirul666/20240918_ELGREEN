@extends('layout.be-app')

@section('title','PRODUCT')

@section('content')
<div class="page-inner">
  <div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
      <h3 class="fw-bold mb-3">Product</h3>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
      <a href="{{route('produk')}}" class="btn btn-danger btn-round">Cancel</a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-stats card-round">
        <form method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-header">
            <div class="card-title">Edit Product</div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="name_product">Name Product</label>
                  <input
                    type="text"
                    class="form-control"
                    name="name_product"
                    id="name_product"
                    value="{{$product->nama_produk}}"
                    placeholder="Enter Name Product" />
                </div>

                <div class="form-group">
                  <label for="price">Price</label>
                  <input
                    type="text"
                    class="form-control"
                    name="price"
                    id="price"
                    value="{{$product->hrg_produk}}"
                    placeholder="Enter Price Ex.(10000)" />
                </div>

                <div class="form-group">
                  <label for="cat_product">Category Product</label>
                  <select
                    class="form-select"
                    id="cat_product"
                    name="cat_product">
                    @foreach($category as $category)
                    <option value="{{$category->id}}" <?= $category->id == $product->cat_product ? 'selected' : '' ?>>{{$category->show}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="color">Color</label>
                  <select class="form-select" id="color" name="color[]" multiple require>
                    <?php
                    $arr_color = json_decode($product->color);
                    foreach ($color as $color) {
                      // serach key
                      $key = array_search($color->id, $arr_color);
                      if ($key !== false) {
                        unset($arr_color[$key]);
                    ?>
                        <option value="{{$color->id}}" selected >{{$color->show}}</option>
                      <?php
                      } else {
                      ?>
                        <option value="{{$color->id}}">{{$color->show}}</option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="size">Size</label>
                  <select class="form-select" id="size" name="size[]" multiple require>
                  <?php
                    $arr_size = json_decode($product->size);
                    foreach ($size as $size) {
                      // serach key
                      $key = array_search($size->id, $arr_size);
                      if ($key !== false) {
                        unset($arr_size[$key]);
                    ?>
                        <option value="{{$size->id}}" selected >{{$size->show}}</option>
                      <?php
                      } else {
                      ?>
                        <option value="{{$size->id}}">{{$size->show}}</option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                    <label for="recom">Rekomendasi Produk</label>
                    <select class="form-select" id="recom" name="recom">
                        <option value="0" <?= $product->recom=='0' ? 'selected' : '' ?>>Tidak Rekomendasi</option>
                        <option value="1" <?= $product->recom=='1' ? 'selected' : '' ?>>Masuk Rekomendasi</option>
                    </select>
                </div>

                <div class="form-group">
                  <label for="image_product">Image Product</label>
                  <input type="file" class="form-control-file" id="image_product" name="image_product[]" multiple require>
                </div>
              </div>
            </div>
          </div>
          <div class="card-action">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{route('produk')}}" class="btn btn-danger">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection