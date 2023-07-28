<?php

use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/filter', [HomeController::class ,'filter']);

Route::get('/locale/{loc}', function($loc){
    session()->put('locale', $loc);
    return redirect()->back();
});

Route::get('/admin', function(){
    return view('admin.admin', [
        'users' => User::all(),
    ]);
});

Route::get('/buy/{id}', [HomeController ::class, 'buy'])->middleware('auth');

Route::get('/game', function (){
    // if(Game::where('player_2', null)->whereNot('player_1', Auth::user()->id)->exists()){
    //     $game = Game::where('player_2', null)->whereNot('player_1', Auth::user()->id)->first();
    //     $game->player_2 = Auth::user()->id;
    //     $game->save();
    //     $roomId = $game->roomId;

    //     return view('tictac', compact('roomId'));
    // } else {
    //     $game = new Game();
    //     $game->player_1 = Auth::user()->id;
    //     $roomId = uniqid();
    //     $game->roomid = $roomId;
    //     $game->save();
        
    //     return view('tictac', compact('roomId'));
    // }

    if(Game::where('player_2', null)->whereNot('player_1', Auth::user()->id)->exists()){

        $game = Game::where('player_2', null)->whereNot('player_1', Auth::user()->id)->first();
        if($game->player1->gender != Auth::user()->gender){
            $game->player_2 = Auth::user()->id;
            $game->save();
            $roomId = $game->roomId;
            if( $game->player1->datingCode == $game->player2->datingCode ){
                
                $game->delete();

                return redirect()->route('home')->with('success','Here is your weddings partner');

            }

            return view('tictac', compact('roomId'));

        } else{
            $game = new Game();
            $game->player_1 = Auth::user()->id;
            $roomId = uniqid();
            $game->roomId = $roomId;
            $game->save();

            return view('tictac', compact('roomId'));
        }      
    }else{
        $game = new Game();
        $game->player_1 = Auth::user()->id;
        $roomId = uniqid();
        $game->roomId = $roomId;
        $game->save();

        return view('tictac', compact('roomId'));
    }      

});

Route::get('/keluar', function(){
    if(Game::where('player_1', Auth::user()->id)->exists()){
        if(Game::where('player_1', Auth::user()->id)->where('player_2', null)->exists()){
            Game::where('player_1', Auth::user()->id)->where('player_2', null)->delete();
        }

        $game = Game::where('player_1', Auth::user()->id)->first();
        $game->player_1 = $game->player_2;
        $game->player_2 = null;
        $game->save();
    } else if(Game::where('player_2', Auth::user()->id)->exists()){
        DB::table('games')->where('player_2', Auth::user()->id)->update(['player_2', null]);
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
