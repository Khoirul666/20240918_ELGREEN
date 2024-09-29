@extends('layout.be-app')

@section('title', 'PRODUCT')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Size</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('size') }}" class="btn btn-danger btn-round">Cancel</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-stats card-round">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <div class="card-title">Edit Size</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="name_size">Name Size</label>
                                        <input type="text" class="form-control" name="name_size" id="name_size"
                                            placeholder="Enter Size" value="{{$size->show}}"/>
                                    </div>

                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Edit</button>
                                <a href="{{ route('size') }}" class="btn btn-danger">Batal</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
