<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $restaurants = Restaurant::all();

        return view('back.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                return view('back.restaurants.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
   $restaurant = new Restaurant();
$restaurant->name = $request->input('name');
$restaurant->address = $request->input('address');
$restaurant->code = 'default_code'; // provide a default value for the 'code' field

$restaurant->save();

return redirect()->route('restaurants.index');
}

    /**
     * Display the specified resource.
     */
    public function show(restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $restaurant = Restaurant::find($id);

        return view('back.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'code' => 'required|max:20',
            'address' => 'required|max:200'
        ]);

        $restaurant = Restaurant::find($id);
        $restaurant->name = $request->get('name');
        $restaurant->code = $request->get('code');
        $restaurant->address = $request->get('address');
        $restaurant->save();

        return redirect('/restaurants')->with('success', 'Restoranas sėkmingai atnaujintas!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();

        return redirect('/restaurants')->with('success', 'Restoranas sėkmingai ištrintas!');
    }
}
