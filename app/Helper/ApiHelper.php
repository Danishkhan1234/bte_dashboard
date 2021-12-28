<?php 



namespace App\Helper;



use Illuminate\Support\Facades\Http;



class ApiHelper {



    protected $baseUrl = 'http://localhost:8000/api/admin/';

    

    public function __construct() 

    {

        

    }

        public function TokenHeader(){

            return $headers = [
                    'Authorization' => 'Bearer '.session()->get('access_token')
                    ];
        
        }



 public function baseUrl(){

    return $this->baseUrl;

}



    public function getUsers()

    {
        $headers = [
            'Authorization' => 'Bearer '.session()->get('access_token')
            ];


        return Http::withHeaders($headers)->get("{$this->baseUrl}user")->json('data');

    }



    public function getCity() 

    {

        $headers = [
            'Authorization' => 'Bearer '.session()->get('access_token')
            ];

        return Http::withHeaders($headers)->get("{$this->baseUrl}city")->json('data');

    }



    public function getCountry() 

    {

        $headers = [
            'Authorization' => 'Bearer '.session()->get('access_token')
            ];
            
        return Http::withHeaders($headers)->get("{$this->baseUrl}country")->json('data');

    }





    public function getSkill() 

    {

        $headers = [
            'Authorization' => 'Bearer '.session()->get('access_token')
            ];

        return Http::withHeaders($headers)->get("{$this->baseUrl}skill")->json('data');

    }



    public function getService() 

    {
        $headers = [
            'Authorization' => 'Bearer '.session()->get('access_token')
            ];

        return Http::withHeaders($headers)->get("{$this->baseUrl}service")->json('data');

    }





    public function getTicket() 

    {

        $headers = [
            'Authorization' => 'Bearer '.session()->get('access_token')
            ];

        return Http::withHeaders($headers)->get("{$this->baseUrl}ticket")->json('data');

    }



 

 

 

 

 

 

 

 

 

 

 

 

 

 

 

 

    public function getWorkLevel() 

    {

        return Http::withHeaders($headers)->get("{$this->baseUrl}work-level")->json();

    }



    public function getContractType() 

    {

        return Http::withHeaders($headers)->get("{$this->baseUrl}contract-type")->json();

    }



    public function getPaymentType() 

    {

        return Http::withHeaders($headers)->get("{$this->baseUrl}payment-type")->json();

    }







}