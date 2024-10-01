@extends('layout.be-app')

@section('title','PRODUK')

@section('content')
<div class="page-inner">
  <div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
      <h3 class="fw-bold mb-3">Sale</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-stats card-round">
        <div class="card-header">
          <h4 class="card-title">Data Sale</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table
              id="basic-datatables"
              class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nomor Transaksi</th>
                  <th>Jumlah Transaksi</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($trx as $trx)
                <tr>
                  <td>{{$trx->no_trx}}</td>
                  <td>{{$trx->jumlah_trx}}</td>
                  <td>{{DATE('Y m d',strtotime($trx->created_at))}}</td>
                  <td>
                    <a href="{{route('sale',$trx->no_trx)}}"
                      data-bs-toggle="tooltip"
                      title=""
                      class="btn btn-link btn-primary btn-lg"
                      data-original-title="Show">
                      <i class="fa fa-eye"></i>
                    </a>
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
  $(document).ready(function() {
    $("#basic-datatables").DataTable({});
  });
</script>
@endpush