<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
class SkillController extends Controller

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
        $skills=Skill::all();
      return response()->json($skills);
    } 


    public function create(){
        return view('admin.skill.create');
    }




    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
             ]);
    
       $table =new Skill();
        $table->name=$request->name;
        $table->save();
        return response()->json("data save");

    }


    public function edit($id){
        $skill=Skill::find($id);
        return response()->json($skill);
    }

    public function update(Request $request,$id){
        $table =Skill::find($id);
        $table->name=$request->name;
        $table->update();
        return response()->json("data update");
    }

    
    public function delete($id){
        $countries=Skill::find($id);
        $countries->delete();
        return response()->json("data delete");
    }

    }       

