<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use App\Models\Location;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		if($request->hasFile('archivo')){
			$url = $request->file('archivo')->store('uploads','public');
			$contents = Storage::disk('local')->get('public/'.$url);
			$lastid = '';
			$lastcity = '';
			if (!empty($contents)) {
				foreach(preg_split("/((\r?\n)|(\r\n?))/", $contents) as $line){
					$a = explode('=',$line);
					$key = $a[0];
					$value = $a[1];
					if($key == 'COUNTRY'){
						$o = new Country(['name' => $value]);
						$o->save();
						$lastid = $o->id;
					} else if($key == 'CITY'){
						$o_city = City::create(['name' => $value,'country_id' => $lastid]);
						$lastcity = $o_city->id;
					} else if($key == 'LOCATION'){
						$o_location = Location::create(['name' => $value,'city_id' => $lastcity]);
					}
				}
			}
			return redirect('cities');
		} else {
			echo 'No file';exit();
		}
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newdownload()
    {
        $contents = '';
        $nl = '';
		$o_all = Country::all();
		foreach($o_all as $key => $row){
			$contents .= $nl.'COUNTRY:'.$row->name;
			$nl = PHP_EOL;
			$cities_all = $row->cities;
			foreach($cities_all as $city){
				$contents .= $nl.'CITY:'.$city->name;
				$locations_all = $city->locations;
				foreach($locations_all as $location){
					$contents .= $nl.'LOCATION:'.$location->name;
				}
			}
		}
		$name_file_fsc = uniqid();
		$filepathtemp = 'temp/'.$name_file_fsc.'.txt';
		Storage::disk('public')->put($filepathtemp, $contents);
		$url = Storage::url($filepathtemp);
		$url = asset($url);
		echo $url;
    }
}
