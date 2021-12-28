<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
class CityController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){

        $cities=City::all();
        return response()->json($cities);
    } 


    public function create(){
      $countries=Country::all();
        return view('admin.city.create',compact('countries'));
    }




    public function store(Request $request){

        $this->validate($request, [        
        'name' => 'required',
        'country_id' => 'required',
    ]);

        $table =new City();
        $table->country_id=$request->country_id;
        $table->name=$request->name;
        $table->save();
        return response()->json("Data Save");

    }


    public function edit($id){
        $city=City::find($id);
        $countries=Country::all();
        return response()->json([
            'city'=>$city,
            'countries'=>$countries
        ]);
    }

    public function update(Request $request,$id){
        $this->validate($request, [        
            'name' => 'required',
            'country_id' => 'required',
        ]);
        
        $table =City::find($id);
        $table->name=$request->name;
        $table->country_id=$request->country_id;
        $table->update();
        return response()->json('data update');

    }
    public function delete($id){
        $countries=City::find($id);
        $countries->delete();
        return response()->json('data delete');
    }

    }       

