@extends('layouts.app')

@section('content')
    <!-- Preloader-->

    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>

    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
            <!-- Register Form-->
            <div class="register-form mt-4 px-4">
              <h6 class="mb-3 text-center">Dashboard Access</h6>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <input name="type" value="admin" type="hidden">
                  <input class="form-control text-center" name="passcode" type="password" placeholder="enter password" />
                  @error('passcode')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <button class="btn btn-primary w-100" type="submit">LOGIN</button>
              </form>
            </div>
            <!-- Login Meta-->
          </div>
        </div>
      </div>
    </div>
@endsection