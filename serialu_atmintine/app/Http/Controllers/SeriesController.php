<?php

namespace App\Http\Controllers;

use App\Series;
use Illuminate\Http\Request;
use Validator;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Series::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            "name" => "required",
            "year" => "required",
        ]);

       $series = Series::create($request->all());
       return response()->json($series, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $series = Series::find($id);
        if(!$series){
            return response()->json(["Message" => "Series not found"], 404);
        }

        return response()->json($series, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $series = Series::find($id);

        $validator = $request->validate([
           'name' => 'required',
           'year' => 'required',
        ]);
        
        if(!$series){
            return response()->json(["Message" => "Series not found"], 404);
        }

        $series->update($request->all());
        return response()->json($series, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $series = Series::find($id);
        if(!$series){
            return response()->json(["Message" => "Series not found"], 404);
        }

        $series->delete();
        return response()->json(["Message" => "Deleted succesfuly"], 200);
    }
}
