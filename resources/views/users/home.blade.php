@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-8">
                    <div id="panel">
                            <nav class="panel">
                                <p class="panel-heading">
                                   Payment History
                                </p>
                            </nav>
                        </div>

                        
                    <Userhistory></Userhistory>
            </div>

    </div>
</div>
@endsection
