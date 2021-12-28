<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
class ServiceController extends Controller

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
        $services=Service::all();
        return response()->json($services);
    } 


    public function create(){
        return view('admin.service.create');
    }




    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
             ]);

        $table =new Service();
        $table->name=$request->name;
        $table->save();
        return response()->json("data save");

    }


    public function edit($id){
        $service=Service::find($id);
        return response()->json($service);
    }

    public function update(Request $request,$id){
        $table =Service::find($id);
        $table->name=$request->name;
        $table->update();
        return response()->json("data update");

    }
    public function delete($id){
        $countries=Service::find($id);
        $countries->delete();
        return response()->json("data delete");
    }

    }       

