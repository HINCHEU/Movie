@extends('auth.layout')
@section('main')
    <!-- authorization form -->
    <form action="{{ route('password.update') }}" method="POST" class="sign__form">
        @csrf
        <a href="index.html" class="sign__logo">
            <img src="img/logo.svg" alt="">
        </a>
        <input type="hidden" name="token" value="{{ request()->route('token') }}">
        <div class="sign__group">
            <input type="text" class="sign__input" name="email" placeholder="Email" value="{{ $_GET['email'] }}">
        </div>

        <div class="sign__group">
            <input type="password" class="sign__input" name ="password" placeholder="Password">
            @error('password')
                {{ $message }}
            @enderror
        </div>
        <div class="sign__group">
            <input type="password" class="sign__input" name ="password_confirmation" placeholder="Re-Password">
        </div>



        <button class="sign__btn" type="submit">Sign in</button>


    </form>
    <!-- end authorization form -->
@endsection
