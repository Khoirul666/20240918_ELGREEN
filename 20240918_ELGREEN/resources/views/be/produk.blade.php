@extends('layout.be-app')

@section('title','PRODUK')

@section('content')
<div class="page-inner">
  <div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
      <h3 class="fw-bold mb-3">Product</h3>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
      <a href="{{route('add_produk')}}" class="btn btn-primary btn-round">Add Product</a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-stats card-round">
        <div class="card-header">
          <h4 class="card-title">Data Product</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table
              id="basic-datatables"
              class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th style="width: 10%;">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($product as $product)
                @php
                $image = json_decode($product->image);
                @endphp
                <tr>
                  @if(empty($image))
                  <td>gambar rusak atau belum terupload</td>
                  @else
                  <td><img src="{{asset('product_img')}}/{{$image[0]}}" alt="" srcset="" width="100" height="100"></td>
                  @endif
                  <td>{{$product->nama_produk}}</td>
                  <td>{{$product->hrg_produk}}</td>
                  <td>
                    <div class="form-button-action">
                      <a href="{{route('edit_produk',$product->id)}}"
                        data-bs-toggle="tooltip"
                        title=""
                        class="btn btn-link btn-primary btn-lg"
                        data-original-title="Edit User">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a href="{{route('delete_produk',$product->id)}}"
                        data-bs-toggle="tooltip"
                        title=""
                        class="btn btn-link btn-danger btn-lg"
                        data-original-title="Remove">
                        <i class="fa fa-times"></i>
                      </a>
                    </div>
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
</div>
@endsection

@push('jss')
<!-- Datatables -->
<script src="{{asset('kaiadmin-lite-1.2.0/assets/js/plugin/datatables/datatables.min.js')}}"></script>
<script>
  $(document).ready(function(){
    $("#basic-datatables").DataTable({});
  });
</script>
@endpush