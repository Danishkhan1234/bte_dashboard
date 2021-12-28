<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Helper\ApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class WorkLevelController extends Controller

{

    protected $baseUrl = 'http://bte.baxkit.com/api/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function index(ApiHelper $api){
        return view('admin.work_level.index',[
            'levels' => $api->getWorkLevel(),
        ]);
    } 

    public function create(){
        return view('admin.work_level.create');
    }

    public function store(Request $request,ApiHelper $api){
        $this->validate($request, [        
        'name' => 'required',
    ]);

    $response = Http::post($this->baseUrl.''.'work-level/submit', [
        'name' => $request['name'],
    ]);
    return redirect()->route('admin.work_level')->with('message', 'Data has been Submit successfully!');

    }


    public function edit($id,ApiHelper $api){
        $response = Http::get($this->baseUrl.''.'work-level/edit/'.$id)->json();
        return view('admin.work_level.edit',[
        'level' => $response,

    ]);

    }

    public function update(Request $request,$id){
        $this->validate($request, [        
            'name' => 'required',
        ]);
        $response = Http::post($this->baseUrl.''.'work-level/update/'.$id, [
            'name' => $request['name'],
        ]);
        return redirect()->route('admin.work_level')->with('message', 'Data has been Updated successfully!');
    

    }
        public function delete($id){
        $response = Http::get($this->baseUrl.''.'work-level/delete/'.$id)->json();
        return redirect()->route('admin.work_level')->with('message', 'Data has been Deleted successfully!');
    }

    }       

