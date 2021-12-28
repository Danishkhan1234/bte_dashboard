<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Helper\ApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller

{

    protected $baseUrl = 'http://localhost:8000/api/admin/';   
     /**
     * Create a new controller instance.
     *
     * @return void
     */

  


    public function index(Request $request,ApiHelper $api){
      
        $users = Http::withHeaders($api->TokenHeader())->get($this->baseUrl.''.'users', [
        'is_verified' => $request['is_verified'],
        'roles' => $request['roles'],
        'status' => $request['status'],
    ])->json('data');

    return view('admin.user.index',[
        'users' =>$users,
    ]);
}



  public function edit($id,ApiHelper $api){
    $user = Http::withHeaders($api->TokenHeader())->get($this->baseUrl.''.'user/'.$id)->json('data');
    return view('admin.user.edit',[
      'user'=>$user,
  ]);

}


public function show($id,ApiHelper $api){
  $user = Http::withHeaders($api->TokenHeader())->get($this->baseUrl.''.'user/'.$id)->json('data');


  return view('admin.user.show',[
    'user'=>$user,
]);

}


  public function update(Request $request,$id,ApiHelper $api){

    try{
    $response = Http::withHeaders($api->TokenHeader())->post($this->baseUrl.''.'user/update/'.$id,[
      'user_name' => $request['user_name'],
      'first_name' => $request['first_name'],
      'last_name' => $request['last_name'],
      'email' => $request['email'],
      'country' => $request['country'],
      'city' => $request['city'],
      'status' => $request['status'],
      'verified_email' => $request['verified_email']
    ]);

    
    if(isset($response['message'])){
      return redirect()->route('admin.user')->with('message', $response['message']);
  }else{
      return redirect()->back()->with('errors', $response['error']);
  }
}catch (\Exception $e) {
  return redirect()->back()->with('error', $e->getMessage());

}
      
  }






  
    }       

