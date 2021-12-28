<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
class CountryController extends Controller

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

        $countries=Country::all();
        return view('admin.country.index',compact('countries'));
    } 


    public function create(){
        return view('admin.country.create');
    }




    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
             ]);

        $table =new Country();
        $table->name=$request->name;
        $table->save();
        return redirect('admin/country');

    }


    public function edit($id){
        $countries=Country::find($id);
        return view('admin.country.edit',compact('countries'));
    }

    public function update(Request $request,$id){
        $table =Country::find($id);
        $table->name=$request->name;
        $table->update();
        return redirect('admin/country');

    }
    public function delete($id){
        $countries=Country::find($id);
        $countries->delete();
        return redirect('admin/country');
    }

    }       

