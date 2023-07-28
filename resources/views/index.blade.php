@extends('template.main')

<img src="/img/bgFix.png" class="img-fluid back" alt="" style="height: 700px">
@include('navbar')
@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible d-flex justify-content-center col-lg" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('failed'))
            <div class="alert alert-danger alert-dismissible d-flex justify-content-center col-lg" role="alert">
                {{ session('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row pt-5">
            <div class="col-2"></div>
            <div class="title d-flex justify-content-center align-items-center col-8" style="height: 80vh">
                <p class="fw-bold text-white text-center">@lang('wedding.home.header')</p>
            </div>
        </div>
        
        <div class="row d-flex justify-content-center " style="height: 200px; margin-top:100px">
            <div class="location bg-white mb-5 d-flex flex-row justify-content-center align-items-center px-5">
                <div class="col-lg-8 text-center">
                    <label for="daerah" class="fw-bold mb-2 ms-1 fs-4" style="color: #D6ABA2">Location Filter</label>
                    <select id="daerah" name="daerah" class="form-select" aria-label="Default select example">
                        <option selected disabled >@lang('wedding.home.location')</option>
                        <option value="1">Singapore</option>
                        <option value="2">Bali</option>
                        <option value="3">Jakarta</option>
                    </select>
                </div>
            </div>
        </div>
        

        <h3 class="filter-title fw-bold mb-4">@lang('wedding.home.subtitle')</h3>
        <div id="filter">
            @foreach ($dresses as $dress)
                <div class="mb-4">
                    <div class="dress col-12 p-3 d-flex flex-row">
                        <img src="/img/{{ $dress->img }}" alt="" class="img-fluid dress-img">
                        <div class="ms-4 d-flex flex-column col-lg-6">
                            <h3 class="fw-bold" style="color:#D6ABA2">{{ $dress->name }}</h3>
                            <p>{{ $dress->description }}</p>
                            <div class="dress-loc d-flex ">
                                <p class="fw-bold ms-1" style="color: #D6ABA2">$</p>
                                <p class="ms-2">{{ $dress->price }}</p>
                            </div>
                            <div class="dress-loc d-flex ">
                                <i class="bi bi-geo-alt-fill mt-1" style="color: #D6ABA2"></i>
                                <p class="ms-2">Jl. {{ $dress->location }}, {{ $dress->regency->name }}</p>
                            </div>
    
                            
                        </div>
                        <div class="d-flex justify-content-end align-items-end col">
                            <a href="/buy/{{ $dress->id }}" type="button" class="fw-bold book-btn btn">@lang('wedding.home.button')</a>
                        </div>
                        <div class="col-1"></div>
                        
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>





    <style>
        .form-select{
            border-color: #D6ABA2
        }

        .back{
            position: absolute;
            height: 100vh;
            width: 100%;
        }

        .title{
            font-size: 3rem;
            position: relative;
        }
        
        .location{
            box-shadow: 0 0 10px 0px rgba(0, 0, 0, 0.4);
            border-radius: 10px;
            position: relative;
            margin-top: 20px;
            min-height: 20%;
            width: 70%;
        }

        .dress{
            box-shadow: 0 0 10px 0px rgba(0, 0, 0, 0.2);
            border-radius: 10px
        }

        .dress-img{
            max-width: 300px;
            border-radius: 20px;
        }

        .book-btn{
            min-width: 200px;
            min-height: 30px;
            background-color: #D6ABA2;
            color: white;
        }

        .book-btn:hover{
            background-color: #D97B66;
            color: white;
        }
    </style>

    <script src="/js/filter.js"></script>
@endsection