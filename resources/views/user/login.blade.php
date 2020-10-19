@extends('layouts.app')

@section('main')
    <div class="d-flex align-items-center justify-content-center vh-100" >
        <form id="validate_form" class="form-signin" action="{{url()->route('user.verify')}}" method="post" style="min-width: 20vw;">
            @csrf
            <h1 class="title h3 mb-3 font-weight-normal">Log in</h1>

            <div class="name_input mb-3">
                <label for="name" class="sr-only">User Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="admin" required autofocus>
            </div>

            <div class="password_input mb-3">
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="test1234" required>
            </div>

            <button class="btn btn-md btn-primary btn-block mt-0 mb-2" id="check_user">Check account</button>
            <button class="btn btn-md btn-success btn-block mt-0 mb-2" id="sign_in" type="submit">Sign in</button>
            <a href="{{url()->route('user.create')}}" id="register" class="text-primary">Register</a>

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
        #sign_in {
            display: none;
        }
        .password_input {
            display: none;
        }
    </style>
@endsection


@section('script')

    <script>
        function check_user_exist(name){
            $.post( '{{url()->route('user.check')}}', { user_name: name })
            .done(function( data ) {
                data = JSON.parse(data);
                if(data.result){
                    $('#check_user').fadeOut('fast', function() {
                        $('#check_user').remove();
                        $('.password_input').fadeIn();
                        $('#sign_in').fadeIn();
                    });
                }else{
                    let decision = confirm('Your account doesn\'t exist.\nDo you want to register a new one ?');
                    if (decision) {
                        window.location.replace('{{url()->route('user.create')}}')
                    } else {
                        console.log('Keep trying');
                    }
                }
            });
        }

        $('#check_user').on('click',function (event) {
            event.preventDefault();
            event.stopPropagation();
            let name = $('#name').val();
            if(name){
                check_user_exist(name);
            }
        })
    </script>

@endsection
