<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/profile/{id}', [ProfileController::class, 'index']);


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/form-submit', function (Request $request) {

    $email = $request->input('email');

    if ($email) {
 
        return response()->json([
            'status' => 'success',
            'message' => 'Form submitted successfully.',
            'email' => $email
        ]);
    } else {
    
        return response()->json([
            'status' => 'failed',
            'message' => 'Form submission failed.'
        ]);
    }
});
