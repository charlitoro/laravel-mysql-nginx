@extends('layouts.master')
 
@section('content')
     <div class="row"> 
          <div class="col-sm-4">
               <img src="{{ $movie['poster'] }}" style="height:280px"/>
          </div>
          <div class="col-sm-8">
               <h3>{{$movie['title']}}</h3>
               <label> Año: {{$movie['year']}} </label>
               <label> Director: {{$movie['director']}} </label>
               <p><b>Synopsis:</b> {{$movie['synopsis']}}</p>
               @if($movie['rented'] == true)
                    <label><b>Status: </b>Pelicula rentada</label><br/>
                    <button type="button" class="btn btn-primary">Devolver</button>
               @else
                    <label><b>Status: </b>Pelicula disponible</label><br/>
                    <button type="button" class="btn btn-success">Rentar</button>
               @endif
               <button type="button" class="btn btn-info">Edital Pelicula</button>
               <button type="button" class="btn btn-light">Volver</button>
          </div>
     </div>
@stop