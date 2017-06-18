<?php

namespace App\Http\Controllers;

use App\User;
use App\Tender;
use App\Bid;
use Validator;
use Auth;
use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Mail;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$this->get('/', function () {
    return view('welcome');
});

$this->get('/addtenders', function()
{
   $name = Tender::where('status','=','active')->get();
   $closed = Tender::where('status','=','closed')->get();
   return view('tenderForm')->with('tenders', $name)->with('closed', $closed);
});

$this->auth();

$this->get('/home', 'HomeController@index');

$this->post('addTender', 'IndexController@addTender');
$this->get('bid{id}', 'IndexController@getBidForm');
$this->post('proposal', 'IndexController@bidTender');

$this->get('/proposals', 'IndexController@activeTenders');
$this->get('/proposal{id}', 'IndexController@getProposals');
$this->get('/award{id}{t_id}', 'IndexController@award');
$this->get('/closedP', 'IndexController@getClosedTenders');
$this->get('/mybids', 'IndexController@mybids');
$this->get('/view{id}', 'IndexController@viewtender');
$this->get('/del{id}', 'IndexController@deltender');
