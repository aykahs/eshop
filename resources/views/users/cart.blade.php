@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="cart">
                <cart></cart>
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
<style>
#cart{
    margin-top: 40px;
    margin-bottom: 500px;
}
</style>
@endsection
