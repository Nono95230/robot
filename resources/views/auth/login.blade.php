@extends('layouts.master')

@section('title', 'Login')

@section('sidebar')
    @parent
@endsection

@section('style')
  <style >
    #container-login-form{
      display: inline-block;
      padding: 32px 48px;
      border: 1px solid #EEE;
    }
    form .row{
      margin-bottom: 0;
    }
    .input-field{
      text-align: left;
    }
    .input-field div.error {
      position: relative;
      top: -1rem;
      left: 0rem;
      font-size: 0.8rem;
      color: #FF4081;
      -webkit-transform: translateY(0%);
      -ms-transform: translateY(0%);
      -o-transform: translateY(0%);
      transform: translateY(0%);
    }
    #forgot-password{
      float: right;
    }
  </style>
@endsection

@section('content')



<div class="section"></div>
<main>
  <center>
    <div class="section"></div>

    <h5 class="indigo-text">Please, login into your account</h5>
    <div class="section"></div>

    <div class="container">
      <div id="container-login-form" class="z-depth-1 grey lighten-4 row">

        <form class="col s12" method="post" action="{{ url('admin/login') }}">
          {{ csrf_field() }} {{-- token pour protéger votre formulaire CSRF --}}
          <div class='row'>
            <div class='input-field col s12'>
              <input class='validate' type='email' name='email' id='email' value="{{old('email')}}" />
              <label for='email'>Enter your email</label>
              @if($errors->has('email')) <div class="error">{{$errors->first('email')}} </div>@endif
            </div>
          </div>

          <div class='row'>
            <div class='input-field col s12'>
              <input class='validate' type='password' name='password' id='password' value="{{old('password')}}" />
              <label for='password'>Enter your password</label>
              @if($errors->has('email')) <div class="error">{{$errors->first('password')}} </div>@endif
            </div>
            <label id="forgot-password">
              <a class='pink-text' href='#!'><b>Forgot Password?</b></a>
            </label>
          </div>
          <div class="row">
              <div class="input-field col s12">
                  <p>
                    <input type="checkbox" id="remember" name='remember' {{ old('remember')? 'checked' :''}}>
                    <label for="remember">Remember me</label>
                  </p>
              </div>
          </div>

          <br />
          <center>
            <div class='row'>
              <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
            </div>
          </center>
        </form>
      </div>
    </div>
    <a href="#!">Create account</a>
  </center>

  <div class="section"></div>
  <div class="section"></div>
</main>
@endsection









