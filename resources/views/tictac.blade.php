@extends('template.main')
<script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>
@section('content')

    <div style="background-color: grey; height:700px">
        <div class="container">
            <div class="d-flex flex-column align-items-center">
                <h1 class="fw-bold">Tic Tac Toe</h1>
                <h6 id="message" class="fw-bold">Message</h6>
                <div class="row row-cols-3 col-4 bg-white" id="board">
                    <div class="col bg-warning border border-5 border-white p5">
                        <h2 class="text-center">X</h2>
                    </div>
                </div>


                <input type="hidden" value="{{ $roomId }}" id="room">
                <button class="d-none btn btn-primary rounded rounded-pill " id="join-btn">Join</button>
            </div>


        </div>
    </div>
   
    <script>
    $(document).ready(function() {
        $('#join-btn').click();

        $(window).bind('unload', function(){
            $.ajax({
                url: '/reconnect',
                method: 'GET'
            });
        });
    });
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>
@endsection