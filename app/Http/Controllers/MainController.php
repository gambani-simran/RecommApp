<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movies;

class MainController extends Controller
{
    public function mainpage()
    {
    	$data = Movies::all();
        return view('recommender')->with('data',$data);
    }

    public function genrewise(Request $request)
    {
    	error_log("in here");
    	$g = $request->only('genre');
    	$query = Movies::where('genres','=',$g)->get();
    	foreach ($query as $key) {
    		error_log($key->title);
    	}
        return response()->json(compact('query'));
    }

    public function moviewise(Request $request)
    {
        error_log("in here");
        $m = $request->only('movie');
        $query = Movies::where('title','=',$m)->get();
        $r = 0;
        $g = "";
        foreach ($query as $key) {
            error_log($key->rating);
            $r = $key->rating;
            $g = $key->genres;
        }
        $data = Movies::where('genres','=',$g)->where('rating','>=',$r)->get();
        return response()->json(compact('data'));
        //return view('recommendation')->with('data',$data);
    }

    public function popularity(Request $request)
    {
        error_log("in here");
        $min_r = 3.5;
        //$min_r = $request->only('min_rating');
        $query = Movies::where('rating','>',$min_r)->get();
        foreach ($query as $key) {
            error_log($key->title);
        }
        return response()->json(compact('query'));
    }
}
