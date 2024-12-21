@extends('user.layouts.master')

@section('content')
<div id="content" class="main-content-wrapper">
    <div class="page-content-inner">
        <div class="container">
            <div class="row justify-content-center pt--150 pb--100">
                <div class="col-lg-8 text-center">
                    <div class="error-text error-container">
                        <h1 class="error-heading mt--20">404</h1>
                        <p class="mb--40">It looks like nothing was found at this locations.</p>
                        <a href="{{route('landing_page')}}" class="btn btn-color-gray btn-medium btn-bordered btn-style-1">Back to home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection