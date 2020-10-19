@extends('layouts.app')

@section('main')
    <div class="d-flex flex-column align-items-center justify-content-center vh-100">
        <h3>Welcome <b>{{  Auth::user()->name  }}</b>. You have login successfully.</h3>

        <form class="form-signin" action="{{url()->route('user.logout')}}" method="post">
            @csrf
            <input type="hidden" value="{{  Auth::user()->id  }}" name="id">
            <button class="btn btn-md btn-warning btn-block mt-3" type="submit">Logout</button>
        </form>
    </div>
@endsection
