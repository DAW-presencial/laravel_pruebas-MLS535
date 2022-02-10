<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveRequest;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $flights= Flight::all();
        return view('flights.index', compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('flights.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRequest $request)
    {
        //

        $flights = $request->all();
        $flights['category'] = join(',', $request->category);
        $flights['image'] = $request->file('image')->storeAS('contacts_img', $request->image->getClientOriginalName());
        Flight::create($flights);


//        $input = $request->input('size');


        return redirect()->route('flights.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        //
        return view('flights.show', compact('flight'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        //
        return view('flights.edit', compact('flight'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRequest $request, Flight $flight)
    {
        //
//        $input = $request->validated();
        $inputs =$request->all();
        var_dump($request->category);
        $inputs['category'] = join(',', $request->category);

        $inputs['image'] = $request->file('image')->storeAS('contacts_img', $request->image->getClientOriginalName());
        $flight->update($inputs);
        //$post->update( $request->all());

        return redirect()->route('flights.index')
            ->with('success', 'Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        //
        $flight->delete();

        return redirect()->route('flights.index');

    }
}
