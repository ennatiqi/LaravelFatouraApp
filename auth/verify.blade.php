@extends('layouts.mas')
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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
    min-height: 50vh;
    width: 25%;
    background: linear-gradient( to right bottom, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.3));
    border-radius: 2rem;
    z-index: 2;
    backdrop-filter: blur(2rem);
    display: flex;
}

.dashboard {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    text-align: center;
    border-radius: 2rem;
}

.circle1 {
    background: white;
    background: linear-gradient( to right bottom, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.3));
    height: 20rem;
    width: 20rem;
    position: absolute;
    border-radius: 50%;
}

.circle1 {
    top: 9%;
    right: 30%;
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
    margin-bottom: 30px;
}

.input-field input {
    background: none;
    outline: none;
    border: none;
    color: #333;
    font-size: 1rem;
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
    margin-bottom: 30px;
}

.btn:hover {
    background-color: #6cdbeb;
}
.invalid-feedback{
        color:red;
      
    }
    </style>
@section('content')

                

                
       
<main>
        <section class="glass">
            <div class="dashboard">
                <div class="login">
                    <h2 class="title">Verify Your Email Address</h2>
                    <p>Before proceeding, please check your email <br>for a verification link.<br>If you did not receive the email
                   </p>
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <br>
                   
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                    
                    <input type="submit" value="click here to request another" class="btn solid" />
</form>
                </div>
            </div>
            </div>
        </section>
    </main>
    <div class="circle1"></div>
@endsection
