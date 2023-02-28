<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Exception;
use Illuminate\Http\Request;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Event::first() 
        // return Event::first()->get(); 
        // return Event::last()->get();  

        try{
            $event = Event::first()->paginate(10);
            return response()->json(['mensaje' => 'Listado de eventos encontrado','event' => $event]);
        }catch (Exception $e){
            return response()->json(['mensaje'=> $e->getMessage()]);
        }
    }

    public function getByName($value)
    {
        try{
            $event = Event::where('name', $value)->get();;
            return response()->json(['mensaje' => 'Evento encontrado','Event' => $event]);
        }catch (Exception $e){
            return response()->json(['mensaje'=> $e->getMessage()]);
        }
    }

    public function getById($id){
        try{
            $event = Event::find($id);
            return response()->json(['mensaje' => 'Evento encontrado','event' => $event]);
        }catch (Exception $e){
            return response()->json(['mensaje'=> $e->getMessage()]);
        }
    }

    public function getByType($type){
        try{
            $event = Event::find($type)->paginate(10);
            return response()->json(['mensaje' => 'Eventos de ', $type, ' encontrados','event' => $event]);
        }catch (Exception $e){
            return response()->json(['mensaje'=> $e->getMessage()]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $event = Event::create($request -> all());
            return response()->json(['mensaje' => 'Done','event' => $event, 'created']);
        }catch (Exception $e){
            return response()->json(['mensaje'=> $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $event = Event::where($request -> id);
            $event -> update($request->all());
            return response()->json(['mensaje' => 'Done','event' => $event, 'updated']);
        }catch (Exception $e){
            return response()->json(['mensaje'=> $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $event = Event::find($id);
            $event -> delete();
            return response()->json(['mensaje' => 'Done','event' => $event, 'deleted']);
        }catch (Exception $e){
            return response()->json(['mensaje'=> $e->getMessage()]);
        }
    }
}
