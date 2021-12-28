<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Helper\ApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PaymentTypeController extends Controller

{
    protected $baseUrl = 'http://bte.baxkit.com/api/';


    public function index(ApiHelper $api){
        return view('admin.payment_type.index',[
            'payment_types' => $api->getPaymentType(),
        ]);
    } 

    public function create(){
        return view('admin.payment_type.create');
    }

    public function store(Request $request,ApiHelper $api){
        $this->validate($request, [        
        'name' => 'required',
    ]);

    $response = Http::post($this->baseUrl.''.'payment-type/submit', [
        'name' => $request['name'],
    ]);
    return redirect()->route('admin.payment_type')->with('message', 'Data has been Submit successfully!');

    }


    public function edit($id,ApiHelper $api){
        $response = Http::get($this->baseUrl.''.'payment-type/edit/'.$id)->json();
        return view('admin.payment_type.edit',[
        'payment_type' => $response,

    ]);

    }

    public function update(Request $request,$id){
        $this->validate($request, [        
            'name' => 'required',
        ]);
        $response = Http::post($this->baseUrl.''.'payment-type/update/'.$id, [
            'name' => $request['name'],
        ]);
        return redirect()->route('admin.payment_type')->with('message', 'Data has been Updated successfully!');
    

    }
        public function delete($id){
        $response = Http::get($this->baseUrl.''.'payment-type/delete/'.$id)->json();
        return redirect()->route('admin.payment_type')->with('message', 'Data has been Deleted successfully!');
    }

    }       

