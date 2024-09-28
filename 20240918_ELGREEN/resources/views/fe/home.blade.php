@extends('layout.app')

@section('title','HOME')

@push('csss')
<style>
    .box1 {
        position: relative;
        top: 10px;
        left: 20px;
        background-color: lightblue;
        width: 100px;
        height: 100px;
    }
    
    .box2 {
        position: absolute;
        top: 50px;
        left: 150px;
        background-color: lightgreen;
        width: 100px;
        height: 100px;
    }

    .box3 {
        position: fixed;
        bottom: 0;
        right: 0;
        background-color: lightcoral;
        width: 100px;
        height: 100px;
    }
</style>
@endpush

@section('content')

    <div class="box1">Box 1</div>
    <div class="box2">Box 2</div>
    <div class="box3">Box 3</div>

@endsection

@push('jss')
    
@endpush