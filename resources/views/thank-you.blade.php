@extends('layout')
@section('body')
<div class="arah-white-circle"></div>
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-12 offset-md-1 col-md-5">
                <h1 class="large-h1">{{__("auth.Thank you!")}}</h1>
                <p class="title-desc">{{__('auth.You have successfully registered with Arah Global. Please wait for the launch of our Super APP!')}}</p>
            </div>
        </div>
        @include('landing-subscribe')
    </div>
</div>
@endsection