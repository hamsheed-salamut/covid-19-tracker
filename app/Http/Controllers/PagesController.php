<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Reader;

class PagesController extends Controller
{
    public function index() {

        $client = new \GuzzleHttp\Client();
        $request = $client->get("https://coronavirus-19-api.herokuapp.com/countries");
        $responseCountry = $request->getBody()->getContents();

        $requestWorldwide = $client->get("https://coronavirus-19-api.herokuapp.com/all");
        $responseWorldwide = $requestWorldwide->getBody()->getContents();
        $age = json_decode($responseCountry, true);

        return view('pages.index')->with('worldwide', json_decode($responseWorldwide, true))->with('countries', json_decode($responseCountry, true));
    }
}
