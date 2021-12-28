<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Admin;
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
            $response = Http::post('http://bte.baxkit.com/api/admin_login?email='.$email.'&password='.$password.'');
            $data = json_decode($response->getBody()->getContents(), true);
             if($data==null){
                    return redirect()->back()->with('message', 'Invalid credentials!');
                }else{
                    $request->session()->put('ADMIN_LOGIN',true);
                    $request->session()->put('ADMIN_LOGIN',$data['admin']['user_name']);
                    return redirect()->route('admin.dashboard');
                }
                }
 
    }       

