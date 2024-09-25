@extends('layout.be-app')

@section('title','USER')

@section('content')
<div class="page-inner">
  <div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
      <h3 class="fw-bold mb-3">User</h3>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
      <a href="{{route('add_user')}}" class="btn btn-primary btn-round">Add User</a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-stats card-round">
        <div class="card-header">
          <h4 class="card-title">Data User</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table
              id="basic-datatables"
              class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Password</th>
                  <th style="width: 10%;">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($user as $user)
                <tr>
                  <td>{{$user->username}}</td>
                  <td>{{$user->password}}</td>
                  <td>
                    <div class="form-button-action">
                      <a href="{{route('edit_user',$user->id)}}"
                        data-bs-toggle="tooltip"
                        title=""
                        class="btn btn-link btn-primary btn-lg"
                        data-original-title="Edit User">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a href="{{route('delete_user',$user->id)}}"
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