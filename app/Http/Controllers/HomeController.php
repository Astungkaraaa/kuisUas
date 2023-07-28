<?php

namespace App\Http\Controllers;

use App;
use App\Models\Dress;
use App\Models\Location;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        $locale = session()->get('locale');
        App::setLocale($locale);
        return view('index', [
            'dresses' => Dress::all(),
        ]);
    }

    public function buy($id){
        $locale = session()->get('locale');
        App::setLocale($locale);
        $dress = Dress::findOrFail($id);
        $price = (int)$dress->price;
        $tax = $price * 5/100;
        $service = $price * 5/100;
        $price = $price + $tax + $service;
        return view('buy', [
            'dress' => $dress,
            'total' => $price,
            'tax' => $tax,
            'service' => $service,
        ]);
    }

    public function filter(Request $request){
        $locations = $request->id_loc;

        $dresses = Dress::where('location_id', $locations)->get();

        $locations = Location::where('id', $locations)->first();
        $location = $locations->name;

        foreach ($dresses as $key => $dress){
            echo "<div class='mb-4'>
            <div class='dress col-12 p-3 d-flex flex-row'>
                <img src='/img/$dress->img' alt='' class='img-fluid dress-img'>
                <div class='ms-4 d-flex flex-column col-lg-6'>
                    <h3 class='fw-bold' style='color:#D6ABA2'>$dress->name</h3>
                    <p>$dress->description</p>
                    <div class='dress-loc d-flex '>
                        <p class='fw-bold ms-1' style='color: #D6ABA2'>$</p>
                        <p class='ms-2'>$dress->price</p>
                    </div>
                    <div class='dress-loc d-flex '>
                        <i class='bi bi-geo-alt-fill mt-1' style='color: #D6ABA2'></i>
                        <p class='ms-2'>Jl. $dress->location, $location</p>
                    </div>
                </div>
                <div class='d-flex justify-content-end align-items-end col'>
                    <a href='/buy/$dress->id' type='button' class='fw-bold book-btn btn'>Book</a>
                </div>
                <div class='col-1'></div>
            </div>
            </div>";
        }
    }
}
