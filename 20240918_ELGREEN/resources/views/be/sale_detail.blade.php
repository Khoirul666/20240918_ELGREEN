@extends('layout.be-app')

@section('title','PRODUK')

@section('content')
<div class="page-inner">
  <div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
      <h3 class="fw-bold mb-3">Detail Transaksi</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-stats card-round">
        <div class="card-header">
          <h4 class="card-title">Data Transaksi</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table
              id="basic-datatables"
              class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nama Produk</th>
                  <th>Warna Produk</th>
                  <th>Ukuran</th>
                  <th>jumlah Produk</th>
                </tr>
              </thead>
              <tbody>
                @foreach($trx as $trx)
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
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
  $(document).ready(function() {
    $("#basic-datatables").DataTable({});
  });
</script>
@endpush