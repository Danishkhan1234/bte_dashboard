<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class AdminController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }






     
    public function login_page(){

        return view('admin.login');
    }
        public function login(Request $request){

            $this->validate($request, [

                'email' => 'required',

                'password' => 'required',

            ]);

            $response = Http::post('http://localhost:8000/api/admin_login?email=admin@gmail.com&password=admin786');
            echo $response->getStatusCode(); // 200
            echo $response->getBody(); // { "type": "User", ....
       }
 
    }       

