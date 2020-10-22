@extends('layouts.app')

@section('main')
    <div class="d-flex align-items-center justify-content-center vh-100">
        <form id="validate_form" class="form-signin" action="{{url()->route('user.store')}}" method="post" style="min-width: 30vw;" >
            @csrf
            <h1 class="title h3 mb-3 font-weight-normal">Register</h1>

            <div class="mb-3">
                <div for="name">Name</div>
                <input class="form-control" id="name" name="name" type="text">
            </div>
            <div class="mb-3">
                <div for="password">Password</div>
                <input class="form-control" id="password" name="password" type="password">
            </div>
            <div class="mb-3">
                <div for="confirm_password">Verify Password</div>
                <input class="form-control" id="confirm_password" name="confirm_password" type="password">
            </div>
            <div class="mb-3">
                <div for="email">Email</div>
                <input class="form-control" id="email" name="email" type="email">
            </div>
            <button class="btn btn-md btn-primary btn-block mt-0 mb-2" id="register" type="submit">Register</button>
            <a href="{{url()->route('user.index')}}" id="login" class="text-primary">Login</a>
            <a href="{{url()->route('star.index')}}" id="stars" class="text-primary float-right" target="_blank">Stars</a>
            @if($errors->any())
                <div class="text-danger mt-2" role="alert">
                    <strong>{{$errors->first()}}</strong>
                </div>
            @endif
        </form>
    </div>
@endsection

@section('style')
    <style>
        .error{
            margin-top: 0.25em;
            color:red;
        }
    </style>
@endsection

@section('script')
    @include('user.form_validate')
@endsection


