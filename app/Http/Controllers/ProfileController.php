<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function index($id)
    {
        // Declare variables as per the question
        $name = "Donal Trump";
        $age = "75";
        
        // Prepare data array
        $data = [
            'id' => $id,
            'name' => $name,
            'age' => $age
        ];

        // Set cookie parameters
        $name = 'access_token';
        $value = '123-XYZ';
        $minutes = 1;
        $path = '/';
        $domain = $_SERVER['SERVER_NAME'];
        $secure = false;
        $httpOnly = true;

        // Return the response cookie, and status code 200
        return response()->json($data)->cookie($name, $value, $minutes, $path, $domain, $secure, $httpOnly)->setStatusCode(200);
    }
}
