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

    protected $baseUrl = 'http://bte.baxkit.com/api/';
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
        $this->validate($request, [        
        'name' => 'required',
    ]);

    $response = Http::post($this->baseUrl.''.'country/submit', [
        'name' => $request['name'],
    ]);
    return redirect()->route('admin.country')->with('message', 'Data has been Submit successfully!');

    }


        public function edit($id,ApiHelper $api){
        $response = Http::get($this->baseUrl.''.'country/edit/'.$id)->json();
        return view('admin.country.edit',[
        'country' => $response,

    ]);

    }

    public function update(Request $request,$id){
        $this->validate($request, [        
            'name' => 'required',
        ]);
        $response = Http::post($this->baseUrl.''.'country/update/'.$id, [
            'name' => $request['name'],
        ]);
        return redirect()->route('admin.country')->with('message', 'Data has been Updated successfully!');
    

    }
        public function delete($id){
        $response = Http::get($this->baseUrl.''.'country/delete/'.$id)->json();
        return redirect()->route('admin.country')->with('message', 'Data has been Deleted successfully!');
    }

    }       

