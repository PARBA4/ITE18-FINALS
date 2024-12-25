@extends('layouts.login')

@section('content')
<div class="container1">
    <!-- Left Section -->
    <div class="left-section">
        <div class="logo">
            <img src="{{ asset('img/Logo.png') }}" alt="CARAGA Logo" class="logo-img">
        </div> 
    </div>

    <!-- Right Section -->
    <div class="right-section">
        <div class="form-container">
            <h2>Login</h2>

            <!-- Check if there are any error messages -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Username" autocomplete="off">
                <input type="password" name="password" placeholder="Password" autocomplete="off">
                <button type="submit" class="login-btn">Login</button>
            </form> 
        </div>
    </div>
</div>
@endsection