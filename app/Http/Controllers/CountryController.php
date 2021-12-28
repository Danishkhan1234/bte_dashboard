<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Helper\ApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CountryController extends Controller

{

    protected $baseUrl = 'http://localhost:8000/api/admin/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function index(ApiHelper $api){

        return view('admin.country.index',[
            'countries' => $api->getCountry(),
        ]);
    } 


    public function create(){
        return view('admin.country.create');
    }




    public function store(Request $request,ApiHelper $api){

    $headers = [
        'Authorization' => 'Bearer '.session()->get('access_token')
        ];


    $response = Http::withHeaders($headers)->post($this->baseUrl.''.'country', [
        'name' => $request['name'],
    ]);
    if(isset($response['message'])){
        return redirect()->route('admin.country')->with('message', $response['message']);
    }else{
        return redirect()->back()->with('errors', $response['error']);
    }
    }


        public function edit($id,ApiHelper $api){


            $headers = [
                'Authorization' => 'Bearer '.session()->get('access_token')
                ];

        $response = Http::withHeaders($headers)->get($this->baseUrl.''.'country/edit/'.$id)->json();

        return view('admin.country.edit',[
        'country' => $response,

    ]);

    }

    public function update(Request $request,$id){

        $headers = [
            'Authorization' => 'Bearer '.session()->get('access_token')
            ];

        $response = Http::withHeaders($headers)->post($this->baseUrl.''.'country/update/'.$id, [
            'name' => $request['name'],
        ]);

        if(isset($response['message'])){
            return redirect()->route('admin.country')->with('message', $response['message']);
        }else{
            return redirect()->back()->with('errors', $response['error']);
        }
    

    }
 
 
    public function delete($id,ApiHelper $api){
 
        $headers = [
            'Authorization' => 'Bearer '.session()->get('access_token')
            ];

        $response = Http::withHeaders($headers)->get($this->baseUrl.''.'country/delete/'.$id)->json();
 
        if(isset($response['message'])){
            return redirect()->route('admin.country')->with('message', $response['message']);
        }else{
            return redirect()->route('admin.country')->with('error', $response['error']);
        }

       }

    }       

