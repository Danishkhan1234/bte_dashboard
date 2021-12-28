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

    protected $baseUrl = 'http://bte.baxkit.com/api/';    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function index(Request $request,ApiHelper $api){
        $users = Http::get($this->baseUrl.''.'user/', [
        'is_verified' => $request['is_verified'],
        'roles' => $request['roles'],
        'status' => $request['status'],
    ])->json('data');
    return $users;
    return view('admin.user.index',[
        'users' =>$users,
    ]);
}



  
    }       

