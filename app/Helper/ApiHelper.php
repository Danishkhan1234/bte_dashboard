<?php 

namespace App\Helper;

use Illuminate\Support\Facades\Http;

class ApiHelper {

    protected $baseUrl = 'http://bte.baxkit.com/api/';
    
    public function __construct() 
    {
        
    }
    
public function baseUrl(){
    return $this->baseUrl;
}

    public function getUsers()
    {
        return Http::get("{$this->baseUrl}user")->json('data');
    }

    public function getCity() 
    {
        return Http::get("{$this->baseUrl}city")->json('data');
    }

    public function getCountry() 
    {
        return Http::get("{$this->baseUrl}country")->json('data');
    }


    public function getSkill() 
    {
        return Http::get("{$this->baseUrl}skill")->json('data');
    }

    public function getService() 
    {
        return Http::get("{$this->baseUrl}service")->json('data');
    }


    public function getTicket() 
    {
        return Http::get("{$this->baseUrl}ticket")->json('data');
    }

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
    public function getWorkLevel() 
    {
        return Http::get("{$this->baseUrl}work-level")->json();
    }

    public function getContractType() 
    {
        return Http::get("{$this->baseUrl}contract-type")->json();
    }

    public function getPaymentType() 
    {
        return Http::get("{$this->baseUrl}payment-type")->json();
    }



}