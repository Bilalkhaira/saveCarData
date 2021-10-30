<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Auth;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::where('user_id', Auth::user()->id)->latest()->paginate(5);
    
        return view('frontend.dashboard.index',compact('cars'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'detail' => 'required',
        ]);
        Car::create($request->all());
     
        return redirect()->route('cars.index')
                        ->with('success','Car created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('frontend.dashboard.edit',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'detail' => 'required',
        ]);
    
        $car->update($request->all());
    
        return redirect()->route('cars.index')
                        ->with('success','Car updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
    
        return redirect()->route('cars.index')
                        ->with('success','Car deleted successfully');
    }
    public function list_cars()
    {
        $data = Car::all();
        return response()->json($data);
    }

    public function carListView()
    {
        return view('frontend.dashboard.carlist');
    }
}
