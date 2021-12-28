<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Helper\ApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SkillController extends Controller

{

    protected $baseUrl = 'http://localhost:8000/api/admin/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function index(ApiHelper $api){
        return view('admin.skill.index',[
            'skills' => $api->getSKill(),
        ]);
    } 


    public function create(ApiHelper $api){
        return view('admin.skill.create',[
            'services' => $api->getService(),
        ]);
    }




    public function store(Request $request,ApiHelper $api){
     

    $headers = [
        'Authorization' => 'Bearer '.session()->get('access_token')
        ];

    $response = $response = Http::withHeaders($headers)->post($this->baseUrl.''.'skill', [
        'name' => $request['name'],
        'service_id' => $request['service_id'],
    ]);


    if(isset($response['message'])){

        return redirect()->route('admin.skill')->with('message', $response['message']);
    }else{

        return redirect()->back()->with('errors',$response['error']);
    }


    }


        public function edit($id,ApiHelper $api){

            $headers = [
                'Authorization' => 'Bearer '.session()->get('access_token')
                ];

        $response=Http::withHeaders($headers)->get($this->baseUrl.''.'skill/edit/'.$id)->json();

        return view('admin.skill.edit',[
        'skill' => $response,
        'services' => $api->getService(),

    ]);

    }

    public function update(Request $request,$id){

        $headers = [
            'Authorization' => 'Bearer '.session()->get('access_token')
            ];

        $response=Http::withHeaders($headers)->post($this->baseUrl.''.'skill/update/'.$id, [
            'name' => $request['name'],
            'service_id' => $request['service_id'],
        ]);

        if(isset($response['message'])){

            return redirect()->route('admin.skill')->with('message',$response['message']);
        }else{
    
            return redirect()->back()->with('errors',$response['error']);
        }
    
    

    }
        public function delete($id){

            $headers = [
                'Authorization'=>'Bearer '.session()->get('access_token')
                ];

        $response = $response = Http::withHeaders($headers)->get($this->baseUrl.''.'skill/delete/'.$id)->json();

        if(isset($response['message'])){
            return redirect()->route('admin.skill')->with('message', $response['message']);
        }else{
            return redirect()->route('admin.skill')->with('error', $response['error']);
        }

    }

    }       

