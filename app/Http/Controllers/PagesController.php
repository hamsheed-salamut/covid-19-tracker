<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Reader;

class PagesController extends Controller
{
    public function index() {

        $client = new \GuzzleHttp\Client();
        $request = $client->get("https://corona.lmao.ninja/countries?sort=cases");
        $responseCountry = $request->getBody()->getContents();

        $requestWorldwide = $client->get("https://corona.lmao.ninja/v2/all");
        $responseWorldwide = $requestWorldwide->getBody()->getContents();
        $age = json_decode($responseCountry, true);

        return view('pages.index')->with('worldwide', json_decode($responseWorldwide, true))->with('countries', json_decode($responseCountry, true));
    }

    public function post(Request $request){

        $baseUrl = "https://corona.lmao.ninja/v2/historical/mauritius";
        $client = new \GuzzleHttp\Client();
        $requestGuzzle = $client->get($baseUrl);

        $response = $requestGuzzle->getBody()->getContents();

        return response()->json($response); 
     }
}
