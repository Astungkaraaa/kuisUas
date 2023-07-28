@extends('template.main')

@section('content')

    <div style="position: relative;">
        <img src="/img/loginbck.jpg" class="img-fluid" alt="" style="height: 600px; width: 100%; position: absolute; z-index: -1;">
        <div class="d-flex align-items-center justify-content-center" style="height: 600px;">
            <div class="login-form" style="width: 450px">
                <div class="col-12">
                    <h1 class="d-flex justify-content-center" style="color: #D6ABA2">Login</h1>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Or ID</label>
                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" required placeholder="Input email or Id" value="{{ old('email') }}" >
                            @error('name')
                              <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                        </div>
            
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input required name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" >
                              @error('password')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                        </div>

                        <div class="col-12 d-flex justify-content-center">
                            <button type="submit" class="btn fw-bold" style="background-color: #D6ABA2; color:white; width: 100px">Login</button>
                        </div>

                        <small class="mt-3 text-center" style="width: 60%">
                            dont have an account ? <a href="{{ route('register') }}">Register</a>
                        </small>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .login-form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }

    </style>

    {{-- <img src="/img/loginbck.png" class="img-fluid" alt="" style="height: 700px; width:100%; position: absolute;">
        <div class="login-form row g-0">
            <div class="col-6">
                <h3>Login</h3>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Or ID</label>
                        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" required placeholder="Input email or Id" value="{{ old('email') }}" >
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                    </div>
        
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input required name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" >
                          @error('password')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                    </div>
        
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    
    <style>
        .login-form{
            position: relative;
        }

    </style> --}}
@endsection