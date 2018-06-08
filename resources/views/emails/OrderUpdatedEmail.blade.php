@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('welcome') }}">
                        <img src="/images/logo.png" alt="">
                    </a>
                </div>

                <div class="card-body">
                    Welcome
                </div>
            </div>
        </div>
    </div>
</div>
@endsection