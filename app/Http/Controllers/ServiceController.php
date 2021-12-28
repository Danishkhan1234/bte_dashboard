<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Helper\ApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ServiceController extends Controller

{

    protected $baseUrl = 'http://localhost:8000/api/admin/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function index(ApiHelper $api){
        return view('admin.service.index',[
            'services' => $api->getService(),
        ]);
    } 


    public function create(){
        return view('admin.service.create');
    }




    public function store(Request $request,ApiHelper $api){
     
        $headers = [
            'Authorization'=>'Bearer '.session()->get('access_token')
            ];

    $response =Http::withHeaders($headers)->post($this->baseUrl.''.'service', [
        'name' => $request['name'],
    ]);

    if(isset($response['message'])){

        return redirect()->route('admin.service')->with('message',$response['message']);
    }else{

        return redirect()->back()->with('errors',$response['error']);
    }
    }


        public function edit($id,ApiHelper $api){


            $headers = [
                'Authorization'=>'Bearer '.session()->get('access_token')
                ];
      
            $response = Http::withHeaders($headers)->get($this->baseUrl.''.'service/edit/'.$id)->json();
        return view('admin.service.edit',[
        'service' => $response,

    ]);

    }

    public function update(Request $request,$id){

        $headers = [
            'Authorization'=>'Bearer '.session()->get('access_token')
            ];

        $response = Http::withHeaders($headers)->post($this->baseUrl.''.'service/update/'.$id, [
            'name' => $request['name'],
        ]);
       
        if(isset($response['message'])){

            return redirect()->route('admin.service')->with('message',$response['message']);
        }else{
    
            return redirect()->back()->with('errors',$response['error']);
        }

    }
        public function delete($id){
            $headers = [
                'Authorization'=>'Bearer '.session()->get('access_token')
                ];

        $response = Http::withHeaders($headers)->get($this->baseUrl.''.'service/delete/'.$id)->json();
        return redirect()->route('admin.service')->with('message', 'Data has been Deleted successfully!');
    }

    }       

