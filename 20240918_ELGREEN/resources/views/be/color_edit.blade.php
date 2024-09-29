@extends('layout.be-app')

@section('title', 'PRODUCT')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Color</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('color') }}" class="btn btn-danger btn-round">Cancel</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-stats card-round">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <div class="card-title">Edit Color</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="name_color">Name Color</label>
                                        <input type="text" class="form-control" name="name_color" id="name_color"
                                            placeholder="Enter Name Color" value="{{$color->show}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="color">Pick Color</label>
                                        <input type="color" class="form-control" style="height: 50px !important" name="color" id="color"
                                            placeholder="Pick Color" value="{{$color->color}}"/>
                                    </div>

                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('color') }}" class="btn btn-danger">Batal</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
