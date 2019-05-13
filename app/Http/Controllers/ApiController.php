<?php

namespace App\Http\Controllers;

use App\Tools\Curl;
use Illuminate\Support\Facades\Config;

class ApiController extends Controller
{

    protected $url = 'http://gateway.marvel.com/v1/public/characters';

    protected function getQuery()
    {
        $timestamp = '1';
        $privateKey = Config::get('services.marvel.private_key');
        $publicKey = Config::get('services.marvel.public_key');

        $hash = md5($timestamp . $privateKey . $publicKey);
        $query = "?orderBy=-modified&limit=40&ts=$timestamp&apikey=$publicKey&hash=$hash";

        return $query;
    }

    public function index()
    {
        $query = $this->getQuery();
        $url = $this->url . $query;

        $request = new Curl($url);
        $response = $request->get();

        $result = collect($response->get('data')['results'])->transform(function ($character) {
            return collect($character)->only(['id', 'name', 'description', 'thumbnail', 'urls']);
        })->transform(function ($value) {
            $value['thumbnail'] = $value['thumbnail']['path'] . '/portrait_incredible.' .  $value['thumbnail']['extension'];
            return $value;
        });

        return view('welcome', [
            'characters' => $result,
            'errors' => $request->hasError()
        ]);
    }


    public function show($id)
    {
        $query = $this->getQuery();
        $url = $this->url . "/$id" . $query;

        $request = new Curl($url);
        $response = $request->get();

        $result = collect($response->get('data')['results'])->transform(function ($character) {
            return collect($character)
                ->only(['id', 'name', 'description', 'thumbnail', 'urls']);
        })->transform(function ($value) {
            $value['thumbnail'] = $value['thumbnail']['path'] . '/portrait_incredible.' .  $value['thumbnail']['extension'];
            return $value;
        });

        return view('details', [
            'character' => $result
        ]);
    }
}
