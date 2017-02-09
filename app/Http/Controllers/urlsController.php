<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class urlsController extends Controller
{
    public function create() {
    	return view('welcome');
    }

    public function store(Request $request) {
    	//$url = $request->url;

	
		/*Validator::make(
			compact('url'),
			['url' => 'required|url']

		)->validate();
		*/
		$this->validate($request, ['url' => 'required|url']);
		
		$record = $this->getRecordForUrl($request->url);

		return view('result')->withShortened($record->shortened);

		// $record = Url::whereUrl($url)->first() ;

		/*
		if ($record) {
			return view('result')->withShortened($record->shortened);
		}

		

		$row = Url::create([
			'url'	=>	$url,
			'shortened' => Url::getUniqueShortUrl()
		]);

		if($row){
			return view('result')->withShortened($row->shortened);
		} else {
			return redirect('/');
		}
		*/
    }

    public function show($shortened) {
    	$url = Url::whereShortened($shortened)->firstOrFail();

	    //if (! $url) {
	    //	return redirect('/');
	    //} else {
	    	return redirect($url->url);
	    //}
    }


    private function getRecordForUrl($url) {
    	
    	return Url::firstOrCreate(
    		['url' => $url],
    		['shortened' => Url::getUniqueShortUrl()]
    	);

		/*
    	$record = Url::whereUrl($url)->first() ;

    	if ($record) {
			return $record;
		}

		

		return Url::create([
			'url'	=>	$url,
			'shortened' => Url::getUniqueShortUrl()
		]);
		*/
		
    }
}
