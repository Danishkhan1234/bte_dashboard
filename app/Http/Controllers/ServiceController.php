<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Helper\ApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ServiceController extends Controller

{

    protected $baseUrl = 'http://bte.baxkit.com/api/';
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
        $this->validate($request, [        
        'name' => 'required',
    ]);

    $response = Http::post($this->baseUrl.''.'service/submit', [
        'name' => $request['name'],
    ]);
    return redirect()->route('admin.service')->with('message', 'Data has been Submit successfully!');

    }


        public function edit($id,ApiHelper $api){
        $response = Http::get($this->baseUrl.''.'service/edit/'.$id)->json();
        return view('admin.service.edit',[
        'service' => $response,

    ]);

    }

    public function update(Request $request,$id){
        $this->validate($request, [        
            'name' => 'required',
        ]);
        $response = Http::post($this->baseUrl.''.'service/update/'.$id, [
            'name' => $request['name'],
        ]);
        return redirect()->route('admin.service')->with('message', 'Data has been Updated successfully!');
    

    }
        public function delete($id){
        $response = Http::get($this->baseUrl.''.'service/delete/'.$id)->json();
        return redirect()->route('admin.service')->with('message', 'Data has been Deleted successfully!');
    }

    }       

