<?php



namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Helper\ApiHelper;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use Illuminate\Pagination\Paginator;

use Illuminate\Support\Collection;

use Illuminate\Pagination\LengthAwarePaginator;



class TicketController extends Controller



{



    protected $baseUrl = 'http://localhost:8000/api/';


    public function index(ApiHelper $api){

        return view('admin.tickets.index',[

            'tickets' => $api->getTicket(),

        ]);

    } 



    }       



