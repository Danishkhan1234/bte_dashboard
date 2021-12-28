<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Helper\ApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CityController extends Controller

{

    protected $baseUrl = 'http://localhost:8000/api/admin/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(ApiHelper $api){

    
        return view('admin.city.index',[
            'cities' => $api->getCity(),
        ]);
    } 


    public function create(ApiHelper $api){
        $headers = [
            'Authorization' => 'Bearer '.session()->get('access_token')
            ];

        return view('admin.city.create',[
            'countries' => $api->getCountry(),
        ]);
    }




    public function store(Request $request,ApiHelper $api){

            $headers = [
                'Authorization' => 'Bearer '.session()->get('access_token')
                ];

            $response =Http::withHeaders($headers)->post($this->baseUrl.''.'city', [
        'name' => $request['name'],
        'country_id' => $request['country_id'],
    ]);


    if(isset($response['message'])){
        return redirect()->route('admin.city')->with('message', $response['message']);
    }else{
        return redirect()->back()->with('errors', $response['error']);
    }

}


        public function edit($id,ApiHelper $api){

            $headers = [
                'Authorization' => 'Bearer '.session()->get('access_token')
                ];
        $response =Http::withHeaders($headers)->get($this->baseUrl.''.'city/edit/'.$id)->json();

        return view('admin.city.edit',[
        'city' => $response,
        'countries' => $api->getCountry(),

    ]);

    }

    public function update(Request $request,$id){
    
        $headers = [
            'Authorization' => 'Bearer '.session()->get('access_token')
            ];
    
        $response =Http::withHeaders($headers)->post($this->baseUrl.''.'city/update/'.$id, [
            'name' => $request['name'],
            'country_id' => $request['country_id'],
        ]);

        if(isset($response['message'])){
            return redirect()->route('admin.city')->with('message', $response['message']);
        }else{
            return redirect()->back()->with('errors', $response['error']);
        }
    

    }
    public function delete($id){

        $headers = [
            'Authorization' => 'Bearer '.session()->get('access_token')
            ];

         $response =Http::withHeaders($headers)->get($this->baseUrl.''.'city/delete/'.$id)->json();
         if(isset($response['message'])){
            return redirect()->route('admin.city')->with('message', $response['message']);
        }else{
            return redirect()->route('admin.city')->with('error', $response['error']);
        }

    }

    }       

