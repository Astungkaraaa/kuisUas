@extends('template.main')

@include('navbar')
@section('content')

    <!-- Modal Sukses -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Pembayaran Sukses!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Pembayaran Anda telah berhasil.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <img src="/img/{{ $dress->img }}" alt="" class="img-fluid dress-img">
            </div>
            <div class="col-6">
                <h1 class="fw-bold fs-1" style="color: #D6ABA2">{{ $dress->name }}</h1>
                <p>{{ $dress->description }}</p>
                <div class="dress-loc d-flex ">
                    <i class="bi bi-geo-alt-fill mt-1" style="color: #D6ABA2"></i>
                    <p class="ms-2">Jl. {{ $dress->location }}, {{ $dress->regency->name }}</p>
                </div>
                <div class="dress-loc d-flex ">
                    <p class="fw-bold ms-1" style="color: #D6ABA2">$</p>
                    <p class="ms-2">{{ $dress->price }}</p>
                </div>
                <p >@lang('wedding.detail.tax') :           {{ $tax }}</p>
                <p >@lang('wedding.detail.service') :       {{ $service }}</p>
                <hr style="width:200px">
                <h1 class="fw-bold fs-4" style="color: #D6ABA2">@lang('wedding.detail.price') : {{ $total }}</h1>

                <label for="exampleInputEmail1" class="form-label">@lang('wedding.detail.alamat')</label>
                <input type="text" class="form-control">

                {{-- <form class="form mt-3 " action="/book/confirm" method="POST"> --}}

                    <h5 class="mb-3">@lang('wedding.detail.metode')</h5>
                    <div class="email-phone d-flex">
                        <div class="mb-3 col-lg-6 form-floating">
                            <select name="payment" id="payment" class="form-select @error('payment') is-invalid @enderror" aria-label="Default select example">
                                <option selected disabled>@lang('wedding.detail.chooseBank')</option>
                                <option value="1">BCA</option>
                                <option value="2">BNI</option>
                                <option value="3">BRI</option> 
                            </select>
                            <label for="payment" class="form-label">Virtual Account</label>
                        </div>
                        
                    </div>
                    

                    <div class="wrap d-flex justify-content-end mt-2 col-lg-12 mb-5">
                        <button class="btn text-white fw-bold col-lg " data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #D6ABA2">@lang('wedding.detail.button')</button>
                    </div>
                {{-- </form> --}}
  
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Order Succes</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Selamat pesanan anda telah berhasil dibuat
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="/">
                            <button type="button" class="btn btn-primary">Ke Home</button>
                        </a> 
                        </div>
                    </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

    <style>
        .dress{
            box-shadow: 0 0 10px 0px rgba(0, 0, 0, 0.2);
            border-radius: 10px
        }

        .dress-img{
            max-width: 400px;
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
@endsection