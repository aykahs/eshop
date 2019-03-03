@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

            <div id="addemp">
                    <Addmployer></Addmployer>

            </div>



    </div>
</div>

@endsection
@section('style')
<style>
        #addemp
        {
            margin-top: 50px;
            margin-right: 250px;
            width: 800px;
        }
</style>
@endsection
