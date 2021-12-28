<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Helper\ApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CityController extends Controller

{

    protected $baseUrl = 'http://bte.baxkit.com/api/';
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
        return view('admin.city.create',[
            'countries' => $api->getCountry(),
        ]);
    }




    public function store(Request $request,ApiHelper $api){
        $this->validate($request, [        
        'name' => 'required',
        'country_id' => 'required',
    ]);

    $response = Http::post($this->baseUrl.''.'city/submit', [
        'name' => $request['name'],
        'country_id' => $request['country_id'],
    ]);
    return redirect()->route('admin.city')->with('message', 'Data has been Submit successfully!');

    }


        public function edit($id,ApiHelper $api){
        $response = Http::get($this->baseUrl.''.'city/edit/'.$id)->json();
        return view('admin.city.edit',[
        'city' => $response,
        'countries' => $api->getCountry(),

    ]);

    }

    public function update(Request $request,$id){
        $this->validate($request, [        
            'name' => 'required',
            'country_id' => 'required',
        ]);
        $response = Http::post($this->baseUrl.''.'city/update/'.$id, [
            'name' => $request['name'],
            'country_id' => $request['country_id'],
        ]);
        return redirect()->route('admin.city')->with('message', 'Data has been Updated successfully!');
    

    }
    public function delete($id){
        $response = Http::get($this->baseUrl.''.'city/delete/'.$id)->json();
        return redirect()->route('admin.city')->with('message', 'Data has been Deleted successfully!');
    }

    }       

