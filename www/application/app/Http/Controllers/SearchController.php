<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;

class SearchController extends Controller
{
    public function form(){
        return view('form');
    }
    public function search(){
        $search = search::all();
        return view('search',compact('search'));
    }
    /*public function store(Request $request){
        $search = Search::create([
            'search'=>$request->input('search')
        ]);
        return redirect('/search');
    }*/
    public function search_result(){
        $search_result = search_result::all();
        return view('search_result',compact('search_result'));
    }
    public function store(Request $request){
        $search_result = Search_result::create([
            'search_result'=>$request->input('search_result')
        ]);
        return redirect('/search_result');
    }
}
