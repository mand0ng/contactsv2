@extends('layout.base')
@push('styles')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script> -->
@endpush

@section('title', 'Login')

@section('content')
    @if (session('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif
   

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <form method="POST" action='/login'>
                @csrf
                
                <input id="email" class="fadeIn second" type="text" name="email" placeholder="Email">
                
                
                <input id="password" class="fadeIn third" type="password" name="password" placeholder="Password">
                
                <input type="submit" value="Submit">
               
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
            <a href="{{route('show.user.reg.form')}}">Sign Up!</a>
            </div>

        </div>
    </div>

@endsection