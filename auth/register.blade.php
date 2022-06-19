@extends('layouts.mas') 
@section('title') 
register
@stop
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .invalid-feedback{
        color:red;
       
    }
    main {
        font-family: "Poppins", sans-serif;
        min-height: 100vh;
        background: linear-gradient(to right top, #65dfc9, #6cdbeb);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .glass {
        background: white;
        min-height: 80vh;
        width: 60%;
        background: linear-gradient( to right bottom, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.3));
        border-radius: 2rem;
        z-index: 2;
        backdrop-filter: blur(2rem);
        display: flex;
    }
    
    .circle1,
    .circle2 {
        background: white;
        background: linear-gradient( to right bottom, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.3));
        height: 20rem;
        width: 20rem;
        position: absolute;
        border-radius: 50%;
    }
    
    .circle1 {
        top: 5%;
        right: 15%;
    }
    
    .circle2 {
        bottom: 5%;
        left: 10%;
    }
    
    .dashboard {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
        text-align: center;
        background: linear-gradient( to right bottom, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.3));
        border-radius: 2rem;
    }
    
    .login {
        margin-bottom: 20px;
    }
    
    .games {
        flex: 1.6;
    }
    
    .title {
        font-size: 2rem;
        color: #444;
        margin-bottom: 10px;
    }
    
    p {
        margin-bottom: 40px;
    }
    
    .input-field {
        max-width: 380px;
        width: 100%;
        background-color: #ffffff;
        height: 55px;
        border-radius: 15px;
        display: grid;
        grid-template-columns: 15% 85%;
        position: relative;
        margin-top: 30px;
    }
    
    .input-field input {
        background: none;
        outline: none;
        border: none;
        color: #333;
        font-size: 1rem;
    }
    
    a {
        color: rgb(107, 107, 240);
        text-decoration: none;
    }
    
    .input-field input::placeholder {
        color: #aaa;
        font-weight: 500;
    }
    
    .btn {
        width: 380px;
        background-color: #65dfc9;
        border: none;
        outline: none;
        height: 49px;
        border-radius: 15px;
        color: #fff;
        text-transform: uppercase;
        font-weight: 600;
        cursor: pointer;
        transition: 0.5s;
        margin-top: 30px;
        margin-bottom: 30px;
    }
    
    .btn:hover {
        background-color: #6cdbeb;
    }
</style>
@section('content')

            

              
    
 
<main>
        <section class="glass">
            <div class="games">


            </div>
            <div class="dashboard">
                <div class="login">
                    <h2 class="title">Hello Again!</h2>
                    <p>Wellcome back you've been missed!</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                       
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input id="first_name" type="text" placeholder="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus>

                               
                    </div>
                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input id="last_name" type="text" placeholder="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="name" autofocus>

                               
                    </div>
                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input id="email" type="text" placeholder="Email" class="form-control @error('name') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                               
                    </div>
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    </div>
                    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input id="password-confirm" placeholder="Password Confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <input type="submit" value="Sign in" class="btn solid" />
                    <p> u are  member? <a class="slide-item" href="{{ url('/' ) }}">Register now</a></p>
</form>
                </div>

            </div>
        </section>
    </main>
    <div class="circle1"></div>
    <div class="circle2"></div>
@endsection
