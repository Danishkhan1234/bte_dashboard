<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Helper\ApiHelper;
use Illuminate\Http\Request;
class AdminController extends Controller

{

    protected $baseUrl = 'http://localhost:8000/api/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */     
    public function login_page(){

        return view('admin.login');
    }



        public function login(Request $request){

            $this->validate($request, [
                'email' => 'required',
                'password' => 'required',
            ]);

            
            $email =$request->email;
            $password =$request->password;
            $response = Http::post('http://localhost:8000/api/login?email='.$email.'&password='.$password.'');
            $data = json_decode($response->getBody()->getContents(), true);
             if(isset($data['message'])){
                    return redirect()->back()->withInput($request->all())->with('error', $data['message']);
                }else{
                    if($data['role'][0]['name']=="super-admin"){
                    $request->session()->put('ADMIN_LOGIN',true);
                    $request->session()->put('access_token',$data['access_token']);
                    return redirect()->route('admin.dashboard');
                    }else{
                        return redirect()->back()->withInput($request->all())->with('error', "Login with Admin Credentials");
                    }
                }

                }



                public function logout(ApiHelper $api){

                    $response =Http::withHeaders($api->TokenHeader())->post($this->baseUrl.''.'auth/logout');
                    if($response['message']=="Successfully logged out"){
                        session()->forget('ADMIN_LOGIN');
                        session()->forget('access_token');
                        return redirect(route('login'))->with('success',$response['message']);
                    }
                  

                }
         
 
    }       

