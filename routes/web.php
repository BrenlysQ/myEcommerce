<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('home', function () {
    return view('home');
});

Route::get('about', function () {
    return view('about');
});

Route::get('brand', function () {
    return view('brand');
});

Route::get('contact', function () {
    return view('contact');
});

Route::post('message', function () {
    //eniviar un correo al dev
    // responder al usuario
    $data = request()->all();
    Mail::send("emails.message", $data, function($message) use ($data){
        $message->from($data['email'], $data['name'])
                ->to('brenlysandreina@gmail.com','Brens')
                ->subject($data['subject']);
});
    return back()->whith('flash', 'Tu mensaje ha sido recibido');
})->name('message');