<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class CatalogController extends Controller
{
    
    public function getIndex(){
        return view( 'catalog.index', array('arrayPeliculas' => Movie::all()) );
    }

    public function getShow( $id ){
        return view( 'catalog.show', array('movie' => Movie::findOrFail($id)) );
    }

    public function getCreate(){
        return view( 'catalog.create' );
    }

    public function getEdit( $id ){
        return view( 'catalog.edit', array( 'id' => Movie::findOrFail($id) ) );
    }

    public function postCreate( Request $request ){
        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synapsis = $request->input('synapsis');
        $movie->save();

        return view('/catalog');
    }

    public function putEdit( Request $request, $id ){
        $movie = Movie::findOrFail($id);
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synapsis = $request->input('synapsis');
        $movie->save();

        return view('/catalog/show/'.$id);
    }


}

