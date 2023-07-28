@extends('template.main')

@section('content')
    <div style="position: relative;">
        <img src="/img/loginbck.jpg" class="img-fluid" alt="" style="height: 600px; width: 100%; position: absolute; z-index: -1;">
        <div class="d-flex align-items-center justify-content-center" style="height: 600px;">
            <div class="login-form" style="width: 800px">
                <h3 class="fw-bold d-flex justify-content-center mb-2" style="color: #D6ABA2">Register</h3>
                <div class="row">
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col ">
                                <label for="name" class="form-label">Full Name</label>
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" required placeholder="Input your full name" value="{{ old('name') }}" >
                                @error('name')
                                  <div class="invalid-feedback">{{ $message }}</div>
                               @enderror
                              </div>
                              <div class="col">
                                <label for="dating" class="form-label">Dating Code</label>
                                <div class="input-group mb-3 col-5">
                                    <span class="input-group-text" id="basic-addon1">DT</span>
                                    <input type="text" id="dating" name="datingCode" class="form-control @if(session()->has('failed')) is-invalid @endif)" required placeholder="Input dating code (3 digit)" value="{{ old('datingCode') }}">
                                    @if(session()->has('failed'))
                                        <div class="invalid-feedback">{{ session('failed') }}</div>
                                    @endif
                                    @error('datingCode')
                                         <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                              </div>
                              
                        </div>
                        
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="dob" class="form-label">Date Of Birth</label>
                                <input name="dob" type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" required placeholder="Input your date of birth">
                                @error('dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="dob" class="form-label">Gender</label>
                                <select name="gender" id="gender" class="form-select mb-3  @error('gender') is-invalid @enderror" aria-label="Default select example" required>
                                    <option selected disabled>Select your gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                                @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="email" class="form-label">Email</label>
                                <input name="email" required type="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Input your email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                
                            <div class="mb-3 col">
                                <label for="phoneNum" class="form-label">Phone Number</label>
                                <input name="phoneNumber" required type="text" class="form-control  @error('phoneNumber') is-invalid @enderror" id="phoneNum" placeholder="Input your phone number (starting with +65)" value="{{ old('phoneNumber') }}">
                                @error('phoneNumber')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="formFile" class="form-label ">Upload Photo</label>
                                <input required name="img" class="form-control @error('img') is-invalid @enderror" type="file" id="formFile">
                                @error('img')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                
                            <div class="mb-3 col">
                              <label for="exampleInputPassword1" class="form-label">Password</label>
                              <input required name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" >
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="col-12 d-flex justify-content-center">
                            <button type="submit" class="btn fw-bold" style="background-color: #D6ABA2; color:white; width: 100px">Register</button>
                        </div>
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
@endsection