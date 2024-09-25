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
      <a href="{{route('user')}}" class="btn btn-danger btn-round">Cancel</a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-stats card-round">
        <form method="POST">
          @csrf
          <div class="card-header">
            <div class="card-title">Edit User</div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    name="username"
                    id="username"
                    value="{{$user->username}}"
                    placeholder="Enter Username" />
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    name="password"
                    id="password"
                    value="{{$user->password}}"
                    placeholder="Enter Password" />
                </div>
              </div>
            </div>
          </div>
          <div class="card-action">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{route('user')}}" class="btn btn-danger">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection